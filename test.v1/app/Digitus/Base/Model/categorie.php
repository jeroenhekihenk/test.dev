<?php namespace Digitus\Base\Model;

class Categorie extends \Eloquent {

	protected $fillable = ['name'];

	public function posts()
	{
		return $this->belongsToMany('Digitus\Base\Model\Post');
	}

	public function projecten()
	{
		return $this->belongToMany('Digitus\Base\Model\Project');
	}

}