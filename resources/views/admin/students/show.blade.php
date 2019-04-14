@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
        <div class="tile-title green">
            <h3>{{ $title['title'] }}</h3>
            <a href="{{ route('admin.students.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>
		
		  <div class="white_wrapper">
            <section class="Record">
                <div class="row">
                    <div class="col-md-3 profile">
                       @if($student->image)
        <span class="show-image">
            <img src="{{ asset('uploads/students/'.$student->image) }}">
        </span>
		@else
			 <img src="{{ asset('uploads/students/profile.png') }}">
        @endif
             </div>
						<div class="col-md-9">
                            <div class="detail">           
                                        <h4><span class="title">Full Name:</span> <span class="orange_detail">{{ $student->first_name}} {{$student->middle_name}} {{$student->surname }}</span></h4>
                                        <h4><span class="title">ID NO:</span> <span class="orange_detail">{{ $student->student_no }}</span></h4>
                                        <h4><span class="title">Contact NO:</span> <span class="orange_detail">{{ $student->contact_no }}</span></h4>
                                        <h4><span class="title">Mother:</span> <span class="orange_detail">Joy De Guzman Prestoza</span></h4>
										 <h4>
											 <span class="title">Class:</span> 
											 <span class="orange_detail">
											 {{@$student->classes_students->classes->name}}	 
											</span>
										</h4>
										
										
										 <h4>
											 <span class="title">Session:</span> 
											 <span class="orange_detail">						 {{@$student->classes_students->session}}	 
											</span>
										</h4>
										 
                                        <!--<select class="form-control profile-select" id="" style="text-align:center; ">
                                      <option>Profile</option>
                                      <option>Profile</option>
                                      <option>Incident Report</option>
                                      <option>Admin. of Medicine</option>
                                      <option>Deviation Menu</option>
                                      <option>Food & Drug Allergy</option>
                                        </select>-->
                                    <div class="nav-item dropdown profile-select"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                                      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
									<a class="dropdown-item" href="{{ route('admin.incidents.index',$student->id) }}">Incident Report</a>
									<a class="dropdown-item" href="{{ route('admin.medicines.index',$student->id) }}">Admin. of Medicine</a>
									<a class="dropdown-item" href="{{ route('admin.deviations.index',$student->id) }}">Deviation Menu</a>
									<a class="dropdown-item" href="{{ route('admin.fooddrugs.index',$student->id) }}">Food & Drug Allergy</a>

									<a class="dropdown-item" href="{{ route('admin.portfolios.index',$student->id) }}">Portfolios</a>

                                    </div>
                                    </div>
                                        
                            </div>
                    </div>
                </div>
            </section>

            @include('admin.students.partials.student_profile')
   	</div>
    </div>
  </div>
</div>
@stop