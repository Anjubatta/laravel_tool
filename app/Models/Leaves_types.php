<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaves_types extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'type','total_leave'
	];

}
