@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<div class="login_reg_page_wrapper register_page">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="login_reg_left_side">
                <img src="{{ asset('uploads/site/logo.png') }}">
                <p class="login_txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="login_reg_form_outr">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'login']) !!}
                        <div class="form-group">
                            <input type="text" placeholder="First Name" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>
                            @if ($errors->has('fname'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Last Name" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>
                            @if ($errors->has('lname'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-lg btn-success btn-block">{{ __('Sign In') }}</button>
                        {!! Form::close() !!}
                        <a href="{{ route('login') }}" class="text-center">I already have a account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection