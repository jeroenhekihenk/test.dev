<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Bureau,
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

	}

	public function show($id)
	{
		
	}

	public function edit($id)
	{

	}

	public function update($id)
	{

	}

	public function destroy($id)
	{

	}

}