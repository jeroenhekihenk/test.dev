<?php namespace Digitus\Home\Controllers;

use Digitus\Base\Controllers\BaseController;

class HomeController extends BaseController {

	public function index()
	{
		return $this->view->make('home.index');
	}

}