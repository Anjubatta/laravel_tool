<div class="tile-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Parent Name</th>
					<th>Balance Amount</th>
					<th>Payment Status</th>
					<th>Due Date</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@php($default = defaultFees())
				@foreach($data as $i => $fee)
				@php($fees=getFees($fee->id, $res))
				<tr>
					<td> {{ $fee->student_no}}</td>
					<td>{{@$fee->relation->parents->first_name}}</td>          
					<td>{{ @($fees->amount_received) ? '$'.($default['amount']-$fees->amount_received):'$'.$default['amount'] }}</td>
					<td> {{ @($fees->status) ? $fees->status:'Not yet paid' }}</td>
					<td> {{ $default['due_date'] }}</td>
					
					<td class="action">
						  
						<?php if(@$fees->id){ ?>   
						<a href="{{ @($fees->id)?route('admin.fees.show', $fees->id):route('admin.fees.create') }}">
							<i class="fa fa-eye"></i>
						</a> 
						<a href="{{ @($fees->id)?route('admin.fees.edit', $fees->id):route('admin.fees.create') }}">
							<i class="fa fa-pencil-square-o"></i>
						</a>                            
						<a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.fees.destroy', $fees->id) }}">
							<i class="fa fa-trash-o"></i>
						</a>
						<?php }else{ ?>
						<a href="{{ @($fees->id)?route('admin.fees.show', $fees->id):route('admin.fees.create') }}?studentid={{$fee->id}}">
							<i class="fa fa-plus"></i>
						</a> 
							<?php } ?>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
