@extends('layouts.admin')
@section('content')
<div class="row">
	
	<div class="col-md-12">
		<div class="pt-4 pb-3">		
				
			<form method="get" id="filterform">
			<input type="hidden" name="filter" value="true">
				<div class="dataTables_filter">
					<label>Search
						<input type="text" value="{{ $res['search'] }}"  name=	"search" class="form-control form-control-sm" placeholder="Student Name/ Student ID No" />
					</label>
				</div>
				
				<div class="dataTables_filter">
					<label>Month
					<select name="month" class="form-control" >
						<?php for($m=1; $m<=12; ++$m){
							$month= date('F', mktime(0, 0, 0, $m, 1));
							?>
							<option value="{{$m}}" <?=($res['month']==$m)?'selected':''?> >{{$month}}</option>
						<?php	} ?>
					</select>
					
						
					</label>
				</div>
			<div class="dataTables_filter">
					<label>Year 
					<select name="year" class="form-control"  >
						<?php 
						for($y=2018; $y<=2028; $y++){
							?>
							<option value="{{$y}}" <?=($res['year']==$y)?'selected':''?>>{{$y}}</option>
						<?php	} ?>
					</select>
					
						
					</label>
				</div>
				<div class="dataTables_filter">
					<input type="submit" class="form-control save_btn" value="Search"/>
				</div>
			</form>		
		</div>
		
		<div class="tile">
			<div class="tile-title green">
				<h3>{{ $title['title'] }}</h3>
				<!--a href="{{ route('admin.fees.create') }}" class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> </i>Add {{ $title['title'] }}</a--->
			</div>
			
			@include('admin.studentfees.partials.table', ['data' => $fees, 'res' => $res])
			
		</div>
	</div>
</div>


@section('script')
<script>


@if(!@$_GET['filter'])	
	jQuery('#filterform').submit();
@endif

function session(value){

	jQuery('#filterform').submit();
}
</script>
@endsection

@stop