<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Leaves_types;
use App\Models\Leaves_names;
use App\Models\Leaves_teachers;
use App\Models\Teachers;
use App\User;
class Leaves_teachersController extends Controller
{
     const active = 'leaves';
	const title = 'Leaves';
	const slug = 'leaves';

	/**
	* Show the application index.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/

	public function index(){
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
			
		);
			
		$leaves_type = Leaves_types::all();
		$leaves_name = Leaves_names::all();
		$user_id = auth()->user()->id;
		$teacher = Teachers::whereUsersId($user_id)->first();
		
		$used_leave = $this->countleaves($teacher->id);		
			
		$paid = $this->companyPaidLeaves();		
		$leaves_left = $paid - $used_leave; 
		
		$leaves = Leaves_teachers::whereTeacherId($teacher->id)->get();
		return view('teachers.leaves.index', compact('title','leaves','leaves_type','leaves_name','leaves_left','used_leave'));
	}

	public function create(){
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name','id');
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
		
		return view('teachers.leaves.create', compact('title','leaves_type','leaves_name'));

	}
	
	/*******count only paid leave of teacher*******/
	
 function countleaves($teacher_id)
	{	
		$leaves = Leaves_teachers::select(\DB::raw('DATEDIFF(to_date,from_date) as days'))->whereTeacherId($teacher_id)->where('leave_type_id',1)->get();
		$days = 0;
		foreach($leaves as $key=>$val){
				$days += $val->days;
			}
	return $days; 
	}
	
	/*******count only paid leave of teacher*******/
	
 function companyPaidLeaves()
	{	
		$user = User::find(auth()->user()->id);
		$annual_leave = $user->teachers->company->annual_leave;
			
		return $annual_leave;
	}
	
	
	
	function dateDiff($date1, $date2) 
	{
	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}
	
	public function store(Request $request){
		
	$diff = $this->dateDiff($request->from_date,$request->to_date);
	
		$user_id = auth()->user()->id;
		$teacher = Teachers::whereUsersId($user_id)->first();
		
		$used_leave = $this->countleaves($teacher->id);		
		$paid = $this->companyPaidLeaves();		
		$leaves_left = $paid - $used_leave; 
		if($request->leave_type_id==1 ){
			if($leaves_left >= $diff ){
				$request['teacher_id'] = $teacher->id;	
				$create = Leaves_teachers::create($request->all());
				alert()->success('Success', 'Leaves submitted!');
				return redirect()->route('teacher.dashboard.index');
			}else{
				alert()->error('Danger', 'You have only '.$leaves_left.' paid leaves.');				
				return redirect()->route('teacher.dashboard.index');
			}
		}else{
				$request['teacher_id'] = $teacher->id;	
				$create = Leaves_teachers::create($request->all());
				alert()->success('Success', 'Leaves submitted!');
				return redirect()->route('teacher.dashboard.index');
		}
		
		
	}

	public function edit(Leaves_teachers $leave){
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name','id');
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		
		
		return view('teachers.leaves.edit', compact('title','leave','leaves_type','leaves_name'));

	}
}
