@extends('layouts.main-home-layout')

@section('title')

@endsection
@section('content-area')


    <section class="summary-bar-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Pick Up Address
                            </div>
                            <p>Airport Istanbul-Atatürk (IST) ...</p>
                        </li>
                        <li>
                            <div class="info">
                                Drop Off Address
                            </div>
                            <p>Airport Ankara-Esenboğa (ESB)... </p>
                        </li>
                        <li>
                            <div class="info">
                                Pick Up Date
                            </div>
                            <p>Sep 15, 2017</p>
                        </li>
                        <li>
                            <div class="info">
                                Pick Up Time
                            </div>
                            <p>9:45PM (21:45)</p>
                        </li>
                        <li>
                            <div class="info">
                                Duration
                            </div>
                            <p>About 5 hours – Distance: 476.2 km </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Summary Bar Area -->
    <!-- Start booking Steps Area -->
    <section class="booking-steps-area mht">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="booking-steps">
                        <li>
                            <span>1</span>
                            <div class="icon">
                                <img src="images/booking/car.png" alt="">
                            </div>
                            <div class="text">
                                CAR CLASS
                            </div>
                        </li>
                        <li>
                            <span>2</span>
                            <div class="icon">
                                <img src="images/booking/options.png" alt="">
                            </div>
                            <div class="text">
                                OPTIONS
                            </div>
                        </li>
                        <li>
                            <span>3</span>
                            <div class="icon">
                                <img src="images/booking/login.png" alt="">
                            </div>
                            <div class="text">
                                LOGIN
                            </div>
                        </li>
                        <li class="active">
                            <span>4</span>
                            <div class="icon">
                                <img src="images/booking/card.png" alt="">
                            </div>
                            <div class="text">
                                CREADIT CARD
                            </div>
                        </li>
                        <li>
                            <span>5</span>
                            <div class="icon">
                                <img src="images/booking/check-out.png" alt="">
                            </div>
                            <div class="text">
                                CHECK OUT
                            </div>
                        </li>
                    </ul>
                    <div class="button-summary-bar">
                        <div class="icon">
                            <span class="ion-ios-arrow-thin-down"></span>
                        </div>
                        <p class="show">Select Location & Date</p>
                        <p class="hide">Hide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End booking Steps Area -->
    <!-- Start Card Area -->
    <section class="card-area">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-card">
                        <form action="#" method="get" accept-charset="utf-8">
                            <div class="row">
                                <div class="one-half name">
                                    <label for="name">Cardholder name</label>
                                    <input type="text" name="name" id="name" placeholder="Ali TUF...">
                                </div>
                                <div class="one-half card-number">
                                    <label for="card-number">Card number </label>
                                    <input type="text" name="card-number" id="card-number" placeholder="043......">
                                </div>
                                <div class="one-half date">
                                    <label for="month">Expiration date</label>
                                    <div class="one-half">
                                        <input type="text" name="month" id="month" placeholder="MM">
                                    </div>
                                    <div class="one-half">
                                        <input type="text" name="year" placeholder="YY">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="one-half cvv">
                                    <label for="cvv">cvv</label>
                                    <input type="text" name="cvv" id="cvv" placeholder="567">
                                    <span>
											<img src="images/icon/card.png" alt="">
										</span>
                                </div>
                                <div class="clearfix"></div>
                                <p><span>Please note:</span> you will be able to review your ride on the next page before confirming your reservation. Your card will not be charged until after your ride.</p>
                                <div class="col-md-12">
                                    <div class="btn-submit">
                                        <a href="{{url('admin/booking-checkout')}}" class="btn btn-default">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
    <!-- End Card Area -->
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
                            <img src="images/iconbox/01.png" alt="">
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
                            <img src="images/iconbox/02.png" alt="">
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
                            <img src="images/iconbox/03.png" alt="">
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
                            <img src="images/iconbox/04.png" alt="">
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

@endsection




