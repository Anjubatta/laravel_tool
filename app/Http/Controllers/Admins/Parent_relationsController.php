<?php
	
	namespace App\Http\Controllers\Admins;
	
	use App\Models\Students;
	use App\Models\Parents;
	use App\Models\Parent_relations;
	use App\User;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Http\Requests\Admin\StudentsRequest;
	use Intervention\Image\ImageManagerStatic as Image;
	
	class Parent_relationsController extends Controller
	{
		const active = 'relation';
		const title = 'Relation';
		const slug = 'relation';
		
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
			
			$use = auth()->user();
			$use->companies->id;
			$parent = Parents::whereCompaniesId($use->companies->id)->get();
		
			$parentRel = Parent_relations::whereStudentId($student->id)->get();
			return view('admin.students.relation', compact('title','students','parent','parentRel'));
		}
		
		/**
			* Store a newly created resource in storage.
			*
			* @param StudentsRelation $request
			* @return void
		*/
		
		
		
		/**
			* Store a newly created resource in storage.
			*
			* @param StudentsRequest $request
			* @return void
		*/
		
		public function store(Request $request,Students $student)
		{
			$create = Parent_relations::create($request->all());
			
			$update = new Students;
			$update->exists = true;
			$update->id = $student->id;
			$update->send_pick_by = $request->send_pick_by;			
			$update->update();
			
			alert()->success('Success', 'Parent Add Successfully!');
			return redirect()->route('admin.relation.index', $student->id);
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
			$student->age = date_diff(date_create($student->dob), date_create('today'))->y;
			return view('admin.students.show', compact('title', 'student'));
		}
		
		
		/**
			* Show the form for editing the specified resource.
			*
			* @param  \App\Models\Students $student
			* @return \Illuminate\Http\Response
		*/
		
		public function updaterel(Request $request)
		{
			$data = $request->all();
			unset($data['_token']);			
			unset($data['submit']);
			unset($data['send_pick_by']);
			$up = Parent_relations::where('id',$request->id)->update($data);
			
			$update = new Students;
			$update->exists = true;
			$update->id = $request->student_id;
			$update->send_pick_by = $request->send_pick_by;			
			$update->update();
			
			alert()->success('Success', 'Relation updated!');
			return redirect()->route('admin.relation.index',$request->student_id);
			
		}
		
		
		/**
			* Remove the specified resource from storage.
			*
			* @param Request $request
			* @param  \App\Models\Students $student
			* @return \Illuminate\Http\Response
			* @throws \Exception
		*/
	
		
		public function destroyrel(Request $request, Students $student)
	{
		

		$del = Parent_relations::where('id', $request->id)->delete();
		$request->session()->flash('error', "Relation deleted!");
		return redirect()->route('admin.relation.index',$student->id);
	}
	}
