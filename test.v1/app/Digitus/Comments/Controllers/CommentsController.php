<?php namespace Digitus\Comments\Controllers;

use Digitus\Base\Controllers\BaseController;

class CommentsController extends BaseController {

	public function index()
	{
		return Response::json(Comment::get());
	}

	public function create()
	{

	}

	public function store()
	{
		Comment::create(array(
			'naam'=>Input::get('naam'),
			'email'=>Input::get('email'),
			'website'=>Input::get('website'),
			'bericht'=>Input::get('bericht'),
			));

		return Response::json(array('success'=>true));
	}

	public function show($id)
	{
		
	}

	public function edit($id)
	{

	}

	public function update($id)
	{

	}

	public function destroy($id)
	{
		Comment::destroy($id);

		return Response::json(array('success'=>true));
	}

}