@extends('layouts.admin')
@section('content')

    <div class="tile tution_fee_outr">
		<div class="tution_title">
		<h3>Tution Fee</h3>
		<h5>(OFFICIAL RECIEPT)</h5>
		</div>
		
		
        {!! Form::open(['route' => 'admin.fees.store'], 'autocomplete=off') !!}
          <div class="tile-body">
			@include('admin.studentfees.partials.form')			
          </div>

          <div class="tile-footer">
            <button class="btn save_btn right_btn" type="submit">Save</button>
          </div>
        {!! Form::close() !!}
		
			<div class="his_pay_table">
			<h2>History Payment</h2>
			@include('admin.studentfees.partials.payment_history')
			</div>
    </div>
@stop