@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
          <a href="{{ route('admin.students.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
      </div>
 {!! Form::model($portfolio, ['route' => ['admin.portfolios.update', $student->id,$portfolio->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
       
          <div class="tile-body">
            @include('admin.portfolios.partials.form')
          </div>

          <div class="tile-footer">
            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

            <a class="btn btn-secondary" href="{{ route('admin.students.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop