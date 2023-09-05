@extends('layouts.main-home-layout')
@section('title')
Contact Us
@endsection
@section('content-area')
    <style>
        #regions_div{
            color: red !important;
        }
    </style>

    <section id="route_map" style=" height: 22rem; margin-top: 7.8rem;">

    </section>
    <!-- End Map -->
    <!-- Start Contact Area -->
    <section class="contact-area ver-1" style="margin-top: 5%">
        <div class="container">
            <div class="template-title center has-over">
                <h1>Enjoy Coffee With Us</h1>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/address-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Adresse</h4>
                            <p>{!! \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) : 'Moray Limousines (A brand of Moray Group UG) Friedrich-Ebert-Anlage 36 60325 Frankfurt am Main' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/phone-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Telefon</h4>
                            <p> {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/email-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Email</h4>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) : 'info@moray-limousines.com'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="contact-form ver-1">
                        <div class="template-title center has-over">
                            <h1 class="text-capitalize">Kontakt</h1>
                        </div>
                        <form action="{{route('contact.us')}}" method="post" accept-charset="utf-8">
                            <div class="form form-name one-half">
                                <label for="first_name">Vorname</label>
                                <input type="text" id="first_name" required name="first_name" placeholder="Geben Sie ihren Vornamen ein" value="{{old('first_name')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="last_name">Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Geben Sie ihren Namen ein" value="{{old('last_name')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Geben Sie ihre E-Mail ein" value="{{old('email')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="cellno">Telefon</label>
                                <input type="text" id="cellno" required name="cellno" placeholder="Geben Sie ihre Telefonnummer ein" value="{{old('cellno')}}">
                            </div>
                            <div class="form form-comment">
                                <label for="comment">Nachricht</label>
                                <textarea name="comment" id="comment" required  placeholder="Geben Sie ihre Nachricht ein" > </textarea>
                            </div>
                            <div class="btn-submit-form">
                                <button type="submit">Senden <img src="{{asset('images/icon/right-3.png')}}" alt=""></button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>


@endsection
@section('js')


  <script>
      function initMap(){
          let location_latlng = {lat : 50.1109 , lng :8.6821};
          let map = new google.maps.Map(document.getElementById('route_map'),
              {
                  zoom: 12,
                  center: location_latlng,
                  styles: [
                      {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                      {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                      {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                      {
                          featureType: 'administrative.locality',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#d59563'}]
                      },
                      {
                          featureType: 'poi',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#d59563'}]
                      },
                      {
                          featureType: 'poi.park',
                          elementType: 'geometry',
                          stylers: [{color: '#263c3f'}]
                      },
                      {
                          featureType: 'poi.park',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#6b9a76'}]
                      },
                      {
                          featureType: 'road',
                          elementType: 'geometry',
                          stylers: [{color: '#38414e'}]
                      },
                      {
                          featureType: 'road',
                          elementType: 'geometry.stroke',
                          stylers: [{color: '#212a37'}]
                      },
                      {
                          featureType: 'road',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#9ca5b3'}]
                      },
                      {
                          featureType: 'road.highway',
                          elementType: 'geometry',
                          stylers: [{color: '#746855'}]
                      },
                      {
                          featureType: 'road.highway',
                          elementType: 'geometry.stroke',
                          stylers: [{color: '#1f2835'}]
                      },
                      {
                          featureType: 'road.highway',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#f3d19c'}]
                      },
                      {
                          featureType: 'transit',
                          elementType: 'geometry',
                          stylers: [{color: '#2f3948'}]
                      },
                      {
                          featureType: 'transit.station',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#d59563'}]
                      },
                      {
                          featureType: 'water',
                          elementType: 'geometry',
                          stylers: [{color: '#17263c'}]
                      },
                      {
                          featureType: 'water',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#515c6d'}]
                      },
                      {
                          featureType: 'water',
                          elementType: 'labels.text.stroke',
                          stylers: [{color: '#17263c'}]
                      }
                  ]
              });
      }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M1AxeqGt3ozXhX0qeeVP8CcA0OZIkgk&libraries=places&callback=initMap" async defer></script>
    @endsection




