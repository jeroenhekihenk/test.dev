<?php 

class Tag extends Eloquent{

	protected $fillable = [ 'title' ]

	public function posts()
	{
		$this->belongsToMany('Post', 'tags');
	}

}