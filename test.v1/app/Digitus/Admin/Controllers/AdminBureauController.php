<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Bureau,
Auth,
Input,
Validator,
Redirect,
View;

class AdminBureauController extends BaseController {

	public function index()
	{
		$blokken = Bureau::all();
		return View::make('admin.bureau.index')
		->with('blokken',$blokken);
	}

	public function create()
	{
		if(Auth::check())
		{
			$user = Auth::user();
		} else {
			$user = false;
		}
		return View::make('admin.bureau.create')
		->with('user', $user);
	}


	public function store()
	{
		$new = array(
			'title'		=> Input::get('title'),
			'body'		=> Input::get('body'),
			'author'	=> Input::get('author'),
		);
		$rules = array(
			'title'		=> 'required|min:3|max:255',
			'body'		=> 'required|min:10',
			'author'	=> 'required',
		);

		$validation = Validator::make($new, $rules);
		if ( $validation->fails() )
		{
			return Redirect::route('admin.bureau.create')->withErrors($validation)->withInput();
		}
		$bureau = new Bureau($new);
		$bureau->save(); 
		
		return Redirect::route('admin.bureau.index');
	}

	public function show($id)
	{
		
	}

	public function edit($id)
	{
		$blok = Bureau::where('id','=',$id)->first();
		return View::make('admin.bureau.edit')
		->with('blok',$blok);
	}

	public function update($id)
	{
		$blok = Bureau::where('id','=',$id)->first();

		$blok->title = Input::get('title');
		$blok->body = Input::get('body');

		if($blok->save())
		{
			return Redirect::route('admin.bureau.index')
			->with('blok', $blok);
		} else {
			return Redirect::route('admin.bureau.edit')
			->with('blok', $blok)
			->withInput();
		}
	}

	public function destroy($id)
	{

	}

}