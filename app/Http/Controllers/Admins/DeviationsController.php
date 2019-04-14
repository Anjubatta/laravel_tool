<?php

namespace App\Http\Controllers\Admins;

use App\Models\Students;
use App\Models\Student_deviations;
use App\Models\Parent_relations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeviationsRequest;
use Intervention\Image\ImageManagerStatic as Image;

class DeviationsController extends Controller
{
    const active = 'deviations';
	const title = 'Deviations';
	const slug = 'deviations';

	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Students $student)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);		
		
		$students = Students::whereId($student->id)->first();
	
		$deviation = Student_deviations::whereStudentId($student->id)->get();
		return view('admin.deviations.index', compact('title','student','deviation'));
	}

	/**
	* Show the form for creating a new students.
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
	
		

		return view('admin.deviations.create', compact('title','student'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	public function store(DeviationsRequest $request, Students $student)
	{
		$create = Student_deviations::create($request->all());
		alert()->success('Success', 'Deviation added!');
		return redirect()->route('admin.deviations.index', $request->student_id);
	}

	

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit( Students $student,Student_deviations $deviation)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
		
		return view('admin.deviations.edit', compact('title', 'deviation','student'));
	}

public function show( Students $student,Student_deviations $deviation)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
		
		return view('admin.deviations.show', compact('title', 'deviation','student'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response Student_incidents $incident
	*/
	public function update(Request $request, Students $student, Student_deviations $deviation)
	{
		$deviation->update($request->all());
        $request->session()->flash('success', "Deviation updated!");
		if($request->filter){
        return redirect()->route('admin.reports.deviations');
		}else{
        return redirect()->route('admin.deviations.index', $student->id);
		}
	}


	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	
	public function destroy(Request $request, Students $student, Student_deviations $deviation)
	{
		$request->session()->flash('error', "Deviation deleted!");
		$deviation->delete();
		if($request->p){
			return redirect()->route('admin.reports.deviations');
		}else{
		return redirect()->route('admin.deviations.index',$student->id);
		}
	}
}
