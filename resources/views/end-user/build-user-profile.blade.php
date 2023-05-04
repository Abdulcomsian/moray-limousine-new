@extends('layouts.user-layout')
@section('title')
    @if(isset($user))
        Profil bearbeiten
    @else
        Profile erstellen
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endsection
@section('content-area')
    <style>
        .btn-save:hover{
            background-color: #0b0e11 !important;
        }
        .btn-save{
            background-color: #bd8d2e;
        }
        .text-gray{
            color: gray;
        }
        .list-group-item.active{
            background-color: #bd8d2e;
            border-color: #dcaf56;
        }
        .error-field{
            color: red;
            position: absolute;
        }
        input{
            margin: 0 !important;
            text-align: left !important;
        } select{
              margin: 0 !important;
              text-align: left !important;
          }

    </style>
    @php
     $session_user = auth()->user();
     $user = $session_user->endUser;
    @endphp
    <div class="container" style="margin-top: 8rem;">
        <div class="main-panel">
            <div class="content-wrapper p-4">
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item pl-0">
                        <h2 class="text-uppercase text-gray w-75">
                            {{isset($user) ? 'Kontaktdaten ändern'  : 'Kontaktdaten hinzufügen'}}
                        </h2>
                    </li>
                </ul>

                <form method="post" action="{{route('store-profile')}}" enctype="multipart/form-data" validate="true">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth()->id()}}">
                        @if(isset($user))
                            <input type="hidden" name="id" value="{{$user->id}}">
                        @else
                            <input type="hidden" name="id" value="{{null}}">
                        @endif

                        {{--   Personal information php--}}

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group input-group-lg">
                                        <label for="gender">Geschlecht :</label>
                                        <select class="form-control dropdown" name="gender" id="gender" required >
                                            <option value="{{isset($user) ? $user->gender : ''}}">
                                                @if(isset($user))
                                                    {{$user->gender =='male' ? "Mr" : "Mr's"}}
                                                   @else
                                                    Titel
                                                    @endif
                                            </option>
                                            <option value="male" class="dropdown-item">Mr</option>
                                            <option value="female" class="dropdown-item">Mr's</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'please select your gender' }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="fname">Vorname :</label>
                                        <input type="text" class="form-control" id="fname" readonly value="{{$session_user->first_name}}" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="lname">Name :</label>
                                        <input type="text" class="form-control" readonly value="{{$session_user->last_name}}" id="lname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="phone-no">Mobile :</label>
                                        <input type="tel" class="form-control" name="phone_number" readonly value="{{$session_user->phone_number}}" id="phone-no" placeholder="Phone Number" >
                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="dob">Geburtsdatum :</label>
                                        <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{isset($user) ? $user->date_of_birth : old('date_of_birth')}}" placeholder="Date Of Birth" required>
                                        @if ($errors->has('date_of_birth'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="user_address">Adresse :</label>
                                        <input type="text" class="form-control" id="user_address" name="address" placeholder="Adresse" value="{{isset($user) ? $user->address : old('address')}}" required maxlength="200">
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col md-4">
                            <div class="col-md-12">
                                <div class="edit-profile-photo mt-4 ml-4 mb-2 w-75  user-image-preview">
                                    <div class="img-preview">
                                        @if($session_user->userMedia !== null)
                                            <img src="{{asset('uploaded-user-images/endusers-images/'.$session_user->userMedia->image_name)}}" id="output" alt="profile-photo" style="height: 9.6rem; width: 100%;" class="img-thumbnail">
                                        @else
                                            <img src="{{asset('images/user.jpg')}}" id="output" alt="profile-photo" style="height: 9.6rem; width: 100%;" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i></span>
                                            <input type="file" accept="image/*" onchange="loadFile(event)" class=" upload {{ $errors->has('image_name') ? ' is-invalid' : '' }}" name="image_name" id="profile-img">
                                            @if ($errors->has('image_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-11">
                            <ul class="list-group list-group-flush mb-3 mt-3" >
                                <li class="list-group-item pl-0">
                                    <h3 class="text-uppercase text-gray w-75">
                                         Rechnungsdaten
                                    </h3>
                                </li>
                                <li>
                                </li>
                            </ul>
                            <div class="row mt-4 pt-4">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group ">
                                                <label for="Company">Firma  : </label>
                                                <input type="text" class="form-control" id="Company" name="skype_id" value="{{isset($user) ? $user->skype_id : old('skype_id')}}" placeholder="Company" required maxlength="200">
                                                @if ($errors->has('skype_id'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('skype_id') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group ">
                                                <label for="vat_no">VAT / USt-IdNr.  : </label>
                                                <input type="text" class="form-control" id="vat_no" name="vat_no" value="{{isset($user) ? $user->vat_no : old('vat_no')}}" placeholder="DE123456789" maxlength="50">
                                                @if ($errors->has('vat_no'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vat_no') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billing_address"> Rechnungsadresse</label>
                                            <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{isset($user) ? $user->billing_address : old('billing_address')}}" placeholder="Straße, Ort und PLZ" required maxlength="200">
                                            @if ($errors->has('billing_address'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('billing_address') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="billing_postal_code"> PLZ</label>
                                            <input type="text" class="form-control" id="billing_postal_code" name="billing_postal_code" value="{{isset($user) ? $user->billing_postal_code : old('billing_postal_code')}}" placeholder="Postleitzahl" required maxlength="20">
                                            @if ($errors->has('billing_postal_code'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('billing_postal_code') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="billing_city"> Ort</label>
                                            <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{isset($user) ? $user->billing_city : old('billing_city')}}" placeholder="Ort" required maxlength="50">
                                            @if ($errors->has('billing_city'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('billing_city') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="billing_country">Land</label>
                                            <input type="text" class="form-control" id="billing_country" name="billing_country" value="{{isset($user) ? $user->billing_country : old('billing_country')}}" placeholder="Land" required maxlength="60">
                                            @if ($errors->has('billing_country'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('billing_country') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group pt-4">
                                <button type="submit" class="btn btn-save mr-2 w-100" >
                                    {{isset($user) ? 'Speichern' : 'Speichern'}} </button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        let loadFile = function(event) {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
@section('js')
    <script>
        function initMap() {
            let latitude;
            let longitude;
            let country;
            let postal_code;
            let autocomplete_location;
            let autocomplete_address;



            let input_field = document.getElementById('billing_address');
            autocomplete_location = new google.maps.places.Autocomplete(input_field, {types: ['geocode']});
            autocomplete_location.setFields(['geometry']);

            let input_address = document.getElementById('user_address');
            autocomplete_address = new google.maps.places.Autocomplete(input_address, {types: ['geocode']});
            autocomplete_address.setFields(['geometry']);


            google.maps.event.addListener(autocomplete_location, 'place_changed', function () {
                let location = autocomplete_location.getPlace();
                latitude = location.geometry.location.lat();
                longitude = location.geometry.location.lng();
                $('input[name="location_lat"]').val(latitude);
                $('input[name="location_long"]').val(longitude);

                codeLatLng(latitude,longitude);
                function codeLatLng(lat, lng) {
                    var latlng = new google.maps.LatLng(lat, lng);
                    let geocoder = new google.maps.Geocoder;
                    geocoder.geocode({'latLng': latlng}, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            let length = results.length - 1;
                            country = results[length].formatted_address;
                            console.log(results);

                            if (results[1]) {
                                //formatted address
                                //find country name
                                for (var i=0; i<results[0].address_components.length; i++) {
                                    for (var b=0;b<results[0].address_components[i].types.length;b++) {
                                        //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                                        if (results[0].address_components[i].types[b] === "administrative_area_level_1") {
                                            state = results[0].address_components[i];
                                            break;
                                        }
                                        if (results[0].address_components[i].types[b] === "postal_code"){
                                            postal_code = results[0].address_components[i];
                                              postal_code =   postal_code.long_name;
                                              // console.log(postal_code);
                                            break;
                                        }

                                        if (results[0].address_components[i].types[b] === "locality") {
                                            //this is the object you are looking for
                                            city = results[0].address_components[i];
                                            break;
                                        }
                                    }
                                }
                                //city data
                                $('input[name="billing_city"]').val(city.long_name);
                                $('input[name="billing_country"]').val(country);
                                $('input[name="billing_postal_code"]').val(postal_code);

                            } else {
                                console.log("No results found");
                            }
                        } else {
                            console.log("Geocoder failed due to: " + status);
                        }})}

            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgV-mkhz5pqHJrtexHQXJdV12D8nGefoI&libraries=places&callback=initMap" async defer></script>
    <script  src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
@endsection
