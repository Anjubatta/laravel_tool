@extends('layouts.admin')
@section('content')
<div class="dashboard_page_wrapper">
<div class="row">
  <div class="col-md-9 col-sm-12">
    <div class="row">      
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-title green">
            <h3>Announcements</h3>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-outline-primary table_top_btn" data-toggle="modal" data-target="#addannouncment" role="button" ><i class="fa fa-plus"> <span>Add Announcements</span></i></a>
          </div>
          @include('admin.announcements.partials.table', ['data' => $announcements])
		   <a href="{{ asset('admin/announcements') }}"  class="viewmore">View More</a>
        </div>
      </div>
	  
	   <div class="col-md-12">
		   <div class="tile daily-log">
          <div class="tile-title green">
            <h3>Daily Logs</h3>
            <a href="{{ route('admin.dailylogs.create') }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> <span>Add Daily logs</span></i></a>
          </div>
          @include('admin.dailylogs.partials.table', ['data' => $dailylog])
		   <a href="{{ asset('admin/dailylogs') }}"  class="viewmore">View More</a>
        </div>
      </div>
	  	  
	<div class="col-md-12">
        <div class="tile">
          <div class="tile-title green">
            <h3>Leaves</h3>
            
          </div>
          @include('admin.leaves.partials.table', ['data' => $leaves])
		  <a href="{{ asset('admin/leaves') }}"  class="viewmore">View More</a>
        </div>
      </div>

    </div>
  </div>
    <div class="col-md-3 col-sm-12">	
	<div style="overflow:hidden;">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
				<div class="date-header">
				{{date('d')}}  <small>{{date('F')}}</small>			
				</div>
                <div id="datetimepicker12"></div>
            </div>
        </div>
    </div>
 </div>
</div>
</div>
</div>
@stop


<!-- Modal -->
<div class="modal fade" id="addannouncment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  addItem_modal" role="document">
    <div class="modal-content ">
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

@section('script')
<script type="text/javascript">
	
        $(function () {
			
            $('#datetimepicker12').datetimepicker({			
				Default: 'MMMM YYYY',
                inline: true,
                sideBySide: true,
				timepicker:false,
				format: 'd F',
				onChangeDateTime:function(dp,$input){
				$('.date-header').html($input.val());
				  var date = $input.val();
					date = date.split(" ");
					$('.date-header').html(date[0] +'<small>'+ date[1] +'</small>');
			  }
            });
				
        });
		
		
		
    </script>
@endsection