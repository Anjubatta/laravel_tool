<?php

namespace App\Http\Controllers\Admins;

use App\Models\Students;
use App\Models\Parents;
use App\Models\Parent_relations;
use App\Models\Classes;
use App\Models\Company;
use App\Models\Attendances;
use App\Models\Classes_students;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentsRequest;
use Intervention\Image\ImageManagerStatic as Image;

class StudentsController extends Controller
{
    const active = 'students';
	const title = 'Students';
	const slug = 'students';

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
		/******year loop*********/
		$years = array();
		$currentYear = (int)date('Y');
		$oldYear = $currentYear - 20;
		$years[''] = 'Select';
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$years[$i] = $i;
		}		
		/******year loop*********/
		
		$search = $request->search;
		$class_id = $request->class_id;
		$year = $request->year; 
		$users = User::find(auth()->user()->id);
		$use = auth()->user();
		$use->companies->id;
		
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		//echo '<pre>'; print_r($class); exit;
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
				$query = $query->Where('c.class_id', $class_id);
			}
			
			if($year){
				$query = $query->Where('c.year', $year);
			}
			
			 $students = $query->Where('companies_id', $users->companies->id)->select(['students.*'])
			->paginate(8);			
		}
		else{
		
		$students = Students::whereCompaniesId($users->companies->id)->paginate(8);
		}
		$parent = Parents::all();
		$parentRel = Parent_relations::all();
		return view('admin.students.index', compact('title','students','parent','parentRel','search','class','years','class_id','year'));
	}

	/**
	* Show the form for creating a new students.
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
		/******year loop*********/
		$year = array();
		$currentYear = (int)date('Y');
		$oldYear = $currentYear - 20;
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$year[$i] = $i;
		}			
		/******year loop*********/
		
		$use = auth()->user();
		$use->companies->id;
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		$year = array();
		$currentYear = (int)date('Y');
		$oldYear = $currentYear - 20;
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$year[$i] = $i;
		}		
		return view('admin.students.create', compact('title','class','year'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRelation $request
	* @return void
	*/
	public function add_parent(Request $request)
	{
	
		$create = new Parent_relations;		
		$create->parent_id = $request->parent_id;
		$create->relation = $request->relation;
		$create->student_id = $request->student_id;
		$create->save();
		alert()->success('Success', 'Parent Add Successfully!');
		return redirect()->route('admin.students.index');
	
	}
	
	
	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	public function store(StudentsRequest $request)
	{
		

		$users = User::find(auth()->user()->id);
		
		$image ='';
	 if ($request->image) {
			$request->file('image');        	
			$path = public_path('uploads/students/');
        	$image = time().'.png';
			$image_path = $path.$image; 
			if (file_exists($image_path)) {
				   @unlink($image_path);
				}
        	Image::make($request->file('image'))->resize(225, 225)->save($path.$image);
        }
		
		
		$create = new Students;

		$create->added_id = $users->id;
		$create->companies_id = $users->companies->id;
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
		$create1->year = $request->year;
		$create1->save();
		
		alert()->success('Success', 'Student '.$create->title.' created!');
		return redirect()->route('admin.students.index');
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
		
		$company = Company::whereId($student->companies_id)->select('expected_attendance')->first();
		
		$highTemp = $this->heighTemp($student->id); 
		$present = $this->present($student->id); 
		$absent = $this->absent($student->id); 
		

		if($company->expected_attendance>0){
				if($present == 0) {
					$percentage=0;
				}else{
				if($absent == 0){
						$percentage = 100;
					}else{
						$answer = ($absent / $present ) * 100;
						$percentage = 100-$answer;
					}
				}
			}else{
				$percentage = 0;
			}
		
		
		$student->age = date_diff(date_create($student->dob), date_create('today'))->y;
		return view('admin.students.show', compact('title', 'student','parentRel','company','highTemp','present','absent','percentage'));
	}

function heighTemp($student_id){
	$t1 = Attendances::whereStudentId($student_id)->orderBy('temp1','DESC')->select('temp1')->first();
	
	$t2 = Attendances::whereStudentId($student_id)->orderBy('temp2','DESC')->select('*')->first();
	
	$t3 = Attendances::whereStudentId($student_id)->orderBy('temp3','DESC')->select('temp3')->first();
	
	$temp = array(
				'temp1'=>$t1->temp1,
				'temp2'=>$t2->temp2,
				'temp3'=>$t3->temp3,
				);
				
	return $value = max($temp);
}

function present($student_id){
	 return $present = Attendances::whereStudentId($student_id)->whereIn('status',array('IN','OUT'))->count();	
}

function absent($student_id){
	 return $absent = Attendances::whereStudentId($student_id)->whereIn('status',array('Absent'))->count();	
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
		$currentYear = (int)date('Y');
		$oldYear = $currentYear - 20;
		for($i=$currentYear;$i>=$oldYear;$i--)
		{
			$year[$i] = $i;
		}			
		/******year loop*********/
		
		$use = auth()->user();
		$use->companies->id;
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		return view('admin.students.edit', compact('title', 'student','class','year'));
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
		Classes_students::where('student_id', $student->id)->update(['class_id' => $request->class_id,'session' => $request->session,'year' => $request->year]);
		
	 if ($request->file('image')) {
			$request->file('image');
        	
			$path = public_path('uploads/students/');
        	$image = time().'.png';
			$image_path = $path.$image;  
			
			
			if (file_exists($image_path)) {
				   @unlink($image_path);
				}
        	Image::make($request->file('image'))->resize(225, 225)->save($path.$image);
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
			$update->contact_no = $request->contact_no;
			$update->address = $request->address;
			$update->dob = $request->dob;
			$update->update();

        $request->session()->flash('success', "Student {$student->title} updated!");
        return redirect()->route('admin.students.index');

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
		return redirect()->route('admin.students.index');
	}
}
