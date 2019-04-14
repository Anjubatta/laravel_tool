<div class="form-group row">
    <div class="col-sm-10 col-lg-6 col-md-6"> 
	<label>Time In</label>
	   {!! Form::text('timein', @$data->timein, ['class' => 'form-control timepicker'. ($errors->has('timein') ? ' is-invalid' : ''),'placeholder'=>"Time In" ]) !!}
		{!! $errors->first('timein', '<span class="help-block">:message</span>') !!}
    </div>
  
    <div class="col-sm-10 col-lg-6 col-md-6">     
	<label>Time Out</label>
	   {!! Form::text('timeout', @$data->timeout, ['class' => 'form-control timepicker'. ($errors->has('timeout') ? ' is-invalid' : ''),'placeholder'=>"Time Out" ]) !!}
		{!! $errors->first('timeout', '<span class="help-block">:message</span>') !!}
    </div>
  </div>

  <input type="hidden" name="status" value="IN" />
		
   <div class="form-group row justify-content-end">
     <div class="col-sm-10 col-lg-4 col-md-4">
	 <label>Temp 1</label>
	{!! Form::text('temp1', @$data->temp1, ['class' => 'form-control'. ($errors->has('temp1') ? ' is-invalid' : ''),'placeholder'=>"Temp 1" ]) !!}
		{!! $errors->first('temp1', '<span class="help-block">:message</span>') !!}     
    </div>
     <div class="col-sm-10 col-lg-4 col-md-4">
	  <label>Temp 2</label>
	{!! Form::text('temp2', @$data->temp2, ['class' => 'form-control'. ($errors->has('temp2') ? ' is-invalid' : ''),'placeholder'=>"Temp 2" ]) !!}
		{!! $errors->first('temp2', '<span class="help-block">:message</span>') !!}     
    </div>
     <div class="col-sm-10 col-lg-4 col-md-4">
	  <label>Temp 3</label>
	{!! Form::text('temp3', @$data->temp3, ['class' => 'form-control'. ($errors->has('temp3') ? ' is-invalid' : ''),'placeholder'=>"Temp 3" ]) !!}
		{!! $errors->first('temp3', '<span class="help-block">:message</span>') !!}     
    </div>
	
	
		
  </div>