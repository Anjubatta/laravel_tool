@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
	    <a href="{{ route('teacher.parents.create') }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> Add {{ $title['title'] }}</i></a>
	</div>

		@include('teachers.parents.partials.table', ['data' => $parents])
    
    </div>
  </div>
</div>
@stop

