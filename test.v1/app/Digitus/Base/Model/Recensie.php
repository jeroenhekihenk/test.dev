<?php namespace Digitus\Base\Model;

class Recensie extends \Eloquent {

	protected $table = 'recensies';
	protected $fillable = ['klantnaam','klantbedrijf','klanturl','tekst','author'];

	public function users()
	{
		return $this->belongsTo('Digitus\Base\Model\User', 'author');
	}

}