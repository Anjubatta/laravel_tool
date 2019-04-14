@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
	    <a href="{{ route('admin.classes.create') }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> </i>Add {{ $title['title'] }}</a>
	</div>
	    
	@include('admin.classes.partials.table', ['data' => $classes])
    
    </div>
  </div>
</div>
@stop