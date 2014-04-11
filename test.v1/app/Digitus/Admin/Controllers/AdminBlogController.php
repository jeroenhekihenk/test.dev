<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Model\Tag, Digitus\Base\Model\User, Digitus\Base\Model\Post, Digitus\Base\Model\Categorie, Auth, View, Input, Redirect, Validator, Str;

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
		$login = $currpost->author;
		$user = User::byid($login);
		$author = $user->firstname . ' ' . $user->lastname;

		return View::make('blog.post')->with('post', $currpost)->with('user',$user)->with('author',$author);
	}

	public function edit($slug)
	{
		$post = Post::byslug($slug);
		$tags = Tag::all();
		$categories = Categorie::all();

		return View::make('admin.blog.edit')->with('post', $post)->with('tags',$tags)->with('categories',$categories);
	}

	public function update($slug)
	{
		$post = Post::byslug($slug);

		$post->title 	= Input::get('title');
		$post->slug 	= Str::slug(Input::get('title'));
		$post->body		= Input::get('body');
		// $new_tags = array();
		// foreach(explode(',', Input::get('tag-ex')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		if(Input::get('addcategorie'))
		{
			$new_cats = array();
			foreach(explode(',', Input::get('addcategorie')) as $categorie) {
			$categorie = Categorie::firstOrCreate(array('name' => $categorie));
			array_push($new_cats, $categorie->id);
			}
			$post->categories()->attach($new_cats); 
		}

	    if(Input::get('delcategorie'))
	    {
	    	$old_cats = array();
			foreach(explode(',', Input::get('delcategorie')) as $categorie) {
			$categorie = Categorie::where('name','=',$categorie);
			array_push($old_cats, $categorie->first()->id);
			}
			$post->categories()->detach($old_cats); 
		}

		if(Input::get('addtag'))
		{
			$new_tags = array();
			foreach(explode(',', Input::get('addtag')) as $tag) {
			$tag = Tag::firstOrCreate(array('name' => $tag));
			array_push($new_tags, $tag->id);
			}
			$post->tags()->attach($new_tags); 
		}

	    if(Input::get('deltag'))
	    {
		    $old_tags = array();
			foreach(explode(',', Input::get('deltag')) as $tag) {
			$tag = Tag::where('name','=',$tag);
			array_push($old_tags, $tag->first()->id);
			}
			$post->tags()->detach($old_tags); 
		}

		if($post->save())
		{
			return Redirect::route('admin.blog.index')->with('post', $post);
		} else {
			return Redirect::route('admin.blog.edit')->with('post', $post)->withInput();
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