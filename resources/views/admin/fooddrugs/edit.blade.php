@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
		   <?php if(@$_GET['p']){ 
			    $oldpage = 'report';
			   ?>
		 
		 <a href="{{ route('admin.reports.foods') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
		   
		   <?php }else{  $oldpage = ''; ?>
		  
		  <a href="{{ route('admin.students.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
		  
		  <?php }?>
         
      </div>

 {!! Form::model($fooddrug, ['route' => ['admin.fooddrugs.update', $student->id,$fooddrug->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
       
          <div class="tile-body">
            @include('admin.fooddrugs.partials.form')
          </div>

          <div class="tile-footer">
		  <input type="hidden" value="{{$oldpage}}" name="filter" />
		  
		  <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

            <a class="btn btn-secondary" href="{{ route('admin.students.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop