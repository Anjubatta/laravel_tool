<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Date</th>
          <th>Time</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i => $announcement)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $announcement->title }}</td>
          <td>{{ $announcement->date }}</td>
          <td>{{ $announcement->time }}</td>
       
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>