@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
         
      </div>

        {!! Form::model($leave, ['route' => ['admin.leaves.update', $teacher->id,$leave->id], 'method' => 'PATCH']) !!}
          <div class="tile-body">

            @include('admin.leaves.partials.form')

          </div>

          <div class="tile-footer">
            <button class="btn  approve pull-left save_btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>APPROVE</button>

            <a class="btn  decline pull-right save_btn decline_btn" href="{{ route('admin.teachers.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>DECLINE</a>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop