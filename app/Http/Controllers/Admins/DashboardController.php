<?php

namespace App\Http\Controllers\Admins;

use App\Models\Leaves_types;
use App\Models\Leaves_names;
use App\Models\Announcements;
use App\Models\Dailylogs;
use App\Models\Leaves_teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teachers;
use App\User;

class DashboardController extends Controller
{
	const active = 'dashboard';
	const title = 'Dashboard';
	const slug = 'dashboard';

	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$use = auth()->user();
		$use->companies->id;
		//$leaves = Leaves_teachers::limit(5)->get();
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name', 'id');
		
		$users =   User::find(auth()->user()->id);
		$userid =   $users->id;
		
		$announcements = Announcements::whereIn('users_id',[1,$userid])->orderBy('date', 'desc')->limit(5)->get();
		$dailylog = Dailylogs::whereIn('added_by',[1,$userid])->limit(5)->get();
		$query = Leaves_teachers::query();		
		$leaves = $query->leftJoin('teachers as t', 'leaves_teachers.teacher_id',  '=', 't.id')->where('t.company_id',$use->companies->id)->where('leaves_teachers.status','pending')->latest('leaves_teachers.id')->limit(5)->select('leaves_teachers.*','t.company_id')->get();
		
		return view('admin.dashboard.index', compact('title', 'announcements','leaves','leaves_type','leaves_name','dailylog','userid'));
	}
}