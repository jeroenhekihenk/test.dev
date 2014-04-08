<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController, View;

class InsidesController extends BaseController {

	public function __construct()
	{
		$bodyid = 'insides';
		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$twitter = 'https://www.twitter.com/_DigiMarketing';
		View::share('bodyid', $bodyid);
		View::share('facebook', $facebook);
		View::share('twitter', $twitter);
	}

	public function index()
	{
		return View::make('pages.insides.index');
	}

}