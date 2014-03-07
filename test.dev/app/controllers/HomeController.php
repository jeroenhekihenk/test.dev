<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('home.index');
	}

	public function getRegister()
	{
		return View::make('user.register');
	}

	public function getLogin()
	{
		return View::make('user.login');
	}

	public function postRegister()
	{
		try
		{
			$user = Sentry::createUser(array(
				'username' => Input::get('username'),
				'first_name' => Input::get('firstname'),
				'last_name' => Input::get('lastname'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'activated' => true,

				));
			$member = Sentry::findGroupById(3);
			$user->addGroup($member);
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'This user already exists';
		}
		return Redirect::to('login')->with('message', 'You have been registered! You can now login using your account details.');
	}

	public function postLogin()
	{
		$user = User::where('username', Input::get('email_or_username'))->orWhere('email', Input::get('email_or_username'))->first();
		$credentials = array(
			'email' => $user->username ? $user->email : null,
			'password' => Input::get('password'),
		);
		try {
			$user = Sentry::authenticate($credentials, false);

			if(Sentry::check())
			{
				return Redirect::to('admin');
			} else {
				return Redirect::to('');
			}
		}
		catch (\Exception $e)
		{
			return Redirect::to('login')->withErrors(array('login'=> $e->getMessage()));
		}
	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to('login');
	}

}