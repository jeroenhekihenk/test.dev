<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Model\Tag, Digitus\Base\Model\Post, Auth, View, Input, Redirect, Validator, Str;

class AdminBlogController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{
		$posts = Post::all();
		return View::make('admin.blog.overview')->with('posts', $posts);
	}

	public function create()
	{
		if(Auth::check())
		{
			$user = Auth::user();
		} else {
			$user = false;
		}

	
		return View::make('admin.blog.create')->with('user', $user);
	}

	public function store()
	{
		$new_post = array(
			'title'		=> Input::get('title'),
			'body'		=> Input::get('body'),
			'author'	=> Input::get('author'),
			'slug'		=> Str::slug(Input::get('title'))
		);

		$rules = array(
			'title'		=> 'required|min:3|max:255',
			'body'		=> 'required|min:10',
		);
		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		

		$validation = Validator::make($new_post, $rules);
		if ( $validation->fails() )
		{
			return Redirect::to('admin/blog/create')->with('user', $loggedUser)->withErrors($validation)->withInput();
		}

		$post = new Post($new_post);
		$post->save(); 

		return Redirect::to('blog');
	}

	public function show($slug)
	{
		
		$currpost = Post::byslug($slug);
		$login = $currpost->post_author;
		$user = User::byid($login);

		return View::make('blog.post')->with('post', $currpost)->with('user',$user);
	}

	public function edit($slug)
	{
		$post = Post::byslug($slug);

		return View::make('blog.edit.post')->with('post', $post);
	}

	public function update($slug)
	{
		$post = Post::byslug($slug);

		$post->title 	= Input::get('title');
		$post->slug 	= Str::slug(Input::get('title'));
		$post->body		= Input::get('body');

		if($post->save())
		{
			return Redirect::to('blog/{slug}')->with('post', $post);
		} else {
			return Redirect::to('blog/{slug}/edit')->with('post', $post)->withInput();
		}
	}

	public function destroy($slug)
	{
		$post = Post::byslug($slug);
		if ($post) {
			$post->categories()->detach();
			$post->tags()->detach();
			$post->delete();
			return Redirect::route('blog.index');
			}
		return 'There was a problem...';
	}

}