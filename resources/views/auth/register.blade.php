@extends('layouts.main-home-layout')
@section('title')
    Registrieren
@endsection
@section('content-area')
    <!-- Start Summary Bar Area -->
    <style>
        .btn-secondary:focus {
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }

        .error-field {
            color: red;
        }

        .register-form form div {
            margin: 0 !important;
        }

        input {
            text-align: left !important;
        }
    </style>
    <!-- Start Login Booking Area -->
    <section class="login-booking-area mt-5">
        <div class="container">
            <div class="row adjustCenID">
                <div class="col-md-4">
                    <h1 class="text-center mt-5">Create Account</h1>
                    <p class="mb-5 text-center">Sign in with this across the following sites.</p>

                    <form action="{{ route('register') }}" method="post" accept-charset="utf-8">
                        @csrf
                        <input type="hidden" name="user_type" class="m-0" value="end_user">

                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="text" name="first_name" value="{{ old('first_name') }}" />
                            <label>First Name</label>
                            <div class="border-around"></div>
                            {{-- @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                        
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="text" name="last_name" value="{{ old('last_name') }}" />
                            <label>Last Name</label>
                            <div class="border-around"></div>
                            {{-- @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif --}}
                        </div>


                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input type="email" name="email" required
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
                                class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" />
                            <label>Email </label>
                            <div class="border-around"></div>
                            {{-- @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif --}}
                        </div>

                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="tel" name="phone_number" value="{{ old('phone_number') }}" />
                            <label>Phone</label>
                            <div class="border-around"></div>
                            {{-- @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="password" name="password" value="{{ old('password') }}" />
                            <label>Password </label>
                            <div class="border-around"></div>
                            {{-- @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif --}}

                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control">
                            <input required type="password" name="password_confirmation" />
                            <label>Confirm Password </label>
                            <div class="border-around"></div>
                        </div>
                        <div class=" pt-4">
                            <div class="w-100 checkbox px-4 d-flex gap-3 ">
                                <input type="checkbox" name="accept" id="accept" required style="margin: 0; position:static">
                                <a href="{{asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::AGB_FILE))}}" target="_blank">
                                    <label style="padding-left:0px !important">Ich akzeptiere die
                                        AGB's</label>
                                </a>
                            </div>
                            <a href="{{asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::DATE_FILE))}}" target="_blank">
                                <label style="padding-left:58px !important"><span>Datenschutzbestimmungen</span> </label>
                            </a>
                        </div>
                        



                        <button type="submit" class="btn1 btn-dark btn-block" style="background-color: black">
                            Create Account
                            <i class="fas fa-arrow-trend-up" id="arrw" style="color: white"></i>
                        </button>
                    </form>
                    {{-- <p class="mt-4 mb-4 text-center">OR</p>
                    <button type="submit" class="btn2 btn-info btn-block"
                        style="color:black;background-color:white ; border: 1px solid black;">
                        <i class="fab fa-google" style="color: black;float: left; margin-right: 10px;margin-top: 5px;"></i>
                        Continue with Google
                    </button>
                    <button type="submit" class="btn3 btn-primary btn-block" style="background-color: #0f66ff; border:1px solid #0f66ff">
                        <i class="fab fa-facebook"
                            style="color: white;float: left; margin-right: 10px;margin-top: 5px;"></i> Continue with
                        Facebook
                    </button>
                    <button type="submit" class="btn4 btn-dark btn-block" style="background-color: black">
                        <i class="fab fa-apple" style="color: white;float: left; margin-right: 10px;margin-top: 5px;"></i>
                        Continue with Apple
                    </button> --}}
                    <p class="mt-4 mb-5 text-center">Already a member? <a href="{{ url('/login') }}">Login</a></p>

                </div>
            </div>
        </div>
    </section>
    <!-- End Login Booking Area -->
@stop
@section('js')
    <script src="{{ asset('js/jquery-simple-validator.min.js') }}"></script>
@endsection
