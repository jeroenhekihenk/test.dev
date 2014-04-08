<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController, View, Digitus\Base\Model\Page;

class HomeController extends BaseController {

	public function __construct()
	{
		$bodyid = 'home';
		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$twitter = 'https://www.twitter.com/_DigiMarketing';
		View::share('facebook', $facebook);
		View::share('twitter', $twitter);
		View::share('bodyid', $bodyid);
	}

	public function index()
	{
		$pages = Page::all();
		return View::make('home.index')->with('pages', $pages);
	}

}