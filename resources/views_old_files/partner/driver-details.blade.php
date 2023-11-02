@extends('layouts.driver')
@section('title')
  Driver Details
@endsection
@section('content')
    <div class="col-md-9 emp-profile ml-5">
        @php
        $locations = $user->locations;
            if (isset($user->driver->id)){
             if(!empty($user)){
             $driver = $user->driver;
                     }
              $id = $user->driver->id;
              }   else{$id = null;}
          $documents = $user->uploadedDocuments;
        @endphp

        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        @if($user->userMedia()->first() != null)
                            <img src="{{ $id ? asset('uploaded-user-images/endusers-images/'.$user->userMedia()->first()->image_name) : asset('images/user.jpg') }}" alt="no image"/>
                        @else
                            <img src="{{asset('images/user.jpg') }}" alt="no image"/>
                        @endif
                        <div class="file btn btn-lg btn-primary">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$user->first_name}} {{$user->last_name}}
                        </h5>
                        <h6 class="text-capitalize">
                           Driver Details Page
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Other</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Services Cities</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 p-0">

                                    <a href="{{URL::previous()}}">
                                        <button type="button" class="btn btn-dark"><i class="fa fa-backward pr-2"></i> Back</button>
                                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <strong>Address</strong>
                        <p>{{ $id ? $driver->address : '---' }}</p>
                        <strong>Permanent Address</strong>
                        <p>{{ $id ? $driver->permanent_address : '---' }}</p>
                        <strong>Default Location</strong>
                        <p>{{ $id ? $driver->default_location : '---' }}</p>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" style="margin-top: -30px" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->first_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Last Name :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->last_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->gender : '---' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$user->phone_number}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>skype Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->skype_id : '---' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Whats App </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->whats_app : '---' }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->address : '---' }}</p>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Vehicle Licence Number</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->vehicle_licence_no : '---' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Licence Expiry Date</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->vehicle_licence_expiry : '---' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>PCO Licence Number</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->pco_licence_no : '---' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>PCO Licence Expiry</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->pco_licence_expiry : '---' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Id Card Number </label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $id ? $driver->id_card_number : '---' }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Additional Information</label><br/>
                                    <p>{{ $id ? $driver->additional_information : '---' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                            <div class="row justify-content-center">
                                @if(count($documents)>0)
                                @foreach($documents as $document)
                                <div class="col-md-4 bg-light">
                                    <h6 class="text-uppercase">{{$document->document_title}}</h6>
                                        <img data-enlargable  style="cursor: zoom-in; height: 10rem; border-radius: 6px; border: 1px solid gray;" alt="no Image" src="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" class="img-fluid">
                               <span class="pr-3 pt-2">Status : </span>
                                    @if($document->document_status == "approved")
                                    <strong class="pr-3 pt-2 text-success text-uppercase">{{$document->document_status}}</strong>
                                    @elseif($document->document_status == "blocked")
                                        <strong class="pr-3 pt-2 text-danger text-uppercase">{{$document->document_status}}</strong>
                                   @else
                                        <strong class="pr-3 pt-2 text-primary text-uppercase">{{$document->document_status}}</strong>
                                    @endif
                                </div>

                                    @endforeach
                                @else
                                    <h3>No Documents Uploaded By This Driver ...</h3>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                            <div class="row">
                                <div class="col-md-10">
                                    <ul class="list-group list-group-flush text-dark" style="font-family: inherit; font-size: 1rem">
                                        @if(count($locations) > 0)
                                            @foreach($locations as $location)
                                                <li class="list-group-item"> <i class="fa fa-map-marker pr-3"></i>{{$location->default_location}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection

@section('side-bar')
    <li class="nav-item">
    @include('parshall-views._partner-side-bar')
@endsection
