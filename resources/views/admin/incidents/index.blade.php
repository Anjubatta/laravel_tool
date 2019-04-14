@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-title green">
				<h3>{{ $title['title'] }}</h3>
				<a href="{{ route('admin.incidents.create', $students->id) }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> Add {{ $title['title'] }}</i></a>
			</div>
			
			@include('admin.incidents.partials.table', ['data' => $incident])
			
		</div>
	</div>
</div>

@stop
