@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="tile">
      <div class="tile-title green">
          <h3>{{ $title['title'] }}</h3>
          <a href="{{ route('admin.class.index', $teacher->id) }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
      </div>

     
		{!! Form::open(['route' => ['admin.class.store', $teacher->id]]) !!}
          <div class="tile-body">
<div class="error-msg help-block"></div>
            @include('admin.classesteachers.partials.form')

          </div>

          <div class="tile-footer">
       
            <button class="btn btn-primary" id="add_class"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
            <button class="btn btn-primary" type="submit" style="display:none;"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>

            <a class="btn btn-secondary" href="{{ route('admin.classes.index', $teacher->id) }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
</div>
@stop

@section('script')
<script type="text/javascript">
	
        jQuery(document).ready(function(){
            jQuery('#add_class').click(function(e){
			e.preventDefault();
		
		var data = $('form').serialize();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/admin/checkClassUnique') }}",
                  method: 'post',
                  data: data,
                  success: function(result){
				   var json = $.parseJSON(result);
                    if(json.status==1){
							$('form').submit();
						}else{							
							$('.error-msg').html(json.message);
						}
                  }});
               });
            }); 
		
    </script>
@endsection