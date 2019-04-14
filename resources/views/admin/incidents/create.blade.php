@extends('layouts.admin')
@section('content')
<div class="row">
		<div class="container">
 <section class="Tution_head">
		<div class="d-flex justify-content-end mt-3">
		<button type="button" class="btn print-btn">
		<span class="crcle"><i class="fa fa-print" aria-hidden="true"></i></span>
		Print Receipt</button>
		</div>

		<div class="tution_title">    
          
			<h3>{{ $title['title'] }}</h3>
		 </div>
 
		{!! Form::open(['route' => ['admin.incidents.store', $student->id]]) !!}
   
          <div class="tile-body">

            @include('admin.incidents.partials.form')

          </div>

          <div class="tile-footer">
                      		
			<div class="text-right my-3"><button  type="submit" class="btn save_btn">Submit</button></div>
		
          </div>

        {!! Form::close() !!}
</section>
    </div>
  </div>

@stop