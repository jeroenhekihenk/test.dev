<?php namespace Digitus\Profile\Controllers;

use Illuminate\View\Environment as View;
use Cartalyst\Sentry\Sentry as Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Hashing\BcryptHasher as Hash;
use Digitus\Base\Model\post;
use Digitus\Base\Model\User;

class ProfileController extends \Digitus\Base\Controllers\BaseController {

	public function index()
	{

	}
	public function create()
	{

	}

	public function store()
	{

	}

	public function show($profile_uname)
	{
		if($this->sentry->check() && $this->sentry->getUser()->username === $profile_uname)
		{
			return $this->view->make('user.profile.index')->with('user', $this->sentry->findUserByLogin($profile_uname));
		} else {
			return $this->view->make('user.profile.index')->with('user', $this->sentry->findUserByLogin($profile_uname));
		}
	}

	public function edit($uname)
	{	
		$curruser = $this->sentry->getUser();

		if($curruser->hasAnyAccess(array('super admin','admin')))
		{
			$user = $this->sentry->findUserByLogin($uname);
			return $this->view->make('user.profile.edit')->with('user', $user);
		} 

		if($this->sentry->check() && $curruser->username === $uname)
		{
			return $this->view->make('user.profile.edit')->with('user', $curruser);
		} else {
			return $this->redirect->back();
		}
	}

	public function update()
	{
		try{
			$user = $this->sentry->getUser();

			$user->username 	= $this->input->get('username');
			$user->first_name	= $this->input->get('first_name');
			$user->last_name	= $this->input->get('last_name');
			$user->email 		= $this->input->get('email');
			$user->description 	= $this->input->get('description');

			if ($this->input->get('password'))
		    {
		        $user->password = $this->input->get('password');
		    }

			if($user->save())
			{
				return $this->redirect->to('admin');
			} else {
				return $this->redirect->to('admin/'.$user->username.'/');
			}
		}
		catch (\Exception $e)
		{
		    return $this->redirect->to('user/'.$user->username.'/profile/edit')->withErrors(array('login'=> $e->getMessage()));
		}
	}

	public function destroy()
	{

	}

}