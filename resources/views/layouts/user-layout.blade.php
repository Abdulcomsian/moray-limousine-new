<!DOCTYPE html>
<html lang=" ">
<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="CreativeLayers">
    <title> Moray |  @yield('title')  </title>
    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('driver/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive style -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    @yield('css')

    <style>
        .btn-save:hover{
            background-color: #0b0e11 !important;
        }
        .text-gray{
            color: gray;
        }
        .list-group-item.active , .side-links:hover , .btn-save{
            background-color: #bd8d2e;
            border-color: #dcaf56;
        }
        .btn-save:hover{
            background-color: #0b0e11 !important;
        }
        .btn-save{
            background-color: #bd8d2e;
        }
        .btn-save:hover{
            background-color: #0b0e11 !important;
        }
        .text-gray{
            color: gray;
        }
        .list-group-item.active , .side-links:hover , .btn-save{
            background-color: #bd8d2e;
            border-color: #dcaf56;
        }
		
		        .profile-drop-down{
            background: #fff;
            position: absolute;
            right: 136px;
            z-index: 9999;
            text-align: center;
            height: 137px;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
            display: none;
        }
        .profile-drop-down li>a{
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
@php
$user_type = Auth()->user()->user_type;
@endphp
<div class="layout-theme">
    <header id="header" class="header-04">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 left-content">
                        <ul>
                            <li><img src="{{asset('images/icon/call.png')}}" alt="">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08'}}</li>
{{--                            <li><img src="{{asset('images/icon/mail.png')}}" alt="">Email:--}}
{{--                                {{\App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) ? \App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) : 'info@moray-limousines.com'}}</li>--}}
                            {{--                            <li><img src="{{asset('images/icon/mail.png')}}" alt=""><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="10797e767f5060627f74796266753e737f7d">[email&#160;protected] Info@mylisft.com</a></li>--}}
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 right-content">

                        @if (Auth()->check())

                            @if($user_type == 'end_user')
                                <a class="text-white" href="{{url('user/notifications')}}">
                             @if(count(auth()->user()->unreadNotifications) > 0)
                               <span class="badge" style="background-color: #bd8d2e; border-radius: 6px;">
                               {{count(auth()->user()->unreadNotifications)}}
                               </span>
                                    @endif
                                    <i class="fa fa-bell pr-3" style="font-size: 1.2rem;"></i>
                                </a>
                                <!-- <a class="text-white mr-4" href="{{url('user/profile')}}">Profil</a> -->
								
								<a class="text-white mr-4 profileText" href="#">Profil</a>
                                <div class="profile-drop-down">
                                    <ul>
                                        <li>
                                            <a href="{{url('user/reservation')}}">Meine Buchungen</a>
                                        </li>
                                        <li>
                                            <a href="{{url('user/profile')}}">Account</a>
                                        </li>
                                    </ul>
                                </div>
                            @elseif($user_type == 'admin')
                                <a class="text-white mr-4" href="{{url('admin/index')}}">Profil</a>
                            @elseif($user_type == 'driver')
                                <a class="text-white mr-4" href="{{url('driver/profile')}}">Profil</a>
                            @endif
                            {{Auth()->user()->first_name}} /<form id="logout-form" style="display: inline" action="{{ route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="p-0" style="height: 2rem ; font-size: 14px; font-family: serif">Log out</button></form>
                        @else
                            <div class="login">

                                <a href="{{url('/login')}}">Login/</a>
                                <a href="{{url('/register')}}">Registrieren</a>

                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-header" style="height: 5.5rem;">
            <div class="container-fluid">
                <div id="logo" class="logo-pro pt-0" style="width: 20%; text-align: center;">
                    <a href="{{url('/')}}" title="Moray Limousines" >
                        <svg id="svgcomp-jgwzdv6cimg" version="1.1" role="img" aria-label="" width="110" height="85" viewBox="0 0 112 88"><defs><style>#mask-comp-jgwzdv6cimg-svg * {fill: #fff; stroke: #fff; stroke-width: 0;}</style>
                                <mask id="mask-comp-jgwzdv6cimg">
                                    <use id="mask-comp-jgwzdv6cimg-svg-use" xlink:href="#mask-comp-jgwzdv6cimg-svg" width="100%" height="100%" x="0" y="0"></use>
                                </mask>
                                <svg id="mask-comp-jgwzdv6cimg-svg" preserveAspectRatio="none" data-bbox="20 20 160 160" viewBox="20 20 160 160" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="shape" role="img">
                                    <g>
                                        <path d="M180 20v160H20V20h160z"></path>
                                    </g>
                                </svg>

                            </defs><image width="112" height="85" x="0" y="0" transform="" preserveAspectRatio="xMidYMid slice" id="comp-jgwzdv6cimgimage" data-type="image" xlink:href="https://static.wixstatic.com/media/1a8026_45000581fcae4bc39fc0c65536134632~mv2.png/v1/crop/x_121,y_0,w_542,h_425/fill/w_112,h_88,al_c,q_80,usm_0.66_1.00_0.01/1a8026_45000581fcae4bc39fc0c65536134632~mv2.webp" mask="url(#mask-comp-jgwzdv6cimg)" data-svg-mask="mask-comp-jgwzdv6cimg-svg"></image></svg>
                    </a>
                </div>
                <div class="navigation w-75 pull-right">
                    <div class="mobile-menu pull-right p-3" style="cursor: pointer;">
                        <span></span>
                    </div>
                    <div id="main-menu" class="main-menu">
                        <div class="top-text">
									<span>
										<a href="index.html" title="">
                                            <img src="{{asset('images/logo.png')}}" alt=""></a>
                                    </span>
                            <i class="pe-7s-close"></i>
                        </div>
                        <ul class="menu text-center w-50 pull-right">
                            <li class="dropdown">
                                <a href="{{url('/')}}" style="font-size: 1.3rem;">
                                  Fahrt Buchen
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{url('/user/reservation')}}" style="font-size: 1.3rem;">
                                  Meine Fahrten
                                </a>
                            </li>
{{--                            <li class="dropdown">--}}
{{--                                <a href="{{url('/user/reservation')}}" style="font-size: 1.3rem;">--}}
{{--                                    <button type="button" class="btn btn-save">--}}
{{--                                        Notifications <span class="badge" style="background-color: black; font-family: Nunito, sans-serif;"> 4 </span>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert-wrong-city alert-danger alert-dismissible fade show position-absolute p-1 text-center" style="color: white; border: darkgoldenrod;  background: #f70000e3;margin-top: 6.1rem; display: none; " role="alert">
                    <strong class="alert-box-text"></strong><span id="alert_box_text" style="font-size: 17px;font-family: sans-serif;">Holy guacamole!</span>
                </div>
            </div>
        </div>

    </header>

    @yield('content-area')

    <footer id="footer" class="footer-04">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 text-center ft1">
                    <div class="widget-footer widget-about">
                        <div class="logo-ft m-0">
                            <a href="{{url('/')}}" title="">
                                <img src="{{asset('images/moray-logo.png')}}"  alt="logo" class="img-fluid" style="margin-top: -8px; max-height: 7rem;">
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
                                    <i class="fa fa-instagram" style="font-size: 2rem;"  aria-hidden="true"></i>
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
                            @foreach(\App\Models\CmsService::all()->take(4) as $service)
                                <li>
                                    <a href="{{url('/service/details/'.$service->id)}}" title="">{{$service->service_title}}</a>
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
                                <a href="{{url('/about-us')}}" title="About Us">Über uns</a>
                            </li>
                            <li>
                                <a href="{{url('/Faq')}}" title="">FAQs</a>
                            </li>
                            <li>
                                <a href="{{url('/contact-us')}}" title="">Kontakt</a>
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
                                <a href="{{url('/become-driver')}}" title="">Für Fahrer</a>
                            </li>
                            <li>
                                <a href="{{url('/become-partner')}}" title="">Für Partnerunternehmen</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6 text-center ft1">
                    <div class="widget-footer newletter">
                        <h3 class="title-ft">
                            Kontakt
                        </h3>
                        <p>{!! \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) : 'Moray Limousines (A brand of Moray Group UG) Friedrich-Ebert-Anlage 36 60325 Frankfurt am Main' !!}</p>

                        {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08'}}

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
                        @foreach(\App\Models\Location::all()->where('is_top_city',true) as $city)
                            <li>
                                <span style="cursor:inherit;">{{$city->location_city}}</span>
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
                    <p>Copyright Moray Group : © {{date('Y')}}.  All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Copyright -->
    <div class="scroll-top">
    <div class="scroll-top">
    </div>
</div>


<!-- Javascript -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('js/gmap3.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('js/template.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132330959-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-132330959-1');
    </script>
@yield('js')
<script>
    $(".profileText").click(function(){
        if($(".profile-drop-down").css("display")=="none"){
            $(".profile-drop-down").css("display","block")
        } else{
            $(".profile-drop-down").css("display","none")
        }
    })
</script>
</body>
</html>
