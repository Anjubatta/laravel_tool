@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
	   
	</div>
	    
		@include('admin.leaves.partials.teachertable', ['data' => $leaves])
    
    </div>
	
	<div class="d-flex justify-content-center">
			<ul class="pagination">
			{{ $leaves->links() }}
			</ul>
		</div>
  </div>
</div>
@stop