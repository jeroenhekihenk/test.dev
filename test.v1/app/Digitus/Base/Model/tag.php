<?php namespace Digitus\Base\Model;

class Tag extends \Eloquent{

	protected $table = 'tags';
	protected $guarded = ['id'];
	protected $fillable = ['name'];

	public function posts()
	{
		$this->belongsToMany('Digitus\Base\Model\Post');
	}

	public function metatag()
	{
		return $this->belongsToMany('Digitus\Base\Model\Metatag');
	}

}