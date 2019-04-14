@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
	
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
							{!! Form::select('class_id', $class, $classs, ['class' => 'form-control class_filter' . ($errors->has('class_id') ? ' is-invalid' : '') , 'onchange' =>'this.form.submit()' ]) !!}
						</label>
		</div>
		
	</form>		
</div>


		<div class="tile">
			<div class="tile-title green">
				<h3>{{ $title['title'] }}</h3>
			</div>
			
			@include('admin.incidents.partials.table', ['data' => $incident])
			
		</div>
	</div>
</div>

@stop

@section('script')
<script>
@if(!@$_GET['filter'])
	jQuery('#filterform').submit();
@endif

</script>
@endsection
