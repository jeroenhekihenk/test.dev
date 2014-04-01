<?php namespace Digitus\Base\Controllers;

use Illuminate\View\Environment as View;
use Cartalyst\Sentry\Sentry as Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Hashing\BcryptHasher as Hash;
use Digitus\Base\Model\post;
use Digitus\Base\Model\User;
use Digitus\Base\Model\tag;
use Digitus\Base\Model\categorie;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Factory as Validator;

class BaseController extends \Controller{

	protected $view;
	protected $sentry;
	protected $input;
	protected $redirect;
	protected $hash;
	protected $user;
    protected $posts;
    protected $loggedUser;
    protected $tag;
    protected $categorie;
    protected $str;
    protected $validator;

	public function __construct(View $view, Sentry $sentry, Input $input, Redirect $redirect, Hash $hash, User $user, Post $posts, Tag $tag, Categorie $categorie, Str $str, Validator $validator) {
		$this->view 	= $view;
		$this->sentry 	= $sentry;
		$this->input	= $input;
		$this->redirect = $redirect;
		$this->hash 	= $hash;
		$this->posts 	= $posts;
		$this->user 	= $this->sentry->getUser();
		$this->tag 		= $tag;
		$this->categorie= $categorie;
		$this->str 		= $str;
		$this->validator= $validator;
		$member 		= $this->sentry->findGroupByName('member');
		$admin 			= $this->sentry->findGroupByName('admin');
		$superadmin 	= $this->sentry->findGroupByName('super admin');

		if($this->sentry->check()) {
			$this->loggedUser = $this->user;
		} else {
			$this->loggedUser = null;
		}
		$this->view->share('loggedUser', $this->loggedUser);
	}

}