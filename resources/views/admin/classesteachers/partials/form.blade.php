
<div class="form-group {!! ($errors->has('class_id') ? 'has-error' : '') !!}">
    {!! Form::label('class_id','Class', ['class' => 'control-label']) !!}
	{!! Form::select('class_id', $class, @$teacher->classes->classes->id, ['class' => 'form-control' . ($errors->has('class_id') ? ' is-invalid' : '') ]) !!}
	
    {!! $errors->first('class_id', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {!! ($errors->has('session') ? 'has-error' : '') !!}">
    {!! Form::label('session','Session', ['class' => 'control-label']) !!}
    {!! Form::select('session', ['Morning' => 'Morning', 'Evening' => 'Evening'], @$teacher->classes->session, ['class' => 'form-control' . ($errors->has('session') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('session', '<span class="help-block">:message</span>') !!}
</div>
<input type="hidden" name="teacher_id" value="{{$teacher->id}}"/>
