@extends('layouts.admin')
@section('content')
 
	<div class="main">
	<div class="container">
		<section class="Tution_head">
		<div class="d-flex justify-content-end mt-3">
		<button type="button" class="btn print-btn" onClick="window.print()" >
		<span class="crcle"><i class="fa fa-print" aria-hidden="true"></i></span>
		Print Receipt</button>
		</div>

		<div class="tution_title">
		<h3>{{ $title['title'] }}</h3>
		</div>
{!! Form::model($fooddrug, ['route' => ['admin.fooddrugs.update', $student->id,$fooddrug->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
       
          <div class="tile-body">
            @include('admin.fooddrugs.partials.form')
          </div>
		  
	
 {!! Form::close() !!}	  
		  
	</div>
	</div>
	
@section('script')

<script>
jQuery('input,textarea').attr('disabled',true);	
</script>
@endsection
@stop