<?php namespace Digitus\Profile\Controllers;

class UserProfileController extends \Digitus\Base\Controllers\BaseController{

	public function index()
	{
		return $this->redirect->to('/');
	}

	public function show($email)
	{
		if($this->sentry->check() && $this->sentry->getUser()->email === $email)
		{
			return $this->view->make('user.profile.index')->with('user', $this->sentry->findUserByLogin($email));
		} else {
			return $this->view->make('user.profile.index')->with('user', $this->sentry->findUserByLogin($email));
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

	public function update($uname)
	{
		try{
			$user = $this->sentry->findUserByLogin($uname);

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
				return $this->redirect->route('admin.index');
			} else {
				return $this->redirect->to('admin/'.$user->username.'/');
			}
		}
		catch (\Exception $e)
		{
		    return $this->redirect->route('user.edit')->withErrors(array('login'=> $e->getMessage()));
		}
	}

}