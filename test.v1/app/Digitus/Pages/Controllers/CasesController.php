<?php namespace Digitus\Pages\Controllers;

use Digitus\Base\Controllers\BaseController,
Digitus\Base\Model\Project,
Digitus\Base\Model\User,
Digitus\Base\Model\Categorie,
Digitus\Base\Model\Page,
Digitus\Base\Model\Recensie,
Response,
View;

class CasesController extends BaseController {

	public function index()
	{
		$slug = 'cases';
		if(! $currpage = Page::byslug($slug))
		{
			return Response::view('errors.404');
		}
		$cases = Project::all();
		$recensies = Recensie::all();
		return View::make('pages.cases.index')
		->with(['page'=>$currpage, 'cases'=>$cases, 'recensies'=>$recensies]);
	}
	public function show($slug)
	{
		$currcase = Project::byslug($slug);
		$categories = $currcase->categories;
		$tags = $currcase->tags;
		$deUser = User::byid($currcase->author);

		return View::make('cases.case')
		->with('case', $currcase)
		->with('user',$deUser)
		->with('categories',$categories)
		->with('tags',$tags);
	}

}