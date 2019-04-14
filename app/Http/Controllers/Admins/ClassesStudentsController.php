<?php
namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Classes_students;
use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassTeachers;
use Mail;

class ClassesStudentsController  extends Controller
{
    const active = 'classes';
	const title = 'Classes';
	const slug = 'classes';
	
	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Students $students)
	{
	
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);

		$classes = Classes_students::whereStudentId($students->id)->get();
			
		return view('admin.classesstudents.index', compact('title','classes','student'));
	}


/**
	* Show the form for creating a new announcements.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create(Students $student)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$class = Classes::all();
		return view('admin.classesstudents.create', compact('title','student','class'));
	}

	
	
public function store(Request $request, Students $student)
	{
	
	
		$create = Classes_students::create($request->all());
		
		alert()->success('Success', 'Classes created!');
		return redirect()->route('admin.classes.index',$student->id);
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/
	public function edit(Students $student,Classes $class)
	{
	
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		

		return view('admin.classesstudents.edit', compact('title', 'class','student'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $Teachers
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request , Classes $class){
		
		$class->update($request->all());
		
		alert()->success('Success', 'Class  updated!');
		return redirect()->route('admin.classesstudents.index');

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
		return redirect()->route('admin.classesstudnets.index');
	}

 	

}
