<?php namespace Digitus\Base\Model;

class Post extends \Eloquent {

	protected $fillable = array('post_title','post_body', 'post_author','post_slug');

	public function user()
	{
		return $this->belongsTo('Digitus\Base\Model\User', 'post_author');
	}

	public function tags()
	{
		return $this->belongsToMany('Digitus\Base\Model\Tag');
	}

	public function comments()
	{
		return $this->belongsToMany('Digitus\Base\Model\Comment');
	}

	public function categories()
	{
		return $this->belongsToMany('Digitus\Base\Model\Categorie');
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

	public static function byslug($slug)
	{
		return Post::where('post_slug', '=', $slug)->first();
	}

	public function getAuthor()
	{
		$author = $this->post_author;
		$user = User::where('id', '=', $author)->first();
		
		// $postauthor = $user->first_name . ' ' . $user->last_name;
		return $user->first_name . ' ' . $user->last_name;
	}
	public function getAuthorUsername()
	{
		$author = $this->post_author;
		$user = User::where('id', '=', $author)->first();
		return $user->username;
	}

}