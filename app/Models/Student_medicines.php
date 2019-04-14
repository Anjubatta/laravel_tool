<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_medicines extends Model
{
     protected $fillable = [   
			'student_id','title','medicine','dosage','manner_of_oral','administrated_by','datetime'   
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
