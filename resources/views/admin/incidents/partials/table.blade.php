<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Report ID</th>
          <th>Student Name</th>
          <th>Date</th>
          <th>Time</th>
          <th>Type of Accident</th>
          
          <th>Action</th>
        </tr>
      </thead>
      <tbody> <?php if(@$_GET['filter']){
		  $oldpage = '?p=report';
		  }else{
		  $oldpage = '';
		  }?>
		  
         @foreach($data as $i => $incidents)
        <tr>
          <td>{{ $i+1 }}</td>
          <td><a href="{{ route('admin.students.show', $incidents->student_id) }}">{{ $incidents->id }}</a></td>
          <td>{{ $incidents->student->first_name }} {{ $incidents->student->middel_name }}</td>
          <td>{{ $incidents->date }}</td>
          <td>{{ $incidents->time }}</td>
          <td>{{ $incidents->type_of_incident }}</td>
         
          <td class="action">
            <a href="{{ route('admin.incidents.show', [$incidents->student_id,$incidents->id]) }}{{$oldpage}}"">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('admin.incidents.edit', [$incidents->student_id,$incidents->id]) }}{{$oldpage}}"">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.incidents.destroy', [$incidents->student_id,$incidents->id]) }}{{$oldpage}}">
              <i class="fa fa-trash-o"></i>
            </a>
			
			 
			
          </td>
        </tr>
        @endforeach
       
        
      </tbody>
    </table>
  </div>
</div>