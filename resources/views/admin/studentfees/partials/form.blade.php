<div class="row tution_detail">
	<div class="col-md-12 col-lg-6 col-sm-12">
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-4">For the Month:</label>
			<div class="col-sm-12 col-md-6 col-lg-8">
				
				{!! Form::text('for_month', null, ['class' => 'form-control leavepicker' . ($errors->has('for_month') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('for_month', '<span class="help-block">:message</span>') !!}
				
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-4">Status:</label>
			<div class="col-sm-12 col-md-6 col-lg-8">
				{!! Form::select('status', ['Paid' => 'Paid', 'Unpaid' => 'Unpaid'], null) !!}
				
				{!! $errors->first('status', '<span class="help-block">:message</span>') !!}
			</div> 
		</div>
	</div>
	<div class="col-md-12 col-lg-6 col-sm-12">
		<div class="form-group row">
			<label  class="col-sm-12 col-md-6 col-lg-4">Reciept Number:</label>
			<div class="col-sm-12 col-md-6 col-lg-8">
				<input type="text"  value="{{@$recieptno}}" disabled="disabled" />
				<input type="hidden" name="receipt_no" value="{{@$recieptno}}" />
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-sm-12 col-md-6 col-lg-4">Date:</label>
			<div class="col-sm-12 col-md-6 col-lg-8">
				{!! Form::text('date', null, ['class' => 'form-control datetimepicker' . ($errors->has('date') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('date', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
	
</div>
<div class="row tution_detail">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-3">Center Name:</label>
			<div class="col-sm-12 col-md-6 col-lg-9">
				{!! Form::text('c_name', null, ['class' => 'form-control' . ($errors->has('c_name') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('c_name', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
</div>
<div class="row tution_detail">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-3">Center Address:</label>
			<div class="col-sm-12 col-md-6 col-lg-9">
				{!! Form::text('c_address', null, ['class' => 'form-control' . ($errors->has('c_address') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('c_address', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
</div>
<div class="row tution_detail">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-3">Amount Received:</label>
			<div class="col-sm-12 col-md-6 col-lg-9">
				@php($default = defaultFees())
			
				{!! Form::text('amount_received', @($fee)?$fee->amount_received:$default['amount'], ['class' => 'form-control' . ($errors->has('amount_received') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('amount_received', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
</div>
<div class="row tution_detail">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-3">Fees Paid By:</label>
			<div class="col-sm-12 col-md-6 col-lg-9">
				{!! Form::select('parent_id', $parents, null, ['class' => 'form-control' . ($errors->has('parent_id') ? ' is-invalid' : '') ]) !!}	
				{!! $errors->first('parent_id', '<span class="help-block">:message</span>') !!}
			</div>
		</div>
	</div>
</div>
<div class="row tution_detail">
	<div class="col-md-12 col-lg-12 col-sm-12">
		<div class="form-group row">
			<label class="col-sm-12 col-md-6 col-lg-3">Name of Child:</label>
			<div class="col-sm-12 col-md-6 col-lg-9 disabled">
			
				{!! Form::select('student_id', $student, @$sd->id, ['class' => 'form-control' . ($errors->has('student_id') ? ' is-invalid' : '') ]) !!}	
				{!! $errors->first('student_id', '<span class="help-block">:message</span>') !!} 
				<?php if(@$sd->id){ ?>
			
			<input type="hidden" name="student_id" value="{{@$sd->id}}" />
				<?php } ?>
			</div>
		</div>
	</div>
</div>
</section>

<section class="programe_table">
			<div class="tile">
				<div class="table-responsive">
					<table class="table student_fee_table">
						<thead>
							<tr>
								<th style="width:50%;">PROGRAMME TYPE</th>
								<th style="width:50%;">INFANT/CHILD CARE <br> (FULL DAY/HALF DAY AM/HALF DAY PM/FC1/FC3)</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="pt-5">Programme Fee(<span class="blk">after applicable Discount</span>)</td>
								<td class="pt-5">
									
									{!! Form::text('programme_fee', null, ['class' => 'form-control' . ($errors->has('programme_fee') ? ' is-invalid' : '') ]) !!}
									{!! $errors->first('programme_fee', '<span class="help-block">:message</span>') !!}
									
								</tr>
								<tr>
									<td class="head">ADD</td>
									<td>										
									</td>
								</tr>
								<tr>   
									<td class="pl-5">Other items (e.g. Registration Fee)</td>
									<td>
										
										{!! Form::text('other_item', null, ['class' => 'form-control' . ($errors->has('other_item') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('other_item', '<span class="help-block">:message</span>') !!}
										
									</td>
								</tr>
								<tr> 
									<td class="pl-5">GST(If applicable)</td>
									<td>
										{!! Form::text('gst', null, ['class' => 'form-control' . ($errors->has('gst') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('gst', '<span class="help-block">:message</span>') !!}
										
									</td>
								</tr>
								<tr> 
									<td class="head">LESS</td>
									<td></td>
								</tr>
								<tr> 
									<td class="pl-5">Basic Subsidy(if Applicable)</td>
									<td>
										
										{!! Form::text('aditional_subsidy', null, ['class' => 'form-control' . ($errors->has('aditional_subsidy') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('aditional_subsidy', '<span class="help-block">:message</span>') !!}
										
									</td>
								</tr>
								<tr> 
									<td class="pl-5">Start Up Grant</td>
									<td>
										
										{!! Form::text('start_up', null, ['class' => 'form-control' . ($errors->has('start_up') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('start_up', '<span class="help-block">:message</span>') !!}
										
									</td>
								</tr>
								<tr> 
									<td class="pl-5">Child Care Financial Assistance</td>
									<td>
										{!! Form::text('financial_assistance', null, ['class' => 'form-control' . ($errors->has('financial_assistance') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('financial_assistance', '<span class="help-block">:message</span>') !!}
									</td>
								</tr>
								<tr> 
									<td class="pl-5">Other Forms of Assistance</td>
									<td>
										
										{!! Form::text('form_assistance', null, ['class' => 'form-control' . ($errors->has('form_assistance') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('form_assistance', '<span class="help-block">:message</span>') !!}
										
									</td>
								</tr>
								<tr> 
									<td>Net Amount Paid</td>
									<td>
										{!! Form::text('net_amount', null, ['class' => 'form-control' . ($errors->has('net_amount') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('net_amount', '<span class="help-block">:message</span>') !!}
									</td>
								</tr>
								<tr> 
									<td>Payment Mode (Cash/Cheque/GIPRO)</td>
									<td>
										{!! Form::text('payment_mode', null, ['class' => 'form-control' . ($errors->has('payment_mode') ? ' is-invalid' : '') ]) !!}
										{!! $errors->first('payment_mode', '<span class="help-block">:message</span>') !!}
										
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
	</section>
	
		@section('script')
<script>
@if(@$_GET['studentid'])	
	jQuery('.disabled select').attr('disabled', 'disabled');
@endif

</script>
@endsection