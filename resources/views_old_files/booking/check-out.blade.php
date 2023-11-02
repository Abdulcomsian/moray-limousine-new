@extends('layouts.main-home-layout')
@section('title')
    Payment Details
@endsection

@section('content-area')
    <style>
        .header-04 .bottom-header {
            background: rgb(30, 30, 30);}
        .summary-bar-area.open {
            top: 125px !important;
        }
    </style>
    <section class="summary-bar-area">
        <div class="container-fluid mr-0 ml-5">
            <div class="row">
                <div class="col-md-12 p-0">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Pick Up Address
                            </div>
                            <p>{{$form_data['pick_address']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Drop Off Address
                            </div>
                            <p>{{$form_data['drop_address']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Pick Up Date
                            </div>
                            <p>{{$form_data['pick_date']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Pick Up Time
                            </div>
                            <p>{{$form_data['pick_time']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Duration & Distance
                            </div>
                            <p style="font-family: -webkit-body;">About : {{number_format($form_data['estimated_time'] , 2)  }} hours & Distance :  {{number_format($form_data['estimated_distance'] , 1)}} km </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="booking-steps-area mht ">
        <div class="container-fluid ml-4 mt-4">
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
                        <li>
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
                        <li class="active">
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


    <div class="top">
        <div class="thanks">
            <span><img src="{{asset('images/icon/thanks.png')}}" alt=""></span>
            THANK YOU
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
    </div>
@endsection
@section('js')

@endsection
