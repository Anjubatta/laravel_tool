<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfoilos;
use App\Models\Students;
use App\Models\Postimages;
use App\Http\Requests\Admin\PortfoilosRequests;
use Intervention\Image\ImageManagerStatic as Image;
class PortfoilosController extends Controller
{
     const active = 'portfoilos';
	 const title = 'Portfoilos';
	 const slug = 'portfoilos';

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
		
		//$students = Students::whereId($student->id)->first();
	
		$portfoilos = Portfoilos::whereStudentId($student->id)->get();
		 foreach($portfoilos as $key=>$val){
		 	$get_image = Postimages::where('portfoilo_id',$val->id)->get();
		 	$val->images = $get_image;
		 }
		 // print_r($portfoilos);
		 // die();
		return view('teachers.portfoilos.create', compact('title','portfoilos','student'));
	}
	/**
	* Show the form for creating a new students.
	*
	* @return \Illuminate\Http\Response
	*/
  
	public function create(Students $student){

		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);	
		return view('teachers.portfoilos.create', compact('title','student'));

	}
  public function store(Request $request,Students $student){

       $save = new Portfoilos;
       $save->post_date = $request->post_date;
       $save->post_content = $request->post_content;
       $save->student_id = $student->id;
       $save->teacher_id = auth()->user()->id;
       $save->save();

 		if ($files=$request->file('images')) {
 			
 			foreach($files as $file){
 				
			// $request->file('image');        	
			$path = public_path('/uploads/posts/');
        	$image = time().'.png';
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
		return redirect()->route('teacher.portfoilo.index', $student->id);
}
	
	public function destroy(Request $request,Students $student,Portfoilos $portfoilo){
		$request->session()->flash('error', "portfoilo deleted!");
		$portfoilo->delete();
		
		return redirect()->route('teacher.portfoilo.index', $student->id);
	}
}
