<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_deviations extends Model
{
     protected $fillable = [   
			'student_id','datetime','title','reason','remarks'  
	];
	
	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
	
	public function classes()
	{
		return $this->belongsTo(Classes::class, 'class_id');
	}
}
