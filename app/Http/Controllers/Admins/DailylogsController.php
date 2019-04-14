<?php
namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Dailylogs;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DailylogsRequest;
use Mail;

class DailylogsController extends Controller
{
    const active = 'dailylogs';
	const title = 'Child Daily logs';
	const slug = 'dailylogs';
	
	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$search = $request->search;
		if($search){
			$dailylogs = Dailylogs::where('title','Like','%'.$search.'%')->paginate(2);
		}else{
		$dailylogs = Dailylogs::paginate(2);
		}
		
		return view('admin.dailylogs.index', compact('title', 'dailylogs','search'));
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
		$users = User::find(auth()->user()->id);
		
		$student = Students::whereCompaniesId($users->companies->id)->pluck( 'student_no','id');
		return view('admin.dailylogs.create', compact('title','student'));
	}

public function store(Request $request)
	{
	
		$request['added_by'] = auth()->user()->id;		
		$create = Dailylogs::create($request->all());
		
		alert()->success('Success', 'dailylogs created!');
		return redirect()->route('admin.dailylogs.index');
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/
	public function edit(Dailylogs $dailylog)
	{
		
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		
		$users = User::find(auth()->user()->id);		
		$student = Students::whereCompaniesId($users->companies->id)->pluck( 'student_no','id');
		
		return view('admin.dailylogs.edit', compact('title', 'dailylog','student'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/
	public function show(Dailylogs $dailylog)
	{
		
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		
		$users = User::find(auth()->user()->id);		
		$student = Students::whereCompaniesId($users->companies->id)->pluck( 'student_no','id');
		
		return view('admin.dailylogs.show', compact('title', 'dailylog','student'));
	

	}


	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $Teachers
	* @return \Illuminate\Http\Response
	*/

	public function update(DailylogsRequest $request, Dailylogs $dailylog)
	{
	
		$dailylog->update($request->all());
		alert()->success('Success', 'Dailylog updated!');
		return redirect()->route('admin.dailylogs.index');
	}

	

    /**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Dailylogs $dailylog)
	{
		$request->session()->flash('error', "Dailylogs deleted!");
		$dailylog->delete();
		return redirect()->route('admin.dailylogs.index');
	}

 	

}
