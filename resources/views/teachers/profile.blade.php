@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<section class="Record">
			<div class="row">
				<div class="col-md-3 profile">
					<img src="{{ asset('img/profile.png')}}" alt="profile"/>
				</div>
				<div class="col-md-9">
					<div class="detail">			
						<h4><span class="title">FULL NAME:</span> <span>{{ auth()->user()->fname }} {{ auth()->user()->lname }} {{ $teacher->surname }}</span></h4>
						<h4><span class="title">ID NO:</span> <span>{{ $teacher->id_no }}</span></h4>
						<h4><span class="title">CONTACT NO:</span> <span>{{ $teacher->contactno }}</span></h4>
						
						
					</div>
				</div>
			</div>
		</section>
		
		<section class="personal">
		 
			<h2 class="heading"><span>Personal Informations</span></h2>
			<div class="personal_data">
				<div class="row mb-3">
					<div class="col-sm col-md-4">
						<h4>Surname:</h4>
						<h3>{{ $teacher->surname }}</h3>
					</div>
					<div class="col-sm col-md-4">
					 	<h4>First Name:</h4>
						<h3>{{ $teacher->users->fname }}</h3>
					</div>
					<div class="col-sm col-md-4">
					  	<h4>Middle Name:</h4>
						<h3>{{ $teacher->users->lname }}</h3>
					</div>
				</div>
				
				<div class="row mb-3" >
					<div class="col-sm col-md-4">
						<h4>Birthdate:</h4>
						<h3>{{ $teacher->dob }}</h3>
					</div>
					<div class="col-sm col-md-4">
					 	<h4>Age:</h4>
						<h3>51 Years old</h3>
					</div>
					<div class="col-sm col-md-4">
					  	<h4>Gender:</h4>
						<h3>{{ $teacher->gender }}</h3>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-sm col-md-12">
						<h4>Address:</h4>
						<h3>{{ $teacher->address }}</h3>
					</div>
					
					
				</div>
			</div>
		</section>

		<section class="observation">
			<h2 class="heading"><span>Observation</span></h2>
			<ul class="d-flex  list-unstyled excellent" >
				<li><span class="orange">1.</span> Excellent, Meets Expectations</li>
				<li><span class="orange">2.</span>Satisfactory</li>
				<li><span class="orange">3.</span> Needs Improvement</li>
			</ul>
			<div class="classroom">
				
			</div>
			
			<div id="accordion">
			@foreach($rating_headings as $i => $heading)
				<div class="card">
				
					<div class="card-header" id="headingOne">
						<h5 class="mb-2 accord-title">
							<span class="flex-9">{{$heading->name}}</span>
							<span class="flex-3">RATING<button type="button" class="btn btn-link rating float-right" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</button></span> 
							
						</h5>
					</div>
					
					<div id="collapseOne{{$i}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							
							@foreach($heading->rating_options as $option)
							
							<div class="row">
								<div class="col-md-8 col-x-12"><p>{{$option->name}}</p></div>
								<div class="col-md-4 col-x-12">
								
									<div class="form-check form-check-inline">
										
										@if(count($rating_teachers)>0)
										@foreach($rating_teachers as $rate)
										@if($rate->rating_options_id==$option->id)
										<label class="rating_radio"><span class="nm">1</span>
											<input type="radio" {{ ($rate->rate=='Excellent')?'checked':'' }} name="rating[{{$option->id}}]" value="Excellent">
											<span class="checkmark"></span>
										</label>
										
										<label class="rating_radio"><span class="nm">2</span>
											<input type="radio" {{ ($rate->rate=='Satisfactory')?'checked':'' }} name="rating[{{$option->id}}]" value="Satisfactory">
											<span class="checkmark"></span>
										</label>
										
										<label class="rating_radio"><span class="nm">3</span>
											<input type="radio" {{ ($rate->rate=='Needs Improvement')?'checked':'' }} name="rating[{{$option->id}}]" value="Needs Improvement">
											<span class="checkmark"></span>
										</label>
										@endif
										@endforeach
										
										@else
											
										<label class="rating_radio"><span class="nm">1</span>
											<input type="radio" name="rating[{{$option->id}}]" value="Excellent">
											<span class="checkmark"></span>
										</label>
										
										<label class="rating_radio"><span class="nm">2</span>
											<input type="radio" name="rating[{{$option->id}}]" checked value="Satisfactory">
											<span class="checkmark"></span>
										</label>
										
										<label class="rating_radio"><span class="nm">3</span>
											<input type="radio" name="rating[{{$option->id}}]" value="Needs Improvement">
											<span class="checkmark"></span>
										</label>
										
										@endif										
							
									</div>		
								</div>
							</div>
							@endforeach
							
						</div>
					</div>
				</div>
			@endforeach
			
				
				
			</div>
			
		</section>
		
		
	</div>
</div>
		@stop