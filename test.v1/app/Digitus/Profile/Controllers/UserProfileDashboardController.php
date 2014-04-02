<?php namespace Digitus\Profile\Controllers;

class UserProfileDashboardController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{
		return $this->view->make('user.dashboard');
		
	}

}