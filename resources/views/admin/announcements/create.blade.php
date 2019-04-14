@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
          <a href="{{ route('admin.announcements.index') }}" class="btn table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
      </div>

        {!! Form::open(['route' => 'admin.announcements.store'], 'autocomplete=off') !!}
          <div class="tile-body">

            @include('admin.announcements.partials.form')

          </div>

          <div class="tile-footer text-right">		  
			  <button class="btn save_btn" type="submit">POST</button>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop