@extends('layouts.main-home-layout')
@section('title')
    Contact Us
@endsection
@section('content-area')
{{-- am adding this here contact us css here because in the head file its conflicting with others  --}}
    <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}" />
    <style>
        #regions_div {
            color: red !important;
        }
    </style>


    <div class="container-fluid black-box class1font">
        <div class="row adjustCenID12">
            <div class="col-md-5">
                <p id="txt1ID">Contact Us</p>
                <p>Home-Contact</p>
                <div class="row">
                    <div class="container1212">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="text">
                            <p class="heaidng1">Location</p>
                            <p class="description">
                                This is the description of the location.
                            </p>
                            <button type="button" class="btn111 btn-dark w-100 p-0" style="font-size: 12px; display: flex">
                                View on Google Map
                                <a href="#"><i class="fas fa-arrow-trend-up" id="arrw"
                                        style="color: white"></i></a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container1212">
                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="">
                            <p class="heaidng1">Phone</p>
                            <p class="description">03346669972</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container1212">
                        <div class="icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="text">
                            <p class="heaidng1">Email</p>
                            <p class="description">hamzamalik72111@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- map start --}}
            <div class="col-md-6 imgcon33">
                <div id="route_map" class="img-fluid"> </div>
            </div>
            {{-- map end  --}}
        </div>
    </div>

    <!-- </div>
      </div> -->

    <!-- <div class="container class1font" id="imgcon33">
          <div class="row">
              <img src="images/map3.jpg" alt="Your Image" class="img-fluid">

          </div>
      </div> -->
      
    <div class="container adjustCenID mb-5 class1font">
        <div class="row">
            <div class="col-md-6 mrgintop">
                <div class="row mrgintop">
                    <div class="col-md-12 text-center mb-5">
                        <h1>Leave us your information</h1>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <form action="{{ route('contact.us') }}" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="first_name" required name="first_name"
                            placeholder="First Name" value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="last_name" name="last_name"
                                    placeholder="Last Name" value="{{ old('last_name') }}">
                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="email" id="email" name="email"
                            placeholder="Email" value="{{ old('email') }}">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="cellno" required name="cellno"
                            placeholder="Phone Number" value="{{ old('cellno') }}">
                            @error('cellno')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="comment" id="comment" placeholder="Message" required></textarea>
                            @error('comment')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-dark">
                                Get in Touch
                                <a href="#"><i class="fas fa-arrow-trend-up" id="arrw"
                                        style="color: white"></i></a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mrgintop">
                <div class="row mrgintop">
                    <div class="col-md-12 text-center mb-5">
                        <h1>Our Offices</h1>
                    </div>
                </div>
                <div class="row adjustCenID">
                    <div class="col-md-6">
                        <a href="#"><i class="fa-solid fa-briefcase center BK1" style="color: black"></i></a>
                        <p class="BK4">New York Office</p>
                        <p class="BK7">
                            PO Box 1611 Collins Street<br />West Victoria 8007 Australia
                        </p>
                        <p class="BK7">+32 2 512 08 15</p>
                        <p class="BK7">newyork@hathaway.com</p>
                    </div>
                    <div class="col-md-6">
                        <a href="#"><i class="fa-solid fa-city center BK1" style="color: black"></i></a>
                        <p class="BK4">Istanbul Office</p>
                        <p class="BK7">
                            PO Box 1611 Collins Street<br />West Victoria 8007 Australia
                        </p>
                        <p class="BK7">+32 2 512 08 15</p>
                        <p class="BK7">istanbul@hathaway.com</p>
                    </div>
                    <div class="col-md-6">
                        <a href="#"><i class="fa-regular fa-building center BK1" style="color: black"></i></a>
                        <p class="BK4">Paris Office</p>
                        <p class="BK7">
                            PO Box 1611 Collins Street<br />West Victoria 8007 Australia
                        </p>
                        <p class="BK7">+32 2 512 08 15</p>
                        <p class="BK7">paris@hathaway.com</p>
                    </div>
                    <div class="col-md-6">
                        <a href="#"><i class="fa-solid fa-building-columns center BK1"
                                style="color: black"></i></a>
                        <p class="BK4">London Office</p>
                        <p class="BK7">
                            PO Box 1611 Collins Street<br />West Victoria 8007 Australia
                        </p>
                        <p class="BK7">+32 2 512 08 15</p>
                        <p class="BK7">london@hathaway.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function initMap() {
            let location_latlng = {
                lat: 50.1109,
                lng: 8.6821
            };
            let map = new google.maps.Map(document.getElementById('route_map'), {
                zoom: 12,
                center: location_latlng,
                styles: [{
                        elementType: 'geometry',
                        stylers: [{
                            color: '#242f3e'
                        }]
                    },
                    {
                        elementType: 'labels.text.stroke',
                        stylers: [{
                            color: '#242f3e'
                        }]
                    },
                    {
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#746855'
                        }]
                    },
                    {
                        featureType: 'administrative.locality',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#d59563'
                        }]
                    },
                    {
                        featureType: 'poi',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#d59563'
                        }]
                    },
                    {
                        featureType: 'poi.park',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#263c3f'
                        }]
                    },
                    {
                        featureType: 'poi.park',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#6b9a76'
                        }]
                    },
                    {
                        featureType: 'road',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#38414e'
                        }]
                    },
                    {
                        featureType: 'road',
                        elementType: 'geometry.stroke',
                        stylers: [{
                            color: '#212a37'
                        }]
                    },
                    {
                        featureType: 'road',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#9ca5b3'
                        }]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#746855'
                        }]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'geometry.stroke',
                        stylers: [{
                            color: '#1f2835'
                        }]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#f3d19c'
                        }]
                    },
                    {
                        featureType: 'transit',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#2f3948'
                        }]
                    },
                    {
                        featureType: 'transit.station',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#d59563'
                        }]
                    },
                    {
                        featureType: 'water',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#17263c'
                        }]
                    },
                    {
                        featureType: 'water',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#515c6d'
                        }]
                    },
                    {
                        featureType: 'water',
                        elementType: 'labels.text.stroke',
                        stylers: [{
                            color: '#17263c'
                        }]
                    }
                ]
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M1AxeqGt3ozXhX0qeeVP8CcA0OZIkgk&libraries=places&callback=initMap"
        async defer></script>
@endsection
