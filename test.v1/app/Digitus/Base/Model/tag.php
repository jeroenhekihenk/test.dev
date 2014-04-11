<?php namespace Digitus\Base\Model;

class Tag extends \Eloquent{

	protected $table = 'tags';
	protected $guarded = ['id'];
	protected $fillable = ['name'];

	public function posts()
	{
		return $this->belongsToMany('Digitus\Base\Model\Post');
	}

}