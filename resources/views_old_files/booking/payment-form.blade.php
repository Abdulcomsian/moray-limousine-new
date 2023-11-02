@extends('layouts.main-home-layout')
@section('title')
    Extra Options
@endsection

@section('content-area')
    <div class="container-fluid mt-5">
        <section class="booking-steps-area mht ">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="booking-steps">
                            <li>
                                <span>1</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/car.png')}}" alt="">
                                </div>
                                <div class="text">
                                    CAR CLASS
                                </div>
                            </li>
                            <li class="active">
                                <span>2</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/options.png')}}" alt="">
                                </div>
                                <div class="text">
                                    OPTIONS
                                </div>
                            </li>
                            <li>
                                <span>3</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/login.png')}}" alt="">
                                </div>
                                <div class="text">
                                    LOGIN
                                </div>
                            </li>
                            <li>
                                <span>4</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/card.png')}}" alt="">
                                </div>
                                <div class="text">
                                    CREADIT CARD
                                </div>
                            </li>
                            <li>
                                <span>5</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/check-out.png')}}" alt="">
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
                            <p class="show">Select Location &amp; Date</p>
                            <p class="hide">Hide</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
