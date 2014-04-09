<?php namespace Digitus\Auth\Controllers;

use Auth, Validator, Input, Redirect, View, Digitus\Base\Model\User, Hash, Digitus\Base\Model\Role;

class UserController extends \Digitus\Auth\Controllers\AuthController{

	public function __construct()
	{
		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$twitter = 'https://www.twitter.com/_DigiMarketing';
		$bodyid = 'login';

		View::share('facebook',$facebook);
		View::share('twitter',$twitter);
		View::share('bodyid',$bodyid);
	}

	public function getLogin()
	{
		return View::make('user.login');
	}

	public function postLogin()
	{
				// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alpha_num|min:6' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::route('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				return Redirect::route('user.dashboard.index');

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login');

			}

		}
	}

	public function getRegister()
	{
		return View::make('user.register');
	}

	public function postRegister()
	{
		$rules = array(
			'firstname'=>'required|alpha|min:2',
			'lastname'=>'required|alpha|min:2',
			'username'=>'required|unique:users',
			'email'=>'required|unique:users|email',
			'password'=>'required|alpha_num|min:6|confirmed',
			'password_confirmation'=>'required|alpha_num|min:6'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes())
		{
			$user = new User;
			$user->firstname =Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			$user->save();

			$users_roles = Role::where('name','=','User')->first();
			$user->roles()->attach($users_roles);
			

			return Redirect::route('login')->with('message', 'Thanks for registering! You can now login.');
		} else {
    		return Redirect::route('register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('login');
	}

}