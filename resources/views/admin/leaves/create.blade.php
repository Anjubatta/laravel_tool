@extends('layouts.admin')
@section('content')
<div class="row">
		<div class="container">
 <section class="Tution_head">
		<div class="d-flex justify-content-end mt-3">
	
		</div>

		<div class="tution_title">    
          
			<h3>{{ $title['title'] }}</h3>
		 </div>
 
		{!! Form::open(['route' => ['admin.leaves.store', $teacher->id]]) !!}
   
          <div class="tile-body">
            @include('admin.leaves.partials.form')
          </div>
          <div class="tile-footer">                      		
			<div class="text-right my-3"><button  type="submit" class="btn save_btn">Submit</button></div>		
          </div>

        {!! Form::close() !!}
</section>
    </div>
  </div>

@stop