<div class="form-group row">
    <div class="col-sm-10 col-lg-12 col-md-12">
       {!! Form::label('name','Title', ['class' => 'control-label']) !!}
	   
	   {!! Form::text('title', null, ['class' => 'form-control'. ($errors->has('title') ? ' is-invalid' : ''),'placeholder'=>"Title" ]) !!}
		{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    </div>
  </div>
  <div class="form-group row">
    
    <div class="col-sm-10 col-lg-6 col-md-6">
	{!! Form::label('name','Medicine', ['class' => 'control-label']) !!}
	   
	 {!! Form::text('medicine', null, ['class' => 'form-control'. ($errors->has('medicine') ? ' is-invalid' : ''),'placeholder'=>"Medicine" ]) !!}
		{!! $errors->first('medicine', '<span class="help-block">:message</span>') !!}
    </div>
	<div class="col-sm-10 col-lg-6 col-md-6">
	{!! Form::label('name','Dosage', ['class' => 'control-label']) !!}
	
	{!! Form::text('dosage', null, ['class' => 'form-control'. ($errors->has('dosage') ? ' is-invalid' : ''),'placeholder'=>"Dosage" ]) !!}
		{!! $errors->first('dosage', '<span class="help-block">:message</span>') !!}
     
    </div>
  </div>
    <div class="form-group row">
    
    <div class="col-sm-10 col-lg-6 col-md-6">
    {!! Form::label('name','Manner of Adin(Oral/External)', ['class' => 'control-label']) !!}
	
	  {!! Form::text('manner_of_oral', null, ['class' => 'form-control'. ($errors->has('manner_of_oral') ? ' is-invalid' : ''),'placeholder'=>"Manner of Adin(Oral/External)" ]) !!}
		{!! $errors->first('manner_of_oral', '<span class="help-block">:message</span>') !!}
    </div>
	
	<div class="col-sm-10 col-lg-6 col-md-6">
	{!! Form::label('name','Administered by', ['class' => 'control-label']) !!}
	
	 {!! Form::text('administrated_by', null, ['class' => 'form-control'. ($errors->has('administrated_by') ? ' is-invalid' : ''),'placeholder'=>"Administered by" ]) !!}
		{!! $errors->first('administrated_by', '<span class="help-block">:message</span>') !!}
     
    </div>
  </div>
   <div class="form-group row ">
    
    <div class="col-sm-10 col-lg-6 col-md-6">
	{!! Form::label('name','Date Time', ['class' => 'control-label']) !!}
	
	{!! Form::text('datetime', null, ['class' => 'form-control dateandtimepicker'. ($errors->has('datetime') ? ' is-invalid' : ''),'placeholder'=>"Date Time" ]) !!}
		{!! $errors->first('datetime', '<span class="help-block">:message</span>') !!}
    </div>
	<input type="hidden" name="student_id" value="{{$student->id}}" />
  </div>