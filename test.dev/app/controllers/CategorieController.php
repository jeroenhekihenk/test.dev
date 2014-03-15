<?php

class CategorieController extends BaseController {

	protected $categories;
	protected $posts;

	public function getCategories()
	{
		$posts = $this->posts->all();
		// $tags = $this->posts->tags;
		// $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
		return View::make('categories.index')->with('posts', $posts, 'user', Sentry::getUser());
		// return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}

	public function getThisCategorie($name)
	{
		$currcat = Categorie::where('name', '=', $name)->first();
		return View::make('categories.categorie')->with('categorie', $currcat, 'user', Sentry::getUser());
	}

}