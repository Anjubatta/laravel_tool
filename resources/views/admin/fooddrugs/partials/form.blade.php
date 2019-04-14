
	  <div class="row tution_detail">
		<div class="col-md-12 col-lg-6 col-sm-12">
			 <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Child's Name:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
				 <input type="text" class="form-control" value="{{$student->first_name}} {{$student->middel_name}}" >
				 <input type="hidden" class="form-control" name="student_id" value="{{$student->id}}" >
				 
				</div>
			  </div>
		</div>
		
		<div class="col-md-12 col-lg-6 col-sm-12">
			  <div class="form-group row">
				<label  class="col-sm-12 col-md-6 col-lg-3">Class:</label>
				<div class="col-sm-12 col-md-6 col-lg-8">
				   <input class="form-control"  type="text" value="{{$student->classes_students->classes->name}}">
				   <input class="form-control"  type="hidden" value="{{$student->classes_students->classes->id}}" name="class_id">
				   
				</div>
			  </div>
		</div>
		
		</div>			
		
		
  <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Drug Allergy:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::textarea('drug_allergy', null, ['class' => 'form-control' . ($errors->has('drug_allergy') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('drug_allergy', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

 <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Food Allergy:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::textarea('food_allergy', null, ['class' => 'form-control' . ($errors->has('food_allergy') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('food_allergy', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

 <div class="row tution_detail">
			<div class="col-md-12 col-lg-12 col-sm-12">
			 <div class="form-group row">
				<label class="col-sm-12 col-md-6 col-lg-3">Other Restriction:</label>
				<div class="col-sm-12 col-md-6 col-lg-9">
				  {!! Form::textarea('other_restrictions', null, ['class' => 'form-control' . ($errors->has('other_restrictions') ? ' is-invalid' : '') ]) !!}
				{!! $errors->first('other_restrictions', '<span class="help-block">:message</span>') !!}
				</div>
			  </div>
		</div>
</div>

		
		
	
	

