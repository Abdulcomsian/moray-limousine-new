@extends('layouts.main-home-layout')
@section('title')
    Check Out
@endsection
@section('content-area')
    <div class="main-panel" style="margin-top: 8.5rem;">
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
                        </div>
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br />standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>--}}
                    </div>
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
    </div>
@endsection


