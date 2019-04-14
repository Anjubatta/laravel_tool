<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating_headings extends Model
{
    protected $fillable = [
		'name'
	];
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\hasMany
	*/
	public function rating_options()
	{
		return $this->hasMany(Rating_options::class, 'rating_headings_id');
	}
	
	
}
