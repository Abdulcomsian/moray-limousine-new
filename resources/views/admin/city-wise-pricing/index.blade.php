@extends('layouts.master-admin')
@section('title')
    Driver Details
@endsection
@section('css')
<style>
   .pac-container.pac-logo
    {
        display: block;
        z-index: 9999999999;
    }
    
</style>
<link rel="stylesheet" href="{{asset('css/wickedpicker.css')}}">
@endsection
@section('main-content')

    

    <div style="width: 80%">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg w-75 mt-5" style=" margin-left: 18rem;">
            <!-- Modal content-->
            <div class="modal-content bg-white">
                <div class="modal-body">
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    <div class="well well-sm">
                        <form class="form-horizontal"action="{{route('admin.save.city.price')}}" method="post">
                            @csrf
                            <input type="hidden" name="edit_id" id="edit_id" value="">
                            <fieldset>
                                <legend class="text-center header mb-4 create-discount">Create Price Up Down</legend>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-group validate">
                                            <label for="country">Location Country : </label>
                                            <select id="country" name="country">
                                                <option value="">Select Country</option>
                                                @foreach($country as $cn)
                                                <option>{{$cn->nicename}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group validate">
                                            <label for="default_location"> Add Locations : </label>
                                            <input id="default_location" type="text"  maxlength="120" name="default_location" placeholder="Default Location" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group validate">
                                            <label for="country">City : </label>
                                            <input id="city" type="text" readonly  maxlength="50" name="location_city" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="select_category"><i class="fa fa-calendar"></i> Select Category </label>
                                            <select  class="browser-default custom-select custom-select-lg"  name="category" id="category" required>
                                                <option selected value="">Select Class</option>
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="datepicker"><i class="fa fa-calendar"></i> Start Date </label>
                                            <input id="datepicker" type="date" name="start_date" placeholder="Start Date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="end_date"><i class="fa fa-calendar"></i> End Date </label>
                                            <input id="end_date" name="end_date" type="date" placeholder="End Date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="start_time"><i class="fa fa-clock-o"></i> Start Time </label>
                                            <input id="start_time" name="start_time" type="text" placeholder="Start Time" class="form-control timepicker" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_time"><i class="fa fa-clock-o"></i> End Time </label>
                                            <input id="end_time" name="end_time" type="text" placeholder="End Time" class="form-control timepicker" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group validate">
                                            <label for="type">Pricing Type: </label>
                                            <select name="type" id="type" class="form-control" style="height: 50px">
                                                <option value="fixed">Fixed</option>
                                                <option value="hour">Hour</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group validate">
                                            <label for="price">Price%: </label>
                                            <input  type="number" required  name="price" id="price" placeholder="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-center">
                                        
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark btn-lg pull-left">Save</button>
                                        </div>
                                    </div>
                                </div>



                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-12">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible ml-3 fade show" role="alert">
                    <strong>{{ session('success')  }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible ml-3 fade show" role="alert">
                    <strong>{{ session('error')  }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="card-header">
                    <h4 class="text-center">Price Up & Down Rate</h4>
                </div>
                <div class="card-body pr-0">
                <div class="col-md-12 pt-2">
                    <button type="button" class="btn btn-dark w-25  pull-right" data-toggle="modal" data-target="#myModal">Add New Rate</button>
                   <table id="datatable-buttons1" class="table table-striped dt-responsive nowrap w-100">
            <thead class="thead-dark">
            <tr>
                 <th>Country</th>
                 <th>City</th>
                 <th>Type</th>
                 <th>Category</th>
                  <th> Start Date </th>
                <th> End Date </th>
                <th> Start Time </th>
                <th> End Time </th>
                 <th>Price</th>
                 <th>Status</th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            @if(count($city) > 0)
                @foreach($city as $ct)
                    <tr>
                        <td class="py-1">{{$ct->country}}</td>
                        <td class="py-1">
                            {{$ct->city}}
                        </td>
                        <td class="py-1">
                            {{$ct->type}}
                        </td>
                         <td class="py-1">{{$ct->category}}</td>
                         <td class="py-1">
                            {{$ct->start_date}}
                        </td>
                        <td> {{$ct->end_date}} </td>
                        <td>    {{$ct->start_time}} </td>
                        <td>
                            {{$ct->end_time}}
                        </td>
                       
                        <td class="py-1">{{$ct->price}}%</td>
                        <td>
                        <div class="btn-group p-0">
                             @if($ct->status == 'active')
                                <label class="text-uppercase badge badge-success">{{$ct->status}}</label>
                            @elseif($ct->status == 'dis_active')
                                <label class="badge badge-warning">Inactive</label>
                            @else
                                <label class="badge badge-danger">{{$ct->status}}</label>
                            @endif
                            
                        </div>
                        </td>
                        <td>
                            <div class="btn-group p-0" style="font-size: 1.6rem;">
                                <a id="{{$ct->id}}" title="Edit" href="#"  class="p-1 edit-document1" style="cursor: pointer">
                                    <i class="fa fa-edit"></i></a>
                                   
                                <a id="{{$ct->id}}"  title="Delete" href="{{url('admin/delete-city-price/')}}/{{$ct->id}}" class="p-1 text-dark"  style="cursor: pointer"><i class="fa fa-trash"></i></a>
                            @if($ct->status !== 'dis_active')
                                <a id="{{$ct->id}}" title="Inactive" href="{{url('admin/city-price-disactive/')}}/{{$ct->id}}"  class="p-1 text-danger" style="cursor: pointer"><i class="fa fa-ban"></i></a>
                            @endif
                           
                            @if($ct->status == 'dis_active')
                                <a id="{{$ct->id}}" title="Active"  href="{{url('admin/city-price-active/')}}/{{$ct->id}}" class="p-1 text-success" style="cursor: pointer">
                                    <i class="fa fa-universal-access">
                                    </i></a>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2>No Record Found</h2>
            @endif
            </tbody>
        </table>
                </div>
                </div>
        </div>
    </div>
</div>

@endsection
@section('js')

    <script>
        $(document).ready(function () {
               $('input[name="start_time"]').wickedpicker();
               $('input[name="end_time"]').wickedpicker();

               $('.wickedpicker__controls__control-down').html('<i class = "fa fa-arrow-down"></i>');
               $('.wickedpicker__controls__control-up').html('<i class = "fa fa-arrow-up"></i>');
               $('.wickedpicker__title').addClass('bg-dark text-white');


            $('#datatable-buttons1').dataTable({
               responsive : true
            });
            

            let btn_cancel1 = $('.cancel-edit1');
            btn_cancel1.hide();
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click' ,'.edit-document1',function ()
            {
                let id = $(this).attr('id');
                editDocument1(id);
            });

            function editDocument1(id){
                $.ajax({
                    type: 'get',
                    url: '{{url('admin/edit-city-price')}}/'+id,
                    success: function (response) {
                        let location = response;
                        console.log(response);
                        $('#edit_id').val(id);
                        $("#city").val(location.city);
                        $("#country").val(location.country);
                        $("#type").val(location.type);
                        $("#price").val(location.price);
                        $("#category").val(location.category);
                        $('input[name="start_date"]').val(location.start_date);
                        $('input[name="end_date"]').val(location.end_date);
                        $('input[name="start_time"]').val(location.start_time);
                        $('input[name="end_time"]').val(location.end_time);
                         $('#myModal').modal('toggle');

                    }
                });
            }

        });

        function initMap() {

            let autocomplete_location;
            let input_field = document.getElementById('default_location');
            // geographical location types.
            autocomplete_location = new google.maps.places.Autocomplete(input_field, {types: ['geocode']});
            autocomplete_location.setFields(['geometry']);

            let latitude;
            let longitude;
            let country;

            google.maps.event.addListener(autocomplete_location, 'place_changed', function () {
                let location = autocomplete_location.getPlace();
                latitude = location.geometry.location.lat();
                longitude = location.geometry.location.lng();
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

                                        if (results[0].address_components[i].types[b] === "locality") {
                                            //this is the object you are looking for
                                            city = results[0].address_components[i];
                                             $('input[name="location_city"]').val(city.long_name);
                                            break;
                                        }
                                    }
                                }
                                
                                
                                $('input[name="location_country"]').val(country);

                            } else {
                                console.log("No results found");
                            }
                        } else {
                            console.log("Geocoder failed due to: " + status);
                        }})}

            });
        }
        
      

    </script>
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin/wickedpicker.min.js')}}"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHpSgm-hy0_G_NC6PynKEYgASntQIi1Y&libraries=places&callback=initMap" async defer></script>
    
@endsection
