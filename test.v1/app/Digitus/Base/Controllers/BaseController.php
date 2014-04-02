<?php namespace Digitus\Base\Controllers;

use Illuminate\View\Environment as View;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector as Redirect;
use Illuminate\Hashing\BcryptHasher as Hash;
use Digitus\Base\Model\post;
use Digitus\Base\Model\tag;
use Digitus\Base\Model\categorie;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Factory as Validator;
use Auth;

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

	public function __construct(View $view, Input $input, Redirect $redirect, Hash $hash, Post $posts, Tag $tag, Categorie $categorie, Str $str, Validator $validator) {
		$this->view 	= $view;
		$this->input	= $input;
		$this->redirect = $redirect;
		$this->hash 	= $hash;
		$this->posts 	= $posts;
		$this->tag 		= $tag;
		$this->categorie= $categorie;
		$this->str 		= $str;
		$this->validator= $validator;

		if(Auth::check()) {
			$this->loggedUser = Auth::user();
		} else {
			$this->loggedUser = null;
		}
		$this->view->share('loggedUser', $this->loggedUser);
	}

}