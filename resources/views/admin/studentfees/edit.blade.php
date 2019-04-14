@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="tile">
     

		<div class="tution_title">
		<h3>Tution Fee</h3>
		<h4>(OFFICIAL RECIEPT)</h4>
		</div>
	
        {!! Form::model($fee, ['route' => ['admin.fees.update', $fee->id], 'method' => 'PATCH']) !!}
          <div class="tile-body">

            @include('admin.studentfees.partials.form')

          </div>

          <div class="tile-footer">
            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

            <a class="btn btn-secondary" href="{{ route('admin.fees.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}
<div class="his_pay_table">
			<h2>History Payment</h2>
			@include('admin.studentfees.partials.payment_history')
			</div>
    </div>
  </div>

@stop