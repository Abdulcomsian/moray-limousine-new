@extends('layouts.main-home-layout')
@section('title')
    About Us
@endsection
@section('content-area')
    {{-- am adding this here about us css here because in the head file its conflicting with others  --}}
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}" />

    <div class="black-box">
        <div class="container ">
            <p id="txt1ID" class="mb-0">{{$about_us_content->section_1_heading}}</p>
            <p>Home-About</p>
        </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="imgClass">

            </div>
        </div>
    </div>

    <div class="container class1font">
        <div class="row mt-4">
            <div class="text-center">
                <h1>{{$about_us_content->section_1_heading}}</h1>
                <p class="w-50 mx-auto">{{$about_us_content->section_1_description}}</p>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-6">
                <ul class="custom-list">
                    <li id="listID1">Lorem ipsum dolor sit amet.</li>
                    <li id="listID1">Consectetur adipiscing elit.</li>
                    <li id="listID1">Nulla vehicula odio sed justo.</li>
                    <li id="listID1">Integer in mauris nec tellus consectetur.</li>
                    <li id="listID1">Etiam consequat lacus eu odio dictum.</li>
                </ul>
            </div>
        </div> --}}
    </div>

    {{-- <div class="container-fluid adjustCenID class1font">

        <div class="col-md-12">
            <div id="number_con">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <h3>Showcase some <br>impressive numbers</h3>
                    </div>
                    <div class="col-md-2 text-center">
                        <h3>285<h3>
                                <p class="small">vehicles</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <h3>97<h3>
                                <p class="small">Awards</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h3>13K<h3>
                                <p class="small">Happy Customers</p>
                    </div>
                </div>

            </div>
        </div>

    </div> --}}

    <div class="container class1font" id="cont7">
        <div class="row">
            <div class="col">
                <div>
                    <p class="BK">{{$about_us_content->section_2_heading}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 trip-content">
                <i class="fa-solid fa-user-shield center  trip-way--icon" style="color:black;"></i>
                <p class="BK4">{{$about_us_content->section_2_first_step_heading}}</p>
                <p class="BK7">{{$about_us_content->section_2_first_step_description}}</p>
            </div>
            <div class="col-md-3 trip-content">
                <a href="#"><i class="fa-solid fa-hand-holding-dollar center trip-way--icon" style="color:black;"></i></a>
                <p class="BK4">{{$about_us_content->section_2_second_step_heading}}</p>
                <p class="BK7">{{$about_us_content->section_2_second_step_description}}</p>

            </div>
            <div class="col-md-3 trip-content">
                <a href="#"><i class="fa-solid fa-car-rear center  trip-way--icon" style="color:black;"></i></a>
                <p class="BK4">{{$about_us_content->section_2_third_step_heading}}</p>
                <p class="BK7">{{$about_us_content->section_2_third_step_description}}</p>
            </div>

        </div>
    </div>

    <div class="container-fluid class1font" id="cont10">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <ul class="custom-list2">
                        <h1 style="color: White; margin-bottom: 28px">{{$about_us_content->section_3_heading}}</h1>
                        <li class="liID21">
                            <span>{{$about_us_content->section_3_first_step_heading}}</span>
                            <p class="txtpara1">{{$about_us_content->section_3_first_step_description}}</p>
                        </li>
                        
                        <li class="liID22">
                            <span>{{$about_us_content->section_3_second_step_heading}}</span>
                            <p class="txtpara">{{$about_us_content->section_3_second_step_description}}</p>
                        </li>
                        
                        <li class="liID21">
                            <span>{{$about_us_content->section_3_third_step_heading}}</span>
                            <p class="txtpara1">{{$about_us_content->section_3_third_step_description}}</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 ">
                    <div style="height: 405px">
                        <img src="{{asset('images/about/' . $about_us_content->section_3_image)}}" class="EK4" alt="Avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid class1font" id="cont11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <div class="Devtxt">
                        <div class="d-flex gap-3 header-devText">
                            <i class="fa-regular fa-user EK" style="color:white;font-size:77px"></i>
                            <div class="devText-content">
                                <p class="EK1">Hamza</p>
                                <p class="EK2">Web-Developer</p>
                            </div>
                        </div>
                        <p class="EK3">I really recommend this theme, because it's coded very well and it's really easy
                            to build
                            your own websites!</p>
                    </div>
                </div>
                <div class="col-md-6 adjustCenID">
                    <div>
                        <img src="images/C8.jpg" class="EK41" alt="Avatar"> 
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container displaycon222 class1font mt-5" id="cont2222">
        <div class="row ">
            <div class="col-md-6 d-flex flex-column gap-4">
                <p class="IK11" style="color: black">Hear what our amazing<br> customers say</p>
                <p class="IK111" style="color: black; font-size:14px">Ensuring global customer satisfaction, we consistently deliver high-quality services with prompt efficiency. Our commitment extends beyond borders, providing excellence to customers around the world.</p>

                {{-- <div calss="row " class="btn16ID">
                    <button type="button" class="btn" style="color: white;width: 100%;">Get Started <i
                            class="fas fa-arrow-trend-up" id="arrw" style="color:white"></i></button>
                </div> --}}
            </div>


            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card1">
                                <div class="d-flex gap-3">
                                    <img class="profile-photo" src="images/review.png" alt="Profile Photo">
                                    <div>
                                        <h6>George</h6>
                                        <p class="description">Berlin</p>
                                    </div>
                                </div>
                                <p class="ptextClass">"Exceptional service from start to finish! We recently used Hathaway Limousines in Germany, and the experience was nothing short of luxurious. The chauffeur was punctual, the limousine was immaculate, and the entire journey was a seamless blend of comfort and sophistication. Highly recommended for anyone seeking a premium transport experience!"</p>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card1">
                                <div class="d-flex gap-3">
                                    <img class="profile-photo" src="images/r2.jpg" alt="Profile Photo">
                                    <div>
                                        <h6>Jacob</h6>
                                        <p class="description">Frankfurt</p>
                                    </div>
                                </div>
                                <p class="ptextClass">"Our special event was elevated to new heights thanks to Hathaway Limousines. The sleek and stylish limousine, coupled with a professional and courteous chauffeur, made our journey through Germany not just a transportation service but a memorable part of the celebration. Exemplary service that truly stands out!"</p>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card1">
                                <div class="d-flex gap-3">
                                    <img class="profile-photo" src="images/review.png" alt="Profile Photo">
                                    <div>
                                        <h6>Frederick</h6>
                                        <p class="description">Hamburg</p>
                                    </div>
                                </div>
                                <p class="ptextClass">"A five-star experience! Hathaway Limousines in Germany exceeded our expectations in every way. The attention to detail, the luxurious fleet, and the friendly yet professional staff made our travel experience truly exceptional. If you're looking for a reliable and high-class limousine service in Germany, this is the company to choose."
                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="navigation">
                        <a class="carousel-control-prev " href="#carouselExampleControls" role="button"
                            data-slide="prev"id="prev-slide">
                            <span class="fa fa-arrow-alt-circle-left" style="color:black ;font-size: 20px;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next displayarrow" href="#carouselExampleControls" role="button"
                            data-slide="next"id="next-slide">
                            <span class="fa fa-arrow-alt-circle-right" style="color:black ;font-size: 20px;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <div class="slide-number">
                            <span id="current-slide">1</span> / <span id="total-slides">3</span>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>

    {{-- <div class="container-fluid class1font">
        <div class="col-md-12">
            <div class="partner_con border-bottom">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <h4>The Partners who sell<br>our products</h4>
                    </div>
                    <div class="col-md-2 text-center">
                        <i class="fa-solid fa-car fa-3x"></i>
                    </div>
                    <div class="col-md-2 text-center">
                        <i class="fa-solid fa-motorcycle fa-3x"></i>
                    </div>
                    <div class="col-md-2 text-center">
                        <i class="fa-solid fa-business-time fa-3x"></i>
                    </div>
                    <div class="col-md-2 text-center">
                        <i class="fa-solid fa-user-secret fa-3x"></i>
                    </div>
                </div>

            </div>
        </div>

    </div> --}}

    {{-- UpdatedCode  --}}
    <div class="container class1font">
        <div class="col-md-12">
            <div class="partner_con pb-0">
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center mb-3">
                        <h4>The Partners who sell<br />our products</h4>
                    </div>
                    @foreach($happyClients as $client)
                    <div class="col-md-2 text-center mb-3">
                        <img src="{{asset('files/clients-images/'.$client->client_image)}}"/>
                    </div>
                    @endforeach
                </div>
                <hr id="linex" />
            </div>
        </div>
    </div>


    {{-- Start of FAQs  --}}
    <div class="container adjustCenID text-center class1font">
        <div class="col-md-6">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @if (count($faqs) > 0)
                <p class="ptitle ">Frequently Asked Questions</p>
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item">
                            <p class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-{{ $index }}" aria-expanded="false"
                                    aria-controls="faq-collapse-{{ $index }}">
                                    <p class="font-weight-bold">{{ $faq->faq_question }}</p>
                                </button>
                            </p>
                            <div id="faq-collapse-{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="faq-heading-{{ $index }}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{{ $faq->faq_answer }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{-- End of FAQ  --}}




    {{-- <div class="container-fluid class1font" id="cont14">
        <div class="container row align-items-center justify-content-center mx-auto">
            <div class="col-md-5">
                <div class="row adjustCenID text-center">
                    <p class="IK11">Download the app</p>
                </div>
                <div class="row text-center">
                    <p class="IK111">To download our app, simply visit your device's app store<br> (iOS App Store or
                        Google Play
                        Store).</p>
                </div>
                <div calss="row" class="btn14ID">
                    <button type="button" class="btn btn-light" id="btn14"><a href="#"><i
                                class="fa-brands fa-apple" id="apple1" style="color:black"></i></a>
                        <p id="lin11"> | </p>
                        <p class="IK21">Download on the</p>
                        </p>
                        <p class="IK31">Apple Store</p>
                    </button>
                    <button type="button" class="btn btn-light" id="btn14"><a href="#"><i
                                class="fa-brands fa-google-play" id="apple1" style="color:black"></i></a>
                        <p id="lin11"> | </p>
                        <p class="IK21">Get in on</p>
                        </p>
                        <p class="IK31">Play Store</p>
                    </button>
                </div>
            </div>
            <div class="col-md-6 adjustCenID">
                <div>
                    <a href="#"><img src="images/C7.jpg" class="imgClassCon14" alt="Avatar"></a>
                </div>
            </div>

        </div>
    </div> --}}




    {{-- <section class="top-title">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>ABOUT</h1>
                            <p class="sub-title">We are the most popular limousine service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="template-title center">
                        <h1 class="title has-over">{{$home_content['about_us_title']}}</h1>
                        <span>{{$home_content['about_us_title']}}</span>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="images">
                        <img src="{{asset('images/fleet/single_f.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-about">
                        <p>
                          {{$home_content['about_us_description']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-area ver-1" style="margin-top: 5%">
        <div class="container">
            <div class="template-title center has-over">
                <h1>Enjoy Coffee With Us</h1>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/address-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Adresse</h4>
                            <p>{!! \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) : 'Hathaway Limousines (A brand of Hathaway Group UG) Friedrich-Ebert-Anlage 36 60325 Frankfurt am Main' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/phone-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Telefon</h4>
                            <p> {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/email-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Email</h4>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) : 'info@hathaway-limousines.com'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="contact-form ver-1">
                        <div class="template-title center has-over">
                            <h1 class="text-capitalize">Kontakt</h1>
                        </div>
                        <form action="{{route('contact.us')}}" method="post" accept-charset="utf-8">
                            <div class="form form-name one-half">
                                <label for="first_name">Vorname</label>
                                <input type="text" id="first_name" required name="first_name" placeholder="Geben Sie ihren Vornamen ein" value="{{old('first_name')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="last_name">Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Geben Sie ihren Namen ein" value="{{old('last_name')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Geben Sie ihre E-Mail ein" value="{{old('email')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="cellno">Telefon</label>
                                <input type="text" id="cellno" required name="cellno" placeholder="Geben Sie ihre Telefonnummer ein" value="{{old('cellno')}}">
                            </div>
                            <div class="form form-comment">
                                <label for="comment">Nachricht</label>
                                <textarea name="comment" id="comment" required  placeholder="Geben Sie ihre Nachricht ein" > </textarea>
                            </div>
                            <div class="btn-submit-form">
                                <button type="submit">Senden <img src="{{asset('images/icon/right-3.png')}}" alt=""></button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section> --}}

@endsection
