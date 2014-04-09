<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController, Digitus\Base\Model\User, Digitus\Base\Model\Role, Input, View, Redirect, Auth;

class AdminUserController extends BaseController {

	public function index()
	{
		$users = User::all();
		return View::make('admin.user.index')->with('users',$users);
	}

	public function create()
	{
		return View::make('admin.user.create');
	}

	public function store()
	{

	}

	public function show()
	{
		
	}

	public function edit($uname)
	{	

			// $vind = Auth::user()->where('username','=',$uname);
			$henk = User::where('username','=',$uname)->first();
			$role_admin = Role::byAdmin();
			$role_user = Role::byUser();
			return View::make('admin.user.edit')->with('user', $henk)->with('role_admin', $role_admin)->with('role_user', $role_user);
		

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

			$user->id 			= Input::get('id');
			$user->username 	= Input::get('username');
			$user->firstname	= Input::get('firstname');
			$user->lastname		= Input::get('lastname');
			$user->email 		= Input::get('email');
			$user->description 	= Input::get('description');

			if (Input::get('password'))
		    {
		        $user->password = Input::get('password');
		    }
		    $newrole = Input::get('roles');
		    $role = Role::where('name','=',$newrole);
		    $henk = $role->first()->id;
		    $user->roles()->detach();
		    $user->roles()->attach($henk);

			if($user->save())
			{
				return Redirect::route('admin.users.index');
			}
		}
		catch (\Exception $e)
		{
		    return Redirect::back()->withErrors(array('login'=> $e->getMessage()));
		}
	}

	public function destroy($uname)
	{
		$user = User::where('username','=',$uname);

		if ($user) {
			$user->first()->roles()->detach();
			$user->delete();
			return Redirect::back();
			}
		return 'There was a problem...';
	}

}