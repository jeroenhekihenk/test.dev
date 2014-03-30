<?php namespace Digitus\Auth\Controllers;

use Cartalyst\Sentry\Sentry;
use Illuminate\Routing\Redirector as Redirect;

class LogoutController extends \BaseController{

	public function __construct(Sentry $sentry, Redirect $redirect){
		$this->sentry 	= $sentry;
		$this->redirect = $redirect;
	}

	protected $sentry;
	protected $redirect;

	public function logout()
	{
		$this->sentry->logout();
		return $this->redirect->to('login');
	}

}