<?php namespace Digitus\Admin\Controllers;

use Auth, View, Digitus\Base\Model\Role, Digitus\Base\Model\User;

class AdminController extends \Digitus\Base\Controllers\BaseController {


/**
* Display a listing of the resource.
*
* @return Response
*/
public function index()
{
	if(Auth::check())
	{
		$user = Auth::user();
	}
	$roles = Role::all();
	$users = User::all();
	$rolll = $user->roles->first();
    return View::make('admin.index')->with('user', $user)->with('roles', $roles)->with('users', $users);
}

/**
* Show the form for creating a new resource.
*
* @return Response
*/
public function create()
{
        return $this->view->make('admin.create');
}

/**
* Store a newly created resource in storage.
*
* @return Response
*/
public function store()
{
//
}

/**
* Display the specified resource.
*
* @param int $id
* @return Response
*/
public function show($id)
{
        return View::make('admins.show');
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return Response
*/
public function edit($id)
{
        return View::make('admins.edit');
}

/**
* Update the specified resource in storage.
*
* @param int $id
* @return Response
*/
public function update($id)
{
//
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return Response
*/
public function destroy($id)
{
//
}

}