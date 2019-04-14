<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Students;
use App\Models\Parents;
use App\Models\Parent_relations;
use App\Models\Classes;
use App\Models\Teachers;
use App\Models\Classes_teachers;
use App\Models\Classes_students;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentsRequest;
use Intervention\Image\ImageManagerStatic as Image;
class StudentsController extends Controller
{
    
    const active = 'Student';
	const title = 'Student';
	const slug = 'student';

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
		$class_id ='';
		/******year loop*********/
		$user_id = auth()->user()->id;
		$years = array('0'=>'Select Year');
		$currentYear = (int)date('Y')+1;
		$oldYear = $currentYear - 20;
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$years[$i] = $i;
		}		
		/******year loop*********/
		
		$search = $request->search;
		if($request->class_id){
			$class_id = $request->class_id;
		}else{
			
			$get_teacher = Teachers::where('users_id',$user_id)->first();
			$get_class = Classes_teachers::where('teacher_id',$get_teacher->id)->first();
			if($get_class){
			$class_id = $get_class->class_id;	
				}
			
		}
		$cls = array();
		$year = $request->year; 
		//$users = User::find(auth()->user()->id);
		$get_teacher = Teachers::where('users_id',$user_id)->first();
		$get_class = Classes_teachers::where('teacher_id',$get_teacher->id)->get();
		//print_r($get_class);
		//die();
		foreach($get_class as $k=> $v){
			$cls[] = $v->class_id;
		}
		
		$class = Classes::whereIn('id', $cls)->pluck('name', 'id');	

		


		if($search||$class_id||$year){
			 $query = Students::query();		
			 $query = $query->leftJoin('classes_students as c', 'students.id',  '=', 'c.student_id');
			if($search){
				$query = $query->orWhere('surname', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('middle_name', 'like', '%'.$search.'%')
				->orWhere('student_no', 'like', '%'.$search.'%');
			}
			if($class_id){
				$query = $query->WhereIn('c.class_id', $cls);
			}
			
			if($year){
			
				$query = $query->Where('c.year', $year);
			}
			
			 $students = $query->select(['students.*'])
			->paginate(8);		
			$student_count=  $students->count();
		}
		else{
		
			$students = '';
			$student_count=  0;
		}
		$class_name = '';
		
		$getdclass = Classes::where('id', $class_id)->first();
		if($getdclass){
			
		$class_name = $getdclass->name;
			}
		$parent = Parents::all();
		$parentRel = Parent_relations::all();
		return view('teachers.students.index', compact('title','students','parent','parentRel','search','class','years','class_id','year','student_count','class_name'));

	}

	/**
	* Show the form for creating a new Students.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create(){

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);

		/******year loop*********/
		$year = array();
		$currentYear = (int)date('Y')+1;
		$oldYear = $currentYear - 20;
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$year[$i] = $i;
		}			
		/******year loop*********/
		$users = User::find(auth()->user()->id);
		$teacher = Teachers::whereUsersId($users->id)->first();
		$company_id = $teacher->company_id;		
		
		$class = Classes::whereCompanyId($company_id)->pluck('name', 'id');	
			
		return view('teachers.students.create', compact('title','class','year'));
	}

	/**
	* Insert the student data
	* @return \Illuminate\Http\Response
	*/


   public function store(StudentsRequest $request)
	{
		/*  */

		$users = User::find(auth()->user()->id);
		$teacher = Teachers::whereUsersId($users->id)->first();
		$company_id = $teacher->company_id;	
		
		if ($request->file('image')) {
			$request->file('image');
        	$path = public_path('uploads/students/');
        	$image = time().'.png';
        	Image::make($request->file('image'))->save($path.$image);
        }
		
		$create = new Students;

		$create->added_id = $users->id;
		$create->companies_id = $company_id;
		 if ($request->file('image')) {
				$create->image = $image;
			 }
		
		$create->surname = $request->surname;
		$create->first_name = $request->first_name;
		$create->middle_name = $request->middle_name;
		$create->student_no = $request->student_no;
		$create->contact_no = $request->contact_no;
		$create->dob = $request->dob;
		$create->address = $request->address;
		$create->gender = $request->gender;
		$create->active = $request->active;
		$create->save();

		
		$create1 = new Classes_students;
		$create1->student_id = $create->id;
		$create1->class_id = $request->class_id;
		$create1->session = $request->session;
		$create1->save();
		
		alert()->success('Success', 'Student '.$create->title.' created!');
		return redirect()->route('teacher.students.index');
	}

	/**
	* Show the form for show the specified resource.
	*
	* @param  \App\Models\Students $students
	* @return \Illuminate\Http\Response
	*/
	public function show(Students $student)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$parentRel = Parent_relations::whereStudentId($student->id)->get();
		
		$student->age = date_diff(date_create($student->dob), date_create('today'))->y;
		return view('teachers.students.show', compact('title', 'student','parentRel'));
	}


	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit(Students $student)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		/******year loop*********/
		$year = array();
		$currentYear = (int)date('Y')+1;
		$oldYear = $currentYear - 20;
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$year[$i] = $i;
		}			
		/******year loop*********/
		
		$users = User::find(auth()->user()->id);
		$teacher = Teachers::whereUsersId($users->id)->first();
		$company_id = $teacher->company_id;		
		$class = Classes::whereCompanyId($company_id)->pluck('name', 'id');	
		return view('teachers.students.edit', compact('title', 'student','class','year'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function update(StudentsRequest $request, Students $student)
	{
		
		//$student->update($request->all());
		
	
		
		Classes_students::where('student_id', $student->id)->update(['class_id' => $request->class_id,'session' => $request->session,'year' => $request->year]);
		
	 if ($request->file('image')) {
			$request->file('image');
        	$path = public_path('uploads/students/');
        	$image = time().'.png';
        	Image::make($request->file('image'))->save($path.$image);
        }
			$update = new Students;
			$update->exists = true;
			$update->id = $student->id;
			 if ($request->file('image')) {
			$update->image = $image;
			 }
			$update->surname = $request->surname;
			$update->first_name = $request->first_name;
			$update->middle_name = $request->middle_name;
			$update->student_no = $request->student_no;
			$update->address = $request->address;
			$update->dob = $request->dob;
			$update->update();

        $request->session()->flash('success', "Student {$student->title} updated!");
        return redirect()->route('teacher.students.index');

	}


	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Students $student)
	{
		$request->session()->flash('error', "Students {$student->title} deleted!");
		$student->delete();
		return redirect()->route('teacher.students.index');
	}


}
