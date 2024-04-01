@extends('layouts.main-home-layout')
@section('title')

@endsection
@section('content-area')

    <!-- End Header -->
    <!-- Start Top Title -->
    <section class="top-title">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>SERVICE RATES</h1>
                            <p class="sub-title">Choose Your Dream Car From Among Six Different Categories</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                / Service Rates
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Title -->
    <!-- Start Services Ratea -->
    <section class="services-rates">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="price-car center">
                        <div class="price-header">
                        </div>
                        <ul class="level-price">
                            <li>
                                <div class="image-car">
                                    <img src="{{asset('images/services/car-01.jpg')}}" alt="">
                                </div>
                                <h4 class="name-car">
                                    BLACK LINCOLN MKT
                                </h4>
                            </li>
                            <li>
                                <div class="image-car">
                                    <img src="{{asset('images/services/car-02.jpg')}}" alt="">
                                </div>
                                <h4 class="name-car">
                                    BLACK LINCOLN SEDAN
                                </h4>
                            </li>
                            <li>
                                <div class="image-car">
                                    <img src="{{asset('images/services/car-03.jpg')}}" alt="">
                                </div>
                                <h4 class="name-car">
                                    MERCEDES GRAND SEDAN
                                </h4>
                            </li>
                            <li>
                                <div class="image-car">
                                    <img src="{{asset('images/services/car-04.jpg')}}" alt="">
                                </div>
                                <h4 class="name-car">
                                    BLACK CADILLAC SEDAN
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="price-car center border bg-1">
                        <div class="price-header">
                            <h3>PER HOUR RATE</h3>
                            <p>eg. Event, Party</p>
                        </div>
                        <ul class="level-price">
                            <li>
                                <div class="value">
                                    <span class="price">$99</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$99</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$99</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$99</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                        </ul>
                        <div class="price-bottom">
                            <a href="#">Book Now <img src="{{asset('images/icon/right-2.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="price-car center border bg-2">
                        <div class="price-header">
                            <h3>PER DAY RATE</h3>
                            <p>eg. Wedding, Long trip</p>
                        </div>
                        <ul class="level-price">
                            <li>
                                <div class="value">
                                    <span class="price">$299</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$345</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$678</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$1034</span> / hour
                                </div>
                                <p>*$3/hour Fuel Sercharges</p>
                            </li>
                        </ul>
                        <div class="price-bottom">
                            <a href="#">Book Now <img src="{{asset('images/icon/right-3.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="price-car center border bg-3">
                        <div class="price-header">
                            <h3>AIRPORT TRANSFER</h3>
                            <p>*Flat Rate</p>
                        </div>
                        <ul class="level-price">
                            <li>
                                <div class="value">
                                    <span class="price">$250</span>
                                </div>
                                <p>+ fuel and toll surcharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$400</span>
                                </div>
                                <p>+ fuel and toll surcharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$700</span>
                                </div>
                                <p>+ fuel and toll surcharges</p>
                            </li>
                            <li>
                                <div class="value">
                                    <span class="price">$900</span>
                                </div>
                                <p>+ fuel and toll surcharges</p>
                            </li>
                        </ul>
                        <div class="price-bottom">
                            <a href="#">Book Now <img src="{{asset('images/icon/right-3.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Ratea -->
    <!-- Start Section Iconbox -->
    <section class="section-iconbox">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="template-title center">
                        <h1>Why Choose Us</h1>
                        <span>Why Choose Us</span>
                        <p class="subtitle">Explore our first class limousine & car rental services</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/01.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">Easy Online Booking</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectadipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/02.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">Professional Drivers</a>
                            </h3>
                            <p>A new shuttle train service between Singapore and Johor Bahru kicked off on Wednesday. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/03.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">Variety of Car Brands</a>
                            </h3>
                            <p>The service, called Shuttle Tebrau, is  operated by Malaysia’s JB Sentral in just five minutes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/iconbox/04.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">Online Payment</a>
                            </h3>
                            <p>York Airport Service is a private bus company that provides transportation area airports and Manhattan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Iconbox -->
    <!-- Start Footer -->

@endsection




