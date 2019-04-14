<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Announcements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\AnnouncementsRequest;

class AnnouncementsController extends Controller
{
	const active = 'announcements';
	const title = 'Announcements';
	const slug = 'announcements';

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
		$announcements = Announcements::whereUsersId(1)->get();
		return view('superadmin.announcements.index', compact('title', 'announcements'));
	}

	/**
	* Show the form for creating a new announcements.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.announcements.create', compact('title'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @return void
	*/
	public function store(AnnouncementsRequest $request)
	{
		//$create = Announcements::create($request->all());
		$create = new Announcements;
		$create->users_id = auth()->user()->id;
		$create->title = $request->title;
		$create->date = $request->date;
		$create->time = $request->time;
		$create->description = $request->description;
		$create->active = $request->active;
		$create->save();

		alert()->success('Success', 'Announcement '.$create->title.' created!');
		return redirect()->route('superadmin.announcements.index');
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Announcements $announcement
	* @return \Illuminate\Http\Response
	*/
	public function edit(Announcements $announcement)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.announcements.edit', compact('title', 'announcement'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Announcements $announcement
	* @return \Illuminate\Http\Response
	*/
	public function update(AnnouncementsRequest $request, Announcements $announcement)
	{
		$announcement->update($request->all());
		alert()->success('Success', 'Announcement '.$announcement->title.' updated!');
		return redirect()->route('superadmin.announcements.index');
	}

	/**
	* Show the form for show the specified resource.
	*
	* @param  \App\Models\Announcements $announcement
	* @return \Illuminate\Http\Response
	*/
	public function show(Announcements $announcement)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.announcements.show', compact('title', 'announcement'));
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Announcements $announcement
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Announcements $announcement)
	{
		$request->session()->flash('error', "Announcement {$announcement->title} deleted!");
		$announcement->delete();
		return redirect()->route('superadmin.announcements.index');
	}
}
