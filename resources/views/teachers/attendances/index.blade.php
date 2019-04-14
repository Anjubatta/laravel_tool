@extends('layouts.admin')
@section('content')

@if($classs)
<!--Food Alergy TABEL-->	
<div class="row pt-4 pb-3">
	<form method="get" id="filterform">
		<input type="hidden" name="filter" value="true">
		<div class="dataTables_filter">
			<label>Search 
				<input type="text" value="{{ @$search }}"  name=	"search" class="form-control form-control-sm" placeholder="Student Name/ Student No" >
			</label>
		</div>
		<div class="dataTables_filter">
			<label>Class 
				<select name="class" onchange="this.form.submit()" class="classfilter">
				@foreach(auth()->user()->teachers->classes_teachers as $class)
				<option value="{{ $class->class_id }}" {{ ($classs==$class->class_id)?'selected' : '' }}>{{ $class->classes->name }}</option>
				@endforeach
				</select>
			</label>
		</div>
		<div class="dataTables_filter">
			<label>Date <input type="text" class="form-control datetimepicker" onchange="this.form.submit()" style="width:100%;" name="date" value="{{@$date}}" placeholder="">
			</label>
		</div>
		<input type="hidden" name="session" id="session" value="{{$session}}">
	</form>		
</div>

<div class="attendance_tabs">
	<ul class="nav nav-tabs">
		<li class="nav-item"><a class="nav-link {{($session=='morning')?'active':''}}" href="javascript:void(0)" onclick="session('morning')">Morning Session</a></li>
		<li class="nav-item"><a class="nav-link {{($session=='evening')?'active':''}}" href="javascript:void(0)" onclick="session('evening')">Afternoon Session</a></li>
		

	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade active show" id="home">
			<section class="cstm_table">
				<div class="row">
					<div class="col-md-12">
						@include('teachers.attendances.partials.table', ['data' => $students])
					</div>
					
					<div class="d-flex justify-content-center">
						<ul class="pagination">
							
							{!! $students->appends(['filter' => 'true', 'search' => $search, 'class' => $classs, 'date' => $date, 'session' => $session])->links() !!}
							
						</ul>
					</div>
					
				</div>
			</section> 
		</div>

	</div>
</div>	

@else
	
@endif
<div class="col-sm-12 col-md-6 col-lg-6 ">No Class Assign </div>
@stop


@section('script')
<script>
@if(!@$_GET['filter'])
	jQuery('#filterform').submit();
@endif

function session(value){
	jQuery('#session').val(value);
	jQuery('#filterform').submit();
}
</script>
@endsection