<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postimages extends Model
{
     /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'portfoilo_id','image'
	];

	public function portfoilo()
	{
		return $this->hasMany(Portfoilos::class, 'portfoilo_id');
	}
}
