<?php namespace Digitus\Base\Model;

class Image extends \Eloquent {

	protected $fillable = array('title','image','author');
	protected $table = 'images';

	public function user()
	{
		return $this->belongsToMany('Digitus\Base\Model\User', 'author');
	}

}