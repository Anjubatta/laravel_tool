@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-title green">
				<h3>{{ $title['title'] }}</h3>
				<a class="btn btn-outline-primary table_top_btn outile_addbtn add_item"  data-toggle="modal" data-target="#addItem_modal"><i class="fa fa-plus"> Add Item</i></a>			
			</div>
			
			@include('admin.medicines.partials.table', ['data' => $medicine])
			
		</div>
	</div>
</div>


<!-- Modal start-->


<!-- Modal -->
<div class="modal fade" id="addItem_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  addItem_modal" role="document">
    <div class="modal-content ">
     
      <div class="modal-body">
		{!! Form::open(['route' => ['admin.medicines.store', $student->id]]) !!}
   
          <div class="tile-body">

            @include('admin.medicines.partials.form')

          </div>

          <div class="tile-footer">
                      		
				<div class="d-flex justify-content-between"><button type="cancel" class="btn save_btn cancel_btn">Cancel</button><button type="submit" class="btn save_btn">Add</button></div>
		
          </div>

        {!! Form::close() !!}
      </div>
      <div class="">
       
      </div>
    </div>
  </div>
</div>	
@stop
