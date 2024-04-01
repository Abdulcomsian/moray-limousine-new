@extends('layouts.master-admin')
@section('title')
    Driver Details
@endsection
@section('css')
@endsection
@section('main-content')

    <div class="main-panel">
        <div class="content-wrapper pt-0 bg-white">
            <div class="row">
                <div class="col-md-12 grid-margin">

                @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
                    @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
        <div class="card-header text-center pt-3 mt-2">
            <h4>Add Service Location / Cities</h4>
        </div>
        <div class="card-body pt-0 pb-0">
            <form method="post" action="{{route('admin.save.location')}}" validate="true">
            <div class="row pt-3">
                <input type="hidden" name="location_lat" value="">
                <input type="hidden" name="location_long" value="">
                <input type="hidden" name="edit_id" value="{{null}}">
                @csrf
                <div class="col-md-4">
                    <div class="form-group validate">
                        <label for="default_location"> Add Locations : </label>
                        <input id="default_location" type="text" required maxlength="120" name="default_location" placeholder="Default Location" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group validate">
                        <label for="location">Location City : </label>
                        <input id="location" type="text" readonly required maxlength="50" name="location_city" placeholder="City" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group validate">
                        <label for="state">Location State : </label>
                        <input id="state" type="text" readonly required maxlength="50" name="location_state" placeholder="State" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group validate">
                        <label for="country">Location Country : </label>
                        <input id="country" type="text" readonly required maxlength="50" name="location_country" placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="custom-control custom-checkbox mr-sm-2" style="margin-top: 2rem;">
                        <input type="checkbox" name="is_top_city" value="{{0}}" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label pl-2" for="customControlAutosizing">Make Top City </label>
                    </div>
                </div>
                <div class="col-md-4  p-0">
                    <div class="form-group">
                        <div class="button">
                            <div class="pull-right m-3">
                                <button type="button" class="btn btn-danger btn-sm cancel-edit"><i class="fa fa-times"></i></button>
                                <button type="submit" class="btn btn-dark" id="create_btn"><i class="fa fa-save pr-2"></i> Save  Location / City</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        </div>

<div class="heading text-center card-footer mt-3 border border-top">
    <h2 class="text-uppercase">Locations List</h2>
</div>

       <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
            <thead class="thead-dark">
            <tr>
                <th> Default Location </th>
                <th> City </th>
{{--                <th> State </th>--}}
                <th> Country </th>
                <th> Is Top City </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
{{--            @php($counter = 1)--}}

            @if(count($locations) > 0)
                @foreach($locations as $location)
                    <tr>
                        <td class="py-1">
                            {{$location['default_location']}}
                        </td>
                        <td class="py-1">
                            {{$location['location_city']}}
                        </td>
{{--                        <td>--}}
{{--                            {{$location['location_state']}}--}}
{{--                        </td>--}}
                        <td>
                            {{$location['location_country']}}
                        </td>
                        <td>
                            @if($location['is_top_city'] == true)
                             <strong>Yes</strong>
                               @else
                               <strong>No</strong>
                            @endif
                        </td>

                        <td>
                            <div class="btn-group p-0" style="font-size: 1.6rem;">
                                <a id="{{$location->id}}" title="Edit" href="#"  class="p-1 edit-document" style="cursor: pointer">
                                    <i class="fa fa-edit"></i></a>
                                @if($location->is_top_city == false)
                                <a id="{{$location->id}}"  title="Make Top City" href="{{url('admin/make-top-city/')}}/{{$location->id}}" class="p-1 text-primary"  style="cursor: pointer">
                                    <i class="fa fa-check-circle pr-2 pl-2"></i></a>
                                   @else
                                    <a id="{{$location->id}}"  title="Remove Top City" href="{{url('admin/remove-top-city/')}}/{{$location->id}}" class="p-1 text-info"  style="cursor: pointer">
                                        <i class="fa fa-times-circle pr-2 pl-2"></i></a>
                                    @endif
                                <a id="{{$location->id}}"  title="Delete" href="{{url('admin/delete-location/')}}/{{$location->id}}" class="p-1 text-dark"  style="cursor: pointer"><i class="fa fa-trash"></i></a>
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

@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('#datatable-buttons').dataTable({
               responsive : true
            });

            let btn_cancel = $('.cancel-edit');
            btn_cancel.hide();
            $('input[name="is_top_city"]').change(function () {
                if($(this).is(":checked")){
                    $(this).val(1);
                }else{
                    $(this).val(0);
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click' ,'.edit-document',function ()
            {
                let id = $(this).attr('id');
                editDocument(id);
                btn_cancel.show();
            });

            function editDocument(id){
                $.ajax({
                    type: 'get',
                    url: '{{url('admin/edit-location')}}/'+id,
                    success: function (response) {
                        let location = response;
                        console.log(document);
                        $('input[name="edit_id"]').val(id);
                        $('input[name="location_city"]').val(location.location_city);
                        $('input[name="location_country"]').val(location.location_country);
                        $('input[name="default_location"]').val(location.default_location);
                        $('input[name="location_state"]').val(location.location_state);
                        $('input[name="location_lat"]').val(location.location_lat);
                        $('input[name="location_long"]').val(location.location_long);
                        $('input[name="zip_code"]').val(location.zip_code);

                        $('#create_btn').html('Update Location');

                    }
                });
            }

            btn_cancel.click(function () {
                onCancelClick();
                $(this).hide();
            });

            function onCancelClick() {
                $('input[name="edit_id"]').val(null);
                $('input[name="location_city"]').val(null);
                $('input[name="default_location"]').val(null);
                $('input[name="location_state"]').val(null);
                $('input[name="zip_code"]').val(null);
                $('#create_btn').html('Create Document');
            }


        });

        function initMap() {

            let autocomplete_location;
            let input_field = document.getElementById('default_location');
            // geographical location types.
            autocomplete_location = new google.maps.places.Autocomplete(input_field, {types: ['geocode']});
            // Set initial restrict to the greater list of countries.
            // autocomplete_location.setComponentRestrictions({'country': ['de']});
            autocomplete_location.setFields(['geometry']);

            let latitude;
            let longitude;
            let country;

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

                                        if (results[0].address_components[i].types[b] === "locality") {
                                            //this is the object you are looking for
                                            city = results[0].address_components[i];
                                            break;
                                        }
                                    }
                                }
                                //city data
                                $('input[name="location_city"]').val(city.long_name);
                                $('input[name="location_country"]').val(country);
                                $('input[name="location_state"]').val(state.long_name);

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
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M1AxeqGt3ozXhX0qeeVP8CcA0OZIkgk&libraries=places&callback=initMap" async defer></script>
@endsection
