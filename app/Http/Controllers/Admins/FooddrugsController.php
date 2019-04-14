<?php

namespace App\Http\Controllers\Admins;

use App\Models\Students;
use App\Models\Classes_student;
use App\Models\Student_food_drugs;
use App\Models\Parent_relations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\fooddrugsRequest;
use Intervention\Image\ImageManagerStatic as Image;

class FooddrugsController extends Controller
{
    const active = 'food';
	const title = 'Food and Drugs Allergy Record';
	const slug = 'food';

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
	
		$food = Student_food_drugs::whereStudentId($student->id)->get();
		return view('admin.fooddrugs.index', compact('title','students','food'));
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
		return view('admin.fooddrugs.create', compact('title','student'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	public function store(fooddrugsRequest $request, Students $student)
	{
	
	
		$create = Student_food_drugs::create($request->all());
		

		alert()->success('Success', 'Report submitted!');
		return redirect()->route('admin.fooddrugs.index', $student->id);
	}

	

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit( Students $student, Student_food_drugs $fooddrug)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
			
		return view('admin.fooddrugs.edit', compact('title','fooddrug','student'));
	}

public function show( Students $student,Student_food_drugs $fooddrug)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);		
		
		return view('admin.fooddrugs.show', compact('title','fooddrug','student'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response Student_food_drugs $food
	*/
	public function update(Request $request, Students $student, Student_food_drugs $fooddrug)
	{
		$fooddrug->update($request->all());
        $request->session()->flash('success', "foods updated!");
		
		if($request->filter){
        return redirect()->route('admin.reports.foods');
		}else{
        return redirect()->route('admin.fooddrugs.index', $student->id);
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
	public function destroy(Request $request, Students $student, Student_food_drugs $fooddrug)
	{
		$request->session()->flash('error', "food deleted!");
		$fooddrug->delete();
		
		if($request->p){
        return redirect()->route('admin.reports.foods');
		}else{
        return redirect()->route('admin.fooddrugs.index', $student->id);
		}
		
	}
}
