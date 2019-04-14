<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
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
		return $this->belongsTo('App\User', 'users_id');
	}
	public function user()
	{
		return $this->belongsTo('App\User', 'users_id');
	}
	
	public function company()
	{
		return $this->belongsTo(Company::class, 'company_id');
	}
	
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function Leaves_teacher()
	{
		return $this->hasMany(Leaves_teachers::class);
	}

	public function classes_teachers()
	{
		return $this->hasMany(Classes_teachers::class, 'teacher_id');
	}
	
	
}
