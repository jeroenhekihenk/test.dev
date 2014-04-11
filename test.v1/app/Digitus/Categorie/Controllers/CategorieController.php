<?php namespace Digitus\Categorie\Controllers;

use Digitus\Base\Controllers\BaseController, Digitus\Base\Model\Post, Digitus\Base\Model\Categorie, View, Auth;

class CategorieController extends BaseController {

	public function getCategories()
	{
		$posts = Post::all();
		return View::make('categories.index')->with('posts', $posts, 'user', Auth::user());
	}

	public function getThisCategorie($name)
	{
		$currcat = Categorie::where('name', '=', $name)->first();
		return View::make('categories.categorie')->with('categorie', $currcat, 'user', Auth::user());
	}

}