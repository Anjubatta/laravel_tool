@extends('layouts.admin')
@section('content')
<div class="main">
	<div class="container">
			<!--Teacher view post-->	
		<div class="portfolio-post">
				<h2>portfolio</h2>
				
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Recent Post</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Post an update</a>
				  </li>
				    
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade  " id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="post">
							{!! Form::open(['route' => ['teacher.portfoilo.store', $student->id], 'method' => 'POST','enctype=multipart/form-data'], 'autocomplete=off') !!}
								  <div class="form-group">
									<input type="date" 
									name="post_date" class="" >
								  </div>
								  <div class="form-group">
									<textarea placeholder="Description here, put it here" name="post_content"></textarea>
								  </div>
								  <div class="form-group">
									<input type="text" class="" placeholder="Posted by teacher's name" value="{{ auth()->user()->fname }} {{ auth()->user()->lname }}" disabled>
								  </div>
								
								      <div class="upload-btn-wrapper">
										  <button class="uploadbtn"><i class="fa fa-plus" aria-hidden="true"></i>Add photo 	</button>
										  <input type="file" id="upload_file" name="images[]" onchange="preview_image();"  multiple />
									  </div>
									  <input type="hidden" name="student_id" value="{{ $student->id }}" />
								  <button type="submit" class=" postbtn">Post</button>
								{!! Form::close() !!}
							<div id="image_preview"></div>
						</div>
				</div>
				  <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
				  	<div class="portfolio-post parent-profile-view">
		
		<div class="view-bx">
				  @foreach($portfoilos as $i => $portfoilo)
				
				<p class="edit_delete"><small>{{  date('d/m/Y', strtotime($portfoilo->post_date)) }}</small>
<span><button class="edit" data-id="{{ $portfoilo->id }}" data-studentid = "{{ $portfoilo->student_id }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a data-method="Delete" data-confirm="Are you sure?" href="{{ route('teacher.portfoilo.destroy', [$portfoilo->student_id,$portfoilo->id]) }}">
<button ><i class="fa fa-trash" aria-hidden="true"></i> </button></a></span>
</p>
				<p>{{ $portfoilo->post_content }}</p>
				<h6>{{ auth()->user()->fname }} {{ auth()->user()->lname }}</h6>
				<div class="row">
					@foreach($portfoilo->images as $img=> $val)
				<div class="col-md-6">
						<img src="{{ asset('uploads/posts/'.$val->image)}}"  width="100%" alt=""/>
				</div>
				@endforeach
				</div>

				@endforeach		
	</div>
	</div>
				  </div>
				</div>
		</div>			
	</div>
	</div>
	@stop
@section('script')
	<script>
		
		function preview_image() 
			{
			 var total_file=document.getElementById("upload_file").files.length;
			 for(var i=0;i<total_file;i++)
			 {
			  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width=200px class='pip'><button type='button' class='remove'>Remove image</span>");
			 }
			}
			 $(".remove").click(function(){
			 	alert("hello");
            $(this).parent(".pip").remove();
          });
		$(document).on('click','.edit',function(){
		  var id = $(this).data('id');
		  var student_id = $(this).data('studentid');
		   
		});
	</script>

	@endsection