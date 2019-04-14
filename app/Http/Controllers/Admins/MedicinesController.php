<?php

namespace App\Http\Controllers\Admins;

use App\Models\Students;
use App\Models\Student_medicines;
use App\Models\Parent_relations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MedicinesRequest;
use Intervention\Image\ImageManagerStatic as Image;

class MedicinesController extends Controller
{
    const active = 'Medicines';
	const title = 'Medicines';
	const slug = 'medicines';

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
	
	$medicine = Student_medicines::whereStudentId($student->id)->get();
		return view('admin.medicines.index', compact('title','student','medicine'));
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
	
		

		return view('admin.medicines.create', compact('title','student'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	public function store(MedicinesRequest $request, Students $student)
	{
		$create = Student_medicines::create($request->all());
		alert()->success('Success', 'Medicines added!');
		return redirect()->route('admin.medicines.index', $request->student_id);
	}

	

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit( Students $student,Student_medicines $medicine)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
		
		return view('admin.medicines.edit', compact('title', 'medicine','student'));
	}

public function show( Students $student,Student_medicines $medicine)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
		
		return view('admin.medicines.show', compact('title', 'medicine','student'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response Student_incidents $incident
	*/
	public function update(Request $request, Students $student, Student_medicines $medicine)
	{
		$medicine->update($request->all());
        $request->session()->flash('success', "Medicine updated!");
		if($request->filter){
        return redirect()->route('admin.reports.medicines');
		}else{
        return redirect()->route('admin.medicines.index', $student->id);
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
	public function destroy(Request $request, Students $student, Student_medicines $medicine)
	{
		$request->session()->flash('error', "Medicine deleted!");
		$medicine->delete();
		if($request->p){
			return redirect()->route('admin.reports.medicines');
		}else{
		return redirect()->route('admin.medicines.index',$student->id);
		}
	}
}
