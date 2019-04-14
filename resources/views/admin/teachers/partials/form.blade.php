<div class="form-group {!! ($errors->has('surname') ? 'has-error' : '') !!}">
    {!! Form::label('surname','Surname', ['class' => 'control-label']) !!}
    {!! Form::text('surname', null, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('surname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('fname') ? 'has-error' : '') !!}">
    {!! Form::label('fname','First Name', ['class' => 'control-label']) !!}
    {!! Form::text('fname', null, ['class' => 'form-control' . ($errors->has('fname') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('fname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('lname') ? 'has-error' : '') !!}">
    {!! Form::label('lname','Middel Name', ['class' => 'control-label']) !!}
    {!! Form::text('lname', null, ['class' => 'form-control' . ($errors->has('lname') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('lname', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('id_no') ? 'has-error' : '') !!}">
    {!! Form::label('id_no','ID Number', ['class' => 'control-label']) !!}
    {!! Form::number('id_no', null, ['class' => 'form-control' . ($errors->has('id_no') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('id_no', '<span class="help-block">:message</span>') !!}
</div>
@if(!@$teacher)
<div class="form-group {!! ($errors->has('email') ? 'has-error' : '') !!}">
    {!! Form::label('email','Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>
@endif

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
    {!! Form::label('address','Address', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('contactno') ? 'has-error' : '') !!}">
    {!! Form::label('contactno','Contact No', ['class' => 'control-label']) !!}
    {!! Form::number('contactno', null, ['class' => 'form-control' . ($errors->has('contactno') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('contactno', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('gender') ? 'has-error' : '') !!}">
    {!! Form::label('gender','Gender', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('gender', 'female') !!} Female
    {!! Form::radio('gender', 'male') !!} Male
    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
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