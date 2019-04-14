@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
        <div class="tile-title green">
            <h3>{{ $title['title'] }}</h3>
            <a href="{{ route('admin.announcements.index') }}" class="btn table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

    	<div class="tile-body">
    		
    		<p>
    			<strong>Title</strong>: 
	    		{{ $announcement->title }}
	    	</p>

	    	<p>
    			<strong>Date</strong>: 
	    		{{ $announcement->date }}
	    	</p>

	    	<p>
    			<strong>Time</strong>: 
	    		{{ $announcement->time }}
	    	</p>

	    	<p>
    			<strong>Description</strong>: 
	    		{!! $announcement->description !!}
	    	</p>

    	</div>
    </div>
  </div>
</div>
@stop