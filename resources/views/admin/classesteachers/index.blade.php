@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
<div class="row pt-4">	
	<div class="col-sm-12 col-md-6 col-lg-6 ">
		<form method="get">
			<div class="dataTables_filter">
				<label>Search:
					<input type="text" name="search" value="{{ $search }}"class="form-control form-control-sm"placeholder="Search Class Name">
				</label>
			</div>
		</form>
	</div>
	<div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
		<a href="{{ route('admin.class.create', $teacher->id) }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> Add {{ $title['title'] }}</i></a>
	</div>	
</div>  

    <div class="tile">
	    
	@include('admin.classesteachers.partials.table', ['data' => $classes])
    </div>
	<div class="d-flex justify-content-center">
			<ul class="pagination">
				@if($search)
				{!! $classes->appends(['search' => $search])->links() !!}
				@else
				{{ $classes->links() }}
				@endif
			</ul>
		</div>
  </div>
  </div>
@stop