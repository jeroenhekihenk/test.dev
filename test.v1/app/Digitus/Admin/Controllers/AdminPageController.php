<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController,
View,
Digitus\Base\Model\Page,
Input,
Str,
Validator,
Redirect;

class AdminPageController extends BaseController {

	public function index()
	{
		$pages = Page::all();
		return View::make('admin.pages.index')
		->with('pages',$pages);
	}

	public function create()
	{
		return View::make('admin.pages.create');
	}

	public function store()
	{
		if(Input::get('file'))
			{
				$file 				= Input::file('file');
			    $destinationPath 	= '/uploads/images/pages/';
			    $filename 			= $file->getClientOriginalName();
			    $upload_success 	= $file->move($destinationPath, $filename);
			    $new_page = array(
			    'image'				=> str_replace('\\', '/', $upload_success),
			    'ogimage' 			=> str_replace('\\', '/', $upload_success),
			    );
			}

	    $new_page = array(
	    	'layout' 			=> Input::get('layout'),
	    	'menu' 				=> Input::get('menu'),
	    	'footer' 			=> Input::get('footer'),
			'title'				=> Input::get('title'),
			'body'				=> Input::get('body'),
			'author'			=> Input::get('author'),
			'slug'				=> Str::slug(Input::get('title')),

			'metatitle' 		=> Input::get('title'),
			'metadescription'	=> Input::get('body'),
			'robots' 			=> Input::get('robots'),
			'ogtitle' 			=> Input::get('title'),
			'ogdescription'		=> Input::get('body'),
			'ogsitename' 		=> 'Digitus Marketing',
			'ogurl' 			=> '',

			'ogtype' 			=> Input::get('type')
		);

		

		$rules = array(
			'title'				=> 'required|min:3|max:255',
			'body'				=> 'required|min:10',
			'author' 			=> 'required',
			'metatitle' 		=> 'max:150',
			'metadescription'	=> 'max:150',
			'ogtitle' 			=> 'max:150',
			'ogdescription'		=> 'max:150',
			
		);		

		$validation = Validator::make($new_page, $rules);
		if ( $validation->fails() )
		{
			return Redirect::route('admin.pages.create')->withErrors($validation)->withInput();
		}

		$page = new Page($new_page);

		$page->save(); 

		return Redirect::route('admin.pages.index');
	}

	public function show($slug)
	{
		$facebook 	= 'https://www.facebook.com/DigitusMarketing';
		$twitter 	= 'https://www.twitter.com/_DigiMarketing';
		$page 		= Page::byslug($slug);
		$layout 	= $page->layout;
		$menu 		= $page->menu;
		$footer 	= $page->footer;

		return View::make('pages.index')
		->with('page',$page)
		->with('facebook',$facebook)
		->with('twitter',$twitter)
		->with('layout',$layout)
		->with('menu',$menu)
		->with('footer',$footer);
	}

	public function edit($slug)
	{
		$page = Page::byslug($slug);

		return View::make('admin.pages.edit')
		->with('page', $page);
	}

	public function update($slug)
	{
		$page = Page::byslug($slug);

		$page->title 			= Input::get('title');
		$page->slug 			= Str::slug(Input::get('title'));
		$page->body				= Input::get('body');
		$page->metatitle		= Input::get('title');
		$page->metadescription	= Input::get('body');
		$page->ogtitle 			= Input::get('title');
		$page->ogdescription	= Input::get('body');

		if(Input::get('file'))
		{
			$file 				= Input::file('file');
		    $destinationPath 	= '/uploads/images/pages/';
		    $filename 			= $file->getClientOriginalName();
		    $upload_success 	= $file->move($destinationPath, $filename);
			$page->image 		= str_replace('\\', '/', $upload_success);
			$page->ogimage 		= str_replace('\\', '/', $upload_success);
		}
		$page->ogtype 	= Input::get('type');
		$page->robots 	= Input::get('robots');
		$page->ogurl 	= Input::get('ogurl');

		if($page->save())
		{
			return Redirect::route('admin.pages.index')
			->with('page', $page);
		} else {
			return Redirect::back()->with('page', $page)
			->withInput();
		}
	}

	public function destroy($slug)
	{
		$page = Page::byslug($slug);
		if ($page) {
			$page->delete();
			return Redirect::route('admin.pages.index')->with('message','Pagina is verwijderd!');
			}
		return 'There was a problem...';
	}

}