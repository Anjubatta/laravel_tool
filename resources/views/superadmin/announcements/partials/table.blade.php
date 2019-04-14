<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Date</th>
          <th>Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i => $announcement)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $announcement->title }}</td>
          <td>{{ $announcement->date }}</td>
          <td>{{ $announcement->time }}</td>
          <td class="action">
            <a href="{{ route('superadmin.announcements.show', $announcement->id) }}"">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('superadmin.announcements.edit', $announcement->id) }}"">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('superadmin.announcements.destroy', $announcement->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>