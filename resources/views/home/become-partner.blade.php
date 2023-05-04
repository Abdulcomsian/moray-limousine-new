@extends('layouts.main-home-layout')
@section('title')
Become Partner
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

<section class="info-box parallax parallax_one change_text">
    <div class="container">
        <div class="wrapper-content pt-4">
            <h3 class="title mt-5">
                BAUEN SIE IHR GESCHÄFT MIT MORAY LIMOUSINES WEITER AUS
                <!-- <span class="span">LIMOUSINES WEITER AUS</span> -->
            </h3>
            <p class="content">Melden Sie sich bei Moray Limousines an und steigern Sie Ihren Verdienst.</p>
            <a href="{{ url('partner-registration') }}" class="booking">Become A Partner<img src="{{asset('images/icon/arrow-white.png')}}" alt=""></a>
        </div>
    </div>
</section>
<!-- End Info Box -->
<!-- Start About Box -->
<!-- Start Template title -->
<section class="template-title has-over text-up">
    <div class="container">
        <h3 class="title">WER SIND WIR?</h3>
        <p class="subtitle">Explore our first class limousine & car rental services</p>
    </div>
</section>
<!-- End Template title -->
<!-- Start Section Iconbox -->
<section class="section-iconbox fix-ts">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-5 col-sm-6 col-xs-12 size-table">
                <div class="iconbox center">
                    <div class="iconbox-icon">
                        <div style="opacity:1" class="style-jr50n2jm_comp-jr50pq1n style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50pq1nsvg">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" style="height: 5rem;" data-bbox="7.5 18.8 185.1 162.5" viewBox="7.5 18.8 185.1 162.5" xmlns="http://www.w3.org/2000/svg" data-type="color" role="img" width="185.1" height="162.5">
                                    <g>
                                        <path d="M175.1 82.6c-8.5 0-15.6 6.1-17.1 14.2l-40.8 1.9c-.8-2.7-2.2-5.2-4.1-7.2l25.6-39c1.8.7 3.8 1.1 5.9 1.1 9.6 0 17.4-7.8 17.4-17.4 0-9.6-7.8-17.4-17.4-17.4-9.6 0-17.4 7.8-17.4 17.4 0 4.6 1.8 8.8 4.8 11.9l-25.6 39c-1.8-.7-3.8-1.1-5.9-1.1-2 0-4 .4-5.8 1l-25-38.7c3-3.1 4.9-7.4 4.9-12 0-9.6-7.8-17.4-17.4-17.4-9.6 0-17.4 7.8-17.4 17.4 0 9.6 7.8 17.4 17.4 17.4 2 0 4-.4 5.8-1l25 38.8c-2 2.1-3.4 4.6-4.2 7.4l-42-1.5c-1.7-7.8-8.7-13.5-16.9-13.5-9.6 0-17.4 7.8-17.4 17.4 0 9.6 7.8 17.4 17.4 17.4 8.2 0 15-5.6 16.9-13.2l41.8 1.5c.6 3 2 5.7 3.9 8l-23.6 32.8c-2-.8-4.3-1.3-6.6-1.3-9.6 0-17.4 7.8-17.4 17.4 0 9.6 7.8 17.4 17.4 17.4 9.6 0 17.4-7.8 17.4-17.4 0-4.4-1.6-8.3-4.3-11.4L94 119.7c2 .8 4.3 1.3 6.6 1.3 2.4 0 4.7-.5 6.8-1.4l24.1 33c-2.6 3-4.2 7-4.2 11.3 0 9.6 7.8 17.4 17.4 17.4 9.6 0 17.4-7.8 17.4-17.4 0-9.6-7.8-17.4-17.4-17.4-2.4 0-4.7.5-6.8 1.4l-24.1-33c1.9-2.3 3.3-5 3.9-8.1l40.8-1.9c2.1 7.3 8.8 12.6 16.7 12.6 9.6 0 17.4-7.8 17.4-17.4-.1-9.7-7.9-17.5-17.5-17.5zM144.6 27c5.1 0 9.3 4.1 9.3 9.3s-4.1 9.3-9.3 9.3-9.3-4.1-9.3-9.3 4.2-9.3 9.3-9.3zm-96.7 9.2c0-5.1 4.1-9.3 9.3-9.3s9.3 4.1 9.3 9.3-4.1 9.3-9.3 9.3-9.3-4.1-9.3-9.3zm-23 74.3c-5.1 0-9.3-4.1-9.3-9.3s4.1-9.3 9.3-9.3 9.3 4.1 9.3 9.3-4.2 9.3-9.3 9.3zM57.1 173c-5.1 0-9.3-4.1-9.3-9.3s4.1-9.3 9.3-9.3 9.3 4.1 9.3 9.3-4.2 9.3-9.3 9.3zm34.2-69.5c0-5.1 4.1-9.3 9.3-9.3s9.3 4.1 9.3 9.3-4.1 9.3-9.3 9.3-9.3-4.2-9.3-9.3zm62.6 60.2c0 5.1-4.1 9.3-9.3 9.3s-9.3-4.1-9.3-9.3 4.1-9.3 9.3-9.3 9.3 4.2 9.3 9.3zm21.2-54.4c-5.1 0-9.3-4.1-9.3-9.3s4.1-9.3 9.3-9.3 9.3 4.1 9.3 9.3-4.2 9.3-9.3 9.3z" fill="#71B7E6" data-color="1"></path>
                                    </g>
                                </svg>
                        </div>
                    </div>
                    <div class="iconbox-content">
                        <p>Moray Limousines bietet professionelle Fahrdienste im Rhein Main Gebiet an. Dadurch sind Sie als Partner an ein Lokales Netzwerk angebunden.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12 size-table">
                <div class="iconbox center">
                    <div class="iconbox-icon">
                        <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" style="height: 5rem;" data-bbox="10.5 74.001 179 51.999" viewBox="10.5 74.001 179 51.999" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="color" role="img">
                                    <g>
                                        <path d="M139.739 113.973c-21.903-.03-47.55 0-70.043 0h-29.51c-13.295 0-23.053-.03-26.473-.148-4.097 0-3.891-9.528 0-9.528l7.36-1.411c.506-1.046-3.613-9.072-1.227-10.168 6.072-2.787 15.245-1.984 20.577-1.965 1.179 0 2.328.03 3.537.03 4.658-5.359 9.404-9.854 14.416-12.175 11.467-5.359 23.79-4.198 35.346-4.555 9.522-.297 19.309.535 28.212 6.489 3.597 2.411 7.989 5.835 12.941 10.211 4.57 0 9.11.03 13.532.089 10.605.062 21.515 1.22 28.949 5.775 1.568.961.294 4.609 1.51 5.884 1.305 1.368 5.073.389 5.918 2.212 6.457.151 6.19 9.676-.236 9.586-3.714-.088-8.991-.148-15.359-.177l-29.45-.149z" fill-rule="evenodd" clip-rule="evenodd" fill="#EECC2C" data-color="1"></path>
                                        <path d="M43.989 90.723c1.113-1.281 3.789-5.399 7.253-8.097 3.995-3.111 8.775-4.756 9.138-4.883-3.774 4.822-8.137 10.181-10.111 11.967-.561.685-3.303.952-6.28 1.013z" fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" data-color="2"></path>
                                        <path d="M177.367 96.629c3.243 1.965 5.807 4.613 7.428 8.096h-.059a769.808 769.808 0 0 0-9.168-.058 38.528 38.528 0 0 1 1.799-8.038z" fill-rule="evenodd" clip-rule="evenodd" fill="#4D4A7F" data-color="3"></path>
                                        <path d="M13.713 104.297v-2.173c.089-4.881 2.594-7.77 6.132-9.406.825 3.691 1.886 8.067 2.564 11.669-4.097 0-7.074-.059-8.696-.09z" fill-rule="evenodd" clip-rule="evenodd" fill="#4D4A7F" data-color="3"></path>
                                        <path d="M59.525 90.662c6.485-6.788 6.927-11.282 16.744-11.907 5.778-.357 14.121-.148 15.506-.119v11.818c-3.243 0-32.25.208-32.25.208z" fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" data-color="2"></path>
                                        <path d="M127.947 90.454c-3.007 0-30.452.208-30.482.208V78.904c-.089 0 3.803-.12 7.459-.179 10.966.208 14.296 5.953 23.023 11.729z" fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" data-color="2"></path>
                                        <path d="M54.925 102.244c6.044 0 10.937 4.942 10.937 11.044 0 6.103-4.894 11.015-10.937 11.015-6.043 0-10.936-4.912-10.936-11.015 0-6.103 4.893-11.044 10.936-11.044zm99.377 0c6.014 0 10.908 4.942 10.908 11.044 0 6.103-4.894 11.015-10.908 11.015-6.044 0-10.937-4.912-10.937-11.015-.001-6.103 4.893-11.044 10.937-11.044z" fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" data-color="2"></path>
                                        <path d="M54.925 118.825c3.037 0 5.484-2.471 5.484-5.538 0-3.037-2.446-5.507-5.484-5.507-3.006 0-5.453 2.47-5.453 5.507 0 3.067 2.447 5.538 5.453 5.538z" fill-rule="evenodd" clip-rule="evenodd" fill="#F9E5DB" data-color="4"></path>
                                        <path d="M154.302 118.825c3.007 0 5.484-2.471 5.484-5.538 0-3.037-2.477-5.507-5.484-5.507s-5.483 2.47-5.483 5.507c0 3.067 2.476 5.538 5.483 5.538z" fill-rule="evenodd" clip-rule="evenodd" fill="#F9E5DB" data-color="4"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M28.365 96.469v2.768h-2.742v-2.768h2.742z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M31.106 99.237v2.767h-2.742v-2.767h2.742z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M33.848 96.469v2.768h-2.742v-2.768h2.742z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M36.619 99.237v2.767h-2.771v-2.767h2.771z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M39.331 96.469v2.768h-2.712v-2.768h2.712z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M42.072 99.237v2.767h-2.741v-2.767h2.741z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M44.844 96.469v2.768h-2.771v-2.768h2.771z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M133.047 96.469v2.768h-2.771v-2.768h2.771z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M135.788 99.237v2.767h-2.742v-2.767h2.742z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M138.529 96.469v2.768h-2.741v-2.768h2.741z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M141.271 99.237v2.767h-2.741v-2.767h2.741z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M144.012 96.469v2.768h-2.741v-2.768h2.741z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M146.755 99.237v2.767h-2.742v-2.767h2.742z" data-color="2"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" d="M149.526 96.469v2.768h-2.771v-2.768h2.771z" data-color="2"></path>
                                        <path d="M100 126c49.29 0 89.5-.745 89.5-1.698 0-.922-40.21-1.697-89.5-1.697s-89.5.774-89.5 1.697c0 .953 40.21 1.698 89.5 1.698z" fill-rule="evenodd" clip-rule="evenodd" fill="#000D01" data-color="2"></path>
                                    </g>
                                </svg>                        </div>
                    </div>
                    <div class="iconbox-content">
                        <p>Wir arbeiten ausschließlich mit lizenzierten und versicherten Partnerunternehmen zusammen und bieten ihnen zusätzliche Verdienstmöglichkeiten: Durch die Verringerung Ihrer Standzeiten können Sie Ihre Kapazitäten mit uns effizienter nutzen.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 6rem;">
                <h2 class="text-center">
                    WARUM MORAY LIMOUSINES?
                </h2>
            </div>
            <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                <div class="iconbox center mt-5">
                    <div class="iconbox-icon">
                        <img src="{{asset('images/cms/home/kontrolle.png')}}" alt="">
                    </div>
                    <div class="iconbox-content">
                        <h3>
                            <a href="#" title="">DIE VOLLSTÄNDIGE KONTROLLE</a>
                        </h3>
                        <p>Welche Fahrt Sie annehmen, liegt ganz bei Ihnen. Sie bestimmen inwieweit Sie unser Angebot nutzen möchten. Ihnen wird stets das Minimum an Verdienst pro Fahrt angezeigt - weitere Steuern oder Gebühren ziehen wir nicht ab.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                <div class="iconbox center mt-5">
                    <div class="iconbox-icon">
                        <img src="{{asset('images/cms/home/erweitern.png')}}" max-width:" 20% "  alt="">
                    </div>
                    <div class="iconbox-content">
                        <h3>
                            <a href="#" title="">ERWEITERN SIE IHR GESCHÄFT MIT MORAY LIMOUSINES</a>
                        </h3>
                        <p>Ihr Erfolg ist uns wichtig! Mit Moray Limousines können Sie Ihren Umsatz bequem steigern: Wir bieten unseren Partnern täglich Fahrten an, so dass sie ihre Standzeiten möglichst effizient nutzen können. Es liegt in Ihrer Hand, wie viel Sie verdienen möchten.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                <div class="iconbox center mt-5">
                    <div class="iconbox-icon">
                        <img src="{{asset('images/cms/home/tools.svg')}}" alt="">
                    </div>
                    <div class="iconbox-content">
                        <h3>
                            <a href="#" title="">Tools to succeed</a>
                        </h3>
                        <p>Welche Fahrt Sie annehmen, liegt ganz bei Ihnen. Sie bestimmen inwieweit Sie unser Angebot nutzen möchten. Ihnen wird stets das Minimum an Verdienst pro Fahrt angezeigt - weitere Steuern oder Gebühren ziehen wir nicht ab.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                <div class="iconbox center mt-5">
                    <div class="iconbox-icon">
                        <img src="{{asset('images/cms/home/responsive.svg')}}" alt="">
                    </div>
                    <div class="iconbox-content">
                        <h3>
                            <a href="#" title="">MORAY LIMOUSINES IS SIMPLE</a>
                        </h3>
                        <p>There's no hassle with Moray Limousines: Easy-to-use app, clear offers, no preferred partners, no registration fees, no journey forms to fill out, no need to carry cash. All you need to do is deliver a great customer experience and we will take care of the rest.</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- End Section Iconbox -->
<!-- End Section Iconbox -->

<!-- Start Summary Bar Area -->
<style>
    .btn-secondary:focus {
        background: #1e1e1e;
        color: white;
        font-weight: bold;
    }
</style>

<!-- End Summary Bar Area -->
<!-- Start Booking Steps Area -->
<!-- End Booking Steps Area -->
<!-- Start Login Booking Area -->
<!-- <section class="login-booking-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="login-booking">
                        <ul class="login">
                            <li class="active">Become a Partner</li>
                        </ul>
                        <div class="login-content">
                            <div id="tab-2" class="content-tab">
                                <div class="register-form">

                                    <form action="{{ route('register') }}" method="post" accept-charset="utf-8">
                                        @csrf

                                        <input type="hidden" name="user_type" value="partner">
                                        <div class="row">
                                            <div class="col-md-6 m-0">
                                                <div class="one-half w-100 first-name">
                                                    <label for="firstname">First Name </label>
                                                    <input type="text" name="first_name" id="firstname" placeholder="Enter First Name " value="{{ old('first_name') }}" required    >
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
                                                    <input type="text" name="last_name" id="lastname" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
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
                                                    <input type="text" name="email" id="email" placeholder="Enter Email " value="{{ old('email') }}" required >
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
                                                    <input type="text" name="phone_number" id="phone" placeholder="(+90) 538 658 96 315" value="{{ old('phone_number') }}" required>
                                                    @if ($errors->has('phone_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                                                     </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half pass w-100">
                                                    <label for="pass">Password</label>
                                                    <input type="password" name="password" id="pass" value="{{ old('password') }}" required >
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
                                                    <input type="password" name="password_confirmation" id="re-pass">
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half mb-5 w-100 checkbox">
                                                    <input type="checkbox" name="accept" id="accept">
                                                    <label for="accept">Accept <span>terms & conditions</span> and the <span>privacy policy</span> </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right m-0">
                                                <div class="btn-submit-form mb-0 mr-2">
                                                    <button type="submit">Become Partner <img src="{{asset('images/icon/right-3.png')}}" alt=""></button>
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
    </section> -->

<!-- HOW IT WORKS -->

 <!-- <section class="section-iconbox fix-ts">
    <div class="container">
        <div class="row justify-content-around">

            <div class="col-md-12" style="margin-top: 6rem;">
                <h2 class="text-center">
                    HOW IT WORKS
                </h2>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 size-table">
                <div class="iconbox center">
                    <div class="iconbox-icon">
                        <div style="opacity:1" class="style-jr50n2jm_comp-jr50pq1n style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50pq1nsvg">
                            <img src="{{asset('images/cms/home/responsive.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="iconbox-content">
                        <p>Register for free on our website</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 size-table">
                <div class="iconbox center">
                    <div class="iconbox-icon">
                        <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                            <img src="{{asset('images/cms/home/app.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="iconbox-content">
                        <p>Get familiar with the app and our policies</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 size-table">
                <div class="iconbox center">
                    <div class="iconbox-icon">
                        <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                            <img src="{{asset('images/cms/home/earn_money.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="iconbox-content">
                        <p>Begin accepting rides and start earning money</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  -->

<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <iframe width="100%" height="700" src="https://www.youtube.com/embed/cU-cmfmbL2k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div> -->

<!-- ACCEPTING A RIDE -->

<!-- <section class="section-iconbox fix-ts">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-6 col-sm-6 col-xs-12 size-table">
                <div class="partner-benefits row with-double-margin">
                    <div class="row with-double-margin">
                        <div class="span8 offset2">
                            <div class="span2 center" style="margin-right: 3rem;">
                                <img data-ie-src="/assets/icons/smartphone.png" src="{{asset('images/cms/home/smartphone.svg')}}" alt="Smartphone">
                            </div>
                            <div class="span10">
                                <h4>ACCEPTING A RIDE</h4>
                                <p>Our technology connects guests and chauffeurs seamlessly via the Blacklane app and portal. Accept a ride and you will have all necessary details at hand, e.g. guests’ details, location, pickup and dropoff times.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row with-double-margin">
                        <div class="span8 offset2">
                            <div class="span2 center" style="margin-right: 3rem;">
                                <img data-ie-src="/assets/icons/clock.png" src="{{asset('images/cms/home/clock.svg')}}" alt="Smartphone">
                            </div>
                            <div class="span10">
                                <h4>ACCEPTING A RIDE</h4>
                                <p>Our technology connects guests and chauffeurs seamlessly via the Blacklane app and portal. Accept a ride and you will have all necessary details at hand, e.g. guests’ details, location, pickup and dropoff times.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row with-double-margin">
                        <div class="span8 offset2">
                            <div class="span2 center" style="margin-right: 3rem;">
                                <img data-ie-src="/assets/icons/dollarsign.png" src="{{asset('images/cms/home/dollarsign.svg')}}" max-width="100%" alt="Smartphone">
                            </div>
                            <div class="span10">
                                <h4>ACCEPTING A RIDE</h4>
                                <p>Our technology connects guests and chauffeurs seamlessly via the Blacklane app and portal. Accept a ride and you will have all necessary details at hand, e.g. guests’ details, location, pickup and dropoff times.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</section> -->

<!-- WHAT WE REQUIRE FROM YOU -->

<!-- <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row justify-content-around" >
                
                <div class="col-md-12" style="margin-top: 6rem;">
                    <h2 class="text-center" style="font-weight: bold;">
                        HOW IT WORKS
                    </h2>
                </div>
                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                    <div class="iconbox-content mt-5">
                            <h3 class="title">VEHICLE</h3>
                            <p class="mt-3">Partner vehicles must meet our standards, be clean, undamaged and smoke-free. Full compliance with local regulations, including licensing and insurance, is required.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-content mt-5">
                            <h3 class="title">CHAUFFEURS</h3>
                            <p class="mt-3">Partners must be dependable, motivated, professional and have a polished appearance.</p>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                                <img src="{{asset('images/cms/home/app.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>Get familiar with the app and our policies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- End Login Booking Area -->


@endsection