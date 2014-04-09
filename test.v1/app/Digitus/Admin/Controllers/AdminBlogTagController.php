<?php namespace Digitus\Admin\Controllers;

use Digitus\Base\Controllers\BaseController;

class AdminBlogTagController extends BaseController {

	public function update()
	{
		$new_tags = array();
		foreach(explode(',', Input::get('tag-ex')) as $tag) {
		$tag = Tag::firstOrCreate(array('name' => $tag));
		array_push($new_tags, $tag);
		}
		$post->tags()->sync($new_tags); 
	}

	public function create()
	{

	}

}