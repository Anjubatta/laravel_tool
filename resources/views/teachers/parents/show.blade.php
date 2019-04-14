@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
        <div class="tile-title green">
            <h3>{{ $title['title'] }}</h3>
            <a href="{{ route('teacher.parents.index') }}" class="btn btn-outline-warning table_top_btn"><i class="fa fa-arrow-left"></i> Back</i></a>
        </div>

        <section class="Record">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-12 col-lg-3 profile">
                        @if($parent->image)
                        <img src="{{ asset('uploads/parents/'.$parent->image) }}" alt="profile"/>
                        @else

                        <img src="{{ asset('uploads/parents/profile.png') }}" alt="profile"/>
                         @endif
                        <div class="parents">
                        <h4>{{ $parent->first_name}} {{$parent->middle_name}} {{$parent->sur_name }}</h4>
                        <h4>{{ $parent->parent_id }}</h4>
                        <h4>{{ $parent->contact_no }}</h4>
                        </div>
                        </div>
                    
                </div>
                <div class="line"></div>
            </section>

            <section class="personal">
            <h2 class="heading"><span>Personal Informations</span></h2>
            <div class="personal_data parent_detail">   
             <div class="row mb-3">
                    <div class="col-sm-12  col-md-4">
                        <h4>Surname:</h4>
                        <h3>{{$parent->sur_name }}</h3>
                    </div>
                    <div class="col-sm-12  col-md-4">
                        <h4>First Name:</h4>
                        <h3>{{ $parent->first_name}}</h3>
                    </div>
                    <div class="col-sm-12  col-md-4">
                        <h4>Middle Name:</h4>
                        <h3>{{$parent->middle_name}} </h3>
                    </div>
                  </div>
                  
                    <div class="row mb-3" >
                    
                    <div class="col-sm-12  col-md-4">
                        <h4>Age:</h4>
                        <h3>51 Years old</h3>
                    </div>
                    <div class="col-sm-12  col-md-4">
                        <h4>Gender:</h4>
                        <h3>{{$parent->gender}} </h3>
                    </div>
                  </div>
                     <div class="row mb-3">
                    <div class="col-sm-12  col-md-6">
                        <h4>Address:</h4>
                        <h3>{{$parent->address}} </h3>
                    </div>
                    
                    
                  </div>
              
            </div>

            </section>
            
            <section class="personal">
            <h2 class="heading"><span>Child</span></h2>
            <div class="personal_data parent_detail">
                @foreach($parent_rel as $k=>$v)
                  <div class="row mb-3" >
                    <div class="col-sm-12  col-md-4">
                        <h4>Child Name:</h4>
                        <h3>{{ $v->student->first_name}} {{ $v->student->middle_name }} {{ $v->student->surname }}</h3>
                    </div>
                    <div class="col-sm-12  col-md-4">
                        <h4>Student No:</h4>
                        <h3>{{ $v->student->student_no}}</h3>
                    </div>
                    
                  </div>
                  @endforeach
            </div>
            </section>



    	
           

    	
    </div>
  </div>
</div>
@stop