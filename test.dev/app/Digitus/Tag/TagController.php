<?php namespace Digitus\Tag\Controllers;

class TagController extends \Digitus\Base\Controllers\BaseController {

	public function getTags()
	{
		$posts = $this->posts->all();
		// $tags = $this->posts->tags;
		// $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
		return $this->view->make('tags.index')->with('posts', $posts, 'user', $this->sentry->getUser());
		// return View::make('blog.index')->with('posts', $posts, 'user', Sentry::getUser());
	}

	public function getThisTag($name)
	{
		$currtag = $this->tag->where('name', '=', $name)->first();
		return $this->view->make('tags.tag')->with('tag', $currtag, 'user', $this->sentry->getUser());
	}

}