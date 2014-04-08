<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController, View, Digitus\Base\Model\User;

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

	public function edit()
	{

	}

	public function update()
	{

	}

	public function destroy()
	{

	}

}