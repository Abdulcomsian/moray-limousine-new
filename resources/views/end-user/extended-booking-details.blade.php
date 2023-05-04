@extends('layouts.user-layout')
@section('title')
    Buchung erweitern
@endsection
@section('css')
    <style>

        .btn-save:hover{
            background-color: #0b0e11 !important;
        }
        .btn-save{
            background-color: #bd8d2e;
        }
        .map{
            border: 1px solid #bd8d2e;
            border-radius: 6px;
        }
    </style>
@endsection
@section('content-area')
    <div class="container mb-5" style="margin-top: 8rem;">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                        <ul class="list-group list-group-flush mb-5">
                            <li class="list-group-item pl-0">
                                <h2 class="text-uppercase text-gray w-75">
                                    Buchung erweitern
                                </h2>
                            </li>
                        </ul>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-10">
                                        <ul class="list-group list-group-flush" style="color: #1b1b1b">
                                            <li class="list-group-item font-weight-bold" >Von</li>
                                            <li class="list-group-item "><i class="fa fa-map-marker pr-2"></i> {{$booking->pick_address}}</li>
                                           @if($booking->booking_type == 'time')
                                                <li class="list-group-item font-weight-bold">aktuelle Stundenanzahl</li>
                                                <li class="list-group-item "><i class="fa fa-clock-o pr-2"></i> {{$booking->estimated_time}}</li>
                                                <li class="list-group-item font-weight-bold">neue Stundenanzahl (nur mehr Stunden möglich)</li>
                                                <li class="list-group-item"><i class="fa fa-clock-o pr-2"></i>
                                                    {{$extended_booking->extended_duration. " : Hours   &  Total Hours (". ($extended_booking->extended_duration + $booking->estimated_time)  ." ) Hours"}}</li>
                                             @else
                                                <li class="list-group-item font-weight-bold">aktuelle Zieladresse</li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-map-marker pr-2"></i> {{$booking->drop_address}}</li>
                                                <li class="list-group-item font-weight-bold">neue Zieladresse</li>
                                                <li class="list-group-item"><i class="fa fa-map-marker pr-2"></i> {{$extended_booking->new_drop_location}}</li>
                                               @endif
                                            <li class="list-group-item  font-weight-bold">
                                                <span class="w-50">Datum</span>
                                                <span class="w-50"><i class="fa fa-calendar pr-2"></i> {{$booking->pick_date}}</span></li>
                                            <li class="list-group-item font-weight-bold">
                                                <span class="w-50">Uhrzeit</span>
                                                <span class="w-50"><i class="fa fa-clock-o pr-2"></i> {{$booking->pick_time}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3 mb-5 rounded" id="map">
                                </div>

                                    <div class="col-md-12 pt-5">
                                        <div class="card-header">
                                            <h3 class="text-uppercase text-center" >
                                                Rechnungsdetails
                                            </h3>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush ml-5" style="color: #212121">
{{--                                        <li class="list-group-item">--}}
{{--                                          <span class="w-75"> Previous Travel Amount  </span>--}}
{{--                                            <span class="w-25">--}}
{{--                                                <i class="fa fa-eur pr-2"></i> {{$booking->travel_amount}}</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item">--}}
{{--                                            <span class="w-75">Extra Options Amount </span>--}}
{{--                                            <span class="w-25">--}}
{{--                                                <i class="fa fa-eur pr-2"></i> {{$booking->extra_options_amount ? $booking->extra_options_amount : 0 }}</span>--}}
{{--                                        </li>--}}
                                        <li class="list-group-item">
                                            <span class="w-75">aktuelle Summe </span>
                                            <span class="w-25">
                                                <i class="fa fa-eur pr-2"></i> {{$booking->net_amount}}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="w-75">bereits Bezahlt </span>
                                                <span class="w-25">
                                                <i class="fa fa-eur pr-2"></i>
                                                {{$booking->net_amount}}</span>
                                        </li>
                                        @if($booking->booking_type == 'distance')
                                        <li class="list-group-item">
                                            <span class="w-75">erweiterte Strecke  </span>
                                            <span class="w-25">
                                                <i class="fa fa-location-arrow pr-2"></i>
                                                {{$extended_booking->extended_distance}} Km</span>
                                        </li>
                                        @else
                                            <li class="list-group-item">
                                                <span class="w-75">erweiterte Stunden</span>
                                                <span class="w-25">
                                                <i class="fa fa-clock-o pr-2"></i>
                                                {{$extended_booking->extended_duration}} Stunden</span>
                                            </li>
                                            @endif
                                        <li class="list-group-item">
                                            <span class="w-75">neue Summe</span>
                                            <span class="w-25">
                                                <i class="fa fa-eur pr-2"></i>
                                                {{ $extended_booking->extended_amount - $extended_booking->tax_amount }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="w-75">19% MwSt.</span>
                                            <span class="w-25">
                                                <i class="fa fa-eur pr-2"></i> {{$extended_booking->tax_amount}}</span>
                                        </li> <li class="list-group-item">
                                            <span class="w-75 font-weight-bold">neue Betrg zu zahlen </span>
                                            <span class="w-25 font-weight-bold">
                                                <i class="fa fa-eur pr-2"></i>
                                                {{number_format($extended_booking->extended_amount, 2)}}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 offset-md-1 mt-5">
                                    @if($extended_booking->orderId == null or $extended_booking->payment_status = "pending")
                                        <div id="paypal-button-container" class="mt-4"></div>
                                        @else
                                        <h6 class="mt-5">Bereits bezahlt</h6>
                                        @endif
                                </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
    <script src="https://www.paypal.com/sdk/js?client-id=Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1&currency=EUR"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{(int)$extended_booking->extended_amount}}'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                console.log('data');
                console.log(data);
                return actions.order.capture().then(function(details) {
                    console.log('I am here..');
                    console.log(details);
                    // Call your server to save the transaction
                    return fetch('/user/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json',
                        },
                        body: JSON.stringify({
                            orderID: data.orderID,
                            userDetail: details,
                            bookingId: '{{$extended_booking->id}}',
                            _token: '{{csrf_token()}}'
                        })
                    }).then(function(){
                        location.href = "{{url('booking/thanks-page')}}/{{$extended_booking->id}}";
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>

    <script>
        let booking_type = '{{$booking->booking_type}}';
        let pick_latitude = parseFloat({{$booking->lat_pck}});
        let pick_longitude = parseFloat({{$booking->long_pck}});
        let drop_latitude = parseFloat({{$extended_booking->new_drop_lat}});
        let drop_longitude = parseFloat({{$extended_booking->new_drop_long}});
       console.log(booking_type);
        function initMap() {
            let pickLatLong = {lat: pick_latitude, lng: pick_longitude};
            let dropLatLong = {lat: drop_latitude, lng: drop_longitude};
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            let map = new google.maps.Map(
                document.getElementById('map'),
                {zoom: 12, center: pickLatLong});
            let pickMarker = new google.maps.Marker({position: pickLatLong, map: map});
            let DropMarker = new google.maps.Marker({position: dropLatLong, map: map});

            let originLatLong = new google.maps.LatLng(pick_latitude, pick_longitude);
            let destinationLatLong = new google.maps.LatLng(drop_latitude, drop_longitude);

            calculateAndDisplayRoute(directionsService , directionsRenderer , originLatLong , destinationLatLong)
            directionsRenderer.setMap(map);

            // var flightPath = new google.maps.Polyline({
            //     path: flightPlanCoordinates,
            //     geodesic: true,
            //     strokeColor: '#1732be',
            //     strokeOpacity: 2.0,
            //     strokeWeight: 5
            // });
            //
            // flightPath.setMap(map)
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHpSgm-hy0_G_NC6PynKEYgASntQIi1Y&libraries=places&callback=initMap" async defer>
    </script>
@endsection
