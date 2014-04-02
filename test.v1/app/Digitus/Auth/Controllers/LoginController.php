<?php namespace Digitus\Auth\Controllers;

class LoginController
{

    public function index()
    {
        return $this->view->make('user.login');
    }
 
    public function postLogin()
    {
    // Set login credentials
        $credentials = array(
            'email' => $this->input->get('email_or_username'),
            'password' => $this->input->get('password'),
        );
        // Try to authenticate the user
        $user = $this->sentry->authenticate($credentials, false);
        if($user)
        {
            $this->sentry->login($user,false);
            return $this->redirect->route('user.dashboard.index');
        }
        

    }
 
     public function getLogout()
    {
        $this->sentry->logout();
        return $this->redirect->route('admin.login');
    }
} 