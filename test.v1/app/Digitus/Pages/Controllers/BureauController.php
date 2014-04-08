<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController, View;

class BureauController extends BaseController {

	public function index(){
		return View::make('pages.ons-bureau.index');
	}
}