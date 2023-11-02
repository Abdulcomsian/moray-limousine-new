@extends('layouts.driver')
@section('title')
Update Profile
@endsection
@section('content')
    <style>
        .error-field{
            color: red;
            position: absolute;
        }
        input{
            margin: 0 auto !important;
            text-align: left !important;
        }
        .chosen-container-multi .chosen-choices{
            padding: 6px 5px;
        }
    </style>
@php
    $user = auth()->user()->partner;
     $partner = auth()->user();
 @endphp
    <div class="main-panel">
        <form method="post" action="{{route('store-partner')}}" enctype="multipart/form-data" validate="true">
        <div class="content-wrapper p-4">
            <div class="page-header">
                <h2 class="page-title text-capitalize">  <i class="fa fa-user-circle "></i> {{isset($user) ? 'Update Personal information' : 'Add Personal information'}}  </h2>
            </div>

                <div class="row">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth()->id()}}">
                    @if(isset($user))
                        <input type="hidden" name="id" value="{{$user->id}}">
                    @else
                        <input type="hidden" name="id" value="{{null}}">
                    @endif
                    {{--   Personal information php--}}
                    <div class="col-md-6 grid-margin pr-0 stretch-card">
                        <div class="card border-dark border-top">
                            <div class="card-body">
                                <div class="form-group input-group-sm mb-4">
                                    <label for="fname">First Name :</label>
                                    <input type="text" class="form-control" id="fname" readonly value="{{$partner->first_name}}" placeholder="Username">

                                </div>
                                <div class="form-group input-group-sm mb-4">
                                    <label for="lname">Last Name :</label>
                                    <input type="text" class="form-control" id="lname" readonly value="{{$partner->last_name}}" placeholder="Last Name">
                                </div>
                                <div class="form-group input-group-sm mb-4">
                                    <label for="dob">Date of Birth :</label>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{isset($user) ? $user->date_of_birth : old('date_of_birth')}}" placeholder="Date Of Birth">
                                    @if ($errors->has('date_of_birth'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                    <input type="hidden" class="form-control" name="phone_number" id="phone-no"  value="12423523" placeholder="Phone Number">

                                <div class="form-group input-group-sm mb-4">
                                    <label for="whats-app">Whats App :</label>
                                    <input type="tel" class="form-control" id="whats-app" name="whats_app" value="{{isset($user) ? $user->whats_app : old('whats_app')}}" placeholder="Whats App" required maxlength="20">
                                    @if ($errors->has('whats_app'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('whats_app') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group input-group-sm mb-4">
                                    <label for="gender">Select Gender :</label>
                                    <select class="form-control dropdown" name="gender" id="gender" >
                                        <option value="{{isset($user) ? $user->gender : ''}}">
                                            {{isset($user) ? $user->gender : 'Select Gender'}}</option>
                                        <option value="male" class="dropdown-item">Male</option>
                                        <option value="female" class="dropdown-item">Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-green mr-2" >
                                    {{isset($user) ? 'Update Profile' : 'Save Profile'}} </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin pl-0 stretch-card">
                        <div class="card border-dark border-top">
                            <div class="card-body pt-3">
                                <div class="form-group input-group-sm mb-4 row justify-content-center ml-4 mr-4 mt-0 mb-3">
                                    <div class="col-md-5">

                                        <div class="edit-profile-photo  user-image-preview">
                                            <div class="img-preview">
                                                @if($partner->userMedia()->first() !== null)
                                                    <img src="{{isset($partner) ? asset('uploaded-user-images/endusers-images/'.$partner->userMedia()->first()->image_name) : asset('images/user.jpg')}}" id="output" alt="profile-photo" style="height: 9.6rem; width: 100%;" class="img-fluid">
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
                                <div class="form-group-lg mb-4">
                                    <label for="location">Select Service Locations: </label>
                                    <select id="location" data-name="Locations" class="form-control validate p-2" name="locations[]" multiple>
                                        <option></option>
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->default_location}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group input-group-sm mb-4">
                                    <label for="whats-app">Default Location :</label>
                                    <input type="text" class="form-control" id="map_location" name="default_location" value="{{isset($user) ? $user->default_location : old('default_location')}}" placeholder="Default Location" required maxlength="290">
                                    @if ($errors->has('default_location'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('default_location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </form>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 </span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hathaway Limousines<i class="icon-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>

@php
    $locations = $partner->locations;
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

@section('side-bar')
    @include('parshall-views._partner-side-bar')
@endsection

@section('js')
    <script>
        $('#location').val(locations_data).trigger("chosen:updated");

        let loadFile = function(event) {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        let loadFile1 = function(event) {
            let output1 = document.getElementById('output1');
            output1.src = URL.createObjectURL(event.target.files[0]);
        };

        $('#location').chosen({
            'placeholder_text_multiple': 'Select Locations'
        });

    </script>
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    <script>
        function initMap(){
            let input_field = document.getElementById('map_location');
            let autocomplete_location = new google.maps.places.Autocomplete(input_field, {types: ['establishment']});
            autocomplete_location.setComponentRestrictions({'country': ['de']});
            autocomplete_location.setFields(['geometry']);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{$config->map_api}}&libraries=places&callback=initMap" async defer></script>
    @endsection
