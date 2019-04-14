<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Log Entry By</th>
          <th>Date</th>
          <th>Time In</th>
          <th>Time Out</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i => $log)
        <tr>
          <td>{{ $i+1 }}</td>
		  <td>{{ $log->log_entry_by }}</td>
          <td>{{ date('m/d/Y',strtotime($log->date)) }}</td>         
          <td>{{ date('h:i a',strtotime($log->timein)) }}</td>
          <td>{{ date('h:i a',strtotime($log->timeout)) }}</td>
          <td class="action">
            <a href="{{ route('admin.dailylogs.show', $log->id) }}">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('admin.dailylogs.edit', $log->id) }}">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.dailylogs.destroy', $log->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>