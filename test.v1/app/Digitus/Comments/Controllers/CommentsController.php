<?php namespace Digitus\Comments\Controllers;

use Digitus\Base\Controllers\BaseController, Digitus\Base\Model\Comment, Digitus\Base\Model\Post, Response, Input, View, Validator, Redirect;

class CommentsController extends BaseController {

	public function index()
	{
		return Response::json(Comment::get());
	}

	public function create()
	{

	}

	public function store($slug)
	{
		$new_comment = array(
			'naam'		=> Input::get('naam'),
			'email'		=> Input::get('email'),
			'website'	=> Input::get('website'),
			'bericht'	=> Input::get('bericht')
		);

		$rules = array(
			'naam'		=> 'required|min:2|max:255',
			'email'		=> 'required|min:5',
			'website' 	=> 'min:5',
			'bericht' 	=> 'required',
		);
		// $new_tags = array();
		// foreach(explode(',', $this->input->get('tags')) as $tag) {
		// $tag = Tag::firstOrCreate(array('name' => $tag));
		// array_push($new_tags, $tag);
		// }
		// $post->tags()->sync($new_tags); 
		

		$validation = Validator::make($new_comment, $rules);
		if ( $validation->fails() )
		{
			return Redirect::back()->withErrors($validation)->withInput();
		}
		$post = Post::byslug($slug);

		$comment = new Comment($new_comment);
		$comment->save();
		$post->comments()->attach($comment);

		return Redirect::back();
	}

	public function show($id)
	{
		$comment = Comment::byid($id);
		return View::make('comments.view')->with('comment',$comment);
	}

	public function edit($id)
	{
		$comment = Comment::byid($id);
		return View::make('comments.edit')->with('comment',$comment);
	}

	public function update($id)
	{
		$comment = Comment::byid($id);

		$comment->naam		= Input::get('naam');
		$comment->email		= Input::get('email');
		$comment->website	= Input::get('website');
		$comment->bericht	= Input::get('bericht');

		if($comment->save())
		{
			return Redirect::route('insides.index');
		} else {
			return Redirect::back()->with('comment', $comment)->withInput();
		}
	}

	public function destroy($id)
	{
		$comment = Comment::byid($id);
		if ($comment) {
			$comment->posts()->detach();
			$comment->delete();
			return Redirect::route('home.index');
			}
		return 'There was a problem...';
	}

}