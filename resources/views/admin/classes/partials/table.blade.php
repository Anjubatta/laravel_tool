<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
         
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i => $classes)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $classes->name }}</td>
         
          <td class="action">
           
            <a href="{{ route('admin.classes.edit', $classes->id) }}"">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.classes.destroy', $classes->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>