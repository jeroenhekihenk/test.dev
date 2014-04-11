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
		$file = Input::file('file');
// dd($file);
	    $destinationPath = '/uploads/images/pages/';
	    $filename = $file->getClientOriginalName();
	    $upload_success = $file->move($destinationPath, $filename);

	    $new_page = array(
			'title'		=> Input::get('title'),
			'body'		=> Input::get('body'),
			'author'	=> Input::get('author'),
			'slug'		=> Str::slug(Input::get('title')),
			'image'		=> str_replace('\\', '/', $upload_success),
			'metatitle' => Input::get('title'),
			'metadescription'=> Input::get('body'),
			'robots' 	=> Input::get('robots'),
			'ogtitle' 	=> Input::get('title'),
			'ogdescription'=> Input::get('body'),
			'ogsitename' => 'Digitus Marketing',
			'ogurl' 	=> '',
			'ogimage' 	=> str_replace('\\', '/', $upload_success),
			'ogtype' 	=> Input::get('type')
		);

		

		$rules = array(
			'title'		=> 'required|min:3|max:255',
			'body'		=> 'required|min:10',
			'author' 	=> 'required',
			'metatitle' => 'max:150',
			'metadescription'=> 'max:150',
			'ogtitle' 	=> 'max:150',
			'ogdescription'=> 'max:150',
			
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

	public function show($slug)
	{
		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$twitter = 'https://www.twitter.com/_DigiMarketing';
		$page = Page::byslug($slug);
		// dd($page);

		return View::make('pages.index')->with('page',$page)->with('facebook',$facebook)->with('twitter',$twitter);
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
		$page->metatitle= Input::get('title');
		$page->metadescription= Input::get('body');
		$page->ogtitle 	= Input::get('title');
		$page->ogdescription= Input::get('body');

		if(Input::get('file'))
		{
			$file = Input::file('file');
		    $destinationPath = '/uploads/images/pages/';
		    $filename = $file->getClientOriginalName();
		    $upload_success = $file->move($destinationPath, $filename);
			$page->image =  str_replace('\\', '/', $upload_success);
			$page->ogimage = str_replace('\\', '/', $upload_success);
		}
		$page->ogtype = Input::get('type');
		$page->robot = Input::get('robots');
		$page->ogurl = Input::get('ogurl');

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