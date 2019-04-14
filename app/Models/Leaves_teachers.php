<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaves_teachers extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'leave_name_id', 'leave_type_id', 'teacher_id', 'leave_unit', 'from_date', 'from_time', 'to_date','to_time','reason','status'
	];

	
/* 	public function users()
	{
		return $this->belongsTo('App\User','teacher_id');
	} */
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function teachers()
	{
		return $this->belongsTo(Teachers::class, 'teacher_id');
	}
	public function leaves_names()
	{
		return $this->belongsTo(Leaves_names::class,'leave_name_id');
	}
	public function leaves_types()
	{
		return $this->belongsTo(Leaves_types::class,'leave_type_id');
	}
	
	
}
