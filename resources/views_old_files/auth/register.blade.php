@extends('layouts.main-home-layout')
@section('title')
    Registrieren
    @endsection
@section('content-area')
    <!-- Start Summary Bar Area -->
    <style>
        .btn-secondary:focus{
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
        .error-field{
            color: red;
        }
        .register-form form div{
            margin: 0 !important;
        }
        input{
            text-align: left !important;
        }
    </style>
    <!-- Start Login Booking Area -->
    <section class="login-booking-area mt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="login-booking">
                        <ul class="login">
                            <li class="active font-weight-bold">Registrieren</li>
                        </ul>
                        <div class="login-content">
                            <div id="tab-2" class="content-tab">
                                <div class="register-form">
                                    <form action="{{ route('register') }}" method="post" accept-charset="utf-8" validate = true>
                                      @csrf
                                        <input type="hidden" name="user_type" class="m-0" value="end_user">
                                     <div class="row">
                                         <div class="col-md-6">
                                             <div class="w-100 first-name">
                                                 <label for="firstname">Vorname </label>
                                                 <input type="text" name="first_name" id="firstname" placeholder="Vorname" class="m-0" value="{{ old('first_name') }}" required maxlength="30">
                                                 @if ($errors->has('first_name'))
                                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="w-100 last-name">
                                                 <label for="lastname">Name</label>
                                                 <input type="text" name="last_name" id="lastname" placeholder="Name en" class="m-0" value="{{ old('last_name') }}" required maxlength="30">
                                                 @if ($errors->has('last_name'))
                                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="w-100 email">
                                                 <label for="email">Email</label>
                                                 <input type="email" name="email" id="email" placeholder="E-Mail" class="m-0" value="{{ old('email') }}"  required  maxlength="80"  >
                                                 @if ($errors->has('email'))
                                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="w-100 phone">
                                                 <label for="phone">Mobile</label>
                                                 <input type="text" name="phone_number" id="phone" placeholder="(+49) 123 456 789" class="m-0" value="{{ old('phone_number') }}" required maxlength="20">
                                                 @if ($errors->has('phone_number'))
                                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="w-100 pass">
                                                 <label for="pass">Passwort</label>
                                                 <input type="password" name="password" id="pass" placeholder="Passwort" class="m-0" value="{{ old('password') }}" required minlength="6" maxlength="15" >
                                                 @if ($errors->has('password'))
                                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="w-100 re-pass">
                                                 <label for="re-pass">Passwort wiederholen</label>
                                                 <input type="password" placeholder="Passwort wiederholen" name="password_confirmation" id="re-pass" class="m-0" required minlength="6"  maxlength="15" >
                                             </div>
                                         </div>
                                         <div class="col-md-7 pt-4">
                                             <div class="w-100 checkbox">
                                                  <input type="checkbox" name="accept" id="accept" required>
                                                 <label for="accept" style="padding-left:0px !important">Ich akzeptiere die <span>AGB's</span> & die <span>Datenschutzbestimmungen</span> </label> 
                                             </div>
                                         </div>
                                         <div class="col-md-5">
                                             <div class="w-100 btn-submit">
                                                 <button type="submit"> REGISTRIEREN  <i class="fa fa-arrow-alt-circle-right"></i></button>
                                             </div>
                                         </div>
                                     </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
    <!-- End Login Booking Area -->
    @stop
@section('js')
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    @endsection



























{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}
{{--                                <input id="last_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}
{{--                                <input id="phone_number" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}

{{--                                @if ($errors->has('name'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('name') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

{{--                                @if ($errors->has('email'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

{{--                                @if ($errors->has('password'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


