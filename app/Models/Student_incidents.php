<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_incidents extends Model
{
   protected $fillable = [
   
   'student_id','date','time','staff_present','type_of_incident','location','equipment','part_of_body','description','how_occur','first_aid','treatment_by_dr','treatment_details','corrective_action','name_of_notify','time_notify','notify_by','way_of_notify','active',
   
	];
	
	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
}
