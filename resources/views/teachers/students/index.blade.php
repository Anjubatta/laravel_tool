@extends('layouts.admin')
@section('content')

<div class="row pt-4 mb-3">
	@if($class_id)
		    <div class="col-sm-12 col-md-6 col-lg-8 ">
			
			
			<form method="get" id="filterform">
					<div class="dataTables_filter">
						<label>Search:
							<input type="text" value="{{ $search }}"  name=	"search" class="form-control form-control-sm" placeholder="Student Name/ Student No" >
						</label>
					</div>
					<div class="dataTables_filter">
					

						<label>Class:							
							{!! Form::select('class_id', $class, $class_id, ['class' => 'form-control class_filter' . ($errors->has('class_id') ? ' is-invalid' : '') , 'onchange' =>'this.form.submit()' ]) !!}
						</label>
					 </div>
					 <div class="dataTables_filter">
						<label>Year:							
							{!! Form::select('year', $years, $year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'onchange' =>'this.form.submit()' ]) !!}
						</label>
					 </div>
					 
				
				</form>
				
			</div>
			
			<div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-end">
			<a href="{{ route('teacher.students.create') }}" class="outile_addbtn"><i class="fa fa-plus" aria-hidden="true"></i>
				Add  {{ $title['title'] }}
			</a>
			</div>	@else
					<div class="col-sm-12 col-md-6 col-lg-6 ">No Class Assign </div>
				@endif
</div>
<div class="record_title">
				<h3>{{ $class_name }}({{ $student_count }} students)</h3>
				<h4>Teacher:<span> {{ Auth::user()->fname }} {{ Auth::user()->lname }}</span></h4>
			</div>
 @if($students)
<div class="row">
	<div class="col-md-12">		
		<div class="tile">			
			@include('teachers.students.partials.table', ['data' => $students])
			
		</div>
		
		
	<div class="d-flex justify-content-center">
			<ul class="pagination">
				@if($search)
				{!! $students->appends(['search' => $search])->links() !!}
				@else
				{{ $students->links() }}
				@endif
			</ul>
		</div>
		
	</div>
</div>
@else
	<div>No Student Found</div>
@endif

@stop
