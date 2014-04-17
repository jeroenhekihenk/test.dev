<?php namespace Digitus\Base\Model;

class Project extends \Eloquent {

	protected $table 	= 'projecten';
	protected $fillable = ['image','title','body','link','author','slug'];

	public function user()
	{
		return $this->belongsTo('Digitus\Base\Model\User', 'author');
	}

	public function tags()
	{
		return $this->belongsToMany('Digitus\Base\Model\Tag');
	}

	public function categories()
	{
		return $this->belongsToMany('Digitus\Base\Model\Categorie');
	}

	public static function byslug($slug)
	{
		return Project::where('slug', '=', $slug)->first();
	}

	public function getUpdatedAtDay()
	{
		return $this->updated_at->format('d-m-Y');
	}

	public function getAuthorUsername()
	{
		$author = $this->author;
		$user = User::where('id', '=', $author)->first();
		return $user->username;
	}

}