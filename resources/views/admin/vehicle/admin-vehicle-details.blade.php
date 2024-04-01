@extends('layouts.master-admin')
@section('title')
Vehicle Details
@endsection
@section('css')
<link rel="stylesheet" href="{{url('css/vehicle-listing.css')}}">
@endsection
@section('main-content')
<div class="col-md-9 mt-4">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img id="vehicle_img" src="{{$vehicle->image_name ? asset('admin-vehicle-img/'.$vehicle->image_name) :  asset('images/user.jpg') }}" alt="no image" />
                    <div class="file btn btn-lg btn-primary">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <a class="pull-right" href="{{url('/admin/vehicle-list')}}">
                    <button type="button" class="btn btn-dark">
                        <i class="fa fa-backward pr-2"> Back</i>
                    </button>
                </a>
                <div class="profile-head pt-3">
                    <h5>
                        {{Auth()->user()->first_name}} {{Auth()->user()->last_name}}
                    </h5>
                    <h6 class="text-capitalize">
                        Vehicle Details
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vehicle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vehicle Type Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Services Cities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work p-3 pt-5">
                    @php if(isset($vehicle))
                    {
                    $user = $vehicle->user;
                    }
                    @endphp
                    <a href="{{url('admin/partner-details/')}}/{{$user->id ?? ''}}" class="text-uppercase">
                        <strong class="p-3">Added By ( User Details )</strong> </a>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item">First Name : <strong class="pl-2">{{$user->first_name ?? ''}}</strong></li>
                        <li class="list-group-item">Last Name : <strong class="pl-2">{{$user->last_name ?? ''}}</strong></li>
                        <li class="list-group-item">Number : <strong class="pl-2">{{$user->phone_number ?? ''}}</strong></li>
                        <li class="list-group-item">Email : <strong class="pl-2">{{$user->email ?? ''}}</strong></li>
                        <li class="list-group-item">User Type : <strong class="pl-2">{{$user->user_type ?? ''}}</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" style="margin-top: -60px" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Vehicle Title :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-title">{{$vehicle->title}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Plate no :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-plate">{{$vehicle->plate}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Vehicle Type : </label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-type text-info"> {{$vehicle_category->name}} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Standard :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-standard">{{$vehicle->standard}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Model </label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-model"> {{$vehicle->model_no}} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Engine Capacity</label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-engine">{{$vehicle->engine_capacity}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Exterior Color </label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-ecolor">{{$vehicle->exterior_color}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Interior Color </label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-ecolor">{{$vehicle->interior_color}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Transmission</label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-transmission">{{$vehicle->transmission}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fuel Type :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="v-fuel">{{$vehicle->fuel_type}}</p>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Vehicle Type Name :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="c-name"> {{$vehicle_category->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Max Seats :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="c-seats">{{$vehicle_category->max_seats}}</p>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Max - Bags :</label>
                            </div>
                            <div class="col-md-6">
                                <p class="c-bags">{{$vehicle_category->max_bags}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Additional Information</label><br />

                                <p class="c-info">{!! $vehicle_category->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="list-group list-group-flush text-dark" style="font-family: inherit; font-size: 1rem">
                                    @if(count($vehicle_locations) > 0)
                                    @foreach($vehicle_locations as $location)
                                    <li class="list-group-item"> <i class="fa fa-map-marker pr-3"></i>{{$location->default_location}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{session('success') ? 'show active' : ''}}" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                        <div class="row">
                            @if(count($vehicle_documents) > 0)
                            @foreach($vehicle_documents as $document)
                            <div class="col-md-5 pt-2 mr-2 bg-light">
                                <div class="form-group mb-2">
                                    <div class="img-responsive">
                                        <div class="heading bg-dark p-2 text-white text-uppercase mb-1 text-center ">
                                            {{$document->document_title}}
                                        </div>
                                        <img data-enlargable style="cursor: zoom-in; height: 10rem; border-radius: 6px; border: 1px solid gray;" src="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" alt="profile-photo" class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="w-100 pt-3 pb-2">
                                    <strong class="pr-2">STATUS : </strong>
                                    @if($document->document_status === 'approved')
                                    <span class="p-2 text-uppercase bg-success text-white rounded">
                                        {{$document->document_status}}
                                    </span>
                                    @elseif($document->document_status === 'disapproved')
                                    <span class="p-2 text-uppercase bg-danger text-white rounded">
                                        {{$document->document_status}}
                                    </span>
                                    @elseif($document->document_status === 'pending')
                                    <strong class="p-2 text-uppercase bg-warning text-white rounded">
                                        {{$document->document_status}}
                                    </strong>
                                    @endif
                                </div>
                                <div class="card-footer pr-0 pt-3 pl-0 mt-2">
                                    <a href="{{url('admin/approve-doc')}}/{{$document->id}}" class="mt-2" title="Approve Document">
                                        <button class="btn btn-success p-2 btn-sm"><i class="fa fa-universal-access pr-2"></i>Approve </button>
                                    </a>
                                    <a href="{{url('admin/disapprove-doc')}}/{{$document->id}}" class="mt-2" title="Disapprove Document">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-ban pr-2"></i> Disapprove </button>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h4>No Document is uploaded</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('img[data-enlargable]').addClass('img-enlargable').click(function() {
        var src = $(this).attr('src');
        $('<div>').css({
            background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
            backgroundSize: 'contain',
            width: '70%',
            height: '70%',
            position: 'fixed',
            zIndex: '10000',
            top: '0',
            left: '0',
            cursor: 'zoom-out',
        }).click(function() {
            $(this).remove();
        }).appendTo('body');
    });
</script>
@endsection