@extends('layouts.user-layout')
@section('title')
    Buchungsdetails
@endsection
@section('css')
    <style>
        .btn-save:hover{
            background-color: #0b0e11 !important;
        }
        .btn-save{
            background-color: #bd8d2e;
        }
        .w-custom{
            width: 65%;
        }
        .list-group-item{
            border: 1px solid #bd8d2e;
        }
        .border-gray{
            border: 1px solid rgba(16, 16, 16, 0.64);
        }
    </style>
@endsection
@section('content-area')

    <div class="container mb-5" style="margin-top: 9rem;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin stretch-card">
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item pl-0 border-gray">
                        <h2 class="text-uppercase text-gray w-75">
                          Buchungsdetails
                         <a href="{{URL::previous()}}">
                             <span class="pull-right" style="color: #bd8d2e;">
                                <i class="fa fa-backward pr-1"></i>  Zurück</span>
                         </a>
                        </h2>
                    </li>
                </ul>

                <div class="card body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-10">
                                <ul class="list-group list-group-flush" style="color: #252121; font-family: sans-serif;">
                                    <li class="list-group-item">
                                        Von
                                    </li>
                                    <li class="list-group-item font-weight-bold"><i class="fa fa-map-marker pr-2"></i> {{$booking->pick_address}}</li>
                                    @if($booking->booking_type == 'distance')
                                        <li class="list-group-item">Nach</li>
                                        <li class="list-group-item font-weight-bold"><i class="fa fa-map-marker pr-2"></i> {{$booking->drop_address}}</li>
                                    @else
                                        <li class="list-group-item">Stunden</li>
                                        <li class="list-group-item font-weight-bold"><i class="fa fa-map-marker pr-2"></i>
                                            Diese Buchung ist für   {{$booking->estimated_time}} Stunden</li>
                                    @endif
                                    <li class="list-group-item">
                                        <span class="w-custom">Buchungsnummer</span>
                                        <strong>{{$booking->id}}</strong>
                                       </li>
                                    <li class="list-group-item"><span class="w-custom">Datum</span>
                                        <span><i class="fa fa-calendar pr-2"></i> {{date('d - M - Y ( D )',strtotime($booking['pick_date'])) }} </span>
                                       </li>
                                    <li class="list-group-item"><span class="w-custom">Zeit </span>   <span class="mr-3"><i class="fa fa-clock-o pr-2"></i> {{$booking->pick_time}}</span></li>
                                    <li class="list-group-item"><span class="w-custom">Betrag </span>
                                        <span class="mr-3"><i class="fa fa-eur pr-2"></i>
                                            {{$booking->travel_amount - $booking->tax_amount}} 
                                        </span>
                                            
                                    </li>
                                    <li class="list-group-item"><span class="w-custom">Extras </span>
                                        <span class="mr-3"><i class="fa fa-eur pr-2"></i> {{$booking->extra_options_amount}}
                                        </span></li>
                                    <li class="list-group-item"><span class="w-custom">Summe </span>
                                        <span class="mr-3"><i class="fa fa-eur pr-2"></i>
                                            {{$booking->extra_options_amount +($booking->travel_amount - $booking->tax_amount)}} 
                                        </span></li>
                                    <li class="list-group-item"><span class="w-custom">{{$taxrate}}% MwSt.</span>
                                        <span class="mr-3">
                                            <i class="fa fa-eur pr-2"></i>
                                            {{$booking->tax_amount}}
                                        </span>
                                    </li>
                                      <li class="list-group-item"><span class="w-custom">Total</span>
                                        <span class="mr-3">
                                            <i class="fa fa-eur pr-2"></i>
                                            {{$booking->net_amount}} 
                                        </span>
                                    </li>

                                    <li class="list-group-item"><span class="w-custom">Zahlungsstatus </span>
                                        <span class="mr-3"><i class="fa fa-paypal pr-2"></i><span class="text-uppercase">{{$booking->payment_status}}</span> </span></li>
                               <li>
                               </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 pl-0">
                            <div id="map" class="h-75 rounded" style="border: 2px solid #f0ad4e;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($extended_booking))

            <div class="col-md-8 pt-3">
                <div class="card-body">
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item pl-0 border-gray">
                        <h2 class="text-uppercase text-gray w-75">
                           Buchungserweiterung Details
                        </h2>
                    </li>
                </ul>
                <ul class="list-group list-group-flush">
                    @if($booking->booking_type == 'distance')
                        <li class="list-group-item" style="border-top: none">
                          <span class="w-custom">  aktuelles Ziel</span>
                        </li>
                        <li class="list-group-item">
                            <strong>    <i class="fa fa-location-arrow pr-2"></i> {{$booking->drop_address }}</strong>
                        </li>
                        <li class="list-group-item">
                            <span class="w-custom"> neues Ziel</span>
                        </li>
                        <li class="list-group-item">
                            <strong><span>
                                                    <i class="fa fa-map-marker pr-2"></i> {{$extended_booking->new_drop_location}}</span></strong>
                        </li>
                        <li class="list-group-item">
                            <span class="w-custom"> Buchung erweitern </span>
                            <span class="mr-3">
                                                    <i class="fa fa-location-arrow pr-2"></i> {{$extended_booking->extended_distance}} Km</span>
                        </li>
                    @else
                        <li class="list-group-item">
                            <span class="w-custom"> aktuelle Stundenanzahl </span>
                            <strong class="mr-4">    <i class="fa fa-clock-o pr-2"></i> {{$booking->estimated_time }} Hour's</strong>
                        </li>
                        <li class="list-group-item">
                            <span class="w-custom"> neue Stundenanzahl </span>
                            <strong class="mr-4">
                                                        <span>
                                                    <i class="fa fa-clock-o pr-2"></i>
                                                            {{$extended_booking->extended_duration - $booking->estimated_time }}
                                                     Stunden   </span>
                            </strong></li>
                        <li class="list-group-item">
                            <span class="w-custom">Stundenanzahl Total</span>
                            <span class="float-right mr-4">
                                                    <i class="fa fa-clock-o pr-2"></i> {{$extended_booking->extended_duration }} Hour</span>
                        </li>
                    @endif

                    <li class="list-group-item">
                        <span class="w-custom">zu zahlender Betrag</span>
                        <span class="float-right mr-4">
                                                <i class="fa fa-eur pr-2"></i>
                                                {{$booking->extended_bookings->first()->extended_amount}}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="w-custom"> alte Summe </span>
                            <span class="float-right mr-4">
                                                <i class="fa fa-eur pr-2"></i> {{$booking->net_amount}}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="w-custom"> neue Summe </span>
                            <span class="float-right mr-4">
                                                <i class="fa fa-eur pr-2"></i> {{$extended_booking->new_net_amount}}</span>
                    </li>
                    <li></li>
                </ul>
            </div>
            </div>
        @endif

    </div>









    <script>
        let extended = false;
        let  drop_latitude;
        let drop_longitude;
    </script>
    @if(isset($extended_booking))
        <script>
            drop_latitude = parseFloat({{$extended_booking->new_drop_lat}});
            drop_longitude = parseFloat({{$extended_booking->new_drop_long}});
            extended = true;
        </script>
    @endif
@endsection


@section('js')
    {{--    <script type="text/javascript" src="{{asset('js/front-end/printPreview.js')}}"></script>--}}
    <script>


        let pick_latitude = parseFloat({{$booking->lat_pck}});
        let pick_longitude = parseFloat({{$booking->long_pck}});
        if (extended === false){
            drop_latitude = parseFloat({{$booking->lat_drop}});
            drop_longitude = parseFloat({{$booking->long_drop}});
        }

        function initMap() {
            var pickLatLong = {lat: pick_latitude, lng: pick_longitude};
            var map = new google.maps.Map(
                document.getElementById('map'),
                {zoom: 12, center: pickLatLong});
            var dropLatLong = {lat: drop_latitude, lng: drop_longitude};
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            var pickMarker = new google.maps.Marker({position: pickLatLong, map: map});
            var DropMarker = new google.maps.Marker({position: dropLatLong, map: map});

            let originLatLong = new google.maps.LatLng(pick_latitude, pick_longitude);
            let destinationLatLong = new google.maps.LatLng(drop_latitude, drop_longitude);

            calculateAndDisplayRoute(directionsService , directionsRenderer , originLatLong , destinationLatLong)
            directionsRenderer.setMap(map);

        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer , pickLatLong ,dropLatLong ) {

            directionsService.route(
                {
                    origin: pickLatLong,
                    destination: dropLatLong,
                    travelMode: 'DRIVING'
                },
                function(response, status) {
                    if (status === 'OK') {
                        directionsRenderer.setDirections(response);
                    } else {
                        console.log('Directions request failed due to ' + status);
                    }
                });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHpSgm-hy0_G_NC6PynKEYgASntQIi1Y&libraries=places&callback=initMap" async defer></script>


@endsection
