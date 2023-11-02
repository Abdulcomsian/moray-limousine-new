@extends('layouts.main-home-layout')
@section('title')
    Check Out
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/orderDetail.css') }}">
@endsection
@section('content-area')

<div class="main_container">
    <div class="container class1font" id="cont2">
        <div class="row">
            <div class="col text-center">
                <div class="mdclass">
                    <i class="fa-solid fa-circle-check sucIConID" id="" style="color: green"></i>
                </div>
                <div class="row">
                    <div class="col text-center text1ID">
                        <p>System, Your order was submitted successfully!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center text2ID">
                        <p>Booking details has been sent to: booking@HATHWAYLIMOUSINES.com</p>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    
    <div class="container adjustCenID class1font">
    
        <div class="col-md-8">
            <div id="reservation-container">
                <div class=" mx-auto text-center">
                    <p class="text-left font-weight-bold headingID">Reservation Information</p>
                    <div class="reservation-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Pick up Address</p>
                            </div>
                            <div>
                                <p>{{$booking->pick_address}}</p>
                            </div>
                        </div>
                        <hr id="hrID">
                    </div>
                    <div class="reservation-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Drop off Address</p>
                            </div>
                            <div>
                                <p>{{$booking->drop_address}}</p></div>
                            </div>
                        </div>
                        <hr id="hrID">
                    </div>
                    <div class="reservation-info">
                        <div class="d-flex justify-content-between">
    
                            <div>
                                <p>Pick Up date</p>
                            </div>
                            <div>
                               <p>{{date('d - M - yy',strtotime($booking['pick_date'])) }}</p>
                            </div>
                        </div>
                        <hr id="hrID">
    
                    </div>
                    <div class="reservation-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Pick Up Time</p>
                            </div>
                            <div>
                               <p>{{$booking->pick_time}}</p>
                            </div>
                        </div>
                        <hr id="hrID">
                    </div>
                    <div class="reservation-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Distance</p>
                            </div>
                            <div>
                               <p>{{$booking['estimated_distance']}} KM</p>
                            </div>
                        </div>
                        <hr id="hrID">
                    </div>
                    <div class="reservation-info">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Time</p>
                            </div>
                            <div>
                                <p>{{$booking['estimated_time']}} Hours</p>
                            </div>
                        </div>
                        <hr id="hrID">
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="container adjustCenID class1font">
        <div class="col-md-8">
            <div class="car-container">
                <p class="text-left font-weight-bold">Selected Car</p>
                <img src="{{asset('files/vehicleCategory/category_img')}}/{{$booking->vehicleType->picture}}" alt="Car" class="car-picture">
                <div class="car-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Class</p>
                        </div>
                        <div>
                            <p>{{$booking->vehicleType->name}}
                            </p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="car-info">
                    {{-- <div class="d-flex justify-content-between">
                        <div>
                            <p>Car</p>
                        </div>
                        <div>
                            <p>{{$booking->vehicleType->title}}</p>
                        </div>
                    </div> --}}
                    <hr id="hrID">
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="container adjustCenID class1font">
    <div class="col-md-8">
        <div id="passenger-container">
            <div class=" mx-auto text-center">
                <p class="text-left font-weight-bold" id="headingID">Passenger Information</p>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>First Name</p>
                        </div>
                        <div>
                            <p>Ali</p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Last Name</p>
                        </div>
                        <div>
                            <p>Tufan</p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">

                        <div>
                            <p>Email</p>
                        </div>
                        <div>
                            <p>creativelayers088@gmail.com</p>
                        </div>
                    </div>
                    <hr id="hrID">

                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Phone</p>
                        </div>
                        <div>
                            <p>+456646545</p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Address line 1</p>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Address line 2</p>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>City</p>
                        </div>
                        <div>
                            <p>London</p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>State/Province/Region</p>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Zip code/Postal code </p>
                        </div>
                        <div>
                            <p>97875</p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Country</p>
                        </div>
                        <div>
                            <p>UK</p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
                <div class="reservation-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Speacial Requirements</p>
                        </div>
                        <div>
                            <p></p>
                        </div>
                    </div>
                    <hr id="hrID">
                </div>
            </div>
        </div>
    </div>

</div> --}}
    {{-- <div class="main-panel" style="margin-top: 8.5rem;">
        <div class="content-wrapper pt-0">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                   <section class="check-out-area mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="check-out">
                    <div class="top">
                        <div class="thanks">
                            <span><img src="{{asset('images/icon/thanks.png')}}" alt=""></span>
                            Danke
                        </div> --}}
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br />standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>--}}
                    {{-- </div>
                    @if(isset($booking))
                    <div class="middle pt-4 pb-3">
                        <h2>Reservierungsinformationen</h2>
                        <ul class="summary-bar">
                            <li>
                                <div class="info">
                                    Von
                                </div>
                                <p>{{$booking->pick_address}}</p>
                            </li>
                            <li>
                                <div class="info">
                                    Nach
                                </div>
                                <p>{{$booking->drop_address}} </p>
                            </li>
                            <li>
                                <div class="info">
                                    Datum
                                </div>
                                <p>{{date('d - M - yy',strtotime($booking['pick_date'])) }}</p>
                            </li>
                            <li>
                                <div class="info">
                                    Uhrzeit
                                </div>
                                <p>{{$booking->pick_time}}</p>
                            </li>
                            <li>
                                <div class="info">
                                    Dauer & Strecke
                                </div>
                                <p><strong> ca. {{$booking['estimated_time']}} Stunden – Strecke: {{$booking['estimated_distance']}} km</strong>   </p>
                                <div class="info">
                                   Zahlungsstatus
                                </div>
                                <p>Total <i class="fa fa-eur"></i> {{$booking->net_amount}}  – Status :<strong class="text-capitalize">{{$booking->payment_status}}</strong>   </p>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom">
                        <h2>Ihre Buchung war erfolgreich ! </h2>
                        <div class="car-choose">
                            <h1 class="m-5">Ausgewählte Fahrzeugklasse  :   {{$booking->vehicleType->name}}</h1>

                            <img src="{{asset('files/vehicleCategory/category_img')}}/{{$booking->vehicleType->picture}}" alt="">
                        </div>
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
                </div>
            </div>
        </div>
    </div> --}}
@endsection


