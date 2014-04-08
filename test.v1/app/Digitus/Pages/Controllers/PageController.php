<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController;
use View;
use Digitus\Base\Model\Page;

class PageController extends BaseController {

	public function show($slug)
	{
		
		$currpage = Page::byslug($slug);
		

		return View::make('pages.index')->with('page', $currpage);
	}

}