<?php namespace Digitus\Base\Model;

class Workshop extends \Eloquent {

	protected $table = 'workshops';
	protected $fillable = ['title','body','slug','author','image'];

	public function users()
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
		return Workshop::where('slug','=', $slug)->first();
	}

	public function getAuthor()
	{
		$author = $this->author;
		$user = User::where('id', '=', $author)->first();
		return $user->firstname . ' ' . $user->lastname;
	}

}