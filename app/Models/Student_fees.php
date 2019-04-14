<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Student_fees extends Model
{
   /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
			'student_id','parent_id','for_month','receipt_no','status','date','c_name','c_address','amount_received','programme_fee','other_item','gst','basic_subsidy','aditional_subsidy','start_up','financial_assistance','form_assistance','net_amount','payment_mode',
	];
	/**
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
	
	public function parents()
	{
		return $this->belongsTo(Parents::class, 'parent_id');
	}
}
