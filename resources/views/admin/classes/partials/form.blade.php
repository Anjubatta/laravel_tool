<div class="form-group {!! ($errors->has('name') ? 'has-error' : '') !!}">
    {!! Form::label('name','Class Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
</div>
