<?php namespace Digitus\Profile\Controllers;

use Digitus\Base\Controllers\BaseController, Digitus\Base\Model\User, View, Input, Redirect;

class ProfileSocialMediaController extends BaseController {

	public function index()
	{
		//
	}

	public function create()
	{
		return View::make('user.profile.socialmedia');
	}

	public function store()
	{

	}

	public function show($uname)
	{
		$user = User::byusername($uname);

		return View::make('user.profile.socialmedia')->with('user', $user);
	}

	public function edit($uname)
	{
		$user = User::byusername($uname);

		return View::make('user.profile.socialmedia')->with('user', $user);
	}

	public function update($uname)
	{
		$user = User::byusername($uname);

		if(Input::get('facebook'))
		{
			$user->facebook 	= Input::get('facebook');	
		}
		if(Input::get('twitter'))
		{
			$user->twitter 		= Input::get('twitter');
		}
		if(Input::get('linkedin'))
		{
			$user->linkedin		= Input::get('linkedin');
		}
		if(Input::get('youtube'))
		{
			$user->youtube		= Input::get('youtube');
		}

		if($user->save())
		{
			return Redirect::route('admin.pages.index')->with('user', $user);
		} else {
			return Redirect::back()->with('user', $user)->withInput();
		}
	}

	public function destroy($id)
	{

	}

}