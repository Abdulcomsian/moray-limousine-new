@extends('layouts.main-home-layout')
@extends('layouts.booking-layout')




@section('content-area-booking')

    {{--@include('layouts/booking-layout')--}}
    <!-- End Summary Bar Area -->
    <!-- Start Booking Steps Area -->

    <!-- End Booking Steps Area -->
    <!-- Start Select Vehicle Area -->
    <section class="select-vehicle-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="select-car">
                        <div class="image-car one-half">
                            <img src="{{asset('images/fleet/car-01.jpg')}}" alt="">
                        </div>
                        <div class="box-text one-half">
                            <div class="top">
                                <h3>Economy Premium</h3>
                                <div class="name-car">
                                    Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS, or similar
                                </div>
                            </div>
                            <div class="content">
                                <p>A favorite for business professionals and frequent travelers, Prodirve Economy Premiun vehicles are available in all of our cities worldwide.</p>
                                <ul>
                                    <li><img src="{{asset('images/fleet/people.png')}}" alt=""> Max . 3</li>
                                    <li><img src="{{asset('images/fleet/vali.png')}}" alt=""> Max . 2</li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <div class="price">
                                    <span>$49</span> / hour
                                </div>
                                <div class="btn-select">
                                    <a href="{{url('admin/booking-options')}}" title="">SELECT</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="select-car s1">
                        <div class="image-car one-half">
                            <img src="{{asset('images/fleet/car-02.jpg')}}" alt="">
                        </div>
                        <div class="box-text one-half">
                            <div class="top">
                                <h3>Business Class</h3>
                                <div class="name-car">
                                    Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS, or similar
                                </div>
                            </div>
                            <div class="content">
                                <p>A favorite for business professionals and frequent travelers, Prodirve Economy Premiun vehicles are available in all of our cities worldwide.</p>
                                <ul>
                                    <li><img src="{{asset('images/fleet/people.png')}}" alt=""> Max . 3</li>
                                    <li><img src="{{asset('images/fleet/vali.png')}}" alt=""> Max . 2</li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <div class="price">
                                    <span>$99</span> / hour
                                </div>
                                <div class="btn-select">
                                    <a href="#" title="">SELECT</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="select-car">
                        <div class="image-car one-half">
                            <img src="{{asset('images/fleet/car-03.png')}}" alt="">
                        </div>
                        <div class="box-text one-half">
                            <div class="top">
                                <h3>Business Van</h3>
                                <div class="name-car">
                                    Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS, or similar
                                </div>
                            </div>
                            <div class="content">
                                <p>A favorite for business professionals and frequent travelers, Prodirve Economy Premiun vehicles are available in all of our cities worldwide.</p>
                                <ul>
                                    <li><img src="{{asset('images/fleet/people.png')}}" alt=""> Max . 3</li>
                                    <li><img src="{{asset('images/fleet/vali.png')}}" alt=""> Max . 2</li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <div class="price">
                                    <span>$189</span> / hour
                                </div>
                                <div class="btn-select">
                                    <a href="#" title="">SELECT</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="select-car s1">
                        <div class="image-car one-half">
                            <img src="{{asset('images/fleet/car-04.jpg')}}" alt="">
                        </div>
                        <div class="box-text one-half">
                            <div class="top">
                                <h3>First Class</h3>
                                <div class="name-car">
                                    Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS, or similar
                                </div>
                            </div>
                            <div class="content">
                                <p>A favorite for business professionals and frequent travelers, Prodirve Economy Premiun vehicles are available in all of our cities worldwide.</p>
                                <ul>
                                    <li><img src="{{asset('images/fleet/people.png')}}" alt=""> Max . 3</li>
                                    <li><img src="{{asset('images/fleet/vali.png')}}" alt=""> Max . 2</li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <div class="price">
                                    <span>$259</span> / hour
                                </div>
                                <div class="btn-select">
                                    <a href="#" title="">SELECT</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Select Vehicle Area -->
    <!-- Start Footer -->

@endsection
@section('title')

@endsection
@section('content-area')
    @include('layouts.booking-layout')

@stop


