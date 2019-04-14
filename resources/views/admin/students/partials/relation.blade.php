<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Parent Name</th>
          <th>Parent ID</th>
          <th>Relation</th>          
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach($data as $i => $rel)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $rel->parents->first_name }} {{ $rel->parents->middel_name }}</td>
          <td>{{ $rel->parents->parent_id }}</td>
          <td>{{ $rel->relation }}</td>   
          <td class="action"> 
			  <!---a data-toggle="modal" data-target="#editrelation" role="button" data-student="{{ $rel->student_id }}" data-parent="{{ $rel->parent_id }}" data-relation="{{ $rel->relation }}" data-relationid="{{ $rel->id }}" class="editrelation"><i class="fa fa-edit"> </i></a-->
			  
			  <form action="{{ route('admin.relation.destroyrel', $rel->student_id) }}" method="POST">
						@csrf
						<input type="hidden" name="id"  value="{{ $rel->id }}" />
						<button data-method="Delete" data-confirm="Are you sure?" class="delete_leave"  data-id="{{ $rel->id }}" href="">
							<i class="fa fa-trash-o"></i>
						</button>
						</form>
			
						
		  </td>
        </tr>
        @endforeach
       
        
      </tbody>
    </table>
  </div>
</div>