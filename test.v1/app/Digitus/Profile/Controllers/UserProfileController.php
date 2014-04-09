<?php namespace Digitus\Profile\Controllers;

use Auth, View, Redirect, Input, Digitus\Base\Model\User, Digitus\Base\Model\Role;

class UserProfileController extends \Digitus\Base\Controllers\BaseController{

	public function __construct()
	{
		$bodyid = 'userprofile';
		View::share('bodyid', $bodyid);
	}

	public function index()
	{
		return Redirect::to('/');
	}

	public function show($email)
	{	

		if(Auth::check() && Auth::User()->email === $email)
		{
			// dd($email);
			return View::make('user.profile.index')->with('user', Auth::user());
		} else {
			// dd($email);
			return View::make('user.profile.index')->with('user', Auth::user());
		}
	}

	public function edit($uname)
	{	
		$curruser = Auth::user();
		$role = $curruser->roles->first();

		if($role->name === 'Admin')
		{
			// $user = Auth::user();
			if(Auth::check()){
				$user = Auth::user();
			}
			// $vind = Auth::user()->where('username','=',$uname);
			$henk = $user->where('username','=',$uname)->first();
			$role_admin = Role::byAdmin();
			$role_user = Role::byUser();
			return View::make('user.profile.edit')->with('user', $henk)->with('role_admin', $role_admin)->with('role_user', $role_user);
		} 

		// if(Auth::check() && $curruser->username === $uname)
		// {
		// 	return View::make('user.profile.edit')->with('user', $curruser);
		// } else {
		// 	return Redirect::back();
		// }
	}

	public function update($uname)
	{
		try{
			$user = User::where('username','=',$uname)->first();

			$user->username 	= Input::get('username');
			$user->firstname	= Input::get('firstname');
			$user->lastname		= Input::get('lastname');
			$user->email 		= Input::get('email');
			$user->description 	= Input::get('description');

			if (Input::get('password'))
		    {
		        $user->password = Input::get('password');
		    }

			if($user->save())
			{
				return Redirect::route('admin.index');
			} else {
				return Redirect::to('admin/'.$user->username.'/');
			}
		}
		catch (\Exception $e)
		{
		    return Redirect::back()->withErrors(array('login'=> $e->getMessage()));
		}
	}

}