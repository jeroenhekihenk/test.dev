<?php

class BaseController extends Controller {

	public function __construct() {

		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$email = '../&#109;&#x61;&#105;&#108;&#x74;&#x6f;&#x3a;&#105;&#110;&#102;&#111;&#x40;&#100;&#105;&#x67;&#105;&#116;&#x75;&#115;&#x6d;&#x61;&#x72;&#x6b;&#x65;&#x74;&#x69;&#110;&#103;&#46;&#x6e;&#108;';
		$tel = 'tel:+850030256';

		$sAdmin = Sentry::findGroupById(1);
		$admin = Sentry::findGroupById(2);
		$member = Sentry::findGroupById(3);

		if(Sentry::check()) {
			$user = Sentry::getUser();
		} else {
			$user = null;
		}

		View::share('users', Sentry::findAllUsers());
		View::share('loggedUser', $user);
		View::share('SuperAdmin', $sAdmin);
		View::share('Admin', $admin);
		View::share('Member', $member);
		View::share('Groups', Sentry::findAllGroups());
		View::share('gpermissions', $sAdmin->getPermissions());
		View::share('facebook', $facebook);
		View::share('email', $email);
		View::share('tel', $tel);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}