@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
        <div class="tile-title green">
            <h3>{{ $title['title'] }}</h3>
            <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

    	<div class="tile-body">
    		
    		<p>
    			<strong>Name</strong>: 
	    		{{ $teacher->users->fname }} {{ $teacher->users->lname }} {{ $teacher->surname }}
	    	</p>

	    	<p>
    			<strong>Email</strong>: 
	    		{{ $teacher->users->email }}
	    	</p>

	    	<p>
    			<strong>Address</strong>: 
	    		{{ $teacher->address }}
	    	</p>

	    	<p>
    			<strong>Contact No</strong>: 
	    		{{ $teacher->contactno }}
	    	</p>
            <p>
                <strong>Gender</strong>
                {{ $teacher->gender }}

            </p>
            <p>
                <strong>DOB</strong>
                {{ $teacher->dob }}
            </p>


    	</div>
    </div>
  </div>
</div>
@stop