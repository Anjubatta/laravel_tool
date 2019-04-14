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
 
		{!! Form::open(['route' => ['admin.medicines.store', $student->id]]) !!}
   
          <div class="tile-body">

            @include('admin.medicines.partials.form')

          </div>

          <div class="tile-footer">
                      		
			
			
			<div class="d-flex justify-content-between"><button type="cancel" class="btn save_btn cancel_btn">Cancel</button><button type="submit" class="btn save_btn">Add</button></div>
			
			
		
          </div>

        {!! Form::close() !!}
</section>
    </div>
  </div>

@stop