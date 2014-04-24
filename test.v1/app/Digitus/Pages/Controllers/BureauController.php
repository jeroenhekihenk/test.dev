<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Bureau,
Digitus\Base\Model\Page,
View;

class BureauController extends BaseController {

	public function index(){
		$blokken = Bureau::paginate(3);
		$slug = 'ons-bureau';
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		return View::make('pages.ons-bureau.index')
		->with('page',$currpage)
		->with('blokken',$blokken);
	}
}