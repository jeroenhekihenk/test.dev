<?php 

class Post extends Eloquent {

	protected $fillable = array('post_title','post_body', 'post_author','post_slug');

	public function user()
	{
		return $this->belongsTo('User', 'post_author');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}

	public function categories()
	{
		return $this->belongsToMany('Categorie');
	}

	public function getCreatedAt()
	{
	return $this->created_at->format('d-m-Y | H:i:s');
	}
	 
	public function getUpdatedAt()
	{
	return $this->updated_at->format('d-m-Y \o\m\ G:i');
	} 

	public function getUpdatedAtDay()
	{
		return $this->updated_at->format('d-m-Y');
	}

}