<?php namespace Digitus\Auth\Controllers;

use User, Validator;

class AuthController extends \Digitus\Base\Controllers\BaseController{

	public function __construct(User $user, Validator $validator)
	{
		$this->user = $user;
		$this->validator = $validator;
	}

}