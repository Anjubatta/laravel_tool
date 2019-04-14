@extends('layouts.admin')
@section('content')
<div class="row">
		<div class="container">
 <section class="Tution_head">
		

		<div class="tution_title">    
          
			<h3>{{ $title['title'] }}</h3>
		 </div>
 
		{!! Form::open(['route' => ['teacher.portfolios.store', $student->id], 'method' => 'POST','enctype=multipart/form-data']) !!}
		
   
          <div class="tile-body">

            @include('teachers.portfolios.partials.form')

          </div>

          <div class="tile-footer">
                      		
			<div class="my-3"><button  type="submit" class="btn save_btn">POST</button></div>
		
          </div>

        {!! Form::close() !!}
</section>
    </div>
  </div>

@stop