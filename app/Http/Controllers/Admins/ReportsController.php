<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student_food_drugs;
use App\Models\Student_medicines;
use App\Models\Student_deviations;
use App\Models\Student_incidents;
use App\User;
use App\Models\Classes;

class ReportsController extends Controller
{
	const active = 'reports';
	const title = 'Reports';
	const slug = 'reports';

	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('admin.reports.index', compact('title'));
	}
	
	public function foods(Request $request)
	{
	
		$title = array(
			'active' => self::active,
			'title' =>  'Food and Drugs Allergy Record',
			'slug' => self::slug
		);
		
		$use = auth()->user();
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		$classs = $request->class_id; 
		$search = $request->search;
		
		
		$query = Student_food_drugs::query();
		
		$query = $query->leftJoin('students as s', 'student_food_drugs.student_id',  '=', 's.id');
		
		$query = $query->leftJoin('classes_students as cs', 's.id',  '=', 'cs.student_id');
		
		if($search){
				$query = $query->Where('s.surname', 'like', '%'.$search.'%')
				->orWhere('s.first_name', 'like', '%'.$search.'%')
				->orWhere('s.middle_name', 'like', '%'.$search.'%')
				->orWhere('s.student_no', 'like', '%'.$search.'%');
			}
		
			$food = $query->where('cs.class_id',$classs)->select('student_food_drugs.*','s.first_name','s.middle_name')->where('s.companies_id',$use->companies->id)->paginate(8);
					
					
		return view('admin.reports.food', compact('title','food','classs', 'search','class'));
	}
	
	
	public function medicines(Request $request)
	{
	
		$title = array(
			'active' => self::active,
			'title' =>  'Administration of Medicines',
			'slug' => self::slug
		);
		
		$use = auth()->user();
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		$classs = $request->class_id; 
		$search = $request->search;
		
		
		$query = Student_medicines::query();
		
		$query = $query->leftJoin('students as s', 'student_medicines.student_id',  '=', 's.id');
		
		$query = $query->leftJoin('classes_students as cs', 's.id',  '=', 'cs.student_id');
		
		if($search){
				$query = $query->Where('s.surname', 'like', '%'.$search.'%')
				->orWhere('s.first_name', 'like', '%'.$search.'%')
				->orWhere('s.middle_name', 'like', '%'.$search.'%')
				->orWhere('s.student_no', 'like', '%'.$search.'%');
			}
		
			$medicine = $query->where('cs.class_id',$classs)->select('student_medicines.*','s.first_name','s.middle_name')->where('s.companies_id',$use->companies->id)->paginate(8);
					
					
		return view('admin.reports.medicines', compact('title','medicine','classs', 'search','class'));
	}
	
	
	public function deviations(Request $request)
	{
	
		$title = array(
			'active' => self::active,
			'title' =>  'Deviation from Menu',
			'slug' => self::slug
		);
		
		$use = auth()->user();
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		$classs = $request->class_id; 
		$search = $request->search;
		
		
		$query = Student_deviations::query();
		
		$query = $query->leftJoin('students as s', 'student_deviations.student_id',  '=', 's.id');
		
		$query = $query->leftJoin('classes_students as cs', 's.id',  '=', 'cs.student_id');
		
		if($search){
				$query = $query->Where('s.surname', 'like', '%'.$search.'%')
				->orWhere('s.first_name', 'like', '%'.$search.'%')
				->orWhere('s.middle_name', 'like', '%'.$search.'%')
				->orWhere('s.student_no', 'like', '%'.$search.'%');
			}
		
			$deviation = $query->where('cs.class_id',$classs)->select('student_deviations.*','s.first_name','s.middle_name')->where('s.companies_id',$use->companies->id)->paginate(8);
					
					
		return view('admin.reports.deviations', compact('title','deviation','classs', 'search','class'));
	}
	
	
	public function incidents(Request $request)
	{
	
		$title = array(
			'active' => self::active,
			'title' =>  'Incident/Accident/Injury',
			'slug' => self::slug
		);
		
		$use = auth()->user();
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		$classs = $request->class_id; 
		$search = $request->search;
		
		
		$query = Student_incidents::query();
		
		$query = $query->leftJoin('students as s', 'student_incidents.student_id',  '=', 's.id');
		
		$query = $query->leftJoin('classes_students as cs', 's.id',  '=', 'cs.student_id');
		
		if($search){
				$query = $query->Where('s.surname', 'like', '%'.$search.'%')
				->orWhere('s.first_name', 'like', '%'.$search.'%')
				->orWhere('s.middle_name', 'like', '%'.$search.'%')
				->orWhere('s.student_no', 'like', '%'.$search.'%');
			}
		
			$incident = $query->where('cs.class_id',$classs)->select('student_incidents.*','s.first_name','s.middle_name')->where('s.companies_id',$use->companies->id)->paginate(8);
					
					
		return view('admin.reports.incidents', compact('title','incident','classs', 'search','class'));
	}
	
	
}
