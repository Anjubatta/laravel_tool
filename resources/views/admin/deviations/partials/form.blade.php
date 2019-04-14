<div class="form-group row">
    <div class="col-sm-10 col-lg-12 col-md-12">
      
	   {!! Form::text('title', null, ['class' => 'form-control'. ($errors->has('title') ? ' is-invalid' : ''),'placeholder'=>"Title" ]) !!}
		{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>
  </div>

    <div class="form-group row">	
	<div class="col-sm-12">
	 {!! Form::textarea('reason', null, ['class' => 'form-control'. ($errors->has('reason') ? ' is-invalid' : ''),'placeholder'=>"Reason for deviation" ]) !!}
		{!! $errors->first('reason', '<span class="help-block">:message</span>') !!}
     
    </div>
  </div>
  
   <div class="form-group row justify-content-end">
     <div class="col-sm-10 col-lg-6 col-md-6">
	{!! Form::text('remarks', null, ['class' => 'form-control'. ($errors->has('remarks') ? ' is-invalid' : ''),'placeholder'=>"Remarks" ]) !!}
		{!! $errors->first('remarks', '<span class="help-block">:message</span>') !!}
     
    </div>
    <div class="col-sm-10 col-lg-6 col-md-6">
	{!! Form::text('datetime', null, ['class' => 'form-control dateandtimepicker'. ($errors->has('datetime') ? ' is-invalid' : ''),'placeholder'=>"Date Time" ]) !!}
		{!! $errors->first('datetime', '<span class="help-block">:message</span>') !!}
    </div>
	<input type="hidden" name="student_id" value="{{$student->id}}" />
  </div>