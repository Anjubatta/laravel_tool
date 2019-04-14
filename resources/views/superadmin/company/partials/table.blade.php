<div class="tile-body">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>UEN No</th>
          <th>Date Subscribed</th>
          <th>Expiration Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $i => $company)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $company->name }}</td>
          <td>{{ $company->id_no }}</td>
          <td>{{ date('F j, Y',strtotime(date($company->created_at))) }}</td>
          <td>{{ date('F j, Y',strtotime(date($company->subscription_expired))) }}</td>
          <td class="action">
            <a href="{{ route('superadmin.company.show', $company->id) }}"">
              <i class="fa fa-eye"></i>
            </a>  
            <a href="{{ route('superadmin.company.edit', $company->id) }}"">
              <i class="fa fa-pencil-square-o"></i>
            </a>                            
            <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('superadmin.company.destroy', $company->id) }}">
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>