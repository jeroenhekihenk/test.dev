<?php namespace Digitus\Insides\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\User,
Digitus\Base\Model\Categorie,
Digitus\Base\Model\Page,
Digitus\Base\Model\post,
Digitus\Base\Model\Tag,
Auth,
View,
Response;

class InsidesController extends BaseController{

	public function index()
	{
		$slug = 'insides';
		$posts = Post::all();
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		return View::make('insides.index')
		->with('page',$currpage)
		->with('posts',$posts);

		
		// $page = Page::byslug('blog');
		// if(Auth::check())
		// 	{
		// 		$user = Auth::user();
		// 	}else{
		// 		$user = false;
		// 	}
		// return View::make('blog.index')
		// ->with('posts', $posts)
		// ->with('user', $user)
		// ->with('page', $page);
	}
	public function show($slug)
	{
		$currpost = Post::byslug($slug);
		$categories = $currpost->categories;
		foreach($categories as $categorie);
		$henk = Categorie::where('name','=',$categorie->name)->first();
		$posts = $henk->posts()->paginate(3);
		$deUser = User::byid($currpost->author);
		$author = $currpost->getAuthor();

		return View::make('insides.post')
		->with('post', $currpost)
		->with('user',$deUser)
		->with('author',$author)
		->with('posts',$posts);
	}

	// public function getBlogForm()
	// {
	// 	$user = $this->user;
	// 	return $this->view->make('admin.blog.create')->with('user', $user);
	// }

	// public function destroy($slug)
	// {
	// 	$post = $this->posts->byslug($slug);
	// 	if ($post) {
	// 		$post->delete();
	// 		return $this->redirect->to('blog');
	// 		}
	// 	return 'There was a problem...';
	// }

	// public function newPost()
	// {

	// 	$new_post = array(
	// 		'post_title'	=> Input::get('post_title'),
	// 		'post_body'		=> Input::get('post_body'),
	// 		'post_author'	=> Input::get('post_author'),
	// 		'post_slug'		=> Str::slug(Input::get('post_title'))
	// 	);

	// 	$rules = array(
	// 		'post_title'	=> 'required|min:3|max:255',
	// 		'post_body'		=> 'required|min:10',
	// 	);
	// 	// $new_tags = array();
	// 	// foreach(explode(',', Input::get('tags')) as $tag) {
	// 	// $tag = Tag::firstOrCreate(array('name' => $tag));
	// 	// array_push($new_tags, $tag);
	// 	// }
	// 	// $post->tags()->sync($new_tags); 
		

	// 	$validation = Validator::make($new_post, $rules);
	// 	if ( $validation->fails() )
	// 	{
	// 		return Redirect::to('admin/blog/create')->with('user', $loggedUser)->withErrors($validation)->with_input();
	// 	}

	// 	$post = new Post($new_post);
	// 	$post->save(); 

	// 	return Redirect::to('blog');
	// }

	// public function admin()
	// {
	// 	$posts = $this->posts->orderBy('updated_at', 'desc')->paginate();
	// 	return $this->view->make('admin.blog.overview')->with('posts', $posts);
	// }

	// public function editPost($slug)
	// {
	// 	$post = $this->posts->byslug($slug);

	// 	return $this->view->make('blog.edit.post')->with('post', $post);
	// }

	// public function updatePost($slug)
	// {
	// 	$post = $this->posts->byslug($slug);

	// 	$post->post_title 	= $this->input->get('post_title');
	// 	$post->post_slug 	= Str::slug($this->input->get('post_title'));
	// 	$post->post_body	= $this->input->get('post_body');

	// 	if($post->save())
	// 	{
	// 		return $this->redirect->to('blog/{slug}')->with('post', $post);
	// 	} else {
	// 		return $this->redirect->to('blog/{slug}/edit')->with('post', $post)->withInput();
	// 	}
	// }

}