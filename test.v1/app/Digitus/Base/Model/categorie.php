<?php namespace Digitus\Base\Model;

class Categorie extends \Eloquent {

	protected $fillable = array('title');

	public function posts()
	{
		return $this->belongsToMany('Digitus\Base\Model\Post');
	}

	public function metatag()
	{
		return $this->belongsToMany('Digitus\Base\Model\Metatag');
	}

}