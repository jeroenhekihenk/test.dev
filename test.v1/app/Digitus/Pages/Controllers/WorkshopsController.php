<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Page,
Digitus\Base\Model\User,
Digitus\Base\Model\Workshop,
Response,
View;

class WorkshopsController extends BaseController {

	public function index()
	{
		$slug = 'workshops';
		$workshops = Workshop::all();
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		return View::make('pages.workshops.index')
		->with('page',$currpage)
		->with('workshops',$workshops);
	}

	public function show($slug)
	{
		$currworkshop = Workshop::byslug($slug);
		$deUser = User::byid($currworkshop->author);
		$categories = $currworkshop->categories;
		$tags = $currworkshop->tags;

		return View::make('workshops.workshop')
		->with('post', $currworkshop)
		->with('user',$deUser)
		->with('categories',$categories)
		->with('tags',$tags);
	}

}