<div class="portfolio-post parent-profile-view">
		
		<div class="view-bx">
				  @foreach($portfoilos as $i => $portfoilo)
				
				<p class="edit_delete"><small>{{  date('d/m/Y', strtotime($portfoilo->post_date)) }}</small>
<span>
	<a class="edit" href="{{ route('teacher.portfolios.edit', [$portfoilo->student_id,$portfoilo->id]) }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	
	<a class="trash" data-method="Delete" data-confirm="Are you sure?" href="{{ route('teacher.portfolios.destroy', [$portfoilo->student_id,$portfoilo->id]) }}" ><i class="fa fa-trash" aria-hidden="true"></i></a>
	</span>
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