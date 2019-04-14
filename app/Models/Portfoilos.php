<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfoilos extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'student_id','teacher_id','post_date','post_content','image'
	];

	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}

	public function teacher()
	{
		return $this->belongsTo(Teachers::class, 'teacher_id');
	}
	
	public function portfoilos()
	{
		return $this->hasMany(Postimages::class, 'portfoilo_id');
	}
	
}
