<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
   protected $fillable = [
		'student_id','date','timein','timeout','temp1','temp2','temp3','status','session'
	];

	
	public function classes_teachers()
    {
        return $this->hasMany(Classes_teachers::class, 'teacher_id');
    }
	
	public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
	
	public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
	
	
	
	
	
	
}
