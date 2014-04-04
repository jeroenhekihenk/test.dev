<?php 

class Role extends Eloquent {

	public $timestamps = false;
	protected $table = 'roles';

	public function users()
	{
		return $this->belongsToMany('Digitus\Base\Model\User', 'users_roles');
	}

}