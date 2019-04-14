<div class="tile bg_table">
	
	<div class="table-responsive">
		<table class="table field_center ">
			<thead>
				<tr>
					<th>Name</th>
					<th>Time In</th>
					<th>Temp.1</th>
					<th>Temp.2</th>
					<th>Temp.3</th>
					<th>Time Out</th>					
					<th>Action</th>					
				</tr>
			</thead>
			<tbody>
				@foreach($data as $i => $attend)
				
				@php($attendance=(attendance($attend, $date, $session)))
				<tr>
					<td>{{$attend->first_name}} {{$attend->middle_name}} </td>
					<td>{{(@$attendance->timein)?@$attendance->timein:'Absent'}}</td>
					<td>{{(@$attendance->temp1)?@$attendance->temp1:'NULL'}}</td>
					<td>{{(@$attendance->temp2)?@$attendance->temp2:'NULL'}}</td>
					<td>{{(@$attendance->temp3)?@$attendance->temp3:'NULL'}}</td>
					
					<td>{{(@$attendance->timeout)?@$attendance->timeout:'Absent'}}</td>
					<td><a class="btn"  data-toggle="modal" data-target="#addItem_modal{{$attend->id}}"><i class="fa fa-plus"> Add</i></a>	</td>
				</tr>
				<!-- Modal start--><!-- Modal -->
				<div class="modal fade" id="addItem_modal{{$attend->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog  addItem_modal" role="document">
						<div class="modal-content "> 
						<p class="heading-att">Add Attendance {{$attend->first_name}} {{$attend->middle_name}} </p>
							<div class="modal-body">
								{!! Form::open(['route' => ['admin.attendances.store',$attend->id]]) !!}   
								<div class="tile-body">
									@include('admin.attendances.partials.form', ['data' => $attendance])
									<input type="hidden" name="session" value="{{(@$attendance->session)?$attendance->session:@$session}}" />
									<input type="hidden" name="student_id" value="{{$attend->id}}" />
									<div class="form-group row">
									<div class="col-sm-10 col-lg-6 col-md-6"> 
									<label>Send By</label>
									<input type="text" name="send_by" value="{{(@$attendance->send_by)?$attendance->send_by:@$attend->relation->parents->first_name}}" />
									</div>
									<div class="col-sm-10 col-lg-6 col-md-6"> 
									<label>Pick By</label>
									<input type="text" name="pick_by" value="{{(@$attendance->pick_by)?$attendance->pick_by:@$attend->relation->parents->first_name}}" />
									</div></div>
								</div>
								<div class="tile-footer">                      		
									<div class="d-flex justify-content-between"><button type="cancel" class="btn save_btn cancel_btn">Cancel</button><button type="submit" class="btn save_btn">Add</button></div>		
								</div>
								{!! Form::close() !!}
							</div>
							<div class="">
								
							</div>
						</div>
					</div>
				</div>	
				<!--------modal end----------->
				
				@endforeach
				
			</tbody>
		</table>
	</div>
	
</div>