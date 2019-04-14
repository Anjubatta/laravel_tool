@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<div class="login_reg_page_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="login_reg_left_side">
                    <img src="{{ asset('uploads/site/logo.png') }}">
                    <p class="login_txt"></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="login_reg_form_outr">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">LOG IN</h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['route' => 'login']) !!}
                            <div class="form-group">
                                <input type="email" placeholder="Username" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">{{ __('SIGN IN') }}</button>
                            {!! Form::close() !!}
                            <a href="{{ route('password.request') }}">{{ __('I forgot my password') }}</a>
                            <a href="{{ route('register') }}" class="text-center">{{ __('SIGN UP') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection