<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes_teachers extends Model
{
    protected $fillable = [
			'class_id','teacher_id','session'
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
	public function classes()
	{
		return $this->belongsTo(Classes::class, 'class_id');
	}
	
}
