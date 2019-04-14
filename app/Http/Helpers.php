<?php
	
	
	function checkPermission($permissions){
		$userAccess = getMyPermission(auth()->user()->roles_id);
		foreach ($permissions as $key => $value) {
			if($value == $userAccess){
				return true;
			}
		}
		return false;
	}

	function getMyPermission($id) {
		switch ($id) {
			case 1:
				return 'superadmin';
			break;
			case 2:
				return 'admin';
			break;
			case 3:
				return 'management';
			break;
			case 4:
				return 'teacher';
			break;
			case 5:
				return 'parents';
			break;
		}
	}
  
	

	
	function attendance($student, $date, $session){
	
		$attend = \App\Models\Attendances::whereStudentId($student->student_id)->where('date', $date)->whereSession($session)->first();		
		return $attend;
	}
	
	
	function getFees($student, $res){
		$data = \App\Models\Student_fees::whereStudentId($student)->whereYear('for_month', $res['year'])->whereMonth('for_month', $res['month'])->first();
		return $data;
	}
	
	function defaultFees(){
			$fee = array(
						 'amount'=>200,
						 'due_date'=>date('m/24/Y'),
						);
			return $fee;
		}
	function parentName($id){
			$data = \App\Models\Parents::whereId($id)->first();
			return $data['first_name'].' '.$data['middle_name'];
		}
	
 ?>
