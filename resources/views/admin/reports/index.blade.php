@extends('layouts.admin')
@section('content')
<div class="row">

	<div class="col-md-6">
		<a href="{{ route('admin.reports.foods') }}">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-cutlery fa-3x"></i>
			<div class="info">
				<h4>Food and Drugs Allergy Record</h4>
			</div>
		</div>
		</a>
	</div>
	
	<div class="col-md-6">
		<a href="{{ route('admin.reports.incidents') }}">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-medkit fa-3x"></i>
			<div class="info">
				<h4>Incident/Accident/Injury</h4>
			</div>
		</div>
		</a>
	</div>
	
	<div class="col-md-6">
		<a href="{{ route('admin.reports.medicines') }}">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-stethoscope fa-3x"></i>
			<div class="info">
				<h4>Administration of Medicines</h4>
			</div>
		</div>
		</a>
	</div>
	
	<div class="col-md-6">
		<a href="{{ route('admin.reports.deviations') }}">
		<div class="widget-small primary coloured-icon">
			<i class="icon fa fa-list-alt fa-3x"></i>
			<div class="info">
				<h4>Deviation from menu</h4>
			</div>
		</div>
		</a>
	</div>
	
</div>
@stop