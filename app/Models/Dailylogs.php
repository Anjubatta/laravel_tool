<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dailylogs extends Model
{
   protected $fillable = [
		'added_by', 'student_id','date', 'log_entry_by','opened_by', 'timein', 'daily_log', 'special_incident','action_taken','time_parent_informed','reported_by','change_menu','childcare_closed_by','timeout'
	];
	
	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
}
