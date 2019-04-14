<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'super_id', 'users_id', 'name', 'id_no', 'information', 'address', 'image', 'subscription_detail', 'subscription_payment', 'subscription_period', 'subscription_expired', 'auto_renew', 'annual_leave','expected_attendance','active'
	];

	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function users()
	{
		return $this->belongsTo('App\User');
	}

	public function student()
	{
		return $this->hasOne(Students::class, 'companies_id');
	}
}
