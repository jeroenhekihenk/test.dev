<?php 

class Categorie extends Eloquent {

	protected $fillable = array('title');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}

}