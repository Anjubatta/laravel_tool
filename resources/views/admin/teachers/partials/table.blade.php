

<div class="tile-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					
					<th>Name</th>
					<th>ID No</th>
					<th>Classes</th>
					<th>Contact</th>
					<th>Attandance Rating</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $i => $teacher)
				<tr>
					
					<td>{{ $teacher->surname }} {{ $teacher->users->fname }} {{ $teacher->users->lname }}</td>
					<td>{{ $teacher->id_no }}</td>
					<td>{{ count($teacher->classes_teachers) }}</td>	
					<td>{{ $teacher->contactno }} </td>
					
					<td></td>
					<td class="action">
						<a href="{{ route('admin.teachers.show', $teacher->id) }}">
							<i class="fa fa-eye"></i>
						</a>  
						<a href="{{ route('admin.teachers.edit', $teacher->id) }}">
							<i class="fa fa-pencil-square-o"></i>
						</a>                            
						<a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.teachers.destroy', $teacher->id) }}">
							<i class="fa fa-trash-o"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
</div>

 






