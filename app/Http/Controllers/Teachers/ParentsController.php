<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Http\Requests\Admin\ParentsRequest;
use App\Models\Teachers;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use App\Models\Parent_relations;
class ParentsController extends Controller
{
    

    const active = 'parents';
	const title = 'Parents';
	const slug = 'parents';

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

      	$get_teacher = Teachers::where('users_id',auth()->user()->id)->first();
		$company_id = $get_teacher->company_id;
		$parents = Parents::where('companies_id',$company_id)->get();

		return view('teachers.parents.index', compact('title','parents'));

	}

	 /**
	* Show the form for creating a new Parents.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create(){
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);

		return view('teachers.parents.create',compact('title'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	public function store(ParentsRequest $request)
	{
		//print_r($request->all());
		//die();

		$image = '';
		if ($request->file('image')) {
			$request->file('image');
        	$path = public_path('uploads/parents/');
        	$image = time().'.png';
        	Image::make($request->file('image'))->resize(1200, 400)->save($path.$image);

        }

		$users = User::find(auth()->user()->id);
		$create = new Parents;

		$create->users_id = $users->id;
		$get_teacher = Teachers::where('users_id',auth()->user()->id)->first();
		$company_id = $get_teacher->company_id;
		$create->companies_id = $company_id;		
		$create->sur_name = $request->sur_name;
		$create->first_name = $request->first_name;
		$create->middle_name = $request->middle_name;
		$create->parent_id = $request->parent_id;
		$create->contact_no = $request->contact_no;	
		$create->address = $request->address;
		$create->gender = $request->gender;
		$create->active = $request->active;
		$create->email = $request->email;
		$create->relation = $request->relation;
		$create->age = $request->age;
		if ($request->file('image')) {
		$create->image = $image;
	   }
		$create->save();

		alert()->success('Success', 'Parent '.$create->first_name.' created!');
		return redirect()->route('teacher.parents.index');
	}


	/**
	* Show the form for show the specified resource.
	*
	* @param  \App\Models\Students $students
	* @return \Illuminate\Http\Response
	*/
	public function show(Parents $parent)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);

		$parent_rel = Parent_relations::where('parent_id',$parent->id)->get();
		return view('teachers.parents.show', compact('title', 'parent','parent_rel'));
	}


	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit(Parents $parent)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('teachers.parents.edit', compact('title', 'parent'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function update(ParentsRequest $request, Parents $parent)
	{
		// print_r($request->all());
		// die();
		

		//$student->update($request->all());
	 if ($request->file('image')) {
			$request->file('image');
        	$path = public_path('uploads/parents/');
        	$image = time().$parent->id.'.png';
        	
        	Image::make($request->file('image'))->resize(1200, 400)->save($path.$image);
        }
			$update = new Parents;
			$update->exists = true;
			$update->id = $parent->id;
			if ($request->file('image')) {
				$update->image = $image;
			}
			$update->sur_name = $request->sur_name;
			$update->first_name = $request->first_name;
			$update->middle_name = $request->middle_name;
			$update->parent_id = $request->parent_id;
			$update->address = $request->address;
			$update->age = $request->age;
			$update->email = $request->email;
			$update->relation = $request->relation;
			$update->update();

        $request->session()->flash('success', "Parent {$parent->title} updated!");
        return redirect()->route('teacher.parents.index');

	}

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/

	public function destroy(Request $request, Parents $parent){
		$request->session()->flash('error', "Parents {$parent->first_name} deleted!");
		$parent->delete();
		return redirect()->route('teacher.parents.index');
	}
	


}
