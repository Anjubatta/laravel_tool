@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
        <div class="tile-title green">
            <h3>{{ $title['title'] }}</h3>
            <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

    	<div class="tile-body">
    		
    		<p>
    			<strong>Name</strong>: 
	    		{{ $teacher->users->fname }} {{ $teacher->users->lname }} {{ $teacher->surname }}
	    	</p>

	    	<p>
    			<strong>Email</strong>: 
	    		{{ $teacher->users->email }}
	    	</p>

	    	<p>
    			<strong>Address</strong>: 
	    		{{ $teacher->address }}
	    	</p>

	    	<p>
    			<strong>Contact No</strong>: 
	    		{{ $teacher->contactno }}
	    	</p>
            <p>
                <strong>Gender</strong>
                {{ $teacher->gender }}

            </p>
            <p>
                <strong>DOB</strong>
                {{ $teacher->dob }}
            </p>

<a href="" class="btn btn-success addleave"  data-toggle="modal" data-target="#addleave">Add Leave</a>


<!-- Modal -->
<div id="addleave" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"> {{ $teacher->users->fname }} {{ $teacher->users->lname }} Leave Form</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       {!! Form::open(['route' => 'admin.leaves.store']) !!}
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
				<input type="hidden" name="teacher_id" value="{{$teacher->user_id}}" />
				<input type="hidden" name="status" value="pending" />
					<input type="submit" name="submit" value="Submit" class="btn" id="add_leave"  />
				</div>
				
		 {!! Form::close() !!}
      </div>
     
    </div>

  </div>
</div>

    	</div>
    </div>
  </div>
</div>

@stop