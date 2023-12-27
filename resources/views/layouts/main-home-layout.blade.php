<!DOCTYPE html>
<html lang="">

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="CreativeLayers">
    <title>Hathaway Limousines | @yield('title') </title>
    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('driver/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/glyphicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.min.css') }}" />
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/date-pick.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive style -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- hamza files Links  --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Add Bootstrap JavaScript and jQuery from CDN (required for some Bootstrap features) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

    <!-- Include Slick Slider Theme CSS (optional) -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Include jQuery (required for Slick Slider) -->

    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/createAccount.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/ourFleet.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/homePage.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

    <!-- Include Slick Slider Theme CSS (optional) -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <!-- Add flatpickr CSS and JavaScript links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />


    @yield('css')
    <style>
        .tp-splitted {
            font-size: 2.5rem !important;
        }

        .profile-drop-down {
            background: #fff;
            position: absolute;
            right: 10px;
            /* top: 66px; */
            z-index: 9999;
            text-align: center;
            /* height: 137px; */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
            border-radius: 5px;
            display: none;
        }
        .profile-drop-down ul{
            padding-left: 0px;
            margin-bottom: 0;
        }

        .profile-drop-down li>a {
            color: black;
            padding: 6px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
            font-size: 15px;
        }

        .nav-active {
            background-color: rgb(150, 152, 152);
            border-radius: 10px;
        }
        .navbar-dark .navbar-toggler{
            position: absolute;
            padding: 2px;
            height: 33px;
            margin-left: 23px
        }
        @media (max-width: 992px){
            .nav-bar{
                margin-top: 3rem;
                align-self: flex-start;
            }
            .nav-bar ul.navbar-nav{
                flex-grow: 1;
            }
            .navbar-nav .nav-link{
                padding: .5rem 1rem;
            }
            .nav-active {
            background-color: rgb(150, 152, 152);
            border-radius: 25px;
        }
        }
        @media (max-width:425px){
            .nav-bar{
                margin: 3rem auto 0;
            }
        }
        @media (max-width:392px){
            .form-inline{
                justify-content: center
            }
        }
    </style>
</head>

<body>



    <div class="layout-theme">
        {{--    <div id="loading-overlay"> --}}
        {{--        <div class="loader"></div> --}}
        {{--    </div> --}}
        <!-- Start Header -->
        <header id="header" class="header-04">
            {{-- hamza header  --}}
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">
                <a href="{{ url('/') }}"><img src="{{ asset('images/moray-logo.png') }}" id="logo"
                        alt="Hathaway Limousines" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nav-bar justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link bar <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'nav-active' : ''; ?>" aria-current="page"
                                href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bar <?php echo basename($_SERVER['PHP_SELF']) === 'about-us' ? 'nav-active' : ''; ?>" aria-current="page"
                                href="{{ url('/about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bar <?php echo basename($_SERVER['PHP_SELF']) === 'our-fleet' ? 'nav-active' : ''; ?>" aria-current="page"
                                href="{{ url('/our-fleet') }}">Our Fleet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bar <?php echo basename($_SERVER['PHP_SELF']) === 'our-services' ? 'nav-active' : ''; ?>" aria-current="page"
                                href="{{ url('/our-services') }}">Services</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link bar" aria-current="page" href="#">Blog</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link bar <?php echo basename($_SERVER['PHP_SELF']) === 'contact-us' ? 'nav-active' : ''; ?>" aria-current="page"
                                href="{{ url('/contact-us') }}">Contact</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0 gap-4 nav-login">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa fa-phone" style="color: white"></i>
                            <span class="phone">
                                {{ \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 69 26022180' }}
                            </span>
                        </div>

                        {{-- <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-globe" style="color: white"></i>
                            <span class="phone">GER</span>
                        </div> --}}

                        @if (Auth()->check())

                            @if (Auth()->user()->user_type == 'end_user')
                                <!-- <a class="text-white mr-4" href="{{ url('user/profile') }}">Profil</a> -->
                                <div style="position: relative">
                                    <a style="text-decoration: none;" class="text-white mr-4 profileText"
                                        href="#">Profil</a>
                                    <div class="profile-drop-down">
                                        <ul>
                                            <li>
                                                <a href="{{ url('user/reservation') }}">Meine Buchungen</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('user/profile') }}">Account</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @elseif(Auth()->user()->user_type == 'admin')
                                <a style="text-decoration: none;" class="text-white mr-4"
                                    href="{{ url('admin/index') }}">Profil</a>
                            @elseif(Auth()->user()->user_type == 'driver')
                                <a style="text-decoration: none;" class="text-white mr-4"
                                    href="{{ url('driver/profile') }}">Profil</a>
                            @elseif(Auth()->user()->user_type == 'partner')
                                <a style="text-decoration: none;" class="text-white mr-4"
                                    href="{{ url('partner/profile') }}">Profil</a>
                            @endif
                            <p style="margin-top:17px; color: white;"> {{ Auth()->user()->first_name }} / </p>
                            <form id="logout-form" style="display: inline" action=" {{ route('logout') }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="p-0"
                                    style="background-color: transparent; height: 1rem ; font-size: 14px; font-family: serif">Log
                                    out</button>
                            </form>
                        @else
                            <div class="login">
                                <a href="{{ url('/login') }}"><button class="btn"
                                        id="login">Login</button></a>
                                <a href="{{ url('/register') }}"><button class="btn" id="sign">Sign
                                        up</button></a>
                            </div>

                        @endif


                        {{-- <a href="#"><i class="fa-solid fa-bars" style="color: white" id="twobar"></i></a> --}}
                    </div>
                </div>
            </nav>

            {{-- previous header  --}}
            {{-- <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <ul>
                                <li><img src="{{ asset('images/icon/call.png') }}"
                                        alt="">{{ \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08' }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 d-none d-md-block d-lg-block d-sm-none right-content">
                            @if (Auth()->check())

                                @if (Auth()->user()->user_type == 'end_user')
                                    <!-- <a class="text-white mr-4" href="{{ url('user/profile') }}">Profil</a> -->
                                    <a class="text-white mr-4 profileText" href="#">Profil</a>
                                    <div class="profile-drop-down">
                                        <ul>
                                            <li>
                                                <a href="{{ url('user/reservation') }}">Meine Buchungen</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('user/profile') }}">Account</a>
                                            </li>
                                        </ul>
                                    </div>
                                @elseif(Auth()->user()->user_type == 'admin')
                                    <a class="text-white mr-4" href="{{ url('admin/index') }}">Profil</a>
                                @elseif(Auth()->user()->user_type == 'driver')
                                    <a class="text-white mr-4" href="{{ url('driver/profile') }}">Profil</a>
                                @elseif(Auth()->user()->user_type == 'partner')
                                    <a class="text-white mr-4" href="{{ url('partner/profile') }}">Profil</a>
                                @endif
                                {{ Auth()->user()->first_name }} /<form id="logout-form" style="display: inline"
                                    action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="p-0"
                                        style="height: 2rem ; font-size: 14px; font-family: serif">Log out</button>
                                </form>
                            @else
                                <div class="login">

                                    <a href="{{ url('/login') }}">Login/</a>
                                    <a href="{{ url('/register') }}">Registrieren</a>

                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container-fluid">
                    <div id="logo" class="logo-pro pt-0" style="width: 20%; text-align: center;">
                        <a href="{{ url('/') }}" title="Hathaway Limousines">
                            <img src="{{ asset('images/moray-logo.png') }}" alt="logo" class="img-fluid"
                                style="max-height: 4rem">
                        </a>
                    </div>
                    <div class="navigation w-75 pull-right">
                        <div class="mobile-menu pull-right" style="cursor: pointer;">
                            <span></span>
                        </div>
                        <div id="main-menu" class="main-menu">
                            <div class="top-text">
                                <span>
                                    <a href="{{ url('/') }}" title="">
                                        <img src="{{ asset('images/moray-logo.png') }}" alt="logo"
                                            class="img-fluid" style="margin-top: -8px; max-height: 6rem;">
                                    </a>
                                    @if (Auth()->check())

                                        @if (Auth()->user()->user_type == 'end_user')
                                            <a class="text-white mr-4" href="{{ url('user/profile') }}">Profil</a>
                                        @elseif(Auth()->user()->user_type == 'admin')
                                            <a class="text-white mr-4" href="{{ url('admin/index') }}">Profil</a>
                                        @elseif(Auth()->user()->user_type == 'driver')
                                            <a class="text-white mr-4" href="{{ url('driver/profile') }}">Profil</a>
                                        @elseif(Auth()->user()->user_type == 'partner')
                                            <a class="text-white mr-4" href="{{ url('partner/profile') }}">Profil</a>
                                        @endif
                                        {{ Auth()->user()->first_name }} /<form id="logout-form"
                                            style="display: inline" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="p-0"
                                                style="height: 2rem ; font-size: 14px; font-family: serif">Log
                                                out</button>
                                        </form>
                                    @else
                                        <div class="login">

                                            <a href="{{ url('/login') }}">Login/</a>
                                            <a href="{{ url('/register') }}">Registrieren</a>

                                        </div>

                                    @endif
                                </span>



                                <i class="pe-7s-close"></i>
                            </div>
                            <ul class="menu text-left">
                                <li class="dropdown">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ url('/our-feet') }}">Flotte</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ url('/our-services') }}">Services</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ url('/contact-us') }}">Kontakt</a>
                                </li>
                                <li class="has-dropdown">
                                    <a href="{{ url('/about-us') }}">Über uns</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert-wrong-city alert-danger alert-dismissible fade show position-absolute p-1 text-center"
                        style="color: white; border: darkgoldenrod;  background: #f70000e3;margin-top: 6.1rem; display: none; "
                        role="alert">
                        <strong class="alert-box-text"></strong>
                        <span id="alert_box_text" style="font-size: 17px;font-family: sans-serif;">Holy
                            guacamole!</span>
                    </div>
                </div>
            </div> --}}

        </header>

        @yield('content-area')

        {{-- <footer id="footer" class="footer-04"> --}}
        {{-- hamza footer  --}}

        <div class="container-fluid class1font" id="cont15">

            <div class="d-flex justify-content-between footer-content">
                <img src="{{ asset('images/moray-logo.png') }}" id="logo2" alt="Avatar">


                <div class="d-flex justify-content-between gap-4 connection-list">
                    <div>
                        <a href="#"><i class="fa fa-phone phone1" style="color: white;" id=""></i></a>
                        <span class="mx-1 Number" id="">{{ \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 69 26022180' }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="mx-1 Number" id="">Follow Us</span>
                        <div>
                            <a href="https://www.facebook.com/moraylimousines" target="_blank"><i class="fa-brands fa-facebook mx-2 footer--brand-icon"
                                    style="color: white; display: inline-block;"></i></a>
                            {{-- <a href="#"><i class="fa-brands fa-twitter mx-2"
                                    style="color: white; display: inline-block; "></i></a> --}}
                            <a href="https://www.instagram.com/moraylimousines"><i class="fa-brands fa-instagram mx-2 footer--brand-icon"
                                    style="color: white; display: inline-block;"></i></a>
                            {{-- <a href="#"><i class="fa-brands fa-linkedin mx-2"
                                    style="color: white; display: inline-block;"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="footer-hr">


            <div class="row justify-content-between">
                <div class="col">
                    <p class="JK2">SERVICES</p>
                    <ul  class="list footer-list">
                        @foreach(\App\Models\CmsService::all()->take(4) as $service)
                        <li>
                            <a href="{{url('/service/details/'.$service->id)}}" title="">{{$service->service_title}}</a>
                        </li>
                    @endforeach

                    </ul>
                </div>
                <div class="col">
                    <p class="JK2">Worldwide Service</p>
                    <ul  class="list footer-list">
                        <li>Frankfurt am Main</li>
                        <li>Munich</li>
                        <li>Berlin</li>
                        <li>Amsterdam</li>
                        <li>Zurich</li>
                        <li>Dubai</li>
                    </ul>
                </div>
                <div class="col">
                    <p class="JK2">Über uns</p>
                    <ul class="list footer-list">
                        <li><a href="{{url('/about-us')}}">Über uns</a></li>
                        <li><a href="{{url('/Faq')}}">FAQs</a></li>
                        <li><a href="{{url('/contact-us')}}">Kontakt</a></li>
                    </ul>
                </div>
                <div class="col">
                    <p class="JK2">PARTNER WERDEN</p>
                    <ul class="list footer-list">
                        <li><a href="{{url('/become-driver')}}">Für Fahrer</a></li>
                        <li><a href="{{url('/become-partner')}}">Für Partnerunternehmen</a></li>
                    </ul>
                </div>
                <div class="col">
                    <p class="JK2">KONTAKT</p>
                    <ul class="list footer-list">
                        <li>Hathaway Limousines</li>
                        <li>Friedrich-Ebert-Anlage 36</li>
                        <li>60325 Frankfurt am Main</li>
                        <li>+49 69 26022180</li>
                    </ul>
                </div>
                <div class="col">
                    <p class="JK2">Payment</p>
                    <div class="d-flex flex-column justify-content-md-end storeIcons gap-2">
                        <img src="{{asset('images/all/paymentMethod1.png')}}" class="EK41" alt="Avatar"> 
                        <img src="{{asset('images/all/paymentMethod2.png')}}" class="EK41" alt="Avatar"> 
                        {{-- <button type="button" class="btn-dark" id="BTM"><a href="#"><i
                                    class="fa-brands fa-apple" id="apple" style="color:white"></i></a>
                            <p id="lin1"> | </p>
                            <p id="IK2">Download on the</p>
                            <p id="IK3">Apple Store</p>
                        </button>
                        <button type="button" class="btn-dark" id="BTM1"><a href="#"><i
                                    class="fa-brands fa-google-play" id="apple" style="color:white"></i></a>
                            <p id="lin1"> | </p>
                            <p id="IK2">Get in on</p>
                            <p id="IK3">Play Store</p>
                        </button> --}}
                    </div>
                </div>
            </div>



            <div class="mt-4 footer-termsLink">
                {{-- <div class="col-md-6"> --}}
                    <p class="KK"> @ 2023 HATHWAY-LIMOUSINES</p>
                {{-- </div> --}}

                {{-- <div class="col-md-6 "> --}}
                    <p class="copyRightText text-center">Developed by <a href="https://dbqplabs.com/" target="_blank" title="Software development agency in Finland" nofollow style="color: inherit">dpqp</a> 
                        {{-- <a href="{{url('/mpressum')}}" class="pl-2 pr-2" style="color: goldenrod; text-decoration: underline;"> Impressum</a>
                        <a href="{{url('/datenschutz')}}" class="pl-2" style="color: goldenrod;text-decoration: underline;"> Datenschutz</a> --}}
                    </p>
                {{-- </div> --}}
                
                {{-- <div class="col-4 d-flex justify-content-md-end mt-4">
                    <div class="">
                        <button class="btn btn-dark" id="GER" type="submit"><i
                                class="fa-solid fa-location-dot" id="eng" style="color: white"></i> Germany
                        </button>
                        <button class="btn btn-dark" id="English" type="submit">
                            <i class="fa-solid fa-earth-americas" id="eng" style="color: white"></i> English
                        </button>
                    </div>
                </div> --}}
            </div>
            {{-- <div>
                
            </div> --}}
        </div>

        {{-- 
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 text-center ft1">
                        <div class="widget-footer widget-about">
                            <div class="logo-ft m-0">
                                <a href="{{ url('/') }}" title="">
                                    <img src="{{ asset('images/moray-logo.png') }}" alt="logo" class="img-fluid"
                                        style="max-height: 7rem;">
                                </a>
                            </div>
                            <ul class="infomation-ft">
                                <li>

                            </ul>
                            <ul class="social-ft">
                                <li>
                                    <a href="https://www.facebook.com/moraylimousines" title="Facebook">
                                        <i class="fa fa-facebook" style="font-size: 2rem;" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/moraylimousines" title="Instagram">
                                        <i class="fa fa-instagram" style="font-size: 2rem;" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 text-center ft2">
                        <div class="widget-footer widget-services">
                            <h3 class="title-ft">
                                Services
                            </h3>
                            <ul>
                                @foreach (\App\Models\CmsService::all()->take(4) as $service)
                                    <li>
                                        <a href="{{ url('/service/details/' . $service->id) }}"
                                            title="">{{ $service->service_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 text-center ft2">
                        <div class="widget-footer widget-services">
                            <h3 class="title-ft">
                                Über uns
                            </h3>
                            <ul>

                                <li>
                                    <a href="{{ url('/about-us') }}" title="About Us">Über uns</a>
                                </li>
                                <li>
                                    <a href="{{ url('/Faq') }}" title="">FAQs</a>
                                </li>
                                <li>
                                    <a href="{{ url('/contact-us') }}" title="">Kontakt</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 text-center ft2">
                        <div class="widget-footer widget-services">
                            <h3 class="title-ft">
                                Partner werden
                            </h3>
                            <ul>
                                <li>
                                    <a href="{{ url('/become-driver') }}" title="">Für Fahrer</a>
                                </li>
                                <li>
                                    <a href="{{ url('/become-partner') }}" title="">Für Partnerunternehmen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 text-center ft1">
                        <div class="widget-footer newletter">
                            <h3 class="title-ft">
                                Kontakt
                            </h3>
                            <p>{!! \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS)
                                ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS)
                                : 'Hathaway Limousines (A brand of Hathaway Group UG) Friedrich-Ebert-Anlage 36 60325 Frankfurt am Main' !!}</p>

                            {{ \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08' }}

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 text-center ft1">
                        <div class="widget-footer newletter">
                            <h3 class="title-ft">
                                Payment
                            </h3>
                            <p class="pb-3">
                                <img src="{{ asset('images/icon/paypal-icons1.jpg') }}" alt="paypal">
                            </p>
                            <p>
                                <img src="{{ asset('images/icon/paypal-icons2.jpg') }}" alt="icon">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- End Footer -->

        <section class="footer-bottom bottom-04">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            Worldwide Service
                        </div>
                        <ul class="city">
                            @foreach (\App\Models\Location::all()->where('is_top_city', true) as $city)
                                <li>
                                    <span style="cursor:inherit;">{{ $city->location_city }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Copyright -->

        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright Hathaway Group : © {{ date('Y') }}. All Rights Reserved
                            <a href="{{ url('/mpressum') }}" class="pl-2 pr-2"
                                style="color: goldenrod; text-decoration: underline;"> Impressum</a>
                            <a href="{{ url('/datenschutz') }}" class="pl-2"
                                style="color: goldenrod;text-decoration: underline;"> Datenschutz</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Copyright -->

        <div class="scroll-top">
        </div>
    </div> --}}


        <!-- Javascript -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/parallax.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/waves.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/moment_timezone.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/moment_load_timezone.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>



        {{-- <script type="text/javascript" src="{{asset('js/gmap3.min.js')}}"></script> --}}

        <script type="text/javascript" src="{{ asset('js/template.js') }}"></script>

        <!-- Revolution Slider -->

        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/slider.js') }}"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.actions.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.carousel.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
        </script>
        <script type="text/javascript"
            src="{{ asset('revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.migration.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.navigation.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.parallax.min.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
        </script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132330959-1"></script>

        {{-- new scripts  --}}
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script src="	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"></script>
        <script src="	https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/1019421737.js" crossorigin="anonymous"></script>


        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include Slick Slider JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="{{ asset('js/homePage.js') }}"></script>

        <script src="https://kit.fontawesome.com/1019421737.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-132330959-1');
        </script>
        {{-- <script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script> --}}
        @yield('js')
        <script>
            var i = 0;
            $(".profileText").click(function() {
                if ($(".profile-drop-down").css("display") == "none") {
                    $(".profile-drop-down").css("display", "block")
                } else {
                    $(".profile-drop-down").css("display", "none")
                }
            })
            jQuery('input[type="checkbox"]').on('change', function() {
                if (i == 0) {
                    jQuery(".checkbox input[type='checkbox']:checked + label::after").css("opacity", "1")
                    console.log("hello 0")

                    i++;
                } else {
                    i = 0;
                    jQuery(".checkbox input[type='checkbox']:checked + label::after").css("opacity", "0")
                    console.log("hello 1")

                }

            });

            // $(document).ready(function() {
            //     // Get all the navigation links
            //     var navLinks = $('.nav-link');
            //     alert("navlinks")

            //     // Add a click event handler to each navigation link
            //     navLinks.click(function() {
            //         // Remove the "active" class from all navigation links
            //         navLinks.removeClass('active');

            //         // Add the "active" class to the clicked navigation link
            //         $(this).addClass('active');
            //     });
            // });
        </script>

</body>

</html>
