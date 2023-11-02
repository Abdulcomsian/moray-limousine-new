@extends('layouts.driver')
@section('title')
My Profile
@endsection
@section('content')
@php
$user = Auth()->user();
if (isset($user->partner->id)){
$id = $user->partner->id;
}
else{
$id = null;
}
@endphp
<div class="col-md-9 emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    @if($user->userMedia()->first())
                    <img src="{{ $id ? asset('uploaded-user-images/endusers-images/'.$user->userMedia()->first()->image_name) : asset('images/user.jpg') }}" alt="" />
                    @else
                    <img src="{{asset('images/user.jpg') }}" alt="" />
                    @endif
                    <div class="file btn btn-lg btn-primary">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <a href="{{ $id ?  url('partner/update-profile/'.$id) : url('partner/build-profile')}}">
                    <input type="button" class="btn btn-outline-dark pull-right" name="btnAddMore" value="Edit Profile" />
                </a>
                <div class="profile-head">
                    <h5>
                        {{$user->first_name}} {{$user->last_name}}
                    </h5>
                    <h6 class="text-capitalize pt-2">
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="true">My Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="locations-tab" data-toggle="tab" href="#locations" role="tab" aria-controls="locations" aria-selected="true">Service Locations / Cities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Bank Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <strong>Default Location</strong>
                    <p>{{ $id ? $user->partner->default_location : '---' }}</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" style="margin-top: -30px;" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <label>First Name </label>
                            </div>
                            <div class="col-md-5">
                                <p>{{$user->first_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Last Name :</label>
                            </div>
                            <div class="col-md-5">
                                <p>{{$user->last_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Gender :</label>
                            </div>
                            <div class="col-md-5">
                                <p>{{ $id ? $user->partner->gender : '---' }}</p>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-5">
                                <label>Email</label>
                            </div>
                            <div class="col-md-5">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-5">
                                <p>{{$user->phone_number}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label>Whats App </label>
                            </div>
                            <div class="col-md-5">
                                <p>{{ $id ? $user->partner->whats_app : '---' }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label>Address </label>
                            </div>
                            <div class="col-md-5">
                                <p>{{ $id ? $user->partner->address : '---' }}</p>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="locations" role="tabpanel" aria-labelledby="locations-tab">
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="list-group list-group-flush text-dark" style="font-family: inherit; font-size: 1rem">
                                    @if(count($user->locations) > 0)
                                    @foreach($user->locations as $location)
                                    <li class="list-group-item"> <i class="fa fa-map-marker pr-3"></i>{{$location->default_location}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                        <div class="row">
                            @if(count($documents)> 0)
                            @foreach($documents as $document)
                            <div class="col-md-5">
                                <label style="font-size: 1rem; font-weight: bold"> {{$document->document_title}} </label>
                                <div class="img-responsive">
                                    <img data-enlargable src="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" alt="profile-photo" style="border-radius: 10px;cursor:zoom-in; border: 2px solid #d7bf71;height: 11rem;" class="img-fluid">
                                </div>
                            </div>
                            @endforeach
                            @else
                            <h5 class="text-center">No Documents are uploaded ...</h5>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="list-group list-group-flush text-dark" style="font-family: inherit; font-size: 1rem">
                                    <li class="list-group-item"><strong>Bank Detail</strong></li>
                                    <li class="list-group-item"><i class="pr-3"><strong>Owner:</strong></i>{{$user->partner->bank_account_owner ?? ''}}</li>
                                    <li class="list-group-item"><i class="pr-3"><strong>Type:</strong></i>{{$user->partner->type ?? ''}}</li>
                                    <li class="list-group-item"><i class="pr-3"><strong>Iban:</strong></i>{{$user->partner->iban ?? ''}}</li>
                                    <li class="list-group-item"><i class="pr-3"><strong>Bic/Swift:</strong></i>{{$user->partner->bic_swift ?? ''}}</li>
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
@include('parshall-views._partner-side-bar')

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