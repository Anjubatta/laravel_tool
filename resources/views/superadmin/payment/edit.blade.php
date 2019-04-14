@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
          <a href="{{ route('superadmin.payment.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

        {!! Form::model($payment, ['route' => ['superadmin.payment.update', $payment->id], 'method' => 'PATCH']) !!}
          <div class="tile-body">

            @include('superadmin.payment.partials.form')

          </div>

          <div class="tile-footer">
            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

            <a class="btn btn-secondary" href="{{ route('superadmin.payment.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop