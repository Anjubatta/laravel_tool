<?php

namespace App\Http\Controllers\Admins;

use App\Models\Attendances;
use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementsRequest;
use App\User;

class AttendancesController extends Controller
{
	const active = 'attendances';
	const title = 'Attendance';
	const slug = 'attendances';

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
		$use = auth()->user();
		$use->companies->id;
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		$search = $request->search;
		$classs = $request->class_id; 
		$date = @($request->date) ? date('d-m-Y',strtotime($request->date)) : date('d-m-Y');
		$session = @($request->session) ? $request->session : 'morning';
		
		$query = Students::query();
		$query = $query->leftJoin('classes_students as cs', 'students.id',  '=', 'cs.student_id');
	
		
		$user = User::find(auth()->user()->id);
		
		if($search){
				$query = $query->Where('surname', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('middle_name', 'like', '%'.$search.'%')
				->orWhere('student_no', 'like', '%'.$search.'%');
			}
			
			$students = $query->where('cs.class_id',$classs)->whereIn('session', array(ucfirst($session),'Both'))->where('students.companies_id',$user->companies->id)->select('students.*','cs.class_id','cs.student_id')->paginate(8);
		

		
		return view('admin.attendances.index', compact('title', 'students', 'date', 'session', 'classs', 'search','class'));
	}

	
	public function create(Request $request, Students $Student)
	{
		/* $title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$class = Classes::pluck('name', 'id');	
		return view('admin.classesteachers.create', compact('title','teacher','class')); */
	}

	
	
public function store(Request $request, Students $Student)
	{
	

	$attendance = Attendances::where('student_id',$request->student_id)->where('session',$request->session)->where('date',date('d-m-Y'))->first();			
	
	$timein  = date("g:i a", strtotime($request->timein));
	
	$timeout  = date("g:i a", strtotime($request->timeout));
	
	
				if($attendance){
					$data = array(
						'timein'=>$timein,
						'timeout'=>$timeout,
						'temp1'=>$request->temp1,
						'temp2'=>$request->temp2,
						'temp3'=>$request->temp3,
						'session'=>ucfirst($request->session),
						'status'=>$request->status,
						'send_by'=>$request->send_by,
						'pick_by'=>$request->pick_by,
					);
					$appdata = Attendances::where('id',$attendance->id)->update($data);
					$attendanceId = $attendance->id;
					}else{
					
					$create = new Attendances;				
					$create->student_id = $request->student_id;
					$create->timein = $timein;
					$create->timeout = $timeout;
					$create->temp1 = $request->temp1;				
					$create->temp2 = $request->temp2;			
					$create->temp3 = $request->temp3;				
					$create->session = ucfirst($request->session);			
					$create->status =  $request->status;				
					$create->send_by =  $request->send_by;				
					$create->pick_by =  $request->pick_by;				
					$create->date = date('d-m-Y');				
					$create->save();
					$attendanceId = $create->id;
				}
		
		alert()->success('Success', 'Attendance created!');
		return redirect()->route('admin.attendances.index');
	}
	
}
