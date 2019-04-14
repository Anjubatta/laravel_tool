<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Students;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Portfoilos;
use App\Models\Postimages;
use App\Http\Requests\Admin\PortfoilosRequests;
use Intervention\Image\ImageManagerStatic as Image;

class PortfoliosController extends Controller
{
    const active = 'portfolios';
	const title = 'Portfolios';
	const slug = 'portfolios';

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
	
		$portfoilos = Portfoilos::whereStudentId($student->id)->get();
		 foreach($portfoilos as $key=>$val){
		 	$get_image = Postimages::where('portfoilo_id',$val->id)->get();
		 	$val->images = $get_image;
		 }
		return view('teachers.portfolios.index', compact('title','students','portfoilos'));
	}

	/**
	* Show the form for creating a new students.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create(Students $student)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
	
	

		return view('teachers.portfolios.create', compact('title','student'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param StudentsRequest $request
	* @return void
	*/
	
public function store(Request $request,Students $student){

       $save = new Portfoilos;
       $save->post_date = $request->post_date;
       $save->post_content = $request->post_content;
       $save->student_id = $student->id;
       $save->teacher_id = auth()->user()->id;
       $save->save();
	
 	if ($files=$request->file('images')) {
 		
 			foreach($files as $key=>$file){
 		
			// $request->file('image');        	
			$path = public_path('/uploads/posts/');
        	$image = $save->id.$key.time().'.png';
			$image_path = $path.$image; 
			if (file_exists($image_path)) {
				   @unlink($image_path);
				}
        	Image::make($file)->resize(454,340)->save($path.$image);
        	$create = new Postimages;
        	$create->portfoilo_id = $save->id;
        	$create->image = $image;
        	$create->save();

        }
		
    }

    alert()->success('Success', 'Post Uploaded!');
		return redirect()->route('teacher.portfolios.index', $student->id);
}
	
	public function destroy(Request $request, Students $student, Portfoilos $portfolio){
		$portfolio->delete();
		 alert()->success('Success', 'Post deleted!');
		return redirect()->route('teacher.portfolios.index', $student->id);
	}
	

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	*/
	public function edit( Students $student, Portfoilos $portfolio)
	{

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		
		
		 	$get_image = Postimages::where('portfoilo_id',$portfolio->id)->get();
		 	
		
		return view('teachers.portfolios.edit', compact('title', 'portfolio','student','get_image'));
		}


	/**
	* Update the specified resource in storage.
	*
	* @param AnnouncementsRequest $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response Student_incidents $incident
	*/
	public function update(Request $request, Students $student, Portfoilos $portfolio)
	{	
	
	if($request->deleted_img){
		$imagesDel = explode(",",$request->deleted_img);
		Postimages::whereIn('id',$imagesDel)->delete();
		}
		
 	if ($files=$request->file('images')) {
 		
 			foreach($files as $key=>$file){
 				
			// $request->file('image');        	
			$path = public_path('/uploads/posts/');
        	$image = $portfolio->id.$key.time().'.png';
			$image_path = $path.$image; 
			if (file_exists($image_path)) {
				   @unlink($image_path);
				}
        	Image::make($file)->resize(454,340)->save($path.$image);
        	$create = new Postimages;
        	$create->portfoilo_id = $portfolio->id;
        	$create->image = $image;
        	$create->save();

        }
    }
		$portfolio->update($request->all());
		
		
        $request->session()->flash('success', "portfolio updated!");
        return redirect()->route('teacher.portfolios.index', $student->id);

	}


	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Students $student
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	
}
