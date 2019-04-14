<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes_students extends Model
{
    protected $fillable = [
		'class_id','student_id','session','year'
	];
	
	
	public function students()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
	
	public function classes()
	{
		return $this->belongsTo(Classes::class, 'class_id');
	}
	
	
}
