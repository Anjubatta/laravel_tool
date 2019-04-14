<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'users_id', 'company_id', 'surname', 'id_no', 'contactno', 'dob', 'address','gender','active'
	];
/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function users()
	{
		return $this->belongsTo('App\User');
	}

}
