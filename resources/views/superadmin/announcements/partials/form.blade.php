<div class="form-group {!! ($errors->has('title') ? 'has-error' : '') !!}">
    {!! Form::label('title','Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('date') ? 'has-error' : '') !!}">
    {!! Form::label('date','Date', ['class' => 'control-label']) !!}
    <div class="input-group"  data-target-input="nearest">
        {!! Form::text('date', null, ['class' => 'form-control datetimepicker' . ($errors->has('date') ? ' is-invalid' : ''), 'data-target'=>'datepicker', 'data-toggle'=>'datetimepicker' ]) !!}
        <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    {!! $errors->first('date', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('time') ? 'has-error' : '') !!}">
    {!! Form::label('time','Time', ['class' => 'control-label']) !!}
    <div class="input-group" data-target-input="nearest">
        {!! Form::text('time', null, ['class' => 'form-control timepicker' . ($errors->has('time') ? ' is-invalid' : ''), 'data-target'=>'timepicker', 'data-toggle'=>'datetimepicker' ]) !!}
        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
        </div>
    </div>
    {!! $errors->first('time', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('description') ? 'has-error' : '') !!}">
    {!! Form::label('description','Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'rows' => '4' ]) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>

@section('script')
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
jQuery('#datepicker').datetimepicker({
    format: 'YYYY/MM/DD'
});
jQuery('#timepicker').datetimepicker({
    format: 'LT'
});
</script>
@endsection