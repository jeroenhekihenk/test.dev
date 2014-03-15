<?php 

class Tag extends Eloquent{

	protected $table = 'tags';
	protected $guarded = ['id'];
	protected $fillable = ['name'];

	public function posts()
	{
		$this->belongsToMany('Post');
	}

}