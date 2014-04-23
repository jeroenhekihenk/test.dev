<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Tag,
Digitus\Base\Model\User,
Digitus\Base\Model\Workshop,
Digitus\Base\Model\Categorie,
Auth,
View,
Input,
Redirect,
Validator,
Str;

class AdminWorkshopsController extends BaseController {

	public function index()
	{
		$workshops = Workshop::all();
		return View::make('admin.workshops.index')
		->with('workshops', $workshops);
	}

	public function create()
	{
		$tags 		= Tag::all();
		$categories = Categorie::all();

		if(Auth::check())
		{
			$user = Auth::user();
		} else {
			$user = false;
		}
		return View::make('admin.workshops.create')
		->with('user', $user)
		->with('tags',$tags)
		->with('categories',$categories);
	}

	public function store()
	{
		
		if(Input::get('file'))
		{
		$file 				= Input::file('file');
	    $destinationPath 	= 'uploads/images/workshops/';
	    $filename 			= $file->getClientOriginalName();
	    $upload_success 	= $file->move($destinationPath, $filename);
		}

		$new_workshop = array(
			'title'		=> Input::get('title'),
			'body'		=> Input::get('body'),
			'author'	=> Input::get('author'),
			'slug'		=> Str::slug(Input::get('title')),
			'image'		=> str_replace('\\', '/', $upload_success),
			'datum'		=> Input::get('datum'),
		);
		$rules = array(
			'title'		=> 'required|min:3|max:255',
			'body'		=> 'required|min:10',
			'datum'		=> 'required',
		);

		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		$validation = Validator::make($new_workshop, $rules);
		if ( $validation->fails() )
		{
			return Redirect::route('admin.workshops.create')->withErrors($validation)->withInput();
		}
		$workshop = new Workshop($new_workshop);
		$workshop->save(); 
		if(Input::get('addcategorie'))
		{
			$new_cats = array();
			foreach(
				explode(
					',', Input::get('addcategorie')) as $categorie) 
			{
				$categorie = Categorie::firstOrCreate(array('name' => $categorie));
				array_push($new_cats, $categorie->id);
			}
			$workshop->categories()->attach($new_cats); 
		}
		if(Input::get('addtag'))
		{
			$new_tags = array();
			foreach(
				explode(
					',', Input::get('addtag')) as $tag) 
			{
				$tag = Tag::firstOrCreate(array('name' => $tag));
				array_push($new_tags, $tag->id);
			}
			$workshop->tags()->attach($new_tags); 
		}
		return Redirect::route('admin.workshops.index');
	}

	public function show($id)
	{
		
	}

	public function edit($slug)
	{
		$workshop = Workshop::byslug($slug);
		$tags = Tag::all();
		$categories = Categorie::all();
		return View::make('admin.workshops.edit')
		->with('workshop', $workshop)
		->with('tags',$tags)
		->with('categories',$categories);
	}

	public function update($slug)
	{
		$workshop 				= Workshop::byslug($slug);
		$workshop->title 		= Input::get('title');
		$workshop->slug 		= Str::slug(Input::get('title'));
		$workshop->body			= Input::get('body');
		
		$file 				= Input::file('file');
	    $destinationPath 	= 'uploads/images/workshops/';
	    $filename 			= $file->getClientOriginalName();
	    $upload_success 	= $file->move($destinationPath, $filename);
	    // dd($upload_success);
		$workshop->image 		= str_replace('\\', '/', $upload_success);
		
	
		// $new_tags = array();
		// foreach(explode(',', Input::get('tag-ex')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		if(Input::get('addcategorie'))
		{
			$new_cats = array();
			foreach(
				explode(
					',', Input::get('addcategorie')) as $categorie) 
			{
				$categorie = Categorie::firstOrCreate(array('name' => $categorie));
				array_push($new_cats, $categorie->id);
			}
			$workshop->categories()->attach($new_cats); 
		}
	    if(Input::get('delcategorie'))
	    {
	    	$old_cats = array();
			foreach(
				explode(
					',', Input::get('delcategorie')) as $categorie) 
			{
				$categorie = Categorie::where('name','=',$categorie);
				array_push($old_cats, $categorie->first()->id);
			}
			$workshop->categories()->detach($old_cats); 
		}
		if(Input::get('addtag'))
		{
			$new_tags = array();
			foreach(
				explode(
					',', Input::get('addtag')) as $tag) 
			{
				$tag = Tag::firstOrCreate(array('name' => $tag));
				array_push($new_tags, $tag->id);
			}
			$workshop->tags()->attach($new_tags); 
		}
	    if(Input::get('deltag'))
	    {
		    $old_tags = array();
			foreach(
				explode(
					',', Input::get('deltag')) as $tag) 
			{
				$tag = Tag::where('name','=',$tag);
				array_push($old_tags, $tag->first()->id);
			}
			$workshop->tags()->detach($old_tags); 
		}
		if($workshop->save())
		{
			return Redirect::route('admin.workshops.index')
			->with('workshop', $workshop);
		} else {
			return Redirect::route('admin.workshops.edit')
			->with('workshop', $workshop)
			->withInput();
		}
	}

	public function destroy($slug)
	{
		$workshop = Workshop::byslug($slug);
		if ($workshop) {
			$workshop->categories()->detach();
			$workshop->tags()->detach();
			$workshop->delete();
			return Redirect::route('admin.workshops.index');
			}
		return 'There was a problem...';
	}

}