<?php namespace Digitus\Base\Model;

class Metatag extends \Eloquent {

	protected $table = 'metatags';
	protected $fillable = array('post_id', 'page_id', 'tag_id', 'categorie_id', 'metatitle','metadescription','ogtitle','ogdescription','ogsitename','ogurl','ogimage','ogtype');

	public function page()
	{
		return $this->belongsToMany('Digitus\Base\Model\Page');
	}

	public function post()
	{
		return $this->belongsToMany('Digitus\Base\Model\Post');
	}

	public function tags()
	{
		return $this->belongsToMany('Digitus\Base\Model\Tag');
	}

	public function categories()
	{
		return $this->belongsToMany('Digitus\Base\Model\Categorie');
	}

}