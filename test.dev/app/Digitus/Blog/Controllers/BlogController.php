<?php namespace Digitus\Blog\Controllers;

use Illuminate\View\Environment as View;
use Cartalyst\Sentry\Sentry as Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Hashing\BcryptHasher as Hash;
use Digitus\Base\Model\post;
use Digitus\Base\Model\User;

class BlogController extends \Digitus\Base\Controllers\BaseController{

	public function index()
	{
		$posts = $this->posts->paginate(4);
		return $this->view->make('blog.index')->with('posts', $posts, 'user', $this->sentry->getUser());
		// return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}
	public function show($slug)
	{
		
		$currpost = $this->posts->byslug($slug);
		$login = $currpost->post_author;
		$user = $this->sentry->findUserByLogin($login);

		return $this->view->make('blog.post')->with('post', $currpost)->with('user',$user);
	}

	public function getBlogForm()
	{
		$user = $this->user;
		return $this->view->make('admin.blog.create')->with('user', $user);
	}

	public function destroy($slug)
	{
		$post = $this->posts->byslug($slug);
		if ($post) {
			$post->delete();
			return $this->redirect->to('blog');
			}
		return 'There was a problem...';
	}

	public function newPost()
	{

		$new_post = array(
			'post_title'	=> Input::get('post_title'),
			'post_body'		=> Input::get('post_body'),
			'post_author'	=> Input::get('post_author'),
			'post_slug'		=> Str::slug(Input::get('post_title'))
		);

		$rules = array(
			'post_title'	=> 'required|min:3|max:255',
			'post_body'		=> 'required|min:10',
		);
		// $new_tags = array();
		// foreach(explode(',', Input::get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		

		$validation = Validator::make($new_post, $rules);
		if ( $validation->fails() )
		{
			return Redirect::to('admin/blog/create')->with('user', $loggedUser)->withErrors($validation)->with_input();
		}

		$post = new Post($new_post);
		$post->save(); 

		return Redirect::to('blog');
	}

	public function admin()
	{
		$posts = $this->posts->orderBy('updated_at', 'desc')->paginate();
		return $this->view->make('admin.blog.overview')->with('posts', $posts);
	}

	public function editPost($slug)
	{
		$post = $this->posts->byslug($slug);

		return $this->view->make('blog.edit.post')->with('post', $post);
	}

	public function updatePost($slug)
	{
		$post = $this->posts->byslug($slug);

		$post->post_title 	= $this->input->get('post_title');
		$post->post_slug 	= Str::slug($this->input->get('post_title'));
		$post->post_body	= $this->input->get('post_body');

		if($post->save())
		{
			return $this->redirect->to('blog/{slug}')->with('post', $post);
		} else {
			return $this->redirect->to('blog/{slug}/edit')->with('post', $post)->withInput();
		}
	}

}