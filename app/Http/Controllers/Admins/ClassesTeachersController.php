<?php
namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Classes_teachers;
use App\Models\Classes;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassTeachersRequest;
use Mail;

class ClassesTeachersController  extends Controller
{
    const active = 'classes';
	const title = 'Classes';
	const slug = 'classes';
	
	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request,Teachers $teacher)
	{
	
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$search = $request->search;
		if($search){
			$classes = Classes_teachers::query()
			->leftJoin('classes as c', 'class_id',  '=', 'c.id')
			->where('c.name', 'like', '%'.$search.'%')			
			->where('teacher_id',  $teacher->id)			
			->select(['classes_teachers.*'])
			->paginate(8);			
		}else{
			$classes = Classes_teachers::whereTeacherId($teacher->id)->paginate(8);
		}	
		return view('admin.classesteachers.index', compact('title','classes','teacher','search'));
	}


/**
	* Show the form for creating a new announcements.
	*
	* @return \Illuminate\Http\Response
	*/
	public function checkClassUnique(Request $requests)
	{
	$classteacher = Classes_teachers::whereClassId($requests->class_id)->whereSession($requests->session)->first();
	if($classteacher){
		$data = array('status'=>0,'message'=>'This Class and session already assign');
		}else{
		$data = array('status'=>1,'message'=>'success');
		}
		echo json_encode($data);
	}

	public function create(Teachers $teacher)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$use = auth()->user();
		$use->companies->id;
		
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		return view('admin.classesteachers.create', compact('title','teacher','class'));
	}
	
	
public function store(ClassTeachersRequest $request, Teachers $teacher)
	{
	
	
		$create = Classes_teachers::create($request->all());
		
		alert()->success('Success', 'Classes created!');
		return redirect()->route('admin.class.index',$teacher->id);
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/
	public function edit(Teachers $teacher, $id)
	{
	
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$use = auth()->user();
		$use->companies->id;
		$classteacher = Classes_teachers::whereId($id)->first();
		$class = Classes::whereCompanyId($use->companies->id)->pluck('name', 'id');	
		return view('admin.classesteachers.edit', compact('title', 'class','teacher','classteacher'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $Teachers
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request, Teachers $teacher, $id ){
		
		$data = $request->all();
		unset($data['_token']);	
		unset($data['submit']);
		unset($data['_method']);
	
		$up = Classes_teachers::where('id',$id)->update($data);		
		alert()->success('Success', 'Class  updated!');
		return redirect()->route('admin.class.index',$teacher->id);

	}

		

    /**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Teachers $teacher,Classes_teachers $class)
	{
	
		$class->delete();
		alert()->success('Success', 'Class  deleted!');
		return redirect()->route('admin.class.index',$teacher->id);
	}

 	

}
