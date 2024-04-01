@extends('layouts.main-home-layout')

@section('content-area')
    <style>
        .btn-submit button:before{
            top: 6px !important;
        }
        .form-email label{
            font-size: 1.6rem;
        }
    </style>
    <div class="login-booking" style="margin-top: 7rem;">
        <ul class="login-tab-list">
            <br>
            <li rel="tab-1" class="active" style="font-size: 1.7rem ">Password Reset</li>
        </ul>
        <div class="login-content">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div id="tab-1" class="content-tab" style="display: block;">
                <div class="login-form text-center">
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-3"></div>
                                <div class="col-md-7">
                                    <div class="one-half w-75 p-0">
                                        <div class="form-email">
                                            <label for="" class="mb-4">Enter Email</label>
                                            <input type="text" name="email" id="email" placeholder="Enter your Email" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-7">
                                    <div class="one-half float-right">
                                        <div class="btn-submit">
                                            <button type="submit" class="btn btn-dark mr-5">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
