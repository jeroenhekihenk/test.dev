<?php namespace Digitus\Auth\Controllers;

class UserController extends \Digitus\Base\Controllers\BaseController{

	public function index()
	{
		return $this->view->make('user.login');
	}

	public function postLogin()
	{
		$credentials = array(
			'username' => $this->input->get('email_or_username'),
			'password' => $this->input->get('password')
		);
		try
		{
			$user = $this->sentry->authenticate($credentials, false);
			if ($user)
			{
				return $this->redirect->route('user.dashboard.index');
			}
		}
		catch(\Exception $e)
		{
			return $this->redirect->route('login')->withErrors(array('login' => $e->getMessage()));
		}
	}

	public function getLogout()
	{
		$this->sentry->logout();
		return $this->redirect->to('login');
	}

}