@extends('layouts.main-home-layout')
@section('title')
    Fahrzeugklasse
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="{{url('css/select-class.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/Vehicle.css') }}">
    <style>
        .active {
            color: #bf9c60;
        }
    </style>
@endsection
@section('content-area')
    <div class="main_container">
        <div class="container" id="cont2">
            <div class="row">
                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-5">
                            <div class="mdclass">
                                <i class="fa-solid fa-car-side" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Vehicle</p>
                            </div>
                        </div>

                        <div class="mdclass">
                            <p class="AK1"> 01</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-5">
                            <div class="mdclass">
                                <i class="fa-solid fa-sliders" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Extras</p>
                            </div>
                        </div>
                        <div class="mdclass">
                            <p class="AK1"> 02</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

                {{-- <div class="col-sm-3 ">
                    <div class="d-flex justify-content-between">

                        <div class="d-flex gap-5">
                            <div class="mdclass">
                                <i class="fa-solid fa-people-group" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Details</p>
                            </div>
                        </div>
                        <div class="mdclass">
                            <p class="AK1"> 03</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div> --}}

                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">

                        <div class="d-flex gap-5">
                            <div class="mdclass">
                                <i class="fa-regular fa-credit-card" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Payment</p>
                            </div>
                        </div>

                        <div class="mdclass">
                            <p class="AK1"> 03</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">

                        <div class="d-flex gap-5">
                            <div class="mdclass">
                                <i class="fa fa-check" id="ikons" aria-hidden="true"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Checkout</p>
                            </div>
                        </div>

                        <div class="mdclass">
                            <p class="AK1"> 04</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

            </div>
        </div>
        <!-- PASSENGER DETAIL -->
        <div class="container" id="cont3">
            <div class="row">

                <div class="col-md-8">
                    <div>
                        <p class=BK> Select Your Car</p>
                    </div>



                    @if (count($classes) > 0)
                        @foreach ($classes as $class)
                            <div class="card" id="curd">
                                <div class="row">
                                    <div class="col-md-7">

                                        <img src="{{ asset('files/vehicleCategory/category_img') }}/{{ $class->picture }}"
                                            class="card-img-top BK1" alt="...">
                                        <div class="row">
                                            <div class="col-lg-6 d-flex ">
                                                <i class="fa-solid fa-award BK2"> </i><span class="BK3 mx-2">Meet & Greet
                                                    include</span>
                                            </div>
                                            <div class="col-lg-6  d-flex ">
                                                <i class="fa-solid fa-xmark BK2"> </i><span class="BK3 mx-2">Free
                                                    Cancellation</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 d-flex ">
                                                <a><i class="fa-regular fa-clock BK2"> </i><span class="BK3 mx-2">Free
                                                        Waiting
                                                        time</span></a>
                                            </div>
                                            <div class="col-lg-6  d-flex ">
                                                <a><i class="fa-solid fa-user-shield BK2 "> </i><span
                                                        class="BK3 mx-2">Safety &
                                                        secure </span></a>
                                            </div>
                                        </div>
                                        {{-- <a href="#" class="anchr">See more information</a> --}}


                                    </div>
                                    <div class="col-md-5">
                                        <p class="BK6">{{ $class->name }}</p>
                                        <p class="BK7">
                                            {{ strip_tags(\Illuminate\Support\Str::limit($class->description, 70)) }}</p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a><i class="fa-solid fa-people-group BK2"> </i><span
                                                        class="BK9">Passengers
                                                        {{ $class->max_seats }}</span></a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a><i class="fa-solid fa-briefcase BK2"> </i><span class="BK9">Lagguage
                                                        {{ $class->max_bags }}</span></a>
                                                <!-- <i class="fa-solid fa-briefcase">  </i>Lagguage 2 -->
                                            </div>
                                        </div>
                                        <p class="BK11">{{ $class->class_price }} <strong>EUR</strong></p>
                                        <p class="BK7">All prices include VAT, fees & tip.</p>
                                        <div class="btn-select">
                                            <form action="{{ asset(route('booking.details')) }}" method="get">
                                                @csrf
                                                <input type="hidden" name="formData" value="{{ json_encode($form_data) }}">
                                                <input type="hidden" name="distance"
                                                    value="{{ isset($distance) ? number_format($distance, 1) . '  Km' : '' }}">
                                                <input type="hidden" name="selected_id" value="{{ $class->id }}">
                                                <input type="hidden" name="travel_price"
                                                    value="{{ $class->class_price }}" class="selected-travel-price">
                                                <input type="hidden" name="tax_amount" value="{{ $class->tax_amount }}"
                                                    class="selected-travel-price">
                                                <button type="submit" class="btn btn-dark btn331"
                                                    id="{{ $class->id }}"><span id="BK13">Select</span><i
                                                        class="fa-solid fa-arrow-trend-up" id="BK14"></i></button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- pagination  -This Pagination will occur when Items are  more than 4  --}}
                        {{ $classes->links() }}
                    @endif

                    {{-- old Pagination - Static - Not working --}}
                    {{-- <div class="pagination class1font">
                        <button class="prev"><i class="fa-solid fa-arrow-left"></i></i></button>
                        <button class="page active">1</button>
                        <button class="page">2</button>
                        <button class="page">3</button>
                        <button class="page">...</button>
                        <button class="page">10</button>
                        <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
                    </div> --}}

                </div>


                <div class="col-md-4">
                    <!-- <div class="card" id="curd2">

                      <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                          <p  class="m-0 p-0 CK">Rides Summary</p>
                        </div>
                        <div class="">
                          <a href="#" class="CK2">Edit</a>
                        </div>
                      </div>

                      <a><i class="fa-solid fa-location-dot" id="CK6"> </i><span id="CK5">Manchester, UK</span></a><br>
                      <a><i class="fa-solid fa-location-dot" id="CK333"> </i><span id="CK44">London, UK</span></a><br>
                      <a><i class="fa-solid fa-calendar-days" id="CK3"> </i><span id="CK4">Thur, Oct 06, 2022</span></a><br>
                      <a><i class="fa-solid fa-clock" id="Ck3"> </i><span id="CK4">6 PM : 15</span></a><br>
                      <img src="images/map.jpg" class="" id="CK7">

                      <div class="d-flex justify-content-between align-items-center m-0 p-0">
                        <div class="">
                          <p id="CK8" class="">Total Distance</p>
                        </div>
                        <div class="">
                          <p id="CK9" class="">Total time</p>
                        </div>
                      </div>

                      <div class="d-flex justify-content-between align-items-center m-0 p-0">
                        <div class="">
                          <p id="CK10" class="">311/km/194 miles</p>
                        </div>
                        <div class="CK11">
                          <p id="CK11" class="">3h 43m</p>
                        </div>
                      </div>

                      <hr id="s1line">
                      <p id="LK">Vehicle</p>
                      <p id="LK1">Mercedes-Benz E220</p>
                      <hr id="s1line">
                      <p id="LK">Extra Options</p>
                      <p id="LK2">1 x Child Seat -$5.00</p>
                      <p id="LK2">1 x Bouquet of Flower - $75.00</p>
                      <p id="LK2">2 x Vodka Bottle -$78.00</p>
                      <p id="LK2">1 x Bodyguard Service -$750.00</p>

                    </div> -->
                    <div class="card" id="curd2">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <p id="" class="CK m-0 p-0">Rides Summary</p>
                            </div>
                            <div class="">
                                <a href="#" class="CK2">Edit</a>
                            </div>
                        </div>

                        <a><i class="fa-solid fa-location-dot" id="CK6"> </i><span class="CK5">Manchester,
                                UK</span></a><br>
                        <a><i class="fa-solid fa-location-dot" id="CK333"> </i><span class="CK44">London,
                                UK</span></a><br>
                        <a><i class="fa-solid fa-calendar-days" id="CK3"> </i><span class="CK4">Thur, Oct 06,
                                2022</span></a><br>
                        <a><i class="fa-solid fa-clock" id="Ck3"> </i><span class="CK4">6 PM : 15</span></a><br>
                        <img src="images/map.jpg" class="" id="CK7">

                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p id="" class="CK8">Total Distance</p>
                            </div>
                            <div class="">
                                <p class="CK9">Total time</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p class="CK10">311/km/194 miles</p>
                            </div>
                            <div class="CK11">
                                <p class="CK11">3h 43m</p>
                            </div>
                        </div>



                    </div>
                    <div class="card" id="curd2">
                        <div class="row">
                            <div class="col">
                                <a><i class="fa-solid fa-check CK12"> </i><span class="CK13 px-2">+100,000 passenger
                                        transported</span></a><br>
                                <a><i class="fa-solid fa-check CK12"> </i><span class="CK13 px-2">Instant
                                        confirmation</span></a><br>
                                <a><i class="fa-solid fa-check CK12"> </i><span class="CK13 px-2">All-inclusive
                                        pricing</span></a><br>
                                <a><i class="fa-solid fa-check CK12"> </i><span class="CK13 px-2">Secure Payment buy
                                        credit card</span></a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





    {{--     
    <section class="summary-bar-area open">
        <div class="container-fluid mr-0 ml-5">
            <div class="row">
                <div class="col-md-12 p-0">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Von
                            </div>
                            <p title="{{$form_data['pick_address']}}">{{ substr($form_data['pick_address'], 0, 40)}}...</p>
                        </li>
                        <li>
                            <div class="info">
                                @if ($form_data['booking_by'] === 'distance')
                                    Nach
                                @else
                                    Stunden
                                @endif
                            </div>
                            @if ($form_data['booking_by'] === 'time')
                                <p>This Booking Is For :{{$form_data['selected_hour']}} Hour's</p>
                            @else
                                <p title="{{$form_data['drop_address']}}">{{substr($form_data['drop_address'],0,40)}}...</p>
                            @endif

                        </li>
                        <li>
                            <div class="info">
                                Datum
                            </div>
                            <p>{{date('d - M - Y',strtotime($form_data['pick_date'])) }}</p>
                        </li>
                        <li>
                            <div class="info">
                                Zeit
                            </div>
                            <p>{{$form_data['pick_time']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Dauer
                            </div>

                            <p style="font-family: monospace;">voraussichtlich : {{isset($form_data['total_duration']) ? number_format($form_data['total_duration'] / 3600, 2) : $form_data['selected_hour'] }} – Strecke :  {{ isset($form_data['total_distance']) ? number_format($form_data['total_distance'] / 1000 , 1) : $form_data['selected_hour'] * 25}} km </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="booking-steps-area mht">
        <div class="container-fluid ml-4">
            <div class="row">
                <div class="col-md-12">
                    <ul class="booking-steps">
                        <li  class="active">
                            <span>1</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/car.png')}}" alt="">
                            </div>
                            <div class="text">
                                FAHRZEUGKLASSE
                            </div>
                        </li>
                        <li>
                            <span>2</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/login.png')}}" alt="">
                            </div>
                            <div class="text">
                                LOGIN
                            </div>
                        </li>
                        <li>
                            <span>3</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/options.png')}}" alt="">
                            </div>
                            <div class="text">
                                OPTIONEN
                            </div>
                        </li>

                        <li>
                            <span>4</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/card.png')}}" alt="">
                            </div>
                            <div class="text text-uppercase">
                                Bezahlung
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
                    <div class="button-summary-bar open">
                        <div class="icon">
                            <span class="ion-ios-arrow-thin-down"></span>
                        </div>
                        <p class="show">Ihre Auswahl </p>
                        <p class="hide">Hide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="main-content">
    <section class="select-vehicle-area pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if (count($classes) > 0)
                        @foreach ($classes as $class)
                    <div class="select-car" style="border: 1px solid #bf9c60;">
                        <div class="image-car one-half">
                            <img src="{{asset('files/vehicleCategory/category_img')}}/{{$class->picture}}" alt="">
                        </div>
                        <div class="box-text one-half pt-3">
                            <div class="top">
                                <h3>{{$class->name}}</h3>
                                <div class="name-car">
                                    @foreach ($class->subtypes as $subtype)
                                        {{$subtype->title}} ,
                                        @endforeach
                                        oder ähnlich
                                </div>
                            </div>
                            <div class="content">
                                <p>{!! $class->description !!} </p>
                                <ul>
                                    <li><img src="{{asset('images/people.png')}}" alt=""> Max . {{$class->max_seats}}</li>
                                    <li><img src="{{asset('images/vali.png')}}" alt=""> Max . {{$class->max_bags}}</li>
                                </ul>
                            </div>
                                <div class="bottom">
                                    <div class="price">
                                    <div class="w-100 mt-2">
                                        <span> {{$class->class_price}}</span> <strong>EUR</strong>
                                    </div>
                                        <small>( Alle Preise enthalten MwSt., Gebühren und Trinkgelder. )</small>
                                    </div>
                                    <div class="btn-select">
                                        <form action="{{asset(route('booking.details'))}}" method="get" >
                                            @csrf

                                        <input type="hidden" name="formData" value="{{json_encode($form_data)}}">
                                        <input type="hidden" name="distance" value="{{isset($distance) ?  number_format($distance , 1).'  Km' :  ''}}">
                                        <input type="hidden" name="selected_id" value="{{$class->id}}">
                                        <input type="hidden" name="travel_price" value="{{$class->class_price}}" class="selected-travel-price">
                                        <input type="hidden" name="tax_amount" value="{{$class->tax_amount}}" class="selected-travel-price">
                                        <button type="submit"  id="{{$class->id}}"  class="btn-theme btn-select ml-3 mb-2"><span class="mr-3">Auswählen</span> <i class="fa fa-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     @endforeach
                            @else
                        <h3> Keine Fahrzeugklasse gefunden </h3>
                        @endif
                </div>
            </div>
        </div>
    </section>
</div> --}}
@endsection
@section('js')
    <script type="text/javascript">
        $(window).scroll(function() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if ($(".summary-bar-area").hasClass('open')) {
                    $(".summary-bar-area").attr("style", "position:fixed;top:0px !important;z-index:999999");
                    $(".summary-bar-area").addClass("custom-top-setter")
                }
            } else {
                $(".summary-bar-area").attr("style", "");
                $(".summary-bar-area").removeClass("custom-top-setter")
            }
        });

        // Add or remove the 'active' class based on the current page
        $(document).ready(function() {
            // Replace 'current-page' with the actual name of your page or route
            var currentPage = window.location.href;

            var page = new URL(currentPage);
            var url = page.pathname;
            if (url == '/booking-by-hours' || url == '/booking') {
                url = 'Vehicle';
                $('.bax').removeClass('active');
                $('.bax:contains(' + url + ')').addClass('active');
            } 
        });
    </script>
@endsection
