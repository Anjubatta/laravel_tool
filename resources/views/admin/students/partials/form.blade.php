
<div class="form-group {!! ($errors->has('image') ? 'has-error' : '') !!}">
    {!! Form::label('image',' Student image', ['class' => 'control-label']) !!}
    {!! Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
    @if(Request::segment(4)=='edit')
   
        @if($student->image)
        <span class="show-image">
            <img src="{{ asset('uploads/students/'.$student->image) }}" width="200px">
        </span>
        @endif
    @endif
</div>

<div class="form-group {!! ($errors->has('surname') ? 'has-error' : '') !!}">
    {!! Form::label('surname','Surname', ['class' => 'control-label']) !!}
    {!! Form::text('surname', null, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('surname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('first_name') ? 'has-error' : '') !!}">
    {!! Form::label('first_name','First Name', ['class' => 'control-label']) !!}
    {!! Form::text('first_name', null, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('middle_name') ? 'has-error' : '') !!}">
    {!! Form::label('middle_name','Middle Name', ['class' => 'control-label']) !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control' . ($errors->has('middle_name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('middle_name', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('student_no') ? 'has-error' : '') !!}">
    {!! Form::label('student_no','Student No ', ['class' => 'control-label']) !!}
    {!! Form::text('student_no', null, ['class' => 'form-control' . ($errors->has('student_no') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('student_no', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('contact_no') ? 'has-error' : '') !!}">
    {!! Form::label('contact_no','Contact No ', ['class' => 'control-label']) !!}
    {!! Form::text('contact_no', null, ['class' => 'form-control' . ($errors->has('contact_no') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('contact_no', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('dob') ? 'has-error' : '') !!}">
    {!! Form::label('dob','DOB', ['class' => 'control-label']) !!}
    <div class="input-group">
        {!! Form::text('dob', null, ['class' => 'form-control datetimepicker' . ($errors->has('dob') ? ' is-invalid' : '') ]) !!}
        <div class="input-group-append" onclick="picker('dob')">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
</div>


<div class="form-group {!! ($errors->has('address') ? 'has-error' : '') !!}">
    {!! Form::label('address','Address ', ['class' => 'control-label']) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('gender') ? 'has-error' : '') !!}">
    {!! Form::label('gender','Gender', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('gender', 'female') !!} female
    {!! Form::radio('gender', 'male') !!} male
    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('class_id') ? 'has-error' : '') !!}">
    {!! Form::label('class_id','Class', ['class' => 'control-label']) !!}
	{!! Form::select('class_id', $class, @$student->classes_students->classes->id, ['class' => 'form-control' . ($errors->has('class_id') ? ' is-invalid' : '') ]) !!}
	
    {!! $errors->first('class_id', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('year') ? 'has-error' : '') !!}">
    {!! Form::label('year','Year', ['class' => 'control-label']) !!}
    {!! Form::select('year', @$year, @$student->classes_students->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('year', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('session') ? 'has-error' : '') !!}">
    {!! Form::label('session','Session', ['class' => 'control-label']) !!}
    {!! Form::select('session', ['Morning' => 'Morning', 'Evening' => 'Evening', 'Both' => 'Both'], @$student->classes_students->session, ['class' => 'form-control' . ($errors->has('session') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('session', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>

@section('script')
<script>
function picker(id){
	jQuery('#'+id).focus();
}
</script>
@endsection
