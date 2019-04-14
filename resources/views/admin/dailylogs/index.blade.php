@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
		<form method="get" class="daily_top_search">
			<input type="text" name="search" value="{{ $search }}" placeholder="Search Daily Logs">			
		</form>
		
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
	    <a href="{{ route('admin.dailylogs.create') }}" class="btn btn-outline-primary table_top_btn" ><i class="fa fa-plus"> Add {{ $title['title'] }}</i></a>
		
	</div>
	    
	@include('admin.dailylogs.partials.table', ['data' => $dailylogs])
    
    </div>
	
	<div class="d-flex justify-content-center">
			<ul class="pagination">
				@if($search)
				{!! $dailylogs->appends(['search' => $search])->links() !!}
				@else
				{{ $dailylogs->links() }}
				@endif
			</ul>
		</div>
		
		
  </div>
</div>
@stop

