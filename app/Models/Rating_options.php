<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating_options extends Model
{
    protected $fillable = [
		'rating_headings_id','name'
	];
	
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\hasMany
	*/
	public function rating_teachers()
	{
		return $this->hasMany(Rating_teachers::class, 'rating_options_id');
	}
	
	
	
}



