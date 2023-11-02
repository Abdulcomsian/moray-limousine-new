@extends('layouts.user-layout')
@section('title')
    Buchgung erweitern
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
    <div class="container" style="margin-top: 8rem;">
        <ul class="list-group list-group-flush mb-5">
            <li class="list-group-item pl-0">
                <h2 class="text-uppercase text-gray w-75">
                   Buchgung erweitern
                </h2>
            </li>
        </ul>
        <div class="content-wrapper">
            <form action="{{route('extend_booking')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($booking->booking_type === 'distance')
                <input type="hidden" name="new_drop_lat">
                <input type="hidden" name="new_drop_long">
                <input type="hidden" name="extended_distance">
                <input type="hidden" name="extended_duration">
                @endif
                <input type="hidden" name="booking_id" value="{{$booking->id}}">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pt-4 mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="pick-location" class="font-weight-bold">aktuelle Abholadresse</label>
                                                <input id="pick-location" type="text"  value="{{$booking->pick_address}}" readonly>
                                            </div>
                                        </div>

                                        @if($booking->booking_type == 'distance')
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="drop-location" class="font-weight-bold">aktuelle Zieladresse</label>
                                                <input id="drop-location" type="text" name="previous_drop_location" value="{{$booking->drop_address}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="new-drop-Location" class="font-weight-bold">neue Zieladresse</label>
                                                <input id="new-drop-Location" type="text" name="new_drop_location" placeholder="neue Zieladresse" required minlength="5">
                                            </div>
                                        </div>
                                            @else
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="selected_hour" class="font-weight-bold">aktuelle Stundenanzahl</label>
                                                    <input id="selected_hour" class="font-weight-bold" type="text" name="previous_drop_location" value="{{$booking->estimated_time ." Hours"}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="location-hour" class="font-weight-bold">neue Stundenanzahl (nur mehr Stunden möglich)  </label>
                                                    <select class="select" name="selected_hour" id="location-hour" required>
                                                        <option selected value=""> zusätzliche Stundenanzahl </option>
                                                        <option class="select-it" value="1"> 1 Stunde</option>
                                                        <option value="2">  2 Stunden </option>
                                                        <option value="3">3 Stunden</option>
                                                        <option value="4">4 Stunden</option>
                                                        <option value="5">5 Stunden</option>
                                                        <option value="6">6 Stunden</option>
                                                        <option value="7">7 Stunden</option>
                                                        <option value="8">8 Stunden</option>
                                                        <option value="9">9 Stunden</option>
                                                        <option value="10">10 Stunden</option>
                                                        <option value="11">11 Stunden</option>
                                                        <option value="12">12 Stunden</option>
                                                        <option value="13">13 Stunden</option>
                                                        <option value="14">14 Stunden</option>
                                                        <option value="15">15 Stunden</option>
                                                        <option value="16">16 Stunden</option>
                                                        <option value="17">17 Stunden</option>
                                                        <option value="18">18 Stunden</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-10">
                                            <div class="form-group mt-4">
                                                <button class="btn-save" id="pick-location" type="submit">Buchung erweitern
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-1 mb-5 rounded">
                                        <div class="map h-100" id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-12 mb-4"></div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        let pick_latitude = parseFloat({{$booking->lat_pck}});
        let pick_longitude = parseFloat({{$booking->long_pck}});
        let drop_latitude = parseFloat({{$booking->lat_drop}});
        let drop_longitude = parseFloat({{$booking->long_drop}});
        let booking_type = '{{$booking->booking_type}}';


        function initMap() {

            let input_field = document.getElementById('new-drop-Location');
            let autocomplete_location = new google.maps.places.Autocomplete(input_field, {types: ['establishment']});
            // autocomplete_location.setComponentRestrictions({'country': ['de']});
            autocomplete_location.setFields(['geometry']);

            google.maps.event.addListener(autocomplete_location, 'place_changed', function () {
                var pick_address = autocomplete_location.getPlace();
               let new_latitude_drop = pick_address.geometry.location.lat();
               let new_longitude_drop = pick_address.geometry.location.lng();
               $('input[name="new_drop_lat"]').val(new_latitude_drop);
               $('input[name="new_drop_long"]').val(new_longitude_drop);
               getDuration(drop_latitude,drop_longitude,new_latitude_drop,new_longitude_drop);

            });

           //Calculate Distance by Google distance matrix
            function getDuration(latitude_pick,longitude_pick,latitude_drop,longitude_drop) {
                var origin = new google.maps.LatLng(latitude_pick, longitude_pick);
                var destination = new google.maps.LatLng(latitude_drop, longitude_drop);
                //*********DISTANCE AND DURATION**********************//
                var service = new google.maps.DistanceMatrixService();
                service.getDistanceMatrix({
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    avoidHighways: false,
                    avoidTolls: false
                }, function (response, status) {
                    if (status === google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status !== "ZERO_RESULTS") {
                        var distance = response.rows[0].elements[0].distance.text;
                        var duration = response.rows[0].elements[0].duration.text;
                        // var dvDistance = document.getElementById("dvDistance");
                        console.log('here will be distance');
                        console.log(distance);
                        console.log('here will be duration');
                        console.log(duration);
                        let distanaceInMeters = response.rows[0].elements[0].distance.value;
                        let durationInSeconds = response.rows[0].elements[0].duration.value;
                        $('input[name="extended_distance"]').val(distanaceInMeters);
                        $('input[name="extended_duration"]').val(durationInSeconds);
                    } else {
                        console.log("Unable to find the distance via road.");
                    }
                });

            }





            var pickLatLong = {lat: pick_latitude, lng: pick_longitude};
            var dropLatLong = {lat: drop_latitude, lng: drop_longitude};
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            var map = new google.maps.Map(
                document.getElementById('map'),
                {zoom: 12, center: pickLatLong});
            if (booking_type === 'time'){
                let pickMarker = new google.maps.Marker({position: pickLatLong, map: map});
                // var DropMarker = new google.maps.Marker({position: dropLatLong, map: map});
            }


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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgV-mkhz5pqHJrtexHQXJdV12D8nGefoI&libraries=places&callback=initMap" async defer></script>


@endsection
