<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Project,
Digitus\Base\Model\Tag,
Digitus\Base\Model\Categorie,
Auth,
Redirect,
View,
Input,
Str,
Validator;

class AdminCasesController extends BaseController {

	public function index()
	{
		$cases = Project::all();
		return View::make('admin.cases.index')
		->with('cases',$cases);
	}

	public function create()
	{
		$tags		= Tag::all();
		$categories	= Categorie::all();

		 if(Auth::check())
		{
			$user = Auth::user();
		} else {
			$user = false;
		}
		return View::make('admin.cases.create')
		->with('user', $user)
		->with('tags',$tags)
		->with('categories',$categories);
	}

	public function store()
	{
		$file 				= Input::file('file');
		$destinationPath 	= 'uploads/images/cases/';
		$filename 			= $file->getClientOriginalName();
		$upload_success 	= $file->move($destinationPath, $filename);
			

		$new_case = array(
			'title'		=> Input::get('title'),
			'body'		=> Input::get('body'),
			'author'	=> Input::get('author'),
			'slug'		=> Str::slug(Input::get('title')),
			'image'		=> str_replace('\\', '/', $upload_success),
			'link'		=> Input::get('link'),
			'klant'		=> Input::get('klant'),
			'klant_link'=> Input::get('klant_link'),
		);
		$rules = array(
			'title'		=> 'required|min:3|max:255',
			'body'		=> 'required|min:10',
			'author'	=> 'required',
		);

		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		$validation = Validator::make($new_case, $rules);
		if ( $validation->fails() )
		{
			return Redirect::route('admin.cases.create')->withErrors($validation)->withInput();
		}
		$case = new Project($new_case);
		$case->save(); 
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
			$case->categories()->attach($new_cats); 
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
			$case->tags()->attach($new_tags); 
		}
		return Redirect::route('admin.cases.index');
	}

	public function show($slug)
	{
		$currcase = Project::byslug($slug);
		$user = User::byid($currpost->author);
		$author = $currpost->getAuthor();
		return View::make('pages.cases.case')
		->with('case', $currcase)
		->with('user',$user)
		->with('author',$author);
	}

	public function edit($slug)
	{
		$case = Project::byslug($slug);
		$tags = Tag::all();
		$categories = Categorie::all();
		return View::make('admin.cases.edit')
		->with('case', $case)
		->with('tags',$tags)
		->with('categories',$categories);
	}

	public function update($slug)
	{
		$case 				= Project::byslug($slug);
		$case->title 		= Input::get('title');
		$case->slug 		= Str::slug(Input::get('title'));
		$case->body			= Input::get('body');
		
			$file 				= Input::file('file');
		    $destinationPath 	= 'uploads/images/cases/';
		    $filename 			= $file->getClientOriginalName();
		    $upload_success 	= $file->move($destinationPath, $filename);
		    // dd($upload_success);
			$post->image 		= str_replace('\\', '/', $upload_success);
		
	
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
			$case->categories()->attach($new_cats); 
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
			$case->categories()->detach($old_cats); 
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
			$case->tags()->attach($new_tags); 
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
			$case->tags()->detach($old_tags); 
		}
		if($case->save())
		{
			return Redirect::route('admin.cases.index')
			->with('case', $case);
		} else {
			return Redirect::route('admin.cases.edit')
			->with('case', $case)
			->withInput();
		}
	}

	public function destroy($slug)
	{
		$case = Project::byslug($slug);
		if ($case) {
			$case->categories()->detach();
			$case->tags()->detach();
			$case->delete();
			return Redirect::route('pages.cases.index');
			}
		return 'There was a problem...';
	}

}