<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController, View;

class InsidesController extends BaseController {



	public function index()
	{
		$slug = 'insides';
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		return View::make('pages.insides.index')
		->with('page',$currpage);
	}

}