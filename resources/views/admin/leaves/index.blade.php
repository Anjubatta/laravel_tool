@extends('layouts.admin')
@section('content')
<div class="teacher_leave_wrapper">
<div class="row">
  <div class="col-md-12">
		<div class="green_orange_box_outr">
  		   <?php if(@$teacher->id){ ?>	 <div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="Leave_box green-leave">
							<strong>{{@$leaves_left}}</strong> 
							<span>LEAVES LEFT</span>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="Leave_box orange-leave">
						<strong>{{@$used_leave}}</strong> 
						<span>LEAVES USED</span>
					</div>	
				</div>
			</div>	<?php } ?>	
			</div>
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
			<?php if(@$teacher->id){ ?>	
		  <!--a href="{{ route('admin.leaves.create', $teacher->id) }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> Add {{ $title['title'] }}</i></a-->
		  

			<?php } ?>			
	</div>	    
		@include('admin.leaves.partials.table', ['data' => $leaves])    
    </div>
	
	<div class="d-flex justify-content-center">
		<ul class="pagination">
		{{ $leaves->links() }}
		</ul>
	</div>
  </div>
</div>
</div>
@stop