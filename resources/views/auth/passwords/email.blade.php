
@extends('layouts.auth')
@section('title', 'Forgot Password')
@section('content')
<div class="login_reg_page_wrapper">
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
                            <h3 class="panel-title">{{ __('Reset Password') }}</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('password.email') }}">
							@csrf
                                <div class="form-group">
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <button type="submit" class="btn btn-lg btn-success btn-block">{{ __('Send Password Reset Link') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection