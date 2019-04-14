<?php
	
	namespace App\Http\Controllers\Api;
	
	use App\Models\Classes;
	use App\Models\Attendances;
	use App\Models\Announcements;
	use App\Models\Classes_students;
	use App\Models\Parent_relations;
	use App\Models\Students;
	use App\Models\Teachers;
	use App\Models\Classes_teachers;
	use App\Models\Leaves_teachers;
	use App\Models\Appkeys;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\User; 
	use Illuminate\Support\Facades\Auth; 
	use Validator;
	use DB;
	use DateTime;
	use Illuminate\Support\Facades\Hash;
	use Mail;
	
	class AppkeysController extends Controller
	{
		
		/**
			* @param $message
			* @return json response
			* Announcements get
		*/
		
		public function admin_announcement(Request $request)
		{
			$data = array();
			$key = request('unique_key');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				
				$query = Announcements::query();		
				$query = $query->leftJoin('users as u', 'announcements.users_id',  '=', 'u.id');
				$dataa = $query->whereIn('users_id',[1,$responseData['uid']])->select('announcements.title','announcements.date','announcements.time','announcements.description', 'u.fname', 'u.lname')->get();
				foreach($dataa as $val){
					$data[] = array(
					'title'=>$val->title,
					'date'=>strtotime($val->date),
					'description'=>strip_tags($val->description),
					'fname'=>$val->fname,
					'lname'=>$val->lname,
					);
				}
				if($data){        
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$data);	
				} 
				
			}
			else{ 
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		/**
			* @param $message
			* @return json response
			* Classes get
		*/
		
		public function get_classes(Request $request)
		{
			$key = request('unique_key');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$data = Classes::all();
				if($data){        
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$data);
					
				} 				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		
		
		/**
			* @param $message
			* @return json response
			* student list get by class id
		*/
		
		public function get_student_list(Request $request)
		{
			$basepath = asset('uploads/students'); 
			$key = request('unique_key');
			$class_id = request('class_id');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$users = User::find($responseData['uid']);
				
				$query = Students::query();		
				$query = $query->leftJoin('classes_students as c', 'students.id',  '=', 'c.student_id');
				if($class_id){
					$query = $query->Where('c.class_id', $class_id);
				}
				
				$data = $query->Where('companies_id', $users->companies->id)->select('students.*', DB::raw('CONCAT("'.$basepath.'/", students.image) AS imagepath'))->get();
				
				if($data){        
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$data);
					
				} 				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		
		
		/**
			* @param $message
			* @return json response
			* student list get by class id
		*/
		
		public function get_student_detail(Request $request)
		{
			$basepath = asset('uploads/students'); 
			$key = request('unique_key');
			$student_id = request('student_id');
			$date = (request('date'))?request('date'):date('d-m-Y');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$users = User::find($responseData['uid']);
				
				$query = Students::query();		
				$query = $query->leftJoin('classes_students as cs', 'students.id',  '=', 'cs.student_id');				
				
				if($student_id){
					$query = $query->Where('cs.student_id', $student_id);
				}
				
				$data['basic_detail'] = $query->Where('companies_id', $users->companies->id)->select('students.*','cs.id as class_detail', DB::raw('CONCAT("'.$basepath.'/", students.image) AS imagepath'))->first();	
				
				$data['class'] = Classes_students::whereId($data['basic_detail']['class_detail'])->select('session','year','class_id')->get();
				
				$query2 = Parent_relations::query();				
				$query2 = $query2->leftJoin('parents as p', 'p.id',  '=', 'parent_relations.parent_id')->whereStudentId($data['basic_detail']['id'])->get();		
				$data['parents'] = $query2;
			
				$attendance = Attendances::whereStudentId($student_id)->where('date',$date)->first();
				$count = 0;
				if(@$attendance->temp1){ $count = $count+1; }
				if(@$attendance->temp2){ $count = $count+1; }
				if(@$attendance->temp3){ $count = $count+1; }
				$attendance['temp_count'] = $count;
				$data['attendance'] = $attendance;
				
				
				if($data){        
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$data);
					
				} 				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		/**
			* @param $message
			* @return json response
			* student list get by class id
		*/
		
		public function get_student_attendance(Request $request)
		{
			$basepath = asset('uploads/students'); 
			$key = request('unique_key');
			$student_id = request('student_id');
			$date = request('date');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$users = User::find($responseData['uid']);
				$status = 1;
				$message = 'Success';
				$data = Attendances::whereStudentId($student_id)->get();	
				if(!$data){ 
					$data = 'No Attendance Found';
				} 
				return $this->responseCreated($status,$message,$data);
				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		
		
		/**
			* Login.
			* Response API Key
			* @return \Illuminate\Http\Response
		*/
		
		
		public function login(Request $request){ 
			$basepath = asset('uploads/profile'); 
			$rules = array (
            'email' => 'required|email',
            'password' => 'required',
			);
			$validator = Validator::make($request->all(), $rules);
			if ($validator-> fails()){           
				$message = 'Fields Validation Failed.';
				return $this->responseCreated(0,$message);
			}
			else{
				if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
					$dataa = Auth::user();
					$data = User::whereId($dataa->id)->select('*', DB::raw('CONCAT("'.$basepath.'/", image) AS imagepath'))->first();
					$data['unique_key']=$this->apiKey($dataa->id); 
					$message = 'Successfully Login.';
					return $this->responseCreated(1,$message,$data);
				} 
				else{ 
					$message = 'User credential is not valid.';
					return $this->responseCreated(0,$message);
				} 
				
			}
		}
		/**
			* @param $message
			* @return json response
			* Add Student Attendance and Temp.
		*/
		
		public function add_attendance(Request $request)
		{
			$key = request('unique_key');
			
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				
				$attendance = Attendances::where('student_id',request('student_id'))->where('session',request('session'))->where('date',date('d-m-Y'))->first();			
				if($attendance){
					$data = array(
					'timein'=>request('timein'),
					'timeout'=>request('timeout'),
					'temp1'=>request('temp1'),
					'temp2'=>request('temp2'),
					'temp3'=>request('temp3'),
					'session'=>request('session'),
					'status'=>request('status'),
					);
					$appdata = Attendances::where('id',$attendance->id)->update($data);
					$attendanceId = $attendance->id;
					}else{
					
					$create = new Attendances;				
					$create->student_id = request('student_id');
					$create->timein = request('timein');
					$create->timeout = request('timeout');
					$create->temp1 = request('temp1');				
					$create->temp2 = request('temp2');				
					$create->temp3 = request('temp3');				
					$create->session = request('session');				
					$create->status = request('status');				
					$create->date = date('d-m-Y');				
					$create->save();
					$attendanceId = $create->id;
				}
				
				
				if($attendanceId){  
					$data = Attendances::whereId($attendanceId)->get();
					
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$data);
				} 				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		
		
		
		/**
			* @param $message
			* @return json response
			* student list get by class id
		*/
		
		public function get_teacher_list(Request $request)
		{
			$basepath = asset('uploads/profile'); 
			$key = request('unique_key');
			
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$users = User::find($responseData['uid']);				
				$query = Teachers::query();	
				$data = $query->Where('company_id', $users->companies->id)->get();
				$status = 1;
				$message = 'Success';
				if(!$data){
					$data = 'No Data Found';
				} 
				return $this->responseCreated($status,$message,$data);
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		
		
		/**
			* @param $message
			* @return json response
			* teacher detail get by teacher id
		*/
		
		public function get_teacher_detail(Request $request)
		{
			$basepath = asset('uploads/profile'); 
			$key = request('unique_key');
			$teacher_id = request('teacher_id');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$users = User::find($responseData['uid']);
				$deatil = Teachers::whereId($teacher_id)->first();	
$age = date_diff(date_create($deatil->dob), date_create('today'))->y; 
				$data['teacher_deatil'] = array(
												'id'=>$deatil->id,
												'users_id'=>$deatil->users_id,
												'company_id'=>$deatil->company_id,
												'id_no'=>$deatil->id_no,
												'surname'=>$deatil->surname,
												'contactno'=>$deatil->contactno,
												'dob'=>date('F d, Y',strtotime($deatil->dob)),
												'age'=>$age,
												'address'=>$deatil->address,
												'gender'=>$deatil->gender
											);			
				$data['basic'] = User::whereId($deatil->users_id)->select('*', DB::raw('CONCAT("'.$basepath.'/", image) AS imagepath'))->first();
				
				$data['class'] = Classes_teachers::whereTeacherId($teacher_id)->select('id','teacher_id','session','class_id')->get();	
				
				
				$data['leave'] = leaves_teachers::whereTeacherId($teacher_id)->get();				
				$status = 1;
				$message = 'Success';	
				if(!$data){        
					$data = 'Teacher not found';				
				} 
				return $this->responseCreated($status,$message,$data);
				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
			
		}
		
		
		
		
		/**		
			/* check valid API key		
		*/
		
		public function apiKeyValid($key){	
			//echo $key; exit;
			if($key){
				$appkey = Appkeys::where('unique_key',$key)->where('login_status',"1")->first();
				if($appkey){
					$data = array(
					'status'=>1,
					'message'=>'API Key valid.',
					'uid'=>$appkey->users_id
					);					
				}
				else{
					
					$data = array(
					'status'=>0,
					'message'=>'API Key is not valid.',
					'uid'=>null
					);
				}
			}
			else{
				$data = array(
				'status'=>0,
				'message'=>'API Key required.',
				'uid'=>null
				);				
			}
			return $data;
			
		}
		
		/**		
			* Response API Key Gengrate Function
			/* Update if exits
		*/
		public function apiKey($uid){
			$appkey = Appkeys::whereUsersId($uid)->first();
			if($appkey){	
				$appdata = Appkeys::where('users_id',$uid)->update(array('login_status'=>'1'));
				return $appkey->unique_key;
				}else{
				$token = bin2hex(openssl_random_pseudo_bytes(5)).time();		
				$create = new Appkeys;
				$create->users_id = $uid;
				$create->unique_key = $token;
				$create->login_status = '1';		
				$create->save();
				return $token;
			}  
		}
		
		public function responseCreated($status, $message, $data=null){	
			return response()->json([
            'status' => $status,           
            'message' => $message,
            'data' => $data
			]); 
			
		}
		
public function attendance(Request $request)
	{
	$key = request('unique_key');
	$responseData = $this->apiKeyValid($key);			
	if($responseData['status']==1){
			
		$data = array();
		$search = $request->search;
		$classs = $request->class_id; 
		$date = @($request->date) ? date('d-m-Y',strtotime($request->date)) : date('d-m-Y');
		$session = @($request->session) ? $request->session : 'morning';
		
		$query = Students::query();
		$query = $query->leftJoin('classes_students as cs', 'students.id',  '=', 'cs.student_id');
	
		$user = User::find($responseData['uid']);
		
		
		if($search){
				$query = $query->Where('surname', 'like', '%'.$search.'%')
				->orWhere('first_name', 'like', '%'.$search.'%')
				->orWhere('middle_name', 'like', '%'.$search.'%')
				->orWhere('student_no', 'like', '%'.$search.'%');
			}
			
		$students = $query->where('cs.class_id',$classs)->whereIn('session', array(ucfirst($session),'Both'))->where('students.companies_id',$user->companies->id)->select('students.*','cs.*')->paginate(8);
		$data['request'] = array(
			'attendance_date'=>$date,
			'session'=>$session,
			'class_id'=>$classs,
							);

		foreach($students as $i => $attend){
		
				$attendance=(attendance($attend, $date, $session));										
				$data['attendance'][] = array(
					'full_name'=>$attend->first_name.' '.$attend->middle_name,
					'Time_In'=>@($attendance->timein)?@$attendance->timein:'Absent',
					'out'=>@($attendance->timeout)?@$attendance->timeout:'Absent',
					'student_id'=>@$attend->student_id,					
					'temp1'=>@($attendance->temp1)?@$attendance->temp1:'-',				
					'temp2'=>@($attendance->temp2)?@$attendance->temp2:'-',
					'temp3'=>@($attendance->temp3)?@$attendance->temp3:'-',
					'status'=>@($attendance->status)?@$attendance->status:'Absent',
					'session'=>@$session
					);
						
				}
				$status = 1;
				$message = 'Success';	
				if(!$data){        
					$data = 'Data not found';				
				} 
				return $this->responseCreated($status,$message,$data);
				
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
	}
	
		public function passwordreset(Request $request)
		{
			
			$key = request('unique_key');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$rules = array (
				'email' => 'required|email',
				);
				$validator = Validator::make($request->all(), $rules);
				if ($validator-> fails()){           
					$message = 'Fields Validation Failed.';
					return $this->responseCreated(0,$message);
				}
				else{
					
					$users = User::where('email',$request->email)->first();
					
					if($users){
						$data = array(); 
						$pass = str_random(8);
						$hashed_random_password = Hash::make($pass);
						$datas = array(
						'password'=>$hashed_random_password,
						);
						$appdata = User::where('id',$users->id)->update($datas);
						$status = 1;
						$message = 'Success';
						$data = 'password update successfully';
						
						$this->send_mail($pass,$users->email);
						
						}else{
						$status = 0;
						$message = 'Failed';
						$data = 'Email Id not register';
					}
					
					return $this->responseCreated($status,$message,$data);
					
				}
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
		}
		
		
		static function send_mail($password,$email){
				
			$data = array(
					'email'=>$email,
					'password'=>$password,
				 );
			  Mail::send('emails.resetpassAPI', $data, function($message) use ($data) {
				 $message->to($data['email'], 'New password child care')->subject
					('New password child care');
				 $message->from('paradistester@gmail.com',$data['email']);
			  });
	  
		}
		
		
		
	}
