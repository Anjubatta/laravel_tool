<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parent_relations extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'student_id', 'parent_id', 'relation'
	];
	
	public function student()
	{
		return $this->belongsTo(Students::class, 'student_id');
	}
	public function parents()
	{
		return $this->belongsTo(Parents::class, 'parent_id');
	}
	
	
}
