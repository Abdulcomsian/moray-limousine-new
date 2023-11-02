@extends('layouts.main-home-layout')
@section('title')
Become Driver
@endsection
@section('content-area')
    <style>
        .header-04 .bottom-header {
            background: rgb(0, 0, 0);
            position: absolute;
            z-index: 9;
            width: 100%;
        }
        .section-iconbox:not(.fix-mtb) {
            padding: 0 0 64px;
            margin-top: 10rem;
        }
    </style>

    <!-- Start Section Iconbox -->
       <!-- End Section Iconbox -->
    <!-- Start Info Box -->

    <!-- End Info Box -->
    <!-- Start About Box -->


    <section class="info-box parallax parallax_one change_text">
        <div class="container mt-5">
            <div class="wrapper-content">
                <h4 class="title">
                    Become a Driver and Start your journey.
                </h4>
                <p class="content">Join the growing community of HubSpot driver around the globe </p>
                <p class="contact">Call Now {{$home_content['phone_number'] ? $home_content['phone_number'] : '04433535355' }}</p>
                <a href="{{url('/')}}" class="booking">Online Booking<img src="{{asset('images/icon/arrow-white.png')}}" alt=""></a>
            </div>
        </div>
    </section>
    <section class="template-title has-over text-up">
        <div class="container">
            <h3 class="title">{{$home_content['your_advantage_title']}}</h3>
            <p class="subtitle">{{$home_content['your_advantage_description']}}</p>
        </div>
    </section>
    <!-- End Template title -->
    <!-- Start Section Iconbox -->
    <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/001.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="" title="">{{$home_content['your_advantage_col1_title']}}</a>
                            </h3>
                            <p>{{$home_content['your_advantage_col1_description']}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/002.png')}}"  style="width: 20%" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">{{$home_content['your_advantage_col2_title']}}</a>
                            </h3>
                            <p>{{$home_content['your_advantage_col2_description']}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/003.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">{{$home_content['your_advantage_col3_title']}}</a>
                            </h3>
                            <p>{{$home_content['your_advantage_col3_description']}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/004.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">Free waiting time</a>
                            </h3>
                            <p>When picking up from the airport we wait 60 minutes for you. For all other pickups the free waiting time is 15 minutes .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Iconbox -->

    <!-- Start Summary Bar Area -->
    <style>
        .btn-secondary:focus{
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
    </style>

    <!-- End Summary Bar Area -->
    <!-- Start Booking Steps Area -->
    <!-- End Booking Steps Area -->
    <!-- Start Login Booking Area -->
    <section class="login-booking-area" >
        <div class="container" >
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="login-booking">
                        <ul class="login">
                            <li class="active">Become a Driver</li>
                        </ul>
                        <div class="login-content">
                            <div id="tab-2" class="content-tab">
                                <div class="register-form">

                                    <form action="{{ route('register') }}" method="post" accept-charset="utf-8">
                                        @csrf

                                        <input type="hidden" name="user_type" value="driver">
                                        <div class="row">
                                        <div class="col-md-6 m-0">
                                            <div class="one-half w-100 first-name">
                                                <label for="firstname">First Name </label>
                                                <input type="text" name="first_name" id="firstname" placeholder="Enter First Name" value="{{ old('first_name') }}" required maxlength="20">
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 m-0">
                                        <div class="one-half w-100 last-name">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" name="last_name" id="lastname" placeholder="Enter Last Name" value="{{ old('last_name') }}" required maxlength="20">
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                     </span>
                                            @endif
                                        </div>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <div class="one-half w-100 email">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" required maxlength="60">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                                     </span>
                                            @endif
                                        </div>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <div class="one-half w-100 phone">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone_number" id="phone" placeholder="+49 (0) 69 330 889 08" value="{{ old('phone_number') }}" required maxlength="20">
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                                                     </span>
                                            @endif
                                        </div>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <div class="one-half w-100 pass">
                                            <label for="pass">Password</label>
                                            <input type="password" name="password" id="pass" value="{{ old('password') }}" required maxlength="15" minlength="6" >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                                     </span>
                                            @endif
                                        </div>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <div class="one-half w-100 re-pass">
                                            <label for="re-pass">Repeat Password</label>
                                            <input type="password" name="password_confirmation" id="re-pass" required minlength="6" maxlength="15">
                                        </div>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <div class="one-half w-100 checkbox">
                                            <input type="checkbox" name="accept" id="accept" required>
                                            <label for="accept">Accept <a href="#" title="">terms & conditions</a> and the <a href="#" title="">privacy policy</a></label>
                                        </div>
                                        </div>
                                        <div class="col-md-6 m-0 text-right">
                                            <div class="btn btn-dark pull-right">
                                            <button type="submit">Become Driver <img src="{{asset('images/icon/right-3.png')}}" alt=""></button>
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


@endsection
@section('js')
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    @endsection



