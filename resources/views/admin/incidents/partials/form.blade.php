
	  <div class="row tution_detail">
		<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Child's Name:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
				 <input type="text" class="form-control" value="{{$student->first_name}} {{$student->middel_name}}" >
				 <input type="hidden" class="form-control" name="student_id" value="{{$student->id}}" >
				 
				</div>
			  </div>
		</div>
		
		<div class="col-md-12 col-lg-6 col-sm-12">
			  <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Age:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
				   <input class="form-control"  type="text" value="{{$age}}">
				</div>
			  </div>
		</div>
		
		</div>
		
		<div class="row tution_detail">
		<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Date:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
				 {!! Form::text('date', null, ['class' => 'form-control datetimepicker' . ($errors->has('date') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('date', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
		<div class="col-md-12 col-lg-6 col-sm-12">
			  <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Time:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
				   {!! Form::text('time', null, ['class' => 'form-control timepicker' . ($errors->has('time') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('time', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Staff Present:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				{!! Form::text('staff_present', null, ['class' => 'form-control' . ($errors->has('staff_present') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('staff_present', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Type of Incident:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				   <div class="form-check form-check-inline">
									<label class="rating_radio"><span class="nm">Incident</span>
									   {!! Form::radio('type_of_incident', 'incident') !!}
									  <span class="checkmark"></span>
									</label>
									<label class="rating_radio"><span class="nm">Accident</span>
									  {!! Form::radio('type_of_incident', 'accident') !!}
									  <span class="checkmark"></span>
									</label>
									
									</div>
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-5">Location where the incident/accident occurred:</label>
				<div class="col-sm-12 col-md-6 col-lg-6">
				  {!! Form::text('location', null, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('location', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Equipment involved:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('equipment', null, ['class' => 'form-control' . ($errors->has('equipment') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('equipment', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
	</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Part of the body involved:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('part_of_body', null, ['class' => 'form-control' . ($errors->has('part_of_body') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('part_of_body', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
  </div>
  
  <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Description of injury:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

 <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">How did the incident/injury occur:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('how_occur', null, ['class' => 'form-control' . ($errors->has('how_occur') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('how_occur', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

 <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">First aid given:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('first_aid', null, ['class' => 'form-control' . ($errors->has('first_aid') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('first_aid', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

 <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Treatment given by whom:Doctor</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  <div class="form-check form-check-inline">
									<label class="rating_radio"><span class="nm">Yes</span>
									   {!! Form::radio('treatment_by_dr', 'yes') !!} 
									  <span class="checkmark"></span>
									</label>
									<label class="rating_radio"><span class="nm">No</span>
									   {!! Form::radio('treatment_by_dr', 'no') !!} 
									  <span class="checkmark"></span>
									</label>
									  {!! $errors->first('treatment_by_dr', '<span class="help-block">:message</span>') !!}
									</div>
				</div>
			  </div>
		</div>
</div>

<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-12 col-lg-12">If yes, list doctor and clinic/hospital, if known, and what medical treatment was given:</label>
				<div class="col-sm-12 col-md-12 col-lg-12">
				 {!! Form::textarea('treatment_details', null, ['class' => 'form-control' . ($errors->has('treatment_details') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('treatment_details', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-12 col-lg-12">Corrective action needed to prevent reoccurence:</label>
				<div class="col-sm-12 col-md-12 col-lg-12">
				{!! Form::textarea('corrective_action', null, ['class' => 'form-control' . ($errors->has('corrective_action') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('corrective_action', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Name of parent notified:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				 {!! Form::text('name_of_notify', null, ['class' => 'form-control' . ($errors->has('name_of_notify') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('name_of_notify', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>
<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Time notified: Notified by:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				{!! Form::text('time_notify', null, ['class' => 'form-control timepicker' . ($errors->has('time_notify') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('time_notify', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">How was the parent notified:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  <div class="form-check form-check-inline">
									<label class="rating_radio"><span class="nm">Phone</span>
									 {!! Form::radio('way_of_notify', 'phone') !!}
									  <span class="checkmark"></span>
									</label>
									<label class="rating_radio"><span class="nm">Email</span>
									 {!! Form::radio('way_of_notify', 'email') !!}
									  <span class="checkmark"></span>
									</label>
									<label class="rating_radio"><span class="nm">Other</span>
									  {!! Form::radio('way_of_notify', 'other') !!}
									  <span class="checkmark"></span>
									</label>
									
									</div>
				</div>
			  </div>
		</div>
</div>
		
		
	
		</section>

