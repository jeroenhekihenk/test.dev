<?php

class ProfileController extends BaseController {

	public function getIndex($profile_uname)
	{
		if(Sentry::check() && Sentry::getUser()->username === $profile_uname) {
			// This is your profile
			return View::make('user.profile.index')->with('user', Sentry::findUserByLogin($profile_uname));
		} else {
			// This isn't your profile but you may see it!
			return View::make('user.profile.index')->with('user', Sentry::findUserByLogin($profile_uname));
		}
	}

}