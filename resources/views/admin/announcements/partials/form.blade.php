<div class="form-group {!! ($errors->has('title') ? 'has-error' : '') !!}">
    {!! Form::label('title','Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' =>'Title']) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('date') ? 'has-error' : '') !!}">
    {!! Form::label('date','Date', ['class' => 'control-label']) !!}
    <div class="input-group">
        {!! Form::text('date', null, ['class' => 'form-control datetimepicker' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' =>'Date']) !!}
        <div class="input-group-append" onclick="picker('date')">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    {!! $errors->first('date', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('time') ? 'has-error' : '') !!}">
    {!! Form::label('time','Time', ['class' => 'control-label']) !!}
    <div class="input-group">
        {!! Form::text('time', null, ['class' => 'form-control timepicker' . ($errors->has('time') ? ' is-invalid' : ''), 'placeholder' =>'Time' ]) !!}
        <div class="input-group-append" onclick="picker('time')">
            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
        </div>
	</div>
    {!! $errors->first('time', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('description') ? 'has-error' : '') !!}">
    {!! Form::label('description','Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'rows' => '4', 'placeholder' =>'Announcement Content' ]) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group radio-btn {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}
    <p>{!! Form::radio('active', 1) !!} <span>Yes</span></p>
    <p>{!! Form::radio('active', 0) !!} <span>No</span></p>
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>

@section('script')
<script>
function picker(id){
	jQuery('#'+id).focus();
}
</script>
@endsection