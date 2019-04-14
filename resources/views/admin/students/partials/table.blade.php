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
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach($data as $i => $student)
        <tr>
          <td>{{ $i+1 }}</td>
          <td><a href="{{ route('admin.students.show', $student->id) }}">{{ $student->first_name }} {{ $student->middle_name }}</a></td>
          <td>{{ $student->student_no }}</td>
          <td>{{ $student->gender }}</td>
         <td>{{@$student->relation->parents->first_name}}</td>
          <td>@php($sendby = parentName(@$student->send_pick_by))
		  {{$sendby}}
			  </td>
          <td class="action ">
            <a href="{{ route('admin.students.show', $student->id) }}"">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('admin.students.edit', $student->id) }}"">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.students.destroy', $student->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
			<a href="{{ route('admin.relation.index', $student->id) }}" class="btn  mb-2">
			<i class="fa fa-sitemap"></i>
			</a>
			 
			
          </td>
        </tr>
        @endforeach
       
        
      </tbody>
    </table>
  </div>
</div>