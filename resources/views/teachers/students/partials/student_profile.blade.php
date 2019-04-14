

<!---------------- new css ----------------------->


            
            <section class="personal">
            <h2 class="heading"><span>Personal Informations</span></h2>
            <div class="personal_data">                             
              <div class="form-row">
                <div class="form-group col-md-4">
                  <h4>Surname:</h4>
                  <input type="text" disabled="disabled" value="{{ $student->first_name}}" >
                </div>
                <div class="form-group col-md-4">
                 <h4>First Name:</h4>
                  <input type="text" disabled="disabled" value="{{ $student->middle_name}}" >
                </div>
                <div class="form-group col-md-4">
                    <h4>Middle Name:</h4>
                  <input type="text" disabled="disabled" value="{{ $student->surname }}" >
                </div>
              </div>    
               <div class="form-row">
                <div class="form-group col-md-4">
                  <h4>Birthdate:</h4>
                  <input type="text" disabled="disabled" value="{{ $student->dob }}" >
                </div>
                <div class="form-group col-md-4">
                 <h4>Age:</h4>
                  <input type="text" disabled="disabled" value="{{ $student->age }}" >
                </div>
                <div class="form-group col-md-4">
                    <h4>Gender:</h4>
                  <input type="text" disabled="disabled" value="{{ $student->gender}}" >
                </div>
              </div>    
               <div class="form-row">
                <div class="form-group col-md-6">
                  <h4>Address:</h4>
                  <input type="text" disabled="disabled"  value="{{ $student->address }}">
                </div>
              </div>    
            </div>

            </section>
            
            
            <section class="personal">
            <h2 class="heading"><span>Attendance and Temperature</span></h2>
            <div class="personal_data">
                 <div class="form-row">
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                  <h4>Expected Attendance:</h4>
                  <input type="text" >
                </div>
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                 <h4>Present:</h4>
                  <input type="text" >
                </div>
              </div>
               <div class="form-row">
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                  <h4>Health Check:</h4>
                  <input type="text" >
                </div>
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                 <h4>Absent:</h4>
                  <input type="text" >
                </div>
              </div>
               <div class="form-row">
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                  <h4>High Temperature:</h4>
                  <input type="text" >
                </div>
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                 <h4>Attendance Percentage:</h4>
                  <input type="text" >
                </div>
              </div>
            </div>
            </section>
            
            
        <section class="personal">
            <h2 class="heading"><span>Parent Particular:</span></h2>
            <div class="personal_data">
			@foreach($parentRel as $pr)
            <div class="form-row">
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                  <h4>{{$pr->relation}} Name:</h4>
                  <input type="text" value="{{$pr->parents->first_name}} {{$pr->parents->middel_name}}" disabled >
                </div>
                <div class="form-group col-sm-12  col-xs-12 col-md-6 col-lg-4">
                    <h4>Contact No:</h4>
                  <input type="text" value="{{$pr->parents->contact_no}}">
                </div>
              </div>
			  @endforeach
              
              
            </div>
            </section>  