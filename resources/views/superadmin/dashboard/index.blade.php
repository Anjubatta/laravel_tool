@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-9">
    <div class="row">
      
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-title green">
            <h3>Announcements</h3>
            <a href="{{ route('superadmin.announcements.create') }}" class="btn btn-outline-primary table_top_btn"    data-toggle="modal" data-target="#addannouncment" role="button" ><i class="fa fa-plus"></i>Add Announcements</a>
          </div>
          @include('superadmin.announcements.partials.table', ['data' => $announcements])
        </div>
      </div>

      <div class="col-md-12">
        <div class="tile">
          <div class="tile-title green">
            <h3>Company</h3>
            <a href="{{ route('superadmin.company.create') }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"></i>Add Company</a>
          </div>
          @include('superadmin.company.partials.table', ['data' => $company])
        </div>
      </div>

    </div>
  </div>
   <div class="col-md-3">
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

          <div class="tile-footer">
		  
			  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>

            <a class="btn btn-secondary" href="{{ route('admin.announcements.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}
      </div>
      <div class="">
       
      </div>
    </div>
  </div>
</div>

@stop
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
			  }
            });
						
			

        });
		
		
		
    </script>
@endsection