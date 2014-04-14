<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController;
use View;
use Digitus\Base\Model\Page;
use Response;

class PageController extends BaseController {

	public function show($slug)
	{
		$facebook 	= 'https://www.facebook.com/DigitusMarketing';
		$twitter 	= 'https://www.twitter.com/_DigiMarketing';
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		

		return View::make('pages.index')
		->with('page', $currpage)
		->with('facebook',$facebook)
		->with('twitter',$twitter);
	}

}