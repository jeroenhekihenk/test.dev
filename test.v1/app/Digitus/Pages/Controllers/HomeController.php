<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController, View, Digitus\Base\Model\Page;

class HomeController extends BaseController {

	public function index()
	{
		$pages = Page::all();
		return View::make('home.index')->with('pages', $pages);
	}

}