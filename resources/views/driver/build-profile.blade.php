@extends('layouts.driver')
@section('title')
    @php
    $user = auth()->user();
    $driver = $user->driver;
    @endphp
    {{isset($driver) ? 'Update Profile ' : 'Build Profile'}}
    @endsection
@section('content')
    <style>
        .error-field{
            color: red;
            position: absolute;}
        .chosen-container-multi .chosen-choices {
            padding: 6px 5px;
        }
        input,select{
            margin: 0 !important;
            text-align: left !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper p-4">
            <div class="page-header">
                <h2 class="page-title text-capitalize">  <i class="fa fa-user-circle "></i> {{isset($driver) ? 'Update Personal information' : 'Add Personal information'}}  </h2>
            </div>
            <form method="post" action="{{route('build-profile')}}" enctype="multipart/form-data" validate="true">
            <div class="row">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                @if(isset($driver))
                <input type="hidden" name="id" value="{{$driver->id}}">
                    @else
                    <input type="hidden" name="id" value="{{null}}">
                @endif
            {{--   Personal information php--}}
                <div class="col-md-6 grid-margin pr-0 stretch-card">
                    <div class="card border-dark border-top">
                        <div class="card-body">
                                <div class="form-group input-group-sm">
                                    <label for="fname">First Name :</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Username" readonly value="{{$user->first_name}}">
                                </div>

                                <div class="form-group input-group-sm">
                                    <label for="lname">Last Name :</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" readonly value="{{$user->last_name}}">
                                </div>
                                <div class="form-group input-group-sm">
                                    <label for="dob">Date of Birth :</label>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{isset($driver) ? $driver->date_of_birth : old('date_of_birth')}}" placeholder="Date Of Birth" required maxlength="50">
                                    @if ($errors->has('date_of_birth'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group input-group-sm">
                                    <label for="phone-no">Cell Phone # :</label>
                                    <input type="tel" class="form-control" name="phone_number" id="phone-no" readonly value="{{$user->phone_number}}"placeholder="Phone Number" required maxlength="25">
                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group input-group-sm">
                                    <label for="gender">Select Gender :</label>
                                    <select class="form-control dropdown" name="gender" id="gender" required maxlength="20">
                                        <option value="{{isset($driver) ? $driver->gender : '' }}">{{isset($driver) ? $driver->gender : 'Select Gender' }}</option>
                                        <option value="male" class="dropdown-item">Male</option>
                                        <option value="female" class="dropdown-item">Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            <div class="form-group input-group-sm">
                                <label for="whats-app">Id Card Number :</label>
                                <input type="tel" class="form-control" id="whats-app" name="id_card_number" value="{{isset($driver) ? $driver->id_card_number : old('id_card_number')}}" placeholder="Id Card Number"  maxlength="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 grid-margin pl-0 stretch-card">
                    <div class="card border-dark border-top">
                        <div class="card-body">
                            <div class="form-group input-group-sm row justify-content-center ml-4 mr-4 mt-0 mb-2">
                                <div class="col-md-5">

                                <div class="edit-profile-photo  user-image-preview">
                                    <div class="img-preview">
{{--                                        @if($get_media!=null)--}}
{{--                                            <img src="{{asset('assets/uploads/user/'.$get_media->image_name)}}" alt="profile-photo" class="img-fluid">--}}
{{--                                        @else--}}

                                        @if(isset($driver))
                                        @if($user->userMedia()->first() !== null)
                                            <img src="{{asset('uploaded-user-images/endusers-images/')}}/{{$user->userMedia()->first()->image_name}}" id="output" alt="profile-photo" class="img-fluid">
                                        @else
                                                <img src="{{asset('images/user.jpg')}}" id="output" alt="profile-photo" class="img-fluid">
                                            @endif
                                        @else
                                            <img src="{{asset('images/user.jpg')}}" id="output" alt="profile-photo" class="img-fluid">
                                        @endif

                                    </div>
{{--                                    <input type="hidden" name="user_id" value="{{$get_user->id}}">--}}
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

                            <input type="hidden" class="form-control" id="address" name="address"  maxlength="300" placeholder="Address" value="{{isset($driver) ? $driver->address : 'address'}}">
                            <div class="form-group-lg mb-4">
                                <label for="location">Select Service Locations : </label>
                                <select id="location" data-name="Locations" class="form-control validate p-2" name="locations[]" multiple>
                                    <option></option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->default_location}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group input-group-sm">
                                    <label for="p-address">Permanent Address :</label>
                                    <input type="text" class="form-control" id="p-address" name="permanent_address"  maxlength="300" placeholder="Permanent Address" value="{{isset($driver) ? $driver->permanent_address : old('permanent_address')}}">
                                </div>
                                <div class="form-group input-group-sm mb-2">
                                    <label for="d-location">Default Location</label>
                                    <input type="text" class="form-control" id="driver_location" name="default_location" required maxlength="300" value="{{isset($driver) ? $driver->default_location : old('default_location')}}" placeholder="Default Location">
                                </div>
                        </div>
                    </div>
                </div>
{{--                Vehicle Information --}}
                <div class="page-header m-3">
                    <h2 class="page-title text-capitalize">  <i class="fa fa-car "></i> Vehicle Information </h2>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card border-dark border-top">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 p-4">
                                        <div class="form-group input-group-sm">
                                            <label for="exampleInputName1">Driver Licence Number</label>
                                            <input type="tel" class="form-control" id="exampleInputName1"  maxlength="70" name="vehicle_licence_no" value="{{isset($driver) ? $driver->vehicle_licence_no : old('vehicle_licence_no')}}" placeholder="Licence Number">
                                        </div>
                                        <div class="form-group input-group-sm">
                                            <label for="exampleInputEmail3">Licence Expiry Date :</label>
                                            <input type="date" class="form-control" name="vehicle_licence_expiry"  maxlength="50" id="exampleInputEmail3" value="{{isset($driver) ? $driver->vehicle_licence_expiry : old('vehicle_licence_expiry')}}" placeholder="Email">

                                        </div>
                                    </div>
                                    <div class="col-md-6 p-4">
                                        <div class="form-group input-group-sm">
                                            <label for="pco">PCO Licence Number</label>
                                            <input type="tel" class="form-control" id="pco" name="pco_licence_no"  maxlength="70" value="{{isset($driver) ? $driver->pco_licence_no : old('pco_licence_no')}}" placeholder="PCO Licence Image">
                                        </div>
                                        <div class="form-group input-group-sm">
                                            <label for="pco-expiry">PCO Expiry Date :</label>
                                            <input type="date" class="form-control" name="pco_licence_expiry"  maxlength="50" value="{{isset($driver) ? $driver->pco_licence_expiry : old('pco_licence_expiry')}}" id="pco-expiry" placeholder="Pco Expiry Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group input-group-sm">
                                    <label for="exampleTextarea1">Additional Information : ( Optional )</label>
                                    <textarea class="form-control" id="exampleTextarea1" name="additional_information" rows="6">{{isset($driver) ? $driver->additional_information : old('additional_information')}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-green mr-2 align-self-center" >
                                 {{isset($driver) ? 'Update Profile' : 'Save Profile'}} </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>



        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 </span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hathaway-Limousines<i class="icon-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>


    <script>
        let loadFile = function(event) {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    @endsection

@section('side-bar')
   @include('parshall-views._driver-side-bar')
   @php
       $locations = $user->locations;
   @endphp
   <script>
       let x = 0;
       let locations_data = [];
   </script>
   @if(count($locations) > 0)
       @foreach ($locations as $location)
           <script>
               locations_data[x] = parseInt({{$location->id}});
               x++;

           </script>
       @endforeach
   @endif

@endsection
@section('js')
    <script>
        $('#location').chosen({
            'placeholder_text_multiple': 'Select Locations'
        });
        $('#location').val(locations_data).trigger("chosen:updated");

        $('.pco-img').change(function () {
            let imgval = $(this).val();
           $('.pco-lbl').html(imgval);
        });

        $('.v-img').change(function () {
            let imgval = $(this).val();
            $('.v-lbl').html(imgval);
        });
        $('#id-card-img').change(function () {
            let imgval = $(this).val();
            $('.id-lbl').html(imgval);
        });

        function initMap() {
            let input_field = document.getElementById('driver_location');
            let autocomplete_location = new google.maps.places.Autocomplete(input_field, {types: ['establishment']});
            autocomplete_location.setFields(['geometry']);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M1AxeqGt3ozXhX0qeeVP8CcA0OZIkgk&libraries=places&callback=initMap" async defer></script>
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    @endsection

