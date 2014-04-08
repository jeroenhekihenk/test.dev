<?php namespace Digitus\Base\Controllers;

use Auth, View;

class BaseController extends \Controller{

	public function __construct() {

		if(Auth::check()) {
			$this->loggedUser = Auth::user();
		} else {
			$this->loggedUser = null;
		}
		View::share('loggedUser', $this->loggedUser);

		
	}

}