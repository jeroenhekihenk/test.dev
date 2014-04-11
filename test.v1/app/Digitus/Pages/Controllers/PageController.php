<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController;
use View;
use Digitus\Base\Model\Page;

class PageController extends BaseController {

	public function show($slug)
	{
		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$twitter = 'https://www.twitter.com/_DigiMarketing';
		$currpage = Page::byslug($slug);
		

		return View::make('pages.index')->with('page', $currpage)->with('facebook',$facebook)->with('twitter',$twitter);
	}

}