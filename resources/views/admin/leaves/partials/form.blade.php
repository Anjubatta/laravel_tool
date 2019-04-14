<div class="form-group row">
		<label class="col-md-3">Leave Name:</label>
		<div class="form-fields col-md-9">
		
		{!! Form::select('leave_name_id', $leaves_name, null, ['class' => 'form-control ' . ($errors->has('leave_name_id') ? ' is-invalid' : '') ]) !!}	
		{!! $errors->first('leave_name_id', '<span class="help-block">:message</span>') !!}
		
	</div>
</div>
<div class="form-group row">
	<label class="col-md-3">Leave Type:</label>
	<div class="form-fields col-md-9">
		{!! Form::select('leave_type_id', $leaves_type, null, ['class' => 'form-control ' . ($errors->has('leave_type_id') ? ' is-invalid' : '') ]) !!}	
		{!! $errors->first('leave_type_id', '<span class="help-block">:message</span>') !!}
		
	</div>
</div>
<div class="form-group row">
	<label class="col-md-3">Leave Unit:</label>
	<div class="form-fields col-md-9 leave_unit">	
		{!! Form::radio('leave_unit', 'days') !!} <span>Days</span>
		{!! Form::radio('leave_unit', 'hours') !!} <span>Hours</span>
		{!! $errors->first('leave_unit', '<span class="help-block">:message</span>') !!}
	</div>
</div>

				<div class="form-group row justify-content-end">					
					<div class="form-fields days_show col-md-9">
						<div class="form-fields row calen">
							<div class="col-md-6">
								<label>From Date:</label>
								<div class="calen_icn">
								{!! Form::text('from_date', null, ['class' => 'form-control leavepicker' . ($errors->has('from_date') ? ' is-invalid' : ''), 'id'=>"from_date"]) !!}
									<div class="input-group-append" onclick="picker('from_date')">
										<i class="fa fa-calendar"></i>
									</div>
								</div>	
							</div>
							<div class="col-md-6">
								<label>To Date:</label>
								<div class="calen_icn">
								{!! Form::text('to_date', null, ['class' => 'form-control leavepicker' . ($errors->has('to_date') ? ' is-invalid' : ''), 'id'=>"to_date"]) !!}	
									<div class="input-group-append" onclick="picker('to_date')">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-fields time_show col-md-9" style="display:none;">
						<div class="form-fields row calen">
							<div class="col-md-6"><label>From Time:</label>
							{!! Form::text('from_time', null, ['class' => 'form-control timepickeratt' . ($errors->has('from_time') ? ' is-invalid' : '')]) !!}</div>
							<div class="col-md-6"><label>To Time:</label>
							{!! Form::text('to_time', null, ['class' => 'form-control timepickeratt' . ($errors->has('to_time') ? ' is-invalid' : '')]) !!}</div>
						</div>
					</div>
				</div>				

<div class="form-group">
<div class="row">
<div class="col-md-3 col-sm-4">
	<label>Reason:</label>
	</div>
	<div class="col-md-9 col-sm-8">
	<div class="form-fields">
		{!! Form::textarea('reason', null, ['class' => 'form-control' . ($errors->has('reason') ? ' is-invalid' : ''), 'placeholder' =>'I need to see the doctor.']) !!}						
	</div>
	</div>
</div>
{!! Form::hidden('status', 'pending', ['class' => 'status' . ($errors->has('status') ? ' is-invalid' : '')]) !!}
