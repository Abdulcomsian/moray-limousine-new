@extends('layouts.master-admin')
@section('title')
   Configuration
@endsection
@section('main-content')
    <div class="col-md-9">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible mt-2 mb-0">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{session('success')}}
            </div>
        @endif
        <div class="row justify-content-end">
            <div class="col-md-11">
                <div class="card mt-2">
                    <div class="card-header text-center">
                        <h2>Configuration Settings</h2>
                    </div>
                    <form action="{{route('save.configuration')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="map_key">
                                            Google Map Api Key
                                        </label>
                                        <input class="form-control" id="map_key" type="text" placeholder="Map API Key.." name="map_api" value="{{$config->map_api}}">
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="map_key">
                                            Master Hour
                                        </label>
                                        <input class="form-control" id="master_hour" type="text" placeholder="Set Booking Hour" name="master_hour" value="{{$config->master_hour}}">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tax2">
                                            Cancel Time Limit
                                        </label>
                                        <input class="form-control" id="tax2" min="0" type="number" placeholder="Minimum Hours For Cancel ..." name="cancel_hour" value="{{$config->cancel_hour}}">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tax3">
                                            Extend Booking Time Limit
                                        </label>
                                        <input class="form-control" id="tax3" min="0" type="number" placeholder="Minimum Hours For Extend Booking ..." name="extend_hour_limit" value="{{$config->extend_hour_limit}}">
                                    </div>
                                </div> <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tax4">
                                            Hour Before User Can Book  a Ride
                                        </label>
                                        <input class="form-control" id="tax4" min="0" type="number" placeholder="Minimum Hours For Extend Booking ..." name="extra_column" value="{{$config->extra_column}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tax">
                                            Tax Rate On Bookings
                                        </label>
                                        <input class="form-control" id="tax" type="number" placeholder="Tax Rate .." name="tax_rate" value="{{$config->tax_rate}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tax">
                                            Pay Pal  Name
                                        </label>
                                        <input class="form-control" id="tax" type="text" placeholder="PayPal Name .." name="user_name" value="{{$config->user_name}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tax">
                                            Pay Pal Account
                                        </label>
                                        <input class="form-control" id="tax" type="text" placeholder="PayPal Account .." name="paypal_account" value="{{$config->paypal_account}}">
                                        <input class="form-control"  type="hidden"  name="paypal_key" value="{{$config->paypal_key}}">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="edit-profile-photo  user-image-preview">
                                        <label>Services Page Background Image</label>
                                        <div class="img-preview">
                                                <img src="{{asset('files/pages-images/'.$config->service_list_img)}}" alt="profile-photo" id="output" style="height: 9.6rem; width: 100%;" class="img-fluid output">
                                        </div>
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i></span>
                                                <input type="file" accept="image/*" onchange="loadFile(event)" class="upload" name="service_list_img" id="profile-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="edit-profile-photo  user-image-preview">
                                        <label>Single Services Background Image</label>
                                        <div class="img-preview">
                                            <img src="{{asset('files/pages-images/'.$config->service_detail_img)}}" alt="profile-photo" id="output2" style="height: 9.6rem; width: 100%;" class="img-fluid output">
                                        </div>
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i></span>
                                                <input type="file" accept="image/*" onchange="loadFile2(event)" class="upload" name="service_detail_img" id="profile-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-5 mt-5">
                                    <div class="form-group">
                                        <input class="form-control btn btn-dark" id="tax"   type="submit" value="Save">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        let loadFile = function(event) {
            let output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        let loadFile2 = function(event) {
            let output = document.getElementById('output2');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
