<?php

class TagController extends BaseController {

	protected $posts;
	protected $tags;

	public function getTags()
	{
		$posts = $this->posts->all();
		// $tags = $this->posts->tags;
		// $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
		return View::make('tags.index')->with('posts', $posts, 'user', Sentry::getUser());
		// return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}

	public function getThisTag($name)
	{
		$currtag = Tag::where('name', '=', $name)->first();
		return View::make('tags.tag')->with('tag', $currtag, 'user', Sentry::getUser());
	}

}