<?php namespace Digitus\Admin\Controllers;

use Illuminate\View\Environment as View;
use Cartalyst\Sentry\Sentry as Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Hashing\BcryptHasher as Hash;
use Digitus\Base\Model\post;
use Digitus\Base\Model\User;
use Digitus\Base\Model\Tag;
use Digitus\Base\Model\Categorie;

class AdminController extends \Digitus\Base\Controllers\BaseController {

	public function __construct(View $view, Sentry $sentry, Input $input, Redirect $redirect, Hash $hash, User $user, Post $posts, Tag $tag, Categorie $categorie){
		parent::__construct($view, $sentry, $input, $redirect, $hash, $user, $posts, $tag, $categorie);

		$users = $this->sentry->findAllUsers();
		$this->view->share('users', $users);
	}

/**
* Display a listing of the resource.
*
* @return Response
*/
public function index()
{
        return $this->view->make('admin.index')->with('user', $this->sentry->getUser());
}

/**
* Show the form for creating a new resource.
*
* @return Response
*/
public function create()
{
        return $this->view->make('admin.create');
}

/**
* Store a newly created resource in storage.
*
* @return Response
*/
public function store()
{
//
}

/**
* Display the specified resource.
*
* @param int $id
* @return Response
*/
public function show($id)
{
        return View::make('admins.show');
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return Response
*/
public function edit($id)
{
        return View::make('admins.edit');
}

/**
* Update the specified resource in storage.
*
* @param int $id
* @return Response
*/
public function update($id)
{
//
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return Response
*/
public function destroy($id)
{
//
}

}