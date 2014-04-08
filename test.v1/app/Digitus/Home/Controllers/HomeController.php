<?php namespace Digitus\Home\Controllers;

use Digitus\Base\Controllers\BaseController, View;

class HomeController extends BaseController {

	public function index()
	{
		return View::make('home.index');
	}

}