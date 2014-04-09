<?php namespace Digitus\Profile\Controllers;

use Digitus\Base\Controllers\BaseController, View;

class UserProfileDashboardController extends BaseController {

	public function index()
	{
		return View::make('user.dashboard');
		
	}

}