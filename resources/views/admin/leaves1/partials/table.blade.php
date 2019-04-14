<div class="tile-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					
					<th>Employe</th>
					<th>Leave Name</th>
					<th>Type</th>
					<th>Date From</th>
					<th>Date To</th>
					<th>Confirmation</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($leaves as $i => $leave)
				<tr>
					<td>{{ @$leave->teachers->user->fname }}</td>
					<td>{{ $leave->leaves_names->name}}</td>
					<td>{{ $leave->leaves_types->type}}</td>
					<td>{{ $leave->from_date}}</td>
					<td>{{ $leave->to_date}}</td>
					<td>{{ $leave->status}}</td>
					<td class="action">
						<a class="view_leave" href="" data-id="{{ $leave->id }}" data-toggle="modal" data-target="#viewleave">
							<i class="fa fa-eye"></i>
						</a>  
						<a class="edit_leave" href=""  data-id="{{ $leave->id }}" data-toggle="modal" data-target="#viewleave">
							<i class="fa fa-pencil-square-o"></i>
						</a>
						 
			
					<form action="{{ asset('/admin/leaves/') }}/{{$leave->id}}/destroy" method="post">
						<input name="_token" class="_token" type="hidden" value="{{ csrf_token() }}" >
						<a data-method="Delete" data-confirm="Are you sure?" class="delete_leave"  data-id="{{ $leave->id }}" href="">
							<i class="fa fa-trash-o"></i>
						</a>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- Modal start-->
<div id="viewleave" class="modal fade" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">  Leave Form</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{ asset('/admin/leaves/teacherid/update') }}" accept-charset="UTF-8" class="updateleave">
				<input name="_token" class="_token" type="hidden" value="" >
				
				<div class="form-group row">
					<label class="col-md-3">Leave Name:</label>
					<div class="form-fields col-md-9">
						<select name="leave_name_id" class="form-control leave_name_id">
							@foreach($leaves_name as $i => $leave)
							<option value="{{$leave->id}}">{{$leave->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3">Leave Type:</label>
					<div class="form-fields col-md-9">
						<select name="leave_type_id" class="form-control leave_type_id">
							@foreach($leaves_type as $i => $lt)
							<option value="{{$lt->id}}">{{$lt->type}}</option>
							@endforeach	
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3">Leave Unit:</label>
					<div class="form-fields col-md-9 leave_unit">
						<input type="radio" id="days" name="leave_unit" value="days" checked /> Days
						<input type="radio" id="hours" name="leave_unit" value="hours" /> Hours
					</div>
				</div>
				<div class="form-group row justify-content-end">
					
					<div class="form-fields days_show col-md-9">
						<div class="form-fields row calen">
							<div class="col-md-6">
							<label>From Date:</label>
									<div class="calen_icn">
									<input type="date" name="from_date" value=""  class="datepicker from_date"/>
									<div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
									<i class="fa fa-calendar"></i>
									</div>
									</div>
								</div>
								<div class="col-md-6">
								<label>To Date:</label>
								<div class="calen_icn">
								<input type="date" name="to_date" value=""  class="datepicker to_date"/>
								<div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
									<i class="fa fa-calendar"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-fields time_show col-md-9" style="display:none;">
						<div class="form-fields row calen">
							<div class="col-md-6"><label>From Time:</label>
							<input type="text" name="from_time" value=""  class="timepicker from_time"/></div>
							<div class="col-md-6"><label>To Time:</label>
							<input type="text" name="to_time" value="" class="timepicker to_time"/></div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-3">Reason:</label>
					<div class="form-fields col-md-9">
						<textarea name="reason" class="reason" rows="4" placeholder="I need to see the doctor."></textarea>
					</div>
				</div>
				<div class="form-group row justify-content-end">
				<div class="col-md-9">
					<input type="hidden" id="teacher_id" name="teacher_id" value="" />
					<input type="hidden" id="leave_id" name="leave_id" value="" />
					<input type="hidden" name="status" class="status" value="pending" />
					<a href="" class="btn  approve pull-left save_btn" >APPROVE</a>
					<a href="" class="btn  decline pull-right save_btn decline_btn" >DECLINE</a>
				</div>
				</div>
				
			</form>
			</div>
			
		</div>
		
	</div>
</div>

<!-- Modal end-->

