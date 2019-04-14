@extends('layouts.admin')
@section('content')

<div class="white_wrapper">
	<section class="Record">
		<div class="row">
			<div class="col-md-3 profile">
				<img src="{{ asset('img/profile.png')}}" alt="profile"/>
			</div>
			<div class="col-md-9">
				<div class="detail">			
					<h4><span class="title">Full Name:</span> <span>{{ $teacher->users->fname }} {{ $teacher->users->lname }} {{ $teacher->surname }}</span></h4>
					<h4><span class="title">ID NO:</span> <span>{{ $teacher->id_no }}</span></h4>
					<h4><span class="title">Contact NO:</span> <span>{{ $teacher->contactno }}</span></h4>
					
					
					<a href="{{ route('admin.leaves.index', $teacher->id) }}" class="btn btn-primary view-btn leave mb-2">View Leaves</a>
					
					<a class="btn btn-primary view-btn classes"  role="button" href="{{ route('admin.class.index', $teacher->id) }}">View Classes</a>
				</div>
			</div>
		</div>
	</section>
	
	<section class="personal">	 
		<h2 class="heading"><span>Personal Informations</span></h2>
		<div class="personal_data">
			<div class="row mb-3">
				<div class="col-sm col-md-4">
					<h4>Surname:</h4>
					<h3>{{ $teacher->surname }}</h3>
				</div>
				<div class="col-sm col-md-4">
					<h4>First Name:</h4>
					<h3>{{ $teacher->users->fname }}</h3>
				</div>
				<div class="col-sm col-md-4">
					<h4>Middle Name:</h4>
					<h3>{{ $teacher->users->lname }}</h3>
				</div>
			</div>
			
			<div class="row mb-3" >
				<div class="col-sm col-md-4">
					<h4>Birthdate:</h4>
					<h3>{{ $teacher->dob }}</h3>
				</div>
				<div class="col-sm col-md-4">
					<h4>Age:</h4>
					<h3>51 Years old</h3>
					</div>
				<div class="col-sm col-md-4">
					<h4>Gender:</h4>
					<h3>{{ $teacher->gender }}</h3>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm col-md-12">
					<h4>Address:</h4>
					<h3>{{ $teacher->address }}</h3>
				</div>
				
				
			</div>
		</div>
	</section>	
	<form action="{{ route('admin.ratingadd', $teacher->id) }}" method="post">
	@csrf
	<section class="observation">
		<h2 class="heading"><span>Observation</span></h2>
		<ul class="d-flex  list-unstyled excellent" >
			<li><span class="orange">1.</span> Excellent, Meets Expectations</li>
			<li><span class="orange">2.</span>Satisfactory</li>
			<li><span class="orange">3.</span> Needs Improvement</li>
		</ul>
		<div class="classroom">
			
		</div>
		
		<div id="accordion">
		@foreach($rating_headings as $i => $heading)
			<div class="card">
			
				<div class="card-header" id="headingOne">
					<h5 class="mb-2 accord-title">
						<span class="flex-9">{{$heading->name}}</span>
						<span class="flex-3">RATING<button type="button" class="btn btn-link rating float-right" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</button></span> 
						
					</h5>
				</div>
				
				<div id="collapseOne{{$i}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
						
						@foreach($heading->rating_options as $option)
						
						<div class="row">
							<div class="col-md-8 col-x-12"><p>{{$option->name}}</p></div>
							<div class="col-md-4 col-x-12">						
								<div class="form-check form-check-inline">
									
									@if(count($rating_teachers)>0)
									@foreach($rating_teachers as $rate)
									@if($rate->rating_options_id==$option->id)
									<label class="rating_radio"><span class="nm">1</span>
										<input type="radio" {{ ($rate->rate=='Excellent')?'checked':'' }} name="rating[{{$option->id}}]" value="Excellent">
										<span class="checkmark"></span>
									</label>
									
									<label class="rating_radio"><span class="nm">2</span>
										<input type="radio" {{ ($rate->rate=='Satisfactory')?'checked':'' }} name="rating[{{$option->id}}]" value="Satisfactory">
										<span class="checkmark"></span>
									</label>
									
									<label class="rating_radio"><span class="nm">3</span>
										<input type="radio" {{ ($rate->rate=='Needs Improvement')?'checked':'' }} name="rating[{{$option->id}}]" value="Needs Improvement">
										<span class="checkmark"></span>
									</label>
									@endif
									@endforeach
									
									@else
										
									<label class="rating_radio"><span class="nm">1</span>
										<input type="radio" name="rating[{{$option->id}}]" value="Excellent">
										<span class="checkmark"></span>
									</label>
									
									<label class="rating_radio"><span class="nm">2</span>
										<input type="radio" name="rating[{{$option->id}}]" value="Satisfactory">
										<span class="checkmark"></span>
									</label>
									
									<label class="rating_radio"><span class="nm">3</span>
										<input type="radio" name="rating[{{$option->id}}]" value="Needs Improvement">
										<span class="checkmark"></span>
									</label>								
									@endif																
								</div>		
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		@endforeach	
			
			
		</div>
		<input type="hidden" name="teacher_id" value="{{$teacher->id}}" />
		<div class="tile-footer">
		<button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

		<a class="btn btn-secondary" href="{{ route('admin.teachers.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
	  </div>
	</section>	
	</form>

<!-- Modal start-->
<div id="addleave" class="modal fade" role="dialog">
	<div class="modal-dialog">
	
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			
			<h4 class="modal-title"> {{ $teacher->users->fname }} {{ $teacher->users->lname }} Leave Form</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			{!! Form::open(['route' => ['admin.leaves.store', $teacher->id]]) !!}
			<div class="form-group">
				<label>Leave Name:</label>
				<div class="form-fields">
					<select name="leave_name_id" class="form-control">
						@foreach($leaves_name as $i => $leave)
						<option value="{{$leave->id}}">{{$leave->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Leave Type:</label>
				<div class="form-fields">
					<select name="leave_type_id" class="form-control">
						@foreach($leaves_type as $i => $lt)
						<option value="{{$lt->id}}">{{$lt->type}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Leave Unit:</label>
				<div class="form-fields leave_unit">
					<input type="radio" name="leave_unit" value="days" checked /> Days
					<input type="radio" name="leave_unit" value="hours" /> Hours
				</div>
			</div>
			<div class="form-group">
				
				<div class="form-fields days_show">
					<div class="form-fields">
						<label>From Date:</label>
						<input type="text" name="from_date" value=""  class="datepicker"/>
						<label>To Date:</label>
						<input type="text" name="to_date" value=""  class="datepicker"/>
					</div>
				</div>
				<div class="form-fields time_show" style="display:none;">
					<div class="form-fields">
						<label>From Time:</label>
						<input type="text" name="from_time" value=""  class="timepicker"/>
						<label>To Time:</label>
						<input type="text" name="to_time" value="" class="timepicker"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Reason:</label>
				<div class="form-fields">
					<textarea name="reason" placeholder="I need to see the doctor."></textarea>
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" name="teacher_id" value="{{$teacher->id}}" />
				<input type="hidden" name="status" value="pending" />
				<input type="submit" name="submit" value="Submit" class="btn" id="add_leave"  />
			</div>
			
			{!! Form::close() !!}
		</div>		
	</div>	
</div>
</div>

<!-- Modal end-->
</div>
@stop