<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'bands';
	
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
