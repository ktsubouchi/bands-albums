<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
	protected $fillable = [
		'name',
		'start_date',
		'website',
		'still_active',
	];
	
    protected $table = 'bands';
	
	/**
	 * Get the band's App\Album[].
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function albums()
	{
		return $this->hasMany('App\Album');
	}
	
	/**
	 * Get the band's current state.
	 * 
	 * @param $value
	 *
	 * @return string
	 */
	public function getStillActiveAttribute($value)
	{
		return $value == 0 ? 'No' : 'Yes';
	}
}
