
<div class="form-group {!! ($errors->has('leave_name_id') ? 'has-error' : '') !!}">
    {!! Form::label('leave_name_id','Leave Name', ['class' => 'control-label']) !!}
    {!! Form::select('leave_name_id', $leaves_name, null, ['class' => 'form-control' . ($errors->has('leave_name_id') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('leave_name_id', '<span class="help-block">:message</span>') !!}
</div>
				
	<div class="form-group {!! ($errors->has('leave_type_id') ? 'has-error' : '') !!}">
    {!! Form::label('leave_type_id','Leave Type', ['class' => 'control-label']) !!}
    {!! Form::select('leave_type_id', $leaves_type, null, ['class' => 'form-control' . ($errors->has('leave_type_id') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('leave_type_id', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('leave_unit') ? 'has-error' : '') !!}">
    {!! Form::label('leave_unit','Leave Unit:', ['class' => 'control-label']) !!}
    <div class="form-fields leave_unit">
    {!! Form::radio('leave_unit', 'days',['id'=>'days']) !!} Days
    {!! Form::radio('leave_unit', 'hours',['id'=>'hours']) !!} Hours
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>
</div>
<div class="form-fields days_show" style="display:none;">
<div class="form-group {!! ($errors->has('from_date') ? 'has-error' : '') !!}">
    {!! Form::label('from_date','From Date:', ['class' => 'control-label']) !!}
    {!! Form::text('from_date', null, ['class' => 'form-control leavepicker' . ($errors->has('from_date') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('from_date', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('to_date') ? 'has-error' : '') !!}">
    {!! Form::label('to_date','To Date:', ['class' => 'control-label ']) !!}
    {!! Form::text('to_date', null, ['class' => 'form-control leavepicker' . ($errors->has('to_date') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('to_date', '<span class="help-block">:message</span>') !!}
</div>
</div>
<div class="form-fields time_show" >
<div class="form-group {!! ($errors->has('from_time') ? 'has-error' : '') !!}">
    {!! Form::label('from_time','From Time:', ['class' => 'control-label ']) !!}
    {!! Form::text('from_time', null, ['class' => 'form-control timepicker' . ($errors->has('from_time') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('from_time', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('to_time') ? 'has-error' : '') !!}">
    {!! Form::label('to_time','To Time:', ['class' => 'control-label ']) !!}
    {!! Form::text('to_time', null, ['class' => 'form-control timepicker' . ($errors->has('to_time') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('to_time', '<span class="help-block">:message</span>') !!}
</div>
</div>

<div class="form-group {!! ($errors->has('reason') ? 'has-error' : '') !!}">
    {!! Form::label('reason','Reason', ['class' => 'control-label']) !!}
    {!! Form::textarea('reason', null, ['class' => 'form-control' . ($errors->has('reason') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('reason', '<span class="help-block">:message</span>') !!}
</div>
