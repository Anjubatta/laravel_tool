<div class="form-group {!! ($errors->has('name') ? 'has-error' : '') !!}">
    {!! Form::label('name','Company Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('id_no') ? 'has-error' : '') !!}">
    {!! Form::label('id_no','UEN No', ['class' => 'control-label']) !!}
    {!! Form::number('id_no', null, ['class' => 'form-control' . ($errors->has('id_no') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('id_no', '<span class="help-block">:message</span>') !!}
</div>

@if(!@$company)
<div class="form-group {!! ($errors->has('email') ? 'has-error' : '') !!}">
    {!! Form::label('email','Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>
@endif

<div class="form-group {!! ($errors->has('annual_leave') ? 'has-error' : '') !!}">
    {!! Form::label('annual_leave','Annual Paid Leaves', ['class' => 'control-label']) !!}
    {!! Form::number('annual_leave', null, ['class' => 'form-control' . ($errors->has('annual_leave') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('annual_leave', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('expected_attendance') ? 'has-error' : '') !!}">
    {!! Form::label('expected_attendance','Expected Attendance', ['class' => 'control-label']) !!}
    {!! Form::number('expected_attendance', null, ['class' => 'form-control' . ($errors->has('expected_attendance') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('expected_attendance', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('information') ? 'has-error' : '') !!}">
    {!! Form::label('information','Short Information', ['class' => 'control-label']) !!}
    {!! Form::textarea('information', null, ['class' => 'form-control' . ($errors->has('information') ? ' is-invalid' : ''), 'rows' => '4' ]) !!}
    {!! $errors->first('information', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('address') ? 'has-error' : '') !!}">
    {!! Form::label('address','Address', ['class' => 'control-label']) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'rows' => '4' ]) !!}
    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>