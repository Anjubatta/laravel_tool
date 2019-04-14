<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'image','added_id', 'companies_id', 'surname', 'first_name', 'middle_name', 'student_no', 'contact_no', 'dob', 'address', 'gender', 'active'
	];

	
	public function classes_students()
	{
		return $this->hasOne(Classes_students::class, 'student_id');
	}
	
	public function attendance()
    {
        return $this->hasOne(Attendances::class, 'student_id')->where('date', date('d-m-Y'));
    }
	
	public function relation()
	{
		return $this->hasOne(Parent_relations::class, 'student_id');
	}
	
}
