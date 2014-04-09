<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController, View, Digitus\Base\Model\Page, Input, Str, Validator, Redirect;

class AdminPageController extends BaseController {

	public function index()
	{
		$pages = Page::all();
		return View::make('admin.pages.index')->with('pages',$pages);
	}

	public function create()
	{
		return View::make('admin.pages.create');
	}

	public function store()
	{
		$new_page = array(
			'title'		=> Input::get('title'),
			'body'		=> Input::get('body'),
			'author'	=> Input::get('author'),
			'slug'		=> Str::slug(Input::get('title')),
			'image'		=> Input::get('image')
		);

		$rules = array(
			'title'		=> 'required|min:3|max:255',
			'body'		=> 'required|min:10',
			'author' 	=> 'required',
			'slug' 		=> 'required|unique',
		);
		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		

		$validation = Validator::make($new_page, $rules);
		if ( $validation->fails() )
		{
			return Redirect::route('admin.pages.create')->with('user', $loggedUser)->withErrors($validation)->withInput();
		}

		$page = new Page($new_page);
		$page->save(); 

		return Redirect::route('admin.pages.index');
	}

	public function show()
	{
		
	}

	public function edit($slug)
	{
		$page = Page::byslug($slug);

		return View::make('admin.pages.edit')->with('page', $page);
	}

	public function update($slug)
	{
		$page = Page::byslug($slug);

		$page->title 	= Input::get('title');
		$page->slug 	= Str::slug(Input::get('title'));
		$page->body		= Input::get('body');

		if($page->save())
		{
			return Redirect::route('admin.pages.index')->with('page', $page);
		} else {
			return Redirect::back()->with('page', $page)->withInput();
		}
	}

	public function destroy($slug)
	{
		$page = Page::byslug($slug);
		if ($page) {
			$page->delete();
			return Redirect::route('blog.index');
			}
		return 'There was a problem...';
	}

}