@extends('layouts.admin')
@section('content')
<div class="row">

	<div class="col-md-4">
		<a href="{{ route('superadmin.payment.index') }}">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-money fa-3x"></i>
			<div class="info">
				<h4>Payment Details</h4>
			</div>
		</div>
		</a>
	</div>
	
</div>
@stop