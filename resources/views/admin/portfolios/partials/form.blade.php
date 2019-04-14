<div class="form-group {!! ($errors->has('dob') ? 'has-error' : '') !!}">
 
    <div class="input-group datefield">
        {!! Form::text('post_date', null, ['class' => 'form-control datetimepicker' . ($errors->has('post_date') ? ' is-invalid' : '')  ]) !!}
        <div class="input-group-append" onclick="picker('post_date')">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
		</div>
	</div>
    {!! $errors->first('post_date', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {!! ($errors->has('post_content') ? 'has-error' : '') !!}">
 
    {!! Form::textarea('post_content', null, ['class' => 'form-control' . ($errors->has('post_content') ? ' is-invalid' : ''), 'rows' => '4', 'placeholder' =>'Description here, put it here' ]) !!}
    {!! $errors->first('post_content', '<span class="help-block">:message</span>') !!}
</div>


@if(Request::segment(6)=='edit')	
@foreach($get_image as $img=> $val)

<div class="images-list">
	<img src="{{ asset('uploads/posts/'.$val->image)}}"  width="100%" alt="{{$val->image}}" data-id="{{$val->id}}"/>
	<button type='button' class='remove-img'>X</button>
</div>

@endforeach
@endif
<input type="hidden" name="deleted_img" class="deleted_img" value="" />
<div id="image_preview"></div>

<div class="upload-btn-wrapper">
	
	
	
	
	<button class="uploadbtn">
		<i class="fa fa-plus" aria-hidden="true"></i>Add photo 	
	</button>
	<div class="input_continer"><input type="file" class="upload_file" name="images[]"   multiple />
	</div>


</div>
@section('script')
<script>
	$(document).on("change",'.upload_file', function(event) { 
    var total_file = $(this).get(0).files.length;
		for(var i=0;i<total_file;i++)
		{
			$('#image_preview').append("<div class='imgbox'><img src='"+URL.createObjectURL(event.target.files[i])+"' width=200px class='pip'><button type='button' class='remove-image'>X</button></div>");
		}
		$(this).hide();
		$(this).after('<input type="file" class="upload_file" name="images[]"   multiple />');
		
} );
	
	
	$(document).on('click','.remove-image',function(){	
		$(this).parent('.imgbox').remove();
	});
	
	$(document).on('click','.remove-img',function(){
		var $id = $(this).prev('img').attr('data-id') + ','+$('.deleted_img').val();		
		$('.deleted_img').val($id);
		$(this).parent('.images-list').remove();
	});
	
	$(document).on('click','.edit',function(){
		var id = $(this).data('id');
		var student_id = $(this).data('studentid');
		
	});
</script>

@endsection