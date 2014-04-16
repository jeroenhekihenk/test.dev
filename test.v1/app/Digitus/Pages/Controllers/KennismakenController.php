<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Page,
View;

class KennismakenController extends BaseController {

	public function __construct()
	{
		$tel = 'tel:+31850030256';
		$email = 'mailto:&#105;&#110;&#102;&#x6f;&#x40;&#100;&#105;&#x67;&#105;&#116;&#x75;&#115;&#109;&#97;&#x72;&#x6b;&#x65;&#116;&#105;&#110;&#103;&#46;&#x6e;&#x6c;';
		$facebook = 'https://www.facebook.com/DigitusMarketing';
		$twitter = 'https://www.twitter.com/_DigiMarketing';
		
		$bodyid = 'kennismaken';

		View::share('tel', $tel);
		View::share('email', $email);
		View::share('facebook', $facebook);
		View::share('twitter', $twitter);
		View::share('bodyid', $bodyid);
	}

	public function index()
	{
		$slug = 'kennismaken';
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		return View::make('pages.kennismaken.index')
		->with('page',$currpage);
	}

}