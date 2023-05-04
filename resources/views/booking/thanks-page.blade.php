@extends('layouts.user-layout')
@section('title')
    CHECK OUT
@endsection
@section('content-area')
    <div class="container mt-5">
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
{{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br />standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>--}}
                                        </div>
                                        @if(isset($booking))
                                            <div class="middle pt-4 pb-3">
                                                <h2>Reservierungsinformationen</h2>
                                                <ul class="summary-bar">
                                                    <li>
                                                        <div class="info">
                                                            letzte Zieladresse
                                                        </div>
                                                        <p>{{$booking->previous_drop_location}}</p>
                                                    </li>
                                                    <li>
                                                        <div class="info">
                                                           neue Zieladresse
                                                        </div>
                                                        <p>{{$booking->new_drop_location}} </p>
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
                                                        <p>{{$booking->booking->pick_time}}</p>
                                                    </li>
                                                    <li>
                                                        <div class="info">
                                                            hinzugefügte Dauer
                                                        </div>
                                                        <p>ca. {{$booking->extended_duration}} Stunden – Strecke: {{$booking->extended_distance}} km </p>
                                                        <div class="info">
                                                            atueller Betrag
                                                        </div>
                                                        <p> <strong class="text-capitalize"><i class="fa fa-eur pr-2"></i>
                                                                {{$booking->previous_net_amount}}</strong>
                                                        </p>

                                                        <div class="info">
                                                            neuer Betrag
                                                        </div>
                                                        <p> <strong class="text-capitalize"><i class="fa fa-eur pr-2"></i>
                                                                {{$booking->extended_amount}}</strong>
                                                        </p>


                                                        <div class="info">
                                                            Zalungsstatus
                                                        </div>
                                                        <p>
                                                          <strong> Total {{$booking->new_net_amount}}  – Status :</strong>
                                                            <strong class="text-capitalize">{{$booking->payment_status}}</strong>   </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="bottom">
                                                <h2>Ihre Buchung wurde erfolgreich erweitert. </h2>
                                                <div class="car-choose">
                                                    <h1 class="m-5">Ausgewählte Fahrzeugklasse  :   {{$original_booking->vehicleType->name}}</h1>

                                                    <img src="{{asset('files/vehicleCategory/category_img')}}/{{$original_booking->vehicleType->picture}}" alt="">
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
