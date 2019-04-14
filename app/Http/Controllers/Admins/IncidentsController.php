<?php

namespace App\Http\Controllers\Admins;

use App\Models\Students;
use App\Models\Student_incidents;
use App\Models\Parent_relations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IncidentsRequest;


class IncidentsController extends Controller
{
    const active = 'incident';
	const title = 'Incident/Accident/Injury Report Form';
	const slug = 'incident';
	
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
	
	$incident = Student_incidents::whereStudentId($student->id)->get();
		return view('admin.incidents.index', compact('title','students','incident'));
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
	
		$dateOfBirth = $student->dob;
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		return view('admin.incidents.create', compact('title','student','age'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	public function store(IncidentsRequest $request, Students $student)
	{
	
	
		$create = Student_incidents::create($request->all());
		

		alert()->success('Success', 'Report submitted!');
		return redirect()->route('admin.incidents.index', $request->student_id);
	}

	

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit( Students $student,Student_incidents $incident)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$dateOfBirth = $student->dob;
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');
		
		return view('admin.incidents.edit', compact('title', 'incident','student','age'));
	}

public function show( Students $student,Student_incidents $incident)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$dateOfBirth = $student->dob;
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');
		
		return view('admin.incidents.show', compact('title', 'incident','student','age'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response Student_incidents $incident
	*/
	public function update(Request $request, Students $student, Student_incidents $incident)
	{
		$incident->update($request->all());
        $request->session()->flash('success', "Incidents updated!");
		if($request->filter){
        return redirect()->route('admin.reports.incidents');
		}else{
        return redirect()->route('admin.incidents.index', $student->id);
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
	public function destroy(Request $request, Students $student, Student_incidents $incident)
	{
		$request->session()->flash('error', "Incident deleted!");
		$incident->delete();
		if($request->p){
			return redirect()->route('admin.reports.incidents');
		}else{
			return redirect()->route('admin.incidents.index',$student->id);
		}
	}
}
