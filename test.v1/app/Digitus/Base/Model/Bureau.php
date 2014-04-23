<?php namespace Digitus\Base\Model;

class Bureau extends \Eloquent {

	protected $fillable = array('title','body','subbody','link');
	protected $table = 'bureaus';

	public function user()
	{
		return $this->belongsToMany('Digitus\Base\Model\User', 'author');
	}

}