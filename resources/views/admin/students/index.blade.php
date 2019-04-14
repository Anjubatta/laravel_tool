@extends('layouts.admin')
@section('content')

<div class="row pt-4 mb-3">
	
		    <div class="col-sm-12 col-md-9 col-lg-9">
				<form method="get" id="filterform">
					<div class="dataTables_filter">
						<label>Search
							<input type="text" value="{{ $search }}"  name=	"search" class="form-control form-control-sm" placeholder="Student Name/ Student No" >
						</label>
					</div>
					<div class="dataTables_filter">
					

						<label>Class
						<select name="class_id" class="form-control" onchange="this.form.submit()" >
						<option>Select</option> 
						<?php foreach($class as $key=>$val){ ?>
								<option value="<?=$key;?>" <?=($key==$class_id)?'selected':''?>><?=$val;?></option>
							<?php } 
							?>
					</select>
							
						</label>
					 </div>
					 <div class="dataTables_filter">
						<label>Year						
							{!! Form::select('year', $years, $year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'onchange' =>'this.form.submit()' ]) !!}
						</label>
					 </div>
					 
				
				</form>
			</div>
			
			<div class="col-sm-12 col-md-3 col-lg-3 d-flex justify-content-end">
			<a href="{{ route('admin.students.create') }}" class="outile_addbtn"><i class="fa fa-plus" aria-hidden="true"></i>
				Add  {{ $title['title'] }}
			</a>
			</div>	
</div>


<div class="row">
	<div class="col-md-12">		
		<div class="tile">			
			@include('admin.students.partials.table', ['data' => $students])
			
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

@stop
