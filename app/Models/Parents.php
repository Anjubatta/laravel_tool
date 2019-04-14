<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
     /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'image','parent_id','users_id','sur_name', 'first_name', 'middle_name', 'contact_no', 'age', 'address', 'gender', 'active','relation'
	];
public function users()
	{
		return $this->belongsTo('App\User', 'users_id');
	}
	
	public function relation()
	{
		return $this->hasMany(Parent_relations::class, 'parent_id');
	}
	
}

