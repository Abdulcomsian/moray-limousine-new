@extends('layouts.main-home-layout')
@section('title')
Fahrzeugflotte
@endsection
@section('content-area')

{{-- {{dd(count($categories))}}--}}
    <section class="top-title">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>Fahrzeugflotte</h1>
                            <p class="sub-title">Eine Auswahl unserer Fahrzeugflotte </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
{{--                    <div class="col-md-12">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="{{url('/')}}">Home </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                / Fleet--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Title -->
    <!-- Start Our Fleet -->
    <section class="our-fleet-area pdbts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="template-title center">
                        <h1>Flotte</h1>
{{--                        <p>We also take custom orders and will help you acquire a specific Vehicle.</p>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($categories) > 0)
                @foreach($categories as $category)
                <div class="col-sm-6 col-md-4">
                    <div class="select-car ofl">
                        <div class="bottom">
                            <div class="price">
{{--                                <span>&euro;{{$category->price_per_hr}}</span> / hour--}}
                            </div>
                        </div>
                        <div class="image-car not-pd">
                            <img src="{{asset('files/vehicleCategory/category_img')}}/{{$category->picture}}" alt="">
                        </div>
                        <div class="box-text no-pd">
                            <div class="top">
                                <h3>{{$category->name}}</h3>
                                <div class="name-car">

                                </div>
                            </div>
                            <div class="content">
                                <ul>
                                    <li><img src="{{asset('images/people.png')}}" alt=""> Max . {{$category->max_seats}}</li>
                                    <li><img src="{{asset('images/vali.png')}}" alt=""> Max . {{$category->max_bags}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>

    </section>
    <!-- End Our Fleet -->
    <!-- Start Info Box -->
    <section class="info-box parallax parallax_one">
        <div class="container">
            <div class="wrapper-content">
                <h3 class="title text-capitalize">
                     Moderne und Hochwertige Fahrzeuge
                </h3>
                <p class="content">Unsere Flotte umfasst die aktuellsten Fahrzeugmodelle und gehobene Ausstattung.</p>
                <p class="contact">Jetzt Buchen {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER)}}</p>
                <a href="{{url('/')}}" class="booking">Jetzt Buchen<img src="{{asset('images/icon/arrow-white.png')}}" alt=""></a>
            </div>
        </div>
    </section>
    <!-- End Info Box -->
    <!-- Start Template Title -->
<section class="template-title has-over text-up">
    <div class="container">
        <h3 class="title">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE)}}</h3>
        <p class="subtitle">{{$home_content['your_advantage_description']}}</p>
    </div>
</section>
    <!-- End Template Title -->
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
                                <a href="">{{$home_content['your_advantage_col1_title'] ? $home_content['your_advantage_col1_title']: 'Your Advantages'}}</a>
                            </h3>
                            <p>{{$home_content['your_advantage_col1_description']}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/002.png')}}" style="max-width: 20% !important;" alt="">
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
                                <a href="#" title="">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE)}}</a>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION)}}</p>
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
                            <p>When picking up from the airport we wait 60 minutes for you. For all other pickups the free waiting time is 15 minutes.
                                .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Iconbox -->

@endsection




