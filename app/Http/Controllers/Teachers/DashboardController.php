<?php

namespace App\Http\Controllers\Teachers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcements;
use App\Models\Leaves_teachers;
use App\Models\Teachers;
use App\Models\Leaves_names;
use App\Models\Leaves_types;
use App\Models\Rating_options;
use App\Models\Rating_headings;
use App\Models\Rating_teachers;
class DashboardController extends Controller
{
	const active = 'dashboard';
	const title = 'Dashboard';
	const slug = 'dashboard';

	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
   
   public function index(){
   	$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
    $user_id = auth()->user()->id;
	$teacher = Teachers::whereUsersId($user_id)->first();
   	$get_teacher = Teachers::where('users_id',$user_id)->first();
    $company_id=$get_teacher->company->users_id;

   	$leaves_type = Leaves_types::pluck('type', 'id');
	$leaves_name = Leaves_names::pluck('name','id');
	
    $announcements = Announcements::where('users_id',$company_id)->orderBy('date', 'desc')->get();
    $teacher_leaves = Leaves_teachers::where('teacher_id',$teacher->id)->paginate(8);
		$used_leave = $this->countleaves($teacher->id);
		
		$paidleave = Leaves_types::where('type', 'paid')->first();	
		$paid = $paidleave->total_leave;		
		$leaves_left = $paid - $used_leave;
		
    return view('teachers.dashboard.index', compact('title', 'announcements','teacher_leaves','leaves_name','leaves_type','used_leave','leaves_left')); 	

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
  public function profile(){
  		$title = array(
			'active' => 'profile',
			'title' => 'Profile',
			'slug' => 'profile'
		);

  		$teacher = Teachers::where('users_id',auth()->user()->id)->first();
  	    $rating_teachers = Rating_teachers::whereTeacherId(auth()->user()->id)->get();
		
		
		$rating_headings = Rating_headings::all();

		return view('teachers.profile', compact('title', 'teacher','rating_headings', 'rating_teachers'));

  }    
}
