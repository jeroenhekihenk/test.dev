<?php namespace Digitus\Auth\Controllers;

class RegisterController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{
		return $this->view->make('user.register');
	}

	public function store()
		{
			try
			{
				$user = $this->sentry->createUser(array(
					'username' => $this->input->get('username'),
					'first_name' => $this->input->get('first_name'),
					'last_name' => $this->input->get('last_name'),
					'email' => $this->input->get('email'),
					'password' => $this->input->get('password'),
					'activated' => true,

					));
				$member = $this->sentry->findGroupById(3);
				$user->addGroup($member);
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				echo 'This user already exists';
			}
			return $this->redirect->to('login')->with('message', 'You have been registered! You can now login using your account details.');
		}

}