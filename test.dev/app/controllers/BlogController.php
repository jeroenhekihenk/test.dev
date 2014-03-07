<?php

class BlogController extends BaseController {

	public function getBlog()
	{
		$posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(5);
		return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}

	public function getBlogForm()
	{
		$user = Sentry::getUser();
		return View::make('admin.blog.create')->with('user', $user);
	}

	public function destroyPost()
	{

	}

	public function newPost()
	{
		$new_post = array(
			'post_title'	=> Input::get('post_title'),
			'post_body'		=> Input::get('post_body'),
			'post_author'	=> Input::get('post_author')
		);

		$rules = array(
			'post_title'	=> 'required|min:3|max:255',
			'post_body'		=> 'required|min:10'
		);

		$validation = Validator::make($new_post, $rules);
		if ( $validation->fails() )
		{
			return Redirect::to('admin/blog/create')->with('user', Sentry::getUser())->withErrors($validation)->with_input();
		}

		$post = new Post($new_post);
		$post->save();

		return Redirect::to('blog');
	}

	public function admin()
	{
		$posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(5);
		return View::make('admin.blog.overview')->with('posts', $posts);
	}

}