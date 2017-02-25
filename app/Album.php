<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
	
	/**
	 * Get related App\Band
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function band()
	{
		return $this->belongsTo('App\Band');
	}
}
