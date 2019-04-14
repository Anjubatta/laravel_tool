<div class="form-group">
					<label>Leave Name:</label>
					<div class="form-fields">
						<select name="leave_name_id" class="form-control">
							@foreach($leaves_name as $i => $leave)
							<option value="{{$leave->id}}">{{$leave->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Leave Type:</label>
					<div class="form-fields">
						<select name="leave_type_id" class="form-control">
							@foreach($leaves_type as $i => $lt)
							<option value="{{$lt->id}}">{{$lt->type}}</option>
							@endforeach	
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Leave Unit:</label>
					<div class="form-fields leave_unit">
						<input type="radio" name="leave_unit" value="days" checked /> Days
						<input type="radio" name="leave_unit" value="hours" /> Hours
					</div>
				</div>
				<div class="form-group">
					
					<div class="form-fields days_show">
						<div class="form-fields">
							<label>From Date:</label>
							<input type="text" name="from_date" value=""  class="datepicker"/>
							<label>To Date:</label>
							<input type="text" name="to_date" value=""  class="datepicker"/>
						</div>
					</div>
					<div class="form-fields time_show" style="display:none;">
						<div class="form-fields">
							<label>From Time:</label>
							<input type="text" name="from_time" value=""  class="timepicker"/>
							<label>To Time:</label>
							<input type="text" name="to_time" value="" class="timepicker"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Reason:</label>
					<div class="form-fields">
						<textarea name="reason" placeholder="I need to see the doctor."></textarea>
					</div>
				</div>

@section('script')


@endsection