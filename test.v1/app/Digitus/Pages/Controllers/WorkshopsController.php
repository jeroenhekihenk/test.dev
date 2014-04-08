<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController, View;

class WorkshopsController extends BaseController {

	public function index()
	{
		return View::make('pages.workshops.index');
	}

}