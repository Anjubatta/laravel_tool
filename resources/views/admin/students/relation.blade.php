@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-title green">
				<h3>{{ $title['title'] }}</h3>
				<a data-toggle="modal" data-target="#addrelation" role="button"class="btn btn-outline-primary table_top_btn"><i class="fa fa-plus"> Add {{ $title['title'] }}</i></a>
			</div>
			
			@include('admin.students.partials.relation', ['data' => $parentRel])
			
		</div>
	</div>
</div>

@stop

<!-- Modal start-->
<div id="addrelation" class="modal fade" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">  Add Parent</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			{!! Form::open(['route' => ['admin.relation.store', $students->id]]) !!}
					
					<div class="form-group">
						<label>Parent ID:</label>
						<div class="form-fields">
							<select name="parent_id" class="form-control parent_id">
								@foreach($parent as $i => $p)
								<option value="{{$p->id}}">{{$p->first_name}} {{$p->first_name}} ({{$p->parent_id}})</option>
								@endforeach	
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label>Relation:</label>
						<div class="form-fields">
							<input type="text" name="relation" value="" class="relation form-control" />
						</div>
					</div>
					<div class="form-group">
						<label>Send/Pick up person:</label>
						<div class="form-fields">
							<select name="send_pick_by" class="form-control parent_id">
								@foreach($parent as $i => $p)
								<option value="{{$p->id}}">{{$p->first_name}} {{$p->first_name}} ({{$p->parent_id}})</option>
								@endforeach	
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" id="student_id" name="student_id" value="{{$students->id}}" />
						<input type="submit" id="add_parent" class="btn btn-success" name="submit" value="Add Parent" />
						
					</div>
					
				{!! Form::close() !!}
			</div>
			
		</div>
		
	</div>
</div>

<!-- Modal start-->
<div id="editrelation" class="modal fade" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">  Edit Parent</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.relation.updaterel', $students->id) }}" method="post">
		@csrf
					<div class="form-group">
						<label>Parent ID:</label>
						<div class="form-fields">
							<select name="parent_id" class="form-control parent_id1">
								@foreach($parent as $i => $p)
								<option value="{{$p->id}}">{{$p->first_name}} {{$p->first_name}} ({{$p->parent_id}})</option>
								@endforeach	
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label>Relation:</label>
						<div class="form-fields">
							<input type="text" name="relation" value="" class="relation1 form-control" />
						</div>
					</div>
					<div class="form-group">
						<label>Send/Pick up person:</label>
						<div class="form-fields">
							<select name="send_pick_by" class="form-control parent_id">
								@foreach($parent as $i => $p)
								<option value="{{$p->id}}">{{$p->first_name}} {{$p->first_name}} ({{$p->parent_id}})</option>
								@endforeach	
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" id="student_id1" name="student_id" value="{{$students->id}}" />
						
						<input type="hidden" id="id" name="id" value="" />
						
						<input type="submit" id="add_parent" class="btn btn-success" name="submit" value="Add Parent" />
						
					</div>
					
				</form>
			</div>
			
		</div>
		
	</div>
</div>

