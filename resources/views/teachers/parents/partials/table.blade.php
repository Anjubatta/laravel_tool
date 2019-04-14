<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Parent ID</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach($data as $i => $parent)
        <tr>
          <td>{{ $i+1 }}</td>
          <td><a href="{{ route('teacher.parents.show', $parent->id) }}">{{ $parent->first_name }}</a></td>
          <td>{{ $parent->parent_id }}</td>
          <td>{{ $parent->email }}</td>
          <td>{{ $parent->gender }}</td>
          <td>{{ $parent->age }}</td>
          <td class="action">
            <a href="{{ route('teacher.parents.show', $parent->id) }}"">
              <i class="fa fa-eye"></i>
            </a>  
           
            <a href="{{ route('teacher.parents.edit', $parent->id) }}"">
              <i class="fa fa-pencil-square-o"></i>
            </a> 

            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('teacher.parents.destroy', $parent->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>

          </td>
        </tr>
        @endforeach
       
        
      </tbody>
    </table>
  </div>
</div>