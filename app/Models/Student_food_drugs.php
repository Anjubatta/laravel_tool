<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_food_drugs extends Model
{
    protected $fillable = [
   
   'student_id','class_id','food_allergy','drug_allergy','other_restrictions',
   
	];
	
	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
}
