<?php namespace Digitus\Categorie\Controllers;

class CategorieController extends \Digitus\Base\Controllers\BaseController {

	public function getCategories()
	{
		$posts = $this->posts->all();
		return $this->view->make('categories.index')->with('posts', $posts, 'user', $this->sentry->getUser());
	}

	public function getThisCategorie($name)
	{
		$currcat = $this->categorie->where('name', '=', $name)->first();
		return $this->view->make('categories.categorie')->with('categorie', $currcat, 'user', $this->sentry->getUser());
	}

}