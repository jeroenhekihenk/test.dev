<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getHome()
	{
		$this->layout->content = View::make('home.index');
	}

	public function index()
	{
		return 'Hey!';
	}
	public function create()
	{

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