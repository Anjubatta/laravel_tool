@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
         
      </div>

        {!! Form::model($leave, ['route' => ['admin.leaves.update', $teacher->id,$leave->id], 'method' => 'PATCH']) !!}
          <div class="tile-body">

            @include('admin.leaves.partials.form')

          </div>

         

        {!! Form::close() !!}

    </div>
  </div>
</div>
@section('script')

<script>
jQuery('input[type="text"],select,textarea').attr('disabled',true);	
</script>
<script>
function picker(id){
	jQuery('#'+id).focus();
}
</script>
@endsection
@stop