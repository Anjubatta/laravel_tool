<?php
	
	namespace App\Http\Controllers\Api;
	
	use App\Models\Classes;
	use App\Models\Attendances;
	use App\Models\Announcements;
	use App\Models\Company;
	use App\Models\Classes_students;
	use App\Models\Parent_relations;
	use App\Models\Students;
	use App\Models\Teachers;
	use App\Models\Parents;
	use App\Models\Classes_teachers;
	use App\Models\Leaves_teachers;
	use App\Models\Appkeys;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\User; 
	use App\Models\Portfoilos;
	use App\Models\Postimages;
	use Illuminate\Support\Facades\Auth; 
	use Validator;
	use DB;
	use DateTime;
	use Illuminate\Support\Facades\Hash;
	use Intervention\Image\ImageManagerStatic as Image;
	
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
				
				
				$comapnyid = $this->companyID($responseData['uid']);
				$admin = Company::where('id',$comapnyid)->first();
				$adminid = $admin->users_id;
				$query = Announcements::query();		
				$query = $query->leftJoin('users as u', 'announcements.users_id',  '=', 'u.id');
				$dataa = $query->whereIn('users_id',[$adminid,$responseData['uid']])->select('announcements.title','announcements.date','announcements.time','announcements.description', 'u.fname', 'u.lname')->orderBy('date', 'desc')->limit(2)->get();
				
				
				foreach($dataa as $val){
					$data[] = array(
					'title'=>$val->title,
					'date'=>strtotime($val->date),
					'description'=>strip_tags($val->description),
					'fname'=>$val->fname,
					'lname'=>$val->lname,
					);
				}
				if(!$data){        
					$data = array();
				}
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$data);
				
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
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);	
				
				$data = Classes::whereCompanyId($comapnyid)->get();
				$class = array();
				foreach($data->all() as $cls){
						$class[] = array(
								'id'=>$cls->id,
								'name'=>$cls->name,
								'session'=>'Morning'
							);
						$class[] = array(
								'id'=>$cls->id,
								'name'=>$cls->name,
								'session'=>'Evening'
							);
					}
					
				if($class){        
					$status = 1;
					$message = 'Success';
					return $this->responseCreated($status,$message,$class);
					
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
				$comapnyid = $this->companyID($users->id);
				
				$query = Students::query();		
				$query = $query->leftJoin('classes_students as c', 'students.id',  '=', 'c.student_id');
				if($class_id){
					$query = $query->Where('c.class_id', $class_id);
				}
				
				$data = $query->Where('companies_id', $comapnyid)->select('students.*', DB::raw('CONCAT("'.$basepath.'/", students.image) AS imagepath'))->get();
				
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
			$att = array();
			$atte = array();
			$basepath = asset('uploads/students'); 
			$key = request('unique_key');
			$student_id = request('student_id');
			$date = (request('date'))?request('date'):date('d-m-Y');
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);
				
				$query = Students::query();		
				$query = $query->leftJoin('classes_students as cs', 'students.id',  '=', 'cs.student_id');				
				
				if($student_id){
					$query = $query->Where('cs.student_id', $student_id);
				}
				
				$data['basic_detail'] = $query->Where('companies_id', $comapnyid)->select('students.*','cs.id as class_detail', DB::raw('CONCAT("'.$basepath.'/", students.image) AS imagepath'))->first();	
				
				$data['class'] = Classes_students::whereId($data['basic_detail']['class_detail'])->select('session','year','class_id')->get();
				
				$query2 = Parent_relations::query();				
				$query2 = $query2->leftJoin('parents as p', 'p.id',  '=', 'parent_relations.parent_id')->whereStudentId($data['basic_detail']['id'])->get();		
				$data['parents'] = $query2;
				
				$attendance = Attendances::whereStudentId($student_id)->where('date',$date)->get();
				
				$i = 0;
				foreach($attendance->all() as $att){
					
					$count = 0;
						if(@$att->temp1){ $count = $count+1; }
						if(@$att->temp2){ $count = $count+1; }
						if(@$att->temp3){ $count = $count+1; }
						$atte[$att->session] = array(
							'temp_count'=>$count,
							'attendance'=>$att,
						);	
							
						$i++;
					}
			
				$data['attendance'] = $atte;
				
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
					if($dataa->roles_id==5){
						$basepath = asset('uploads/parents');
						}
						
					$data = User::whereId($dataa->id)->select('*', DB::raw('CONCAT("'.$basepath.'/", image) AS imagepath'))->first();
					$data['unique_key']=$this->apiKey($dataa->id); 
					$companyid = $this->companyID($dataa->id);
					$data['companydetail'] = Company::whereId($companyid)->select('id','name','id_no')->first();
					
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
			$region = (request('region'))?request('region'):'Asia/Calcutta';
			
			date_default_timezone_set($region);
			$datas = array(	);
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				
				$attendance = Attendances::where('student_id',request('student_id'))->where('session',request('session'))->where('date',date('d-m-Y'))->first();	
				$temp_take_time = date('h:i a', time());
				if(request('pick_by')){
						$status = 'OUT';
					}else{
						$status = 'IN';
					}
					
				if($attendance){
				if(request('temp_count')==1){
						$datas = array(					
							'timein'=>$temp_take_time,
							'temp1'=>request('temp'),
							'session'=>request('session'),
							'send_by'=>request('send_by'),
							'pick_by'=>request('pick_by'),
							'status'=>(request('status'))?request('status'):$status
							);
						}
						
				if(request('temp_count')==2){
						$datas = array(					
							'timeout'=>$temp_take_time,
							'temp2'=>request('temp'),
							'session'=>request('session'),
							'send_by'=>request('send_by'),
							'pick_by'=>request('pick_by'),
							'status'=>(request('status'))?request('status'):$status
							);
						}
					if(request('temp_count')==3){
						$datas = array(					
							'timeout'=>$temp_take_time,
							'temp3'=>request('temp'),
							'session'=>request('session'),
							'send_by'=>request('send_by'),
							'pick_by'=>request('pick_by'),
							'status'=>(request('status'))?request('status'):$status
							);
						}
					
					
					$appdata = Attendances::where('id',$attendance->id)->update($datas);
					$attendanceId = $attendance->id;
					}else{
					
					$create = new Attendances;				
					$create->student_id = request('student_id');
					$create->timein = $temp_take_time;
					$create->temp1 = request('temp');
					$create->session = request('session');	
					$create->send_by = request('send_by');	
					$create->pick_by = request('pick_by');						
					$create->status = (request('status'))?request('status'):'IN';				
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
		
		public function add_attendance1(Request $request)
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
			* teacher list get by class id
		*/
		
		public function get_teacher_list(Request $request)
		{
			$basepath = asset('uploads/profile'); 
			$key = request('unique_key');
			
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);			
				$query = Teachers::query();	
				$data = $query->Where('company_id', $comapnyid)->get();
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
				$deatil = Teachers::whereUsersId($teacher_id)->first();	
				
				if($deatil){
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
					
					$data['class'] = Classes_teachers::whereTeacherId($deatil->id)->select('id','teacher_id','session','class_id')->get();	
					
					
					$data['leave'] = leaves_teachers::whereTeacherId($teacher_id)->get();				
					$status = 1;
					$message = 'Success';
					
				}else{
					$status = 0;
					$message = 'Failed';
					$data = 'Teacher not found. Please check your ID';	
				}
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
				
				$comapnyid = $this->companyID($user->id);
				
				
				if($search){
					$query = $query->Where('surname', 'like', '%'.$search.'%')
					->orWhere('first_name', 'like', '%'.$search.'%')
					->orWhere('middle_name', 'like', '%'.$search.'%')
					->orWhere('student_no', 'like', '%'.$search.'%');
				}
				
				$students = $query->where('cs.class_id',$classs)->whereIn('session', array(ucfirst($session),'Both'))->where('students.companies_id',$comapnyid)->select('students.*','cs.*')->paginate(8);
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
		
		function companyID($uid){			
				$user = User::find($uid);
				if($user->roles_id==2){
						$companyid = $user->companies->id;
					}elseif($user->roles_id==5){
					
						$companyid = $user->parents->companies_id;
					}else{
						$companyid = $user->teachers->company_id;
					}
				return $companyid;
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
		
		
		/**
			* @param $message
			* @return json response
			* parent list get by company id
		*/
		
		public function get_parent_list(Request $request)
		{
			$basepath = asset('uploads/profile'); 
			$key = request('unique_key');
			
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);
				
				$query = Parents::query();	
				$data = $query->Where('companies_id', $comapnyid)->get();
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
			* portfoilo  list get by student id
		*/
	    
		
			public function get_port(Request $request)
		{
			$basepath = asset('uploads/profile'); 
			$key = request('unique_key');
			
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);
				
				$query = Students::query();	
				$data = $query->Where('companies_id', $comapnyid)->Where('id', $request->student_id)->get();
				$status = 1;
				$message = 'Success';
				if(!$data){
					$data = 'No Data Found';
					return $this->responseCreated($status,$message,$data);
				}else{
				    $portfoilos = Portfoilos::whereStudentId($student_id)->get();
				     foreach($portfoilos as $key=>$val){
		 	        $get_image = Postimages::where('portfoilo_id',$val->id)->get();
		 	        $val->images = $get_image;
		 	        $get_teacherdetal = User::where('id',$val->teacher_id)->first();
		 	        $name = $get_teacherdetal->fname .' '. $get_teacherdetal->lname;
		 	        $val->teacher_name = $name;
		             }
		             $data['portfoilos'] = $portfoilos;
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
	
		/**
			* @param $message
			* @return json response
			* portfoilo  list get by student id
		*/
	    
	   public function get_portfiolo(Request $request){
      
      	$student_id = $request->student_id;
      	$portfoilos = Portfoilos::whereStudentId($student_id)->get();
		 if(isset($portfoilos) && !empty($portfoilos)){
		 foreach($portfoilos as $key=>$val){
		 	$get_image = Postimages::where('portfoilo_id',$val->id)->get();
		 	$val->images = $get_image;
		 	$get_teacherdetal = User::where('id',$val->teacher_id)->first();
		 	$name = $get_teacherdetal->fname .' '. $get_teacherdetal->lname;
		 	$val->teacher_name = $name;
		 }

					$status = 0;
					$message = 'Failed';
					$data['portfoilos'] = $portfoilos;
		}else{
					$status = 0;
					$message = 'Failed';
					$data = array();
		}
		return $this->responseCreated($status,$message,$data);
      }	
		
		/**
			* @param $message
			* @return json response
			* portfoilo  list get by student id
		*/
	    
	  public function get_parent_portfolio(Request $request){
	  
			$basepath = asset('uploads/posts/'); 
			$key = request('unique_key');
			$date = request('date');
			
			$datas = array();
			$student = array();
			$responseData = $this->apiKeyValid($key);			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);
				
				$query = Parents::query();	
				$data = $query->Where('users_id', $user->id)->first();
				
				$rel = Parent_relations::where('parent_id',$data->id)->get();	
				
				foreach($rel as $key=>$v){
					$student[] = $v->student_id;
					}
					
				$q = Portfoilos::whereIn('student_id',$student);
				$q = $q->leftJoin('users as u', 'teacher_id',  '=', 'u.id');
				
					if(isset($date) && !empty($date)){
						$date = date('Y-m-d',$date);
						$q = $q->where('post_date',$date);
					} 
				$portfoilos = $q->orderBy('post_date', 'desc')->select('portfoilos.*','u.fname','u.lname')->get();
				
				 if(isset($portfoilos) && !empty($portfoilos)){
				 foreach($portfoilos as $key=>$val){
					
					
					$images = array();
					 foreach($val->portfoilos as $k=>$v){
						$images[] = $basepath.'/'.$v->image;
					 }
					
					 $datas[] = array(
								'portfoilo_id'=>$val->id,
								'teacher_name'=>$val->fname.' '.$val->lname,
								'description'=>$val->post_content,
								'post_date'=>strtotime($val->post_date),
								'images'=>$images
							);
						
				 }
				
		
					
				$status = 1;
				$message = 'Success';
				if(!$datas){
					$datas = 'No Data Found';
				} 
				return $this->responseCreated($status,$message,$datas);
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
      	
      }	
	  
	  }
	  
	  
	  
		/**
			* @param $message
			* @return json response
			* student list get by parent id
		*/
		
		public function get_StudentDetail_for_parents(Request $request)
		{
			$basepath = asset('uploads/profile'); 
			$key = request('unique_key');
			$date = (request('date'))?request('date'):date('d-m-Y');
			$responseData = $this->apiKeyValid($key);
			$atte = array();
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);
				
				$query = Parents::query();	
				$parent = $query->Where('users_id', $user->id)->first();
				
				$rel = Parent_relations::where('parent_id',$parent->id)->get();	
				
				foreach($rel as $key=>$v){					
				
				$query = Students::query();				
				$query = $query->whereId($v->student_id);
				
				$data['basic_detail'] = $query->select('students.*', DB::raw('CONCAT("'.$basepath.'/", students.image) AS imagepath'))->first();	
						
				$data['class'] = Classes_students::leftJoin('classes as c','c.id','=','classes_students.class_id')->whereStudentId($v->student_id)->select('session','year','class_id','c.name')->get();
						
				$query2 = Parent_relations::query();				
				$query2 = $query2->leftJoin('parents as p', 'p.id',  '=', 'parent_relations.parent_id')->whereStudentId($data['basic_detail']['id'])->get();		
				$data['parents'] = $query2;
				
				$attendance = Attendances::whereStudentId($v->student_id)->where('date',$date)->get();
				
				$i = 0;
				foreach($attendance->all() as $att){
					
					$count = 0;
						if(@$att->temp1){ $count = $count+1; }
						if(@$att->temp2){ $count = $count+1; }
						if(@$att->temp3){ $count = $count+1; }
						$atte[$att->session] = array(
							'temp_count'=>$count,
							'attendance'=>$att,
						);	
							
						$i++;
					}
			
				$data['attendance'] = $atte;
				$data['extra_info'] = $this->AttendanceInfo($v->student_id);
				
				}
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
		
		function AttendanceInfo($studentid){
			$student = Students::find($studentid);	
			$company = Company::whereId($student->companies_id)->select('expected_attendance')->first();
		
			 
			$present = $this->present($student->id); 
			$absent = $this->absent($student->id); 
				
			if($company->expected_attendance>0){
				if($present == 0) {
					$percentage=0;
				}else{
				if($absent == 0){
						$percentage = 100;
					}else{
						$answer = ($absent / $present ) * 100;
						$percentage = 100-$answer;
					}
				}
			}else{
				$percentage = 0;
			}
			
		return	$data = array(
						'Expected_Attendance'=>$company->expected_attendance,
						'Health_Check'=>null,
						'High_Temperature'=> $this->heighTemp($studentid),
						'Present' => $present,
						'Absent'=>$absent,
						'Attendance_Percentage'=>$percentage,
						);
			
			}
			
			
function heighTemp($student_id){
	$t1 = Attendances::whereStudentId($student_id)->orderBy('temp1','DESC')->select('temp1')->first();
	
	$t2 = Attendances::whereStudentId($student_id)->orderBy('temp2','DESC')->select('*')->first();
	
	$t3 = Attendances::whereStudentId($student_id)->orderBy('temp3','DESC')->select('temp3')->first();
	
	$temp = array(
				'temp1'=>$t1->temp1,
				'temp2'=>$t2->temp2,
				'temp3'=>$t3->temp3,
				);
				
	return $value = max($temp);
}

function present($student_id){
	 return $present = Attendances::whereStudentId($student_id)->whereIn('status',array('IN','OUT'))->count();	
}

function absent($student_id){
	 return $absent = Attendances::whereStudentId($student_id)->whereIn('status',array('Absent'))->count();	
}


		
		 public function get_teacher_portfolio(Request $request){
	  
			$basepath = asset('uploads/posts/'); 
			$key = request('unique_key');
			$date = request('date');
			
			$datas = array();
			
			$responseData = $this->apiKeyValid($key);
			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);				
				$comapnyid = $this->companyID($user->id);				
				
				$q = Portfoilos::whereTeacherId($user->id);
					if(isset($date) && !empty($date)){
						$date = date('Y-m-d',$date);
						$q = $q->where('post_date',$date);
					} 
					
				$portfoilos = $q->orderBy('post_date', 'desc')->get();
				
				 if(isset($portfoilos) && !empty($portfoilos)){
				 foreach($portfoilos as $key=>$val){
					
					$images = array();
					 foreach($val->portfoilos as $k=>$v){
						$images[] = $basepath.'/'.$v->image;
					 }
					
					 $datas[] = array(
								'portfoilo_id'=>$val->id,
								'teacher_name'=>$user->fname.' '.$user->lname,
								'description'=>$val->post_content,
								'post_date'=>strtotime($val->post_date),
								'images'=>$images
							);
						
				 }
		
					
				$status = 1;
				$message = 'Success';
				if(!$datas){
					$datas = 'No Data Found';
				} 
				return $this->responseCreated($status,$message,$datas);
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
      	
      }	
	  
	  }
	  
	
	
	
public function post_portfolio(Request $request){
			$basepath = asset('uploads/posts/'); 
			$key = request('unique_key');			
			$responseData = $this->apiKeyValid($key);
			
			if($responseData['status']==1){
				$user = User::find($responseData['uid']);
				if($user->roles_id==2 || $user->roles_id==4){
					$comapnyid = $this->companyID($user->id);				
					/***********save portfoilo*******************/
				   $save = new Portfoilos;
				   $save->post_date = date('Y-m-d',$request->post_date);
				   $save->post_content = $request->post_content;
				   $save->student_id = $request->student_id;
				   $save->teacher_id = $user->id;
				   $save->save();
				
				if ($files=$request->file('images')) {
					
						foreach($files as $key=>$file){
					     
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
				$datas = 'Post save successfully';
					/***********save portfoilo*******************/
					
						
					
					if(!$datas){
						$datas = 'No Data Found';
					} 
					
				}else{
					$datas = 'You dont have permission to access this API';
				}
					$status = 1;
					$message = 'Success';
				return $this->responseCreated($status,$message,$datas);
			}
			else{
				return $this->responseCreated($responseData['status'],$responseData['message']);
			}
      	
     
    
}
	
	
		
}
		