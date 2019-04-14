<?php
namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassesRequest;
use Mail;

class ClassesController extends Controller
{
    const active = 'classes';
	const title = 'Classes';
	const slug = 'classes';
	
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
		$classes = Classes::whereCompanyId($use->companies->id)->get();
		
		return view('admin.classes.index', compact('title','classes'));
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
		return view('admin.classes.create', compact('title'));
	}

public function store(Request $request)
	{
		$use = auth()->user();
		$use->companies->id;
		
			
		$create = new Classes;
		$create->company_id = $use->companies->id;
		$create->name = $request->name;
		$create->save();
					
		alert()->success('Success', 'Classes created!');
		return redirect()->route('admin.classes.index');
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/
	public function edit(Classes $class)
	{
		
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);

		return view('admin.classes.edit', compact('title', 'class'));
	

	}


	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $Teachers
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request,Classes $class){
		
		$class->update($request->all());
		
		alert()->success('Success', 'Class updated!');
		return redirect()->route('admin.classes.index');

	}

	

    /**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Classes $class)
	{
		$request->session()->flash('error', "Classess {$class->name} deleted!");
		$class->delete();
		return redirect()->route('admin.classes.index');
	}

 	

}
