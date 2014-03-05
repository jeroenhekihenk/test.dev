<?php

class BaseController extends Controller {

	public function __construct() {

		$sAdmin = Sentry::findGroupById(1);
		$admin = Sentry::findGroupById(2);
		$member = Sentry::findGroupById(3);

		if(Sentry::check()) {
			$user = Sentry::getUser();
		} else {
			$user = false;
		}

		View::share('users', Sentry::findAllUsers());
		View::share('user', $user);
		View::share('SuperAdmin', $sAdmin);
		View::share('Admin', $admin);
		View::share('Member', $member);
		View::share('Groups', Sentry::findAllGroups());
		View::share('gpermissions', $sAdmin->getPermissions());
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