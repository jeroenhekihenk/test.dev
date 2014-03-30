<?php namespace Digitus\Auth\Controllers;

use Illuminate\View\Environment as View;
use Cartalyst\Sentry\Sentry as Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Hashing\BcryptHasher as Hash;
use Digitus\Base\Model\post;
use Digitus\Base\Model\User;

class LoginController extends \Digitus\Base\Controllers\BaseController{

	public function index()
	{
		return $this->view->make('user.login');
	}

    public function login()
    {
        $user = $this->sentry->getUserProvider()->getEmptyUser();

        $user = $user->where('email', $this->input->get('email_or_username'))
                            ->orWhere('username', $this->input->get('email_or_username'))
                            ->first();

        try 
        {
            if ($user && $this->hash->check($this->input->get('password'), $user->password)) /// here you check if a user was found
            {
                $this->sentry->login($user, false); /// remember = false /// here is the login happening in case of true
                return $this->redirect->to('admin');
            }
            else
            {
                return $this->redirect->to('login')->withInput(Input::except('password'));
            }
        }
        catch (\Exception $e)
        {
            return $this->redirect->to('login')->withErrors(array('login'=> $e->getMessage()));
        }
    }

}