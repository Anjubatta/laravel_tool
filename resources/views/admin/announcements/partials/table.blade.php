<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>         
          <th>Announcement Title</th>
          <th>Date</th>
          <th>Time</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
	  
        @foreach($data as $i => $announcement)
        <tr>        
          <td>{{ $announcement->title }}</td>
          <td>{{ $announcement->date }}</td>
          <td>{{ $announcement->time }}</td>
          <td class="action">
            
			<a href="{{ route('admin.announcements.show', $announcement->id) }}">
              <i class="fa fa-eye"></i>
            </a>
			<?php if($userid==$announcement->users_id){ ?> 
            <a href="{{ route('admin.announcements.edit', $announcement->id) }}">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.announcements.destroy', $announcement->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
			<?php } ?>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>