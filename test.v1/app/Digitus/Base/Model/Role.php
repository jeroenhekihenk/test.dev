<?php namespace Digitus\Base\Model;

class Role extends \Eloquent {

	public $timestamps = false;
	protected $table = 'roles';

	public function users()
	{
		return $this->belongsToMany('Digitus\Base\Model\User');
	}

	public static function byAdmin()
	{
		$admin = Role::where('name','=','Admin')->first();
		return $admin->name;
	}

	public static function byUser()
	{
		$user = Role::where('name','=','User')->first();
		return $user->name;
	}

}