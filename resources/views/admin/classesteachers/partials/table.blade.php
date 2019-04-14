<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Teacher Name</th>
          <th>Class Name</th>
          <th>Session</th>
         
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i => $classes)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $classes->teachers->user->fname }}</td>
          <td>{{ $classes->classes->name }}</td>
          <td>{{ $classes->session }}</td>
         
           <td class="action">
                                     
            <a href="{{ route('admin.class.edit',[$teacher->id,$classes->id]) }}">
              <i class="fa fa-edit"></i>
            </a>			
			| 
			<a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.class.destroy',[$teacher->id,$classes->id]) }}">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>