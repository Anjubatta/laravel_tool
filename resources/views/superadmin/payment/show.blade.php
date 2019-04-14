@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
        <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
          <a href="{{ route('superadmin.payment.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

        <div class="tile-body">
        <div class="row">
          <div class="col-md-4">
            <img style="width:100%" src="{{ asset('uploads/company/'.$payment->image) }}">
          </div>

          <div class="col-md-8">

              <p>
                <strong>Company/School Name</strong>: 
                {{ $payment->name }}
              </p>

              <p>
                <strong>ID No.</strong>: 
                {{ $payment->id_no }}
              </p>

              <p>
                <strong>Date Subscriped</strong>: 
                {{ date('F j, Y',strtotime(date($payment->created_at))) }}
              </p>

              <p>
                <strong>Subscription Detail</strong>: 
                {{ $payment->subscription_detail }}
              </p>

          </div>
        </div>

        <hr>
        <div class="col-md-12">
          <div class="details">
          <h3>Payment Detail</h3>
            
            <div class="edit">Edit
              <a href="{{ route('superadmin.payment.edit', $payment->id) }}"><i class="fa fa-pencil"></i></a>
            </div>

            <div class="toggle">
              <label>
                <input type="checkbox" {{ ($payment->auto_renew=='1') ? 'checked' : '' }}>
                <span class="button-indecator" onclick="event.preventDefault(); document.getElementById('autorenew-form').submit();">Renew</span>
              </label>
            </div>
            <form id="autorenew-form" action="{{ route('superadmin.payment.renew', $payment->id) }}" method="POST" style="display: none;">
            @csrf
            </form>
          </div>


          <p>
            <strong>Subscription Payment</strong>: 
            {{ $payment->subscription_payment }}
          </p>

          <p>
            <strong>Membership Status</strong>: 
            @if($payment->active=='1')
            Active
            @else
            Not active
            @endif
          </p>

          <p>
            <strong>Member Since</strong>: 
            {{ date('F j, Y',strtotime(date($payment->created_at))) }}
          </p>

          <p>
            <strong>Renewal due on</strong>: 
            {{ date('F j, Y',strtotime(date($payment->subscription_expired))) }}
          </p>


        </div>          

        </div>
    </div>
  </div>
</div>
@stop