@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
          <a href="{{ route('superadmin.announcements.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
      </div>

        {!! Form::open(['route' => 'superadmin.announcements.store']) !!}
          <div class="tile-body">

            @include('superadmin.announcements.partials.form')

          </div>

          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>

            <a class="btn btn-secondary" href="{{ route('superadmin.announcements.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop