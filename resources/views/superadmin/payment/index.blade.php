@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
    <div class="tile-title green">
	    <h3>{{ $title['title'] }}</h3>
	</div>

    @include('superadmin.payment.partials.table', ['data' => $company])
    
    </div>
  </div>
</div>
@stop