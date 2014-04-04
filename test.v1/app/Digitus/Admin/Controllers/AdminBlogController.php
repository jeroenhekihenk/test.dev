<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Model\Tag;

class AdminBlogController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{
		$posts = $this->posts->orderBy('updated_at', 'desc')->paginate();
		return $this->view->make('admin.blog.overview')->with('posts', $posts);
	}

	public function create()
	{
		$user = $this->user;
		$tag = $this->posts->tags()->get();
		return $this->view->make('admin.blog.create')->with('user', $user)->with('tag',$tag);
	}

	public function store()
	{
		$new_post = array(
			'post_title'	=> $this->input->get('post_title'),
			'post_body'		=> $this->input->get('post_body'),
			'post_author'	=> $this->input->get('post_author'),
			'post_slug'		=> $this->str->slug($this->input->get('post_title'))
		);

		$rules = array(
			'post_title'	=> 'required|min:3|max:255',
			'post_body'		=> 'required|min:10',
		);
		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		

		$validation = $this->validator->make($new_post, $rules);
		if ( $validation->fails() )
		{
			return $this->redirect->to('admin/blog/create')->with('user', $loggedUser)->withErrors($validation)->with_input();
		}

		$post = new $this->posts($new_post);
		$post->save(); 

		return $this->redirect->to('blog');
	}

	public function show($slug)
	{
		
		$currpost = $this->posts->byslug($slug);
		$login = $currpost->post_author;
		$user = $this->sentry->findUserByLogin($login);

		return $this->view->make('blog.post')->with('post', $currpost)->with('user',$user);
	}

	public function edit($slug)
	{
		$post = $this->posts->byslug($slug);

		return $this->view->make('blog.edit.post')->with('post', $post);
	}

	public function update($slug)
	{
		$post = $this->posts->byslug($slug);

		$post->post_title 	= $this->input->get('post_title');
		$post->post_slug 	= $this->str->slug($this->input->get('post_title'));
		$post->post_body	= $this->input->get('post_body');

		if($post->save())
		{
			return $this->redirect->to('blog/{slug}')->with('post', $post);
		} else {
			return $this->redirect->to('blog/{slug}/edit')->with('post', $post)->withInput();
		}
	}

	public function destroy($slug)
	{
		$post = $this->posts->byslug($slug);
		if ($post) {
			$post->categories()->detach();
			$post->tags()->detach();
			$post->delete();
			return $this->redirect->route('blog.index');
			}
		return 'There was a problem...';
	}

}