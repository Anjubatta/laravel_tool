@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
	   
	</div>
	    
		@include('teachers.leaves.partials.table', ['data' => $leaves])
    
    </div>
  </div>
</div>
@stop