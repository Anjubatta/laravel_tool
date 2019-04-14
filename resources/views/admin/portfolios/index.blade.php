@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="tile portfolio-post">
			<div class="tile-title green">
				<h2>{{ $title['title'] }}</h2>
				
				
			</div>
			<ul class="nav nav-tabs">
			<li class="nav-item"><a href="#" class="nav-link">Recent Post</a></li>
			<li class="nav-item"><a href="{{ route('admin.portfolios.create', $students->id) }}" class="nav-link">Post an update</a></li>
			</ul>
			@include('admin.portfolios.partials.table', ['data' => $portfoilos])
			
		</div>
	</div>
</div>

@stop
