@extends('layouts.admin')
@section('content')
<div class="row pt-4 mb-3">	
	<div class="col-sm-12 col-md-6 col-lg-6 ">
				<form method="get">
				<div class="dataTables_filter">
					<label>Search:
					<input type="text" value="{{ $search }}"  name="search" class="form-control form-control-sm" placeholder="Teacher Name/ ID No." >
					</label>
					</div>
				</form>
				</div>
			<div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
			<a href="{{ route('admin.teachers.create') }}" class="outile_addbtn"><i class="fa fa-plus" aria-hidden="true"></i>
				Add  {{ $title['title'] }}
			</a>
			</div>	
</div>

<div class="row">
	<div class="col-md-12">
		
	
		
		<div class="tile">
			
			
			@include('admin.teachers.partials.table', ['data' => $teachers])
			
		</div>
		
		<div class="d-flex justify-content-center">
			<ul class="pagination">
				@if($search)
				{!! $teachers->appends(['search' => $search])->links() !!}
				@else
				{{ $teachers->links() }}
				@endif
			</ul>
		</div>
		
	</div>
</div>
@stop