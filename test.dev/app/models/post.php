<?php 

class Post extends Eloquent {

	protected $fillable = array('post_title','post_body');

	public function user()
	{
		return $this->belongsTo('User', 'post_author');
	}

	public function tags()
	{
		return $this->hasMany('Tag');
	}

}