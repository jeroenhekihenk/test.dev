<?php namespace Digitus\Base\Model;

class Comment extends \Eloquent {
	
	protected $fillable = ['naam','email','website','bericht'];

	public function posts()
	{
		return $this->belongsToMany('Digitus\Base\Model\Post');
	}

	public static function byid($id)
	{
		return Comment::where('id', '=', $id)->first();
	}

}