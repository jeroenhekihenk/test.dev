<?php namespace Digitus\Home\Controllers;

class HomeController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{
		return $this->view->make('home.index');
	}

}