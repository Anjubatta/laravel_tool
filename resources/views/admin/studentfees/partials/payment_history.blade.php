<div class="tile-body">
	
	
	@foreach($history as $i => $pay)
	<div class="table-responsive">
		<table class="table">			
			<tbody><tr>
				<td>Date:</td><td>{{$pay->date}}</td>
				</tr><tr>
				<td>Month:</td><td>{{date('m',strtotime($pay->for_month))}}</td>
				</tr><tr>
				<td>Amount Paid:</td><td>${{$pay->amount_received}}</td>
				</tr><tr>
				<td>Paid By:</td><td>{{$pay->parents->first_name}}</td>
			</tr>
			</tbody>
		</table>
	</div>
	@endforeach
	
</div>
