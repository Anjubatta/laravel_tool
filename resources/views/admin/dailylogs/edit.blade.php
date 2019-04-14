@extends('layouts.admin')
@section('content')
	<div class="container">
		<section class="Tution_head">

		<div class="tution_title">
		<h3>{{ $title['title'] }}</h3>
		</div>

        {!! Form::model($dailylog, ['route' => ['admin.dailylogs.update', $dailylog->id], 'method' => 'PATCH']) !!}
          <div class="tile-body">

            @include('admin.dailylogs.partials.form')

          </div>

          <div class="tile-footer">
            <div class="tile-footer">
			 
				<div class="text-right my-3"><button type="submit" class="btn save_btn" name="submit">Submit</button></div>
          </div>

        {!! Form::close() !!}

    
    </section>
  </div>
@stop