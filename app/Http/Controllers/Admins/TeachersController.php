<?php
namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Teachers;

use App\Models\Leaves_types;
use App\Models\Leaves_names;
use App\Models\Rating_options;
use App\Models\Rating_headings;
use App\Models\Rating_teachers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeachersRequest;

use Mail;

class TeachersController extends Controller
{
    const active = 'teachers';
	const title = 'Teachers';
	const slug = 'teachers';
	
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
		//$teachers = Teachers::all();
		$search = $request->search;
		$use = auth()->user();
		$use->companies->id;
		if($search){
			$teachers = Teachers::query()
			->leftJoin('users as b', 'users_id',  '=', 'b.id')
			->where('b.fname', 'like', '%'.$search.'%')
			->orWhere('b.lname', 'like', '%'.$search.'%')
			->orWhere('surname', 'like', '%'.$search.'%')
			->orWhere('id_no', 'like', '%'.$search.'%')
			->select(['teachers.*'])
			->paginate(8);			
		}
		else{
			$teachers = Teachers::whereCompanyId($use->companies->id)->paginate(8);
		}
		
		return view('admin.teachers.index', compact('title','teachers', 'search'));
	}


/**
	* Show the form for creating a new announcements.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('admin.teachers.create', compact('title'));
	}

public function store(TeachersRequest $request)
	{
		$use = auth()->user();
		$fname = $request->fname;
		$lname = $request->lname;

		$verify = md5( time() . $request->email);
		//insert into users table
		$user = new User;
		$user->roles_id = 4;
		$user->fname = $fname;
		$user->lname = $lname;
		$user->email = $request->email;
		$user->verify = $verify;
		$user->image = 'avatar.png';
		$user->save();
		$create = new Teachers;
		$create->company_id = $use->companies->id;
		$create->users_id = $user->id;	
		$create->surname = $request->surname;	
		$create->id_no = $request->id_no;
		$create->contactno = $request->contactno;
		$create->address = $request->address;
		$create->dob = $request->dob;	
		$create->gender = $request->gender;	
		$create->active = $request->active;
		$create->save();
	
		//send email
		self::send_mail($create->id);

		//alert()->success('Success', 'Company '.$create->name.' created!');
		return redirect()->route('admin.teachers.index', $create->id);
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	*/
	public function edit(Teachers $teacher)
	{
		
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);

		$teacher->email = $teacher->users->email;
		$teacher->fname = $teacher->users->fname;
		$teacher->lname = $teacher->users->lname;

		return view('admin.teachers.edit', compact('title', 'teacher'));
	

	}


	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $Teachers
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request , Teachers $teacher){
		//print_r($request->all());
		//die();
		$teacher->update($request->all());
		$user_id  = $teacher->users_id;
		$up = User::where('id',$user_id)->update(array('fname'=>$request->fname,'lname'=>$request->lname));
		alert()->success('Success', 'Teachers'.$teacher->users->fname.' updated!');
		return redirect()->route('admin.teachers.index');

	}

	/**
	* send email to admin account registration
	*
	* @return \Illuminate\Http\Response
	*/
	static function send_mail($teacher_id){
		$teachers = Teachers::find($teacher_id);
		$user = $teachers->users;

		$data = array('teachers'=>$teachers, 'user'=>$user);
		Mail::send('emails.create_teachers', $data, function($message) use($user){
			$message->to($user->email, $user->fname.' '.$user->lname)
			->subject('Registration with Child Care');
		});
	}

    /**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Teachers $teacher
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Teachers $teacher)
	{
		$users_id = $teacher->users_id;
		alert()->success('Success', 'Teachers'.$teacher->users->fname.' updated!');
		$teacher->delete();
		$del = User::where('id', $users_id)->delete();
		return redirect()->route('admin.teachers.index');
	}

 	/**
	* Show the form for show the specified resource.
	*
	* @param  \App\Models\Announcements $announcement
	* @return \Illuminate\Http\Response
	*/
	public function show(Teachers $teacher)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$leaves_type = Leaves_types::all();
		$leaves_name = Leaves_names::all();
		$rating_teachers = Rating_teachers::whereTeacherId($teacher->id)->get();
		
		
		$rating_headings = Rating_headings::all();
		
		//$rate = array();
		/*$i = 0;
		foreach($rating_headings as $key=> $h){
			$rating_options = Rating_options::where('rating_headings_id',$h->id)->get();
			$rating = array();
			$rating['heading'] = $h->name;
			
			foreach($rating_options as $k=> $op){
			
			$Rating_teachers = Rating_teachers::whereTeacherId($teacher->id)->whereRatingOptionsId($op->id)->first();
		//	echo '<pre>'; print_r($Rating_teachers); echo '</pre>';
				$rating['option'][$op->id][] = $op->name;
			    $rating['option'][$op->id]['check'] = $Rating_teachers->rate;
		
			}
			$rate[] = $rating;
			
		}
		//echo '<pre>'; print_r($Rating_teachers->all()); echo '</pre>';
		echo '<pre>'; print_r($rate); echo '</pre>';exit;*/
		return view('admin.teachers.show', compact('title', 'teacher','leaves_type','leaves_name','rating_headings', 'rating_teachers'));
	}
	
public function ratingadd(Request $request,Teachers $teacher)
	{
	
		$rating_teachers = Rating_teachers::whereTeacherId($teacher->id)->get();
		if($rating_teachers->all()){
		foreach($request->rating as $key=>$val){
					$up = Rating_teachers::where('teacher_id',$teacher->id)->where('rating_options_id',$key)->update(array('rate'=>$val));
				}	
				alert()->success('Success', 'Rating Updated!');
			}else{
				foreach($request->rating as $key=>$val){
					$create = new Rating_teachers;
					$create->rating_by = auth()->user()->id;
					$create->rating_options_id = $key;
					$create->rate = $val;
					$create->teacher_id = $request->teacher_id;
					$create->save();
				}
				alert()->success('Success', 'Rating submitted!');
			}
		
		
		
		return redirect()->route('admin.teachers.show', $teacher->id);
	}

}
