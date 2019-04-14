<?php
namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Leaves_types;
use App\Models\Leaves_names;
use App\Models\Leaves_teachers;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teacher_Request;


class Teacher_leavesController extends Controller
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
	
	public function all_leaves()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$use = auth()->user();
		$use->companies->id;
		$query = Leaves_teachers::query();		
		$leaves = $query->leftJoin('teachers as t', 'leaves_teachers.teacher_id',  '=', 't.id')->where('t.company_id',$use->companies->id)->latest('leaves_teachers.id')->limit(5)->select('leaves_teachers.*','t.company_id')->paginate(8);
		
		
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name', 'id');
		
		
		return view('admin.leaves.index', compact('title','leaves','leaves_type','leaves_name'));
	}

	
	
	public function index(Teachers $teacher)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name', 'id');
		
		$leaves = Leaves_teachers::whereTeacherId($teacher->id)->paginate(8);
		
		$used_leave = $this->countleaves($teacher->id);
		
		$paidleave = Leaves_types::where('type', 'paid')->first();	
		$paid = $paidleave->total_leave;		
		$leaves_left = $paid - $used_leave;
		
		return view('admin.leaves.index', compact('title','leaves','leaves_type','leaves_name','teacher','used_leave','leaves_left'));
	}
	
	/******
		*count only paid leave*
	******/
 function countleaves($teacher_id)
	{	
	
		$leaves = Leaves_teachers::select(\DB::raw('DATEDIFF(to_date,from_date) as days'))->whereTeacherId($teacher_id)->where('leave_type_id',1)->get();
		$days = 0;
		foreach($leaves as $key=>$val){
				$days += $val->days;
			}
	return $days; 
	}


public function create(Teachers $teacher)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name', 'id');
		
		return view('admin.leaves.create', compact('title','teacher','leaves_type','leaves_name'));
	}
	
	
public function store(Request $request,Teachers $teacher)
	{
		$request['teacher_id'] = $teacher->id;	
		$create = Leaves_teachers::create($request->all());
		alert()->success('Success', 'Leaves submitted!');
		return redirect()->route('admin.leaves.index', $teacher->id);
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/

public function edit( Teachers $teacher, $id)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$leave = Leaves_teachers::whereId($id)->first();
		
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name', 'id');
		return view('admin.leaves.edit', compact('title', 'leave','teacher','leaves_type','leaves_name'));
	}
	
public function show( Teachers $teacher, $id)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$leave = Leaves_teachers::whereId($id)->first();
		
		$leaves_type = Leaves_types::pluck('type', 'id');
		$leaves_name = Leaves_names::pluck('name', 'id');
		return view('admin.leaves.show', compact('title', 'leave','teacher','leaves_type','leaves_name'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $Teachers
	* @return \Illuminate\Http\Response
	*/
 function companyPaidLeaves($teacherid)
	{	
		$user = User::find($teacherid);
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
	public function update(Request $request, Teachers $teacher, $id)
	{
	
	$diff = $this->dateDiff($request->from_date,$request->to_date);
	
		$used_leave = $this->countleaves($teacher->id);		
		 $paid = $this->companyPaidLeaves($teacher->users_id);	 	
		$leaves_left = $paid - $used_leave; 
		if($request->leave_type_id==1 ){
			if($leaves_left >= $diff ){
				$request['teacher_id'] = $teacher->id;	
				$up = Leaves_teachers::where('id',$id)->update($data);
				alert()->success('Success', 'leave updated!');
				 return redirect()->route('admin.dashboard.index');
			}else{
				alert()->error('Danger', 'This Teacher have only '.$leaves_left.' paid leaves.');				
				 return redirect()->route('admin.dashboard.index');
			}
		}else{
		
		$data = $request->all();
		unset($data['_token']);
		unset($data['leave_id']);
		unset($data['submit']);
		unset($data['_method']);
	
		$up = Leaves_teachers::where('id',$id)->update($data);
		alert()->success('Success', 'leave updated!');
        return redirect()->route('admin.dashboard.index');
		}
	}
	

    /**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	
	 public function destroy(Request $request,Teachers $teacher, $id)
	{
	
		
		$del = Leaves_teachers::where('id', $id)->delete();
		
		alert()->success('Success', 'leave deleted!');
		return redirect()->route('admin.leaves.index');
	} 
	
 	

}
