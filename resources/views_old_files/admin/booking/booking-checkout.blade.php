@extends('layouts.main-home-layout')

@section('title')

@endsection
@section('content-area')
    <section class="check-out-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="check-out">
                        <div class="top">
                            <div class="thanks">
                                <span><img src="images/icon/thanks.png" alt=""></span>
                                THANK YOU
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br />standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        </div>
                        <div class="middle">
                            <h2>RESERVARTION BASIC INFORMATION</h2>
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
                        <div class="bottom">
                            <h2>SELECTED CAR</h2>
                            <p>Economy Premium</p>
                            <div class="car-choose">
                                <img src="images/booking/car-01.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




