<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appkeys extends Model
{
    protected $fillable = [
		'users_id', 'unique_key', 'login_status'
	];
}
