@extends('layouts.main-home-layout')
@section('title')
About Us
@endsection
@section('content-area')
    <section class="top-title">
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
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="#">Home </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                / About--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Title -->
    <!-- Start About Area -->
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
    <!-- End About Area -->
    <!-- Start Testimonial Area -->

    <!-- End Testimonial Area -->
    <!-- Start Section Iconbox -->
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
                    @if(session('success'))
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
    </section>

@endsection




