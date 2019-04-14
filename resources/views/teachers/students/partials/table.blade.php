<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Student No</th>
          <th>Gender</th>
          <th>Parent</th>
          <th>Send/Pick up person</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
	  @if($data)
         @foreach($data as $i => $student)
        <tr>
          <td>{{ $i+1 }}</td>
          <td><a href="{{ route('teacher.students.show', $student->id) }}">{{ $student->first_name }}</a></td>
          <td>{{ $student->student_no }}</td>
          <td>{{ $student->gender }}</td>
          <td>{{@$student->relation->parents->first_name}}</td>
          <td>{{ @$student->send_pick_by }}</td>
          <td class="action">
            <a href="{{ route('teacher.students.show', $student->id) }}"">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('teacher.students.edit', $student->id) }}"">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('teacher.students.destroy', $student->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
			
			 
			
          </td>
        </tr>
        @endforeach
       @endif
        
      </tbody>
    </table>
  </div>
</div>