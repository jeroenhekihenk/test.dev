<?php namespace Digitus\Auth\Controllers;

class LogoutController extends \Digitus\Base\Controllers\BaseController{

	public function index()
	{
		$this->sentry->logout();
		return $this->redirect->to('login');
	}

}