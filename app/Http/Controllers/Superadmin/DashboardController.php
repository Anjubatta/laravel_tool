<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Announcements;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
		$company = Company::all();
	$announcements = Announcements::whereUsersId(1)->orderBy('date', 'desc')->get();
		return view('superadmin.dashboard.index', compact('title', 'company', 'announcements'));
	}
}
