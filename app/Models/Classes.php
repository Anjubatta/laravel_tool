<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
  public $timestamps = false;
  
  
  protected $fillable = [
	'name'
	];
	
	/**
	* @return \Illuminate\Database\Eloquent\Relations\hasMany
	*/
	public function class_student()
	{
		return $this->hasMany(Classes_students::class, 'class_id');
	}
	
	public function class_teacher()
	{
		return $this->hasMany(Classes_teachers::class, 'class_id');
	}
}
