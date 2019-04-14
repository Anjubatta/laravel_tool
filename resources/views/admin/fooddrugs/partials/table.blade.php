<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>         
          <th>Student Name</th>
          <th>Drug Allergy</th>
          <th>Food Allergy</th>
          <th>Other Restrictions</th>
         
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
	  <?php if(@$_GET['filter']){
		  $oldpage = '?p=report';
		  }else{
		  $oldpage = '';
		  }?>
         @foreach($data as $i => $food)
        <tr>
          <td>{{ $i+1 }}</td>         
          <td>{{ $food->student->first_name }} {{ $food->student->middel_name }}</td>
          <td>{{ $food->drug_allergy }}</td>       
          <td>{{ $food->food_allergy }}</td>       
          <td>{{ $food->other_restrictions }}</td>       
         
          <td class="action">
            <a href="{{ route('admin.fooddrugs.show', [$food->student_id,$food->id]) }}{{$oldpage}}">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('admin.fooddrugs.edit', [$food->student_id,$food->id]) }}{{$oldpage}}">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.fooddrugs.destroy', [$food->student_id,$food->id]) }}{{$oldpage}}">
              <i class="fa fa-trash-o"></i>
            </a>
			
			 
			
          </td>
        </tr>
        @endforeach
       
        
      </tbody>
    </table>
  </div>
</div>