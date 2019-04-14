<div class="tile-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
			
				<tr>
				<?php if(@$teacher->id){ ?>					
					<th>Leave Name</th>
					<th>Type</th>
					<th>Date From</th>	
					<th>Date To</th>					
					<th>Reason</th>
					<th>Confirmation</th>
					<?php }else{ ?>
					<th>Employe</th>
					<th>Leave Name</th>
					<th>Type</th>
					<th>Date From</th>	
					<th>Confirmation</th>
					<th>Action</th>		
					<?php } ?>
								
				</tr>
			</thead>
			<tbody>
				@foreach($leaves as $i => $leave)
				<tr>
				<?php if(@$teacher->id){ ?>					
						<td>{{ $leave->leaves_names->name}}</td>
						<td>{{ $leave->leaves_types->type}}</td>
						<td>{{ $leave->from_date}}</td>	
						<td>{{ $leave->to_date}}</td>
						<td>{{ $leave->reason}}</td>
						<td>{{ $leave->status}}</td>
					
					<?php }else{ ?>					
					
					<td>{{ @$leave->teachers->user->fname }}</td>
					<td>{{ $leave->leaves_names->name}}</td>
					<td>{{ $leave->leaves_types->type}}</td>
					<td>{{ $leave->from_date}}</td>	
					<td>{{ $leave->status}}</td>
					
					<td class="action">
						<a  data-toggle="modal" data-target="#viewleave{{$leave->id}}">
							<i class="fa fa-eye"></i>
						</a>  
						<a data-toggle="modal" data-target="#viewleave{{$leave->id}}" >
						<i class="fa fa-pencil-square-o"></i>
						</a>                            
						<a data-method="Delete" data-confirm="Are you sure?" href="{{ route('admin.leaves.destroy', [$leave->teacher_id,$leave->id]) }}">
						<i class="fa fa-trash-o"></i>
						</a>	
						
					<!-- Modal start-->
					<div id="viewleave{{$leave->id}}" class="modal fade viewleave_popup" role="dialog">
					<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">

					<h4 class="modal-title">{{ @$leave->teachers->user->fname }}  Leave Form</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body">
						 {!! Form::model($leave, ['route' => ['admin.leaves.update', $leave->teacher_id,$leave->id], 'method' => 'PATCH']) !!}
					  <div class="tile-body">

						@include('admin.leaves.partials.form')

					  </div>

						<div class="tile-footer row">
						<div class="col-md-3 col-sm-12">
						</div>
						<div class="col-md-9 col-sm-12">
						<a class="btn decline pull-left decline_btn">DECLINE</a>
						<button class="btn approve pull-right save_btn" type="submit">APPROVE</button>
						</div>
						</div>
						{!! Form::close() !!}
						</div>

					</div>

					</div>
					</div>

					<!-- Modal end-->
				</td>
				<?php } ?>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>


