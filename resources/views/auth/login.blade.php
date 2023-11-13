@extends('layouts.main-home-layout')

@section('title')
    Login
@endsection
@section('content-area')
    <!-- Start Summary Bar Area -->
    <style>
        .btn-secondary:focus {
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
    </style>
    <!-- Start Login Booking Area -->
    <section class="login-booking-area mt-5">

        <div class="container">
            <div class="row adjustCenID">
                <div class="col-md-12">
                    @if (Session::has('message'))
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <h1 class="text-center mt-5">Log in</h1>
                    <p class="mb-5 text-center">
                        Log in with this across the following sites.
                    </p>
                    <form action = "{{ route('login') }}" method="post" aria-label="{{ __('Login') }}"
                        accept-charset="utf-8">
                        @csrf

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="email" id="email" name="email" required
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
                                class="{{ $errors->has('email') ? ' is-invalid' : '' }}"/>

                            <label>Email</label>
                            <div class="border-around"></div>
                        </div>

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="password" name="password" id="password" />
                            <label>Password </label>
                            <div class="border-around"></div>
                        </div>


                        <div class="adjustCenID123" style="align-items: center; margin-bottom:10px">
                            <div class="remember">
                                <input class="form-check-input" style="margin: 0" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" style="margin-bottom: 0">Remember me</label>
                            </div>

                            <p style="margin-bottom: 0"><a href="{{ route('password.request') }}">Lost your password?</a></p>
                        </div>
                        <button type="submit" class="btn1 btn-dark btn-block" style="background-color: black">
                            Log in
                            <i class="fas fa-arrow-trend-up" id="arrw" style="color: white"></i>
                        </button>
                    </form>
                    <p class="mt-4 mb-4 text-center">OR</p>
                    <button type="submit" class="btn2 btn-primary btn-block"
                        style="color:black;background-color:white; border: 1px solid black">
                        <i class="fab fa-google" style="color: black; float: left; margin-right: 10px;margin-top: 5px;"></i>
                        Continue with Google
                    </button>

                    <button type="submit" class="btn3 btn-primary btn-block">
                        <i class="fab fa-facebook"
                            style="color: white; float: left; margin-right: 10px;margin-top: 5px;"></i>
                        Continue with Facebook
                    </button>
                    <button type="submit" class="btn4 btn-dark btn-block" style="background-color: black">
                        <i class="fab fa-apple" style="color: white ;float: left; margin-right: 10px;margin-top: 5px;"></i>
                        Continue with
                        Apple
                    </button>
                    <p class="mt-4 mb-5 text-center">
                        Not signed up? <a href="{{ url('register') }}">Create an account.</a>
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- End Login Booking Area -->
@stop
























{{-- <div class="container"> --}}
{{--    <div class="row justify-content-center"> --}}
{{--        <div class="col-md-8"> --}}
{{--            <div class="card"> --}}
{{--                <div class="card-header">{{ __('Register') }}</div> --}}

{{--                <div class="card-body"> --}}
{{--                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"> --}}
{{--                        @csrf --}}

{{--                        <div class="form-group row"> --}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus> --}}
{{--                                <input id="last_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus> --}}
{{--                                <input id="phone_number" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus> --}}

{{--                                @if ($errors->has('name')) --}}
{{--                                    <span class="invalid-feedback" role="alert"> --}}
{{--                                        <strong>{{ $errors->first('name') }}</strong> --}}
{{--                                    </span> --}}
{{--                                @endif --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="form-group row"> --}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required> --}}

{{--                                @if ($errors->has('email')) --}}
{{--                                    <span class="invalid-feedback" role="alert"> --}}
{{--                                        <strong>{{ $errors->first('email') }}</strong> --}}
{{--                                    </span> --}}
{{--                                @endif --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="form-group row"> --}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> --}}

{{--                                @if ($errors->has('password')) --}}
{{--                                    <span class="invalid-feedback" role="alert"> --}}
{{--                                        <strong>{{ $errors->first('password') }}</strong> --}}
{{--                                    </span> --}}
{{--                                @endif --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="form-group row"> --}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

{{--                            <div class="col-md-6"> --}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required> --}}
{{--                            </div> --}}
{{--                        </div> --}}

{{--                        <div class="form-group row mb-0"> --}}
{{--                            <div class="col-md-6 offset-md-4"> --}}
{{--                                <button type="submit" class="btn btn-primary"> --}}
{{--                                    {{ __('Register') }} --}}
{{--                                </button> --}}
{{--                            </div> --}}
{{--                        </div> --}}
{{--                    </form> --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}
{{-- </div> --}}
{{-- @endsection --}}
