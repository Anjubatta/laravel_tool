<div class="row tution_detail">
	<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Students:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">				
					<div class="form-group {!! ($errors->has('student_id') ? 'has-error' : '') !!}">
						
						{!! Form::select('student_id', $student, @$dailylog->student->id, ['class' => 'form-control' . ($errors->has('student_id') ? ' is-invalid' : '') ]) !!}
						
						{!! $errors->first('student_id', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
			  </div>
		</div>
		<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Date:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">				
				{!! Form::text('date', null, ['class' => 'form-control datetimepicker' . ($errors->has('date') ? ' is-invalid' : '')]) !!}
				 {!! $errors->first('date', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
		<div class="col-md-12 col-lg-6 col-sm-12">
			  <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Log entry by:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
					{!! Form::text('log_entry_by', null, ['class' => 'form-control' . ($errors->has('log_entry_by') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('log_entry_by', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
</div>
		
<div class="row tution_detail">
		<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Child/Infant Opened By:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">				
				{!! Form::text('opened_by', null, ['class' => 'form-control' . ($errors->has('opened_by') ? ' is-invalid' : '')]) !!}
				 {!! $errors->first('opened_by', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
		<div class="col-md-12 col-lg-6 col-sm-12">
			  <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Time In:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
					{!! Form::text('timein', null, ['class' => 'form-control timepicker' . ($errors->has('timein') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('timein', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
</div>
		
	
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Daily Log:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::textarea('daily_log', null,  ['class' => 'form-control' . ($errors->has('daily_log') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('daily_log', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Special Incident:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('special_incident', null, ['class' => 'form-control' . ($errors->has('special_incident') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('special_incident', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Action Taken:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				 {!! Form::text('action_taken', null, ['class' => 'form-control' . ($errors->has('action_taken') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('action_taken', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Time Parent were informned:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				{!! Form::text('time_parent_informed', null, ['class' => 'form-control timepicker' . ($errors->has('time_parent_informed') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('time_parent_informed', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Reported By:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('reported_by', null, ['class' => 'form-control' . ($errors->has('reported_by') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('reported_by', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Change in Menu:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				 {!! Form::text('change_menu', null, ['class' => 'form-control' . ($errors->has('change_menu') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('change_menu', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		</div>
		<div class="row tution_detail">
		<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-6">Childcare/Infant closed by:</label>
				<div class="col-sm-12 col-md-6 col-lg-6">
				 {!! Form::text('childcare_closed_by', null, ['class' => 'form-control' . ($errors->has('childcare_closed_by') ? ' is-invalid' : '')]) !!}
					{!! $errors->first('childcare_closed_by', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
		<div class="col-md-12 col-lg-6 col-sm-12">
			  <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3 time-out">Time out:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::text('timeout', null, ['class' => 'form-control timepicker' . ($errors->has('timeout') ? ' is-invalid' : '')]) !!}
				 {!! $errors->first('timeout', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
		
		</div>
		
