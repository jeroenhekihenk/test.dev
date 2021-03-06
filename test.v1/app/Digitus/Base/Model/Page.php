<?php namespace Digitus\Base\Model;

class Page extends \Eloquent {

	protected $fillable = array('title','body','author','slug','image','metatitle','metadescription','robots','ogtitle','ogdescription','ogsitename','ogurl','ogimage','ogtype','layout','menu','footer');
	protected $table = 'pages';

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
		return Page::where('slug', '=', $slug)->first();
	}

	public function getAuthor()
	{
		$author = $this->author;
		$user = User::where('id', '=', $author)->first();
		return $user->firstname . ' ' . $user->lastname;
	}
	public function getAuthorUsername()
	{
		$author = $this->author;
		$user = User::where('id', '=', $author)->first();
		return $user->username;
	}

}