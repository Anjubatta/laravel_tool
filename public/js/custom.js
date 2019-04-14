'use strict'
jQuery(document).ready(function ($) {
	
/**********leave dashboard action start*************/

jQuery('.approve').click(function(e){
	e.preventDefault(); 

	$('.status').val('approve');	
	$( this ).closest('form').submit();
});

jQuery('.decline').click(function(e){
	e.preventDefault(); 
	$('.status').val('decline');	
	$( this ).closest('form').submit();
});
/**********leave form on teacher start*************/
$('input').attr('autocomplete','off');

jQuery('.dateandtimepicker').datetimepicker({
   		format: 'Y/m/d H:i'
});

jQuery('.monthyearpicker').datetimepicker({
   		 timepicker:false,
		 format: 'Y/m'
});

jQuery('.leavepicker').datetimepicker({
   		 timepicker:false,
		 format: 'Y-m-d',
		  minDate: 0,
});

jQuery('.datetimepicker').datetimepicker({
   		 timepicker:false,
		 format: 'Y/m/d'
});

jQuery('.announcedatepicker').datetimepicker({
   		 timepicker:false,
		 format: 'Y/m/d',
		  minDate: 0,
});
 

jQuery('.timepicker').datetimepicker({
     datepicker:false,
	 format: 'H:i'
});




		
		
		jQuery('.leave_unit input').change(function(){
			
		
			var val = $(this).val();
			if(val=='days'){
					$('.days_show').show();
					$('.time_show').hide();
				}else{
					$('.days_show').hide();
					$('.time_show').show();
				}
		});
		


		/* jQuery(document).ready(function(){
            jQuery('#add_leave').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/leaves/store') }}",
                  method: 'post',
                  data: ,
                  success: function(result){
                     console.log(result);
                  }});
               });
            }); */
/**********leave form on teacher end*************/

/**********student add parent**************/
jQuery('.editrelation').click(function(e){

		           jQuery('.parent_id1').val($(this).attr('data-parent'));
		           jQuery('#id').val($(this).attr('data-relationid'));
		           jQuery('.relation1').val($(this).attr('data-relation'));
	
	});
});
