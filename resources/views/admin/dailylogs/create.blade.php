@extends('layouts.admin')
@section('content')

		<section class="Tution_head">

		<div class="tution_title">
		<h3>{{ $title['title'] }}</h3>
		</div>

        {!! Form::open(['route' => 'admin.dailylogs.store'], 'autocomplete=off') !!}
          <div class="tile-body">

            @include('admin.dailylogs.partials.form')

          </div>

          <div class="tile-footer">
				<div class="text-right my-3"><button type="submit" class="btn save_btn">Submit</button></div>
		  
			 
          </div>

        {!! Form::close() !!}

    </section>

@stop