<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>  
          <th>Title</th>
          <th>Reasons for deviation</th>
		  <th>Date</th>
          <th>Remarks</th>         
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
	  <?php if(@$_GET['filter']){
		  $oldpage = '?p=report';
		  }else{
		  $oldpage = '';
		  }?>
		  
         @foreach($data as $i => $med)
        <tr>
          <td>{{ $i+1 }}</td>         
          <td>{{ $med->title }}</td>
          <td>{{ $med->reason }}</td>    
		  <td>{{ date('m/d/Y',strtotime($med->datetime)) }}</td>
          <td>{{ $med->remarks }}</td>
      
         
         
          <td class="action">
            <a href="{{ route('admin.deviations.show', [$med->student_id,$med->id]) }}{{$oldpage}}">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('admin.deviations.edit', [$med->student_id,$med->id]) }}{{$oldpage}}">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.deviations.destroy', [$med->student_id,$med->id]) }}{{$oldpage}}">
              <i class="fa fa-trash-o"></i>
            </a>
			
			 
			
          </td>
        </tr>
        @endforeach
       
        
      </tbody>
    </table>
  </div>
</div>