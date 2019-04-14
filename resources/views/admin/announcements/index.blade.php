@extends('layouts.admin')
@section('content')
<div class="row pt-4">	
	<div class="col-sm-12 col-md-7 col-lg-6 ">
		<form method="get">
			<div class="dataTables_filter">
				<label>Search:
					<input type="text"  value="{{ $search }}"  name="search" class="form-control form-control-sm" placeholder="Search Announcement" >
				</label>
			</div>
		</form>
	</div>
	<div class="col-sm-12 col-md-5 col-lg-6 d-flex justify-content-end">
		<a href="{{ route('admin.announcements.create') }}" class="outile_addbtn"  data-toggle="modal" data-target="#addannouncment" role="button" ><i class="fa fa-plus" aria-hidden="true"></i>
			Add  {{ $title['title'] }}
		</a>
	</div>	
</div>
<div class="row">
	
	
  <div class="col-md-12">
  
		
		
    <div class="tile">
  
	    
	@include('admin.announcements.partials.table', ['data' => $announcements])
    
    </div>
	
	<div class="d-flex justify-content-center">
			<ul class="pagination">
				@if($search)
				{!! $announcements->appends(['search' => $search])->links() !!}
				@else
				{{ $announcements->links() }}
				@endif
			</ul>
		</div>
		
		
  </div>
</div>
@stop


<!-- Modal -->
<div class="modal fade" id="addannouncment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  addItem_modal" role="document">
    <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Announcement</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
      <div class="modal-body">
		{!! Form::open(['route' => 'admin.announcements.store'], 'autocomplete=off') !!}
          <div class="tile-body">

            @include('admin.announcements.partials.form')

          </div>

			<div class="tile-footer text-right">		  
				<button class="btn save_btn" type="submit">POST</button>
			</div>

        {!! Form::close() !!}
      </div>
      <div class="">
       
      </div>
    </div>
  </div>
</div>