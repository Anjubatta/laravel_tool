@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="tile">
     <div class="d-flex justify-content-end">
		<button type="button" class="btn print-btn"  onClick="window.print()">
		<span class="crcle"><i class="fa fa-print" aria-hidden="true"></i></span>
		Print Receipt</button>
		</div>

		<div class="tution_title">
		<h3>Tution Fee</h3>
		<h4>(OFFICIAL RECIEPT)</h4>
		</div>
	
        {!! Form::model($fee, ['route' => ['admin.fees.update', $fee->id], 'method' => 'PATCH']) !!}
          <div class="tile-body">

            @include('admin.studentfees.partials.form')

          </div>
        {!! Form::close() !!}

    </div>
  </div>
@section('script')
<script>
jQuery('input,select').attr('disabled',true);	
</script>
@endsection
@stop
