<?php namespace Digitus\Base\Model;

class Comment extends \Eloquent {

	protected $guarded = array();
	protected $table = 'comments';
	protected $fillable = array(
		'naam',
		'email',
		'website',
		'bericht',
		);

	public function post()
	{
		return $this->belongsToMany('Digitus\Base\Model\Post');
	}

}