@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
        <div class="tile-title green">
            <h3>{{ $title['title'] }}</h3>
            <a href="{{ route('admin.parents.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

			<section class="Record">
				<div class="row justify-content-center">
					<div class="col-md-6 col-sm-12 col-lg-3 profile">
						<img src="{{ asset('uploads/parents/') }}/<?=($parent->image)?$parent->image:'profile.png';?>" alt="profile"/>
						
						<div class="parents">
						<h4>Joy Prestoza</h4>
						<h4>Mother</h4>
						<h4>099999999</h4>
						</div>
						</div>
					
				</div>
			<div class="line"></div>
			</section>
			
			<div class="white_wrapper">
			<section class="personal">
			<h2 class="heading"><span>Personal Informations</span></h2>
			<div class="personal_data parent_detail">	
			 <div class="row mb-3">
					<div class="col-sm-12  col-md-4">
						<h4>Surname:</h4>
						<h3>Prestoza</h3>
					</div>
					<div class="col-sm-12  col-md-4">
					 	<h4>First Name:</h4>
						<h3>Joy</h3>
					</div>
					<div class="col-sm-12  col-md-4">
					  	<h4>Middle Name:</h4>
						<h3>De Guzman</h3>
					</div>
				  </div>
				  <div class="row mb-3" >
					<div class="col-sm-12  col-md-4">
						<h4>Birthdate:</h4>
						<h3>July 31, 1967</h3>
					</div>
					<div class="col-sm-12  col-md-4">
					 	<h4>Age:</h4>
						<h3>51 Years old</h3>
					</div>
					<div class="col-sm-12  col-md-4">
					  	<h4>Gender:</h4>
						<h3>Female</h3>
					</div>
				  </div>
				     <div class="row mb-3">
					<div class="col-sm-12  col-md-8">
						<h4>Address:</h4>
						<h3>Buenlag Mangaldan Pangasinan</h3>
					</div>
					</div>
			</div>
		</section>
		<section class="personal">
			<h2 class="heading"><span>Child</span></h2>
			<div class="personal_data parent_detail">
				  <div class="row mb-3" >
					<div class="col-sm-12  col-md-4">
						<h4>Child Name:</h4>
						<h3>Joed Carlo Prestoza</h3>
					</div>
					<div class="col-sm-12  col-md-4">
					 	<h4>Student No:</h4>
						<h3>12345</h3>
					</div>
					
				  </div>
			</div>
		</section>
	
				<!--FEE TABEL-->
			
	<section class="cstm_table">
	<div class="row">
		<div class="col-md-12">
            <h3 class="tile-title">FEES</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Transaction</th>
                    <th>Date</th>
                    <th>OR No.</th>
                    <th>Amount</th>
					<th>Status</th>
					<th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tution Fee 1st Period</td>
                    <td>7/31/18</td>
                    <td>-----</td>
                    <td>$180.00</td>
					<td>Not Paid</td>
				  <td class="eye_clor text-center"><i class="fa fa-eye" aria-hidden="true"></i></td>
                  </tr>
                  <tr>
                    <td>Tution Fee 1st Period</td>
                    <td>7/31/18</td>
                    <td>0080210</td>
                    <td>$190.00</td>
					<td>Paid</td>
					<td class="eye_clor text-center"><i class="fa fa-eye" aria-hidden="true"></i></td>
                  </tr>
                  <tr>
                    <td>Tution Fee 1st Period</td>
                    <td>7/31/18</td>
					<td>0080210</td>
					<td>$190.00</td>
                    <td>Paid</td>
					<td class="eye_clor text-center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					
                  </tr>
                  <tr>
                    <td>Tution Fee 1st Period</td>
                    <td>7/31/18</td>
					<td>0080210</td>
					<td>$190.00</td>
                    <td>Paid</td>
					<td class="eye_clor text-center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					
                  </tr>
				   <tr>
                    <td>Tution Fee 1st Period</td>
                    <td>7/31/18</td>
					<td>0080210</td>
					<td>$190.00</td>
                    <td>Paid</td>
					<td class="eye_clor text-center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
		</div>
	</section>
	</div>	
	
	<!--
			<section class="Record">
                <div class="row">
                    <div class="col-md-3 profile">
                         @if($parent->image)
                        <img src="{{ asset('uploads/parents/'.$parent->image) }}" alt="profile"/>
                        @else

                        <img src="{{ asset('uploads/parents/profile.png') }}" alt="profile"/>
                         @endif

                    </div>
                    <div class="col-md-9">
                            <div class="detail ">           
                                        <h4><span class="title">Full Name:</span> <span class="orange_detail">{{ $parent->first_name}} {{$parent->middle_name}} {{$parent->sur_name }}</span></h4>
                                        <h4><span class="title">ID NO:</span> <span class="orange_detail">{{ $parent->parent_id }}</span></h4>
                                        <h4><span class="title">Contact NO:</span> <span class="orange_detail">{{ $parent->contact_no }}</span></h4>
                                        
                                     <h4><span class="title">Age:</span> <span class="orange_detail">{{ $parent->age }}</span></h4>

                                    <h4><span class="title">Address:</span> <span class="orange_detail">{{ $parent->address }}</span></h4>     
                            </div>
                    </div>
                </div>
            </section>

	-->

    	
    </div>
  </div>
</div>
@stop