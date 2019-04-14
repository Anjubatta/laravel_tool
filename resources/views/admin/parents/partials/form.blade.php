<div class="form-group {!! ($errors->has('image') ? 'has-error' : '') !!}">
    {!! Form::label('image','image', ['class' => 'control-label']) !!}
    {!! Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
    @if(Request::segment(4)=='edit')
   
        @if($parent->image)
        <span class="show-image">
            <img src="{{ asset('uploads/parents/'.$parent->image) }}" width="200px">
        </span>
        @endif
    @endif
</div>

<div class="form-group {!! ($errors->has('sur_name') ? 'has-error' : '') !!}">
    {!! Form::label('sur_name','Surname', ['class' => 'control-label']) !!}
    {!! Form::text('sur_name', null, ['class' => 'form-control' . ($errors->has('sur_name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('sur_name', '<span class="help-block">:message</span>') !!}
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
<div class="form-group {!! ($errors->has('email') ? 'has-error' : '') !!}">
    {!! Form::label('email','Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('relation') ? 'has-error' : '') !!}">
    {!! Form::label('relation','Relation', ['class' => 'control-label']) !!}
    {!! Form::text('relation', null, ['class' => 'form-control' . ($errors->has('relation') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('relation', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('parent_id') ? 'has-error' : '') !!}">
    {!! Form::label('parent_id','Parent ID', ['class' => 'control-label']) !!}
    {!! Form::text('parent_id', null, ['class' => 'form-control' . ($errors->has('parent_id') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('parent_id', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('contact_no') ? 'has-error' : '') !!}">
    {!! Form::label('contact_no','Contact No ', ['class' => 'control-label']) !!}
    {!! Form::text('contact_no', null, ['class' => 'form-control' . ($errors->has('contact_no') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('contact_no', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('age') ? 'has-error' : '') !!}">
    {!! Form::label('age','Age', ['class' => 'control-label']) !!}
    {!! Form::text('age', null, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('age', '<span class="help-block">:message</span>') !!}
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

<div class="form-group {!! ($errors->has('active') ? 'has-error' : '') !!}">
    {!! Form::label('active','Active', ['class' => 'control-label']) !!}</br>
    {!! Form::radio('active', 1) !!} Yes
    {!! Form::radio('active', 0) !!} No
    {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
</div>



@section('script')
<script>
jQuery('#datepicker').datetimepicker({
    format: 'YYYY/MM/DD'
});

</script>
@endsection