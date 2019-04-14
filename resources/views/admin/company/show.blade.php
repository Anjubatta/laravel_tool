@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
        <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
		      
			
          <a href="{{ route('admin.dashboard.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
		  <a href="{{ route('admin.company.edit', $company->id) }}" class="company_edit">
              <i class="fa fa-pencil-square-o"></i>
            </a>   
        </div>

    	<div class="tile-body">
    		<div class="row">
          <div class="col-md-4">
            <img style="width:100%" src="{{ asset('uploads/company/'.$company->image) }}">
          </div>

          <div class="col-md-8">

              <p>
                <strong>Company/School Name</strong>: 
                {{ $company->name }}
              </p>

              <p>
                <strong>ID No.</strong>: 
                {{ $company->id_no }}
              </p>

              <p>
                <strong>Date Subscriped</strong>: 
                {{ date('F j, Y',strtotime(date($company->created_at))) }}
              </p>

              <p>
                <strong>Subscription Detail</strong>: 
                {{ $company->subscription_detail }}
              </p>

          </div>
        </div>

        <hr>
        <div class="col-md-12">
          <h3>Company Profile</h3>

          <p>
            <strong>Company Short Information</strong>: 
            {!! $company->information !!}
          </p>

          <p>
            <strong>Address</strong>: 
            {!! $company->address !!}
          </p>
			<p>
            <strong>Annual Paid Leaves</strong>: 
            {!! $company->annual_leave !!}
          </p>
		  <p>
            <strong>Expected Attendance</strong>: 
            {{ $company->expected_attendance }}
          </p>

		  
          <p>
            <strong>Subscription Payment</strong>: 
            {{ $company->subscription_payment }}
          </p>

          <p>
            <strong>Status</strong>: 
            @if($company->active=='1')
            Active
            @else
            Not active
            @endif
          </p>

        </div>    		

    	</div>
    </div>
  </div>
</div>
@stop