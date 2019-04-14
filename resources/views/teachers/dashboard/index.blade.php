@extends('layouts.admin')

@section('content')
<div class="row mt-3">
          <div class="col-md-6 col-lg-9 col-sm-12">
              <div class="No_annouce">
              <span>ANNOUNCEMENT</span>
                 @include('teachers.dashboard.table', ['data' => $announcements])
              </div>
          </div>
          <div class="col-md-6 col-lg-3 col-sm-12">
              <div class="Leave_box green-leave my-2">
                <strong>{{$leaves_left}}</strong> <span>LEAVES LEFT</span>
              </div>
              <div class="Leave_box orange-leave my-2">
                <strong>{{$used_leave}}</strong> <span>LEAVES USED</span>
              </div>
              <a href="" class="outile_addbtn apply_leave"  data-toggle="modal" data-target="#apply_leave" role="button" >APPLY LEAVE</a>
          </div>
      </div>

      <section class="cstm_table">
      <div class="row">
        <div class="col-md-12">
          <div class="tile bg_table">
          
            <div class="table-responsive">
               @include('teachers.dashboard.leavestable', ['data' => $teacher_leaves])
      
            </div>
      <div class="d-flex justify-content-center">
                {{ $teacher_leaves->links() }}
              </div>
          </div>
        </div>
      </div>
      </section> 

	  
	  
<!-- Modal -->
<div class="modal fade" id="apply_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  addItem_modal" role="document">
    <div class="modal-content ">
     <div class="modal-header">
				<h4 class="modal-title">Add Leave</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
      <div class="modal-body">
		 {!! Form::open(['route' => 'teacher.leaves.store'], 'autocomplete=off') !!}
          <div class="tile-body">
            @include('teachers.leaves.partials.form')
          </div>

          <div class="tile-footer">
		  
			  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>

            <a class="btn btn-secondary" href="{{ route('teacher.dashboard.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}
      </div>
      <div class="">
       
      </div>
    </div>
  </div>
</div>

@stop
