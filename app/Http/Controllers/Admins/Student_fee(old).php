<?php
	namespace App\Http\Controllers\Admins;
	
	use App\User;
	use App\Models\Student_fees;
	use App\Models\Students;
	use App\Models\Parents;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Http\Requests\Admin\feesRequest;
	use DB;

	
	class Student_fee extends Controller
	{
		const active = 'fees';
		const title = 'Fee Management';
		const slug = 'fees';
		
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
			$res = array(
				'search' => $request->search,
				'month' => ($request->month)?$request->month:date('m'),
				'year' => ($request->year)?$request->year:date('Y'),
			);			
			$users = User::find(auth()->user()->id);
			
			$use = auth()->user();
			$use->companies->id;
		
			$fees = Students::whereCompaniesId($use->companies->id)->get();
			
			
			
			return view('admin.studentfees.index', compact('title','fees','res'));
		}
		
	
		/**
			* Show the form for creating a new announcements.
			*
			* @return \Illuminate\Http\Response
		*/
		public function create(Request $request)
		{
			$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
			);
			$name='';
			$history='';
			if($request->studentid){
				$studentid = $request->studentid;
				$sd = Students::whereId($studentid)->first();
				$history = Student_fees::whereStudentId($studentid)->get();
			
			}
			$users = User::find(auth()->user()->id);
			$student = Students::Where('companies_id', $users->companies->id)->select(DB::raw("CONCAT(first_name,' ', middle_name,', ', student_no) AS display_name"),'id')->get()->pluck('display_name','id');

			$parents = parents::Where('companies_id', $users->companies->id)->select(DB::raw("CONCAT(first_name,' ', middle_name,', ', parent_id) AS display_name"),'id')->get()->pluck('display_name','id');
			
			$recieptno = Student_fees::latest()->first();
			if(@$recieptno->id){
			$recieptno = '1000'+$recieptno->id;
			}
			else{ 
			$recieptno =1000;
			}
			/*******student payment history fees*********/
			
			return view('admin.studentfees.create', compact('title','student','parents','recieptno','sd','history'));
		}
		
		public function store(feesRequest $request)
		{
			$create = Student_fees::create($request->all());
			
			alert()->success('Success', 'Fees added!');
			return redirect()->route('admin.fees.index');
		}
		
		/**
			* Show the form for editing the specified resource.
			*
			* @param  \App\Models\Teachers $teacher
			* @return \Illuminate\Http\Response
		*/
		public function edit(Student_fees $fee)
		{
			
			$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
			);
			
			$history='';
		
			if($fee->student_id){
				$studentid = $fee->student_id;			
				$history = Student_fees::whereStudentId($studentid)->get();
			
			}
			
			$users = User::find(auth()->user()->id);
			$student = Students::Where('companies_id', $users->companies->id)->select(DB::raw("CONCAT(first_name,' ', middle_name,', ', student_no) AS display_name"),'id')->get()->pluck('display_name','id');

			$parents = parents::Where('companies_id', $users->companies->id)->select(DB::raw("CONCAT(first_name,' ', middle_name,', ', parent_id) AS display_name"),'id')->get()->pluck('display_name','id');
			
			
			return view('admin.studentfees.edit', compact('title', 'fee','student','parents','history'));
		}
		
		public function show(Student_fees $fee)
		{
			
			$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
			);
			$users = User::find(auth()->user()->id);
			$student = Students::Where('companies_id', $users->companies->id)->pluck('student_no', 'id');
			$parents = parents::Where('companies_id', $users->companies->id)->pluck('parent_id', 'id');
			
			
			
			return view('admin.studentfees.show', compact('title', 'fee','student','parents'));
		}
		
		
		/**
			* Update the specified resource in storage.
			*
			* @param Request $request
			* @param  \App\Models\Teachers $Teachers
			* @return \Illuminate\Http\Response
		*/
		
		public function update(Request $request , Student_fees $fee){
			
			$fee->update($request->all());
			
			alert()->success('Success', 'fees updated!');
			return redirect()->route('admin.fees.index');
			
		}
		
		
		
		/**
			* Remove the specified resource from storage.
			*
			* @param Request $request
			* @param  \App\Models\Teachers $teacher
			* @return \Illuminate\Http\Response
			* @throws \Exception
		*/
		public function destroy(feesRequest $request, Student_fees $fee)
		{
			$request->session()->flash('error', "Fees deleted!");
			$fee->delete();
			return redirect()->route('admin.fees.index');
		}
		
		
		
	}
