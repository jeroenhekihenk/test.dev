<?php namespace Digitus\Tag\Controllers;

use Digitus\Base\Controllers\BaseController, Digitus\Base\Model\Post, Digitus\Base\Model\Tag, View, Auth;

class TagController extends \Digitus\Base\Controllers\BaseController {

	public function getTags()
	{
		$posts = Post::all();
		// $tags = $this->posts->tags;
		// $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
		return View::make('tags.index')->with('posts', $posts, 'user', Auth::user());
		// return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}

	public function getThisTag($name)
	{
		$currtag = Tag::where('name', '=', $name)->first();
		return View::make('tags.tag')->with('tag', $currtag, 'user', Auth::user());
	}

}