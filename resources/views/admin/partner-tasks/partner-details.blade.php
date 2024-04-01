@extends('layouts.master-admin')
@section('title')
Driver Details
@endsection
@section('main-content')
<div class="col-md-9 emp-profile ml-5 pt-3">
    @php
    if (isset($user->partner)){
    $driver = $user->partner;
    $id = $user->partner->id;
    } else{$id = null;}
    @endphp

    <div class="row">
        <div class="col-md-11">
            <a href="{{URL::previous()}}"><button class="btn btn-dark pull-right"> <i class="fa fa-backward"></i> Back </button></a>
        </div>
        <div class="col-md-4">
            <div class="profile-img">
                @if($user->userMedia()->first() != null)
                <img src="{{ $id ? asset('uploaded-user-images/endusers-images/'.$user->userMedia->image_name) : asset('images/user.jpg') }}" alt="no image" />
                @else
                <img src="{{asset('images/user.jpg') }}" alt="no image" />
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
                    Details Of Partner
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="true">Uploaded Documents</a>
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

        <div class="col-md-2">
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
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                            <label>Account Status </label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->status }}</p>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="locations" role="tabpanel" aria-labelledby="locations-tab">
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
                <div class="tab-pane fade show active" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                    <div class="row">
                        @if(count($documents) > 0)
                        @foreach($documents as $document)
                        <div class="col-md-5 pt-2 bg-light">
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
                                <a href="{{url('admin/approve-doc')}}/{{$document->id}}" class="mt-2" disabled title="Approve Document">
                                    <button class="btn btn-success p-2 btn-sm"><i class="fa fa-universal-access pr-2"></i>Approve </button>
                                </a>
                                <a href="{{url('admin/disapprove-doc')}}/{{$document->id}}" class="mt-2" title="Disapprove Document">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-ban pr-2"></i> Disapprove </button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="heading">
                            <h3>
                                No Documnets uploaded...
                            </h3>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <div class="row">
                        <div class="col-md-10">
                            <ul class="list-group list-group-flush text-dark" style="font-family: inherit; font-size: 1rem">
                                <li class="list-group-item">
                                    <i class="pr-3"><strong></strong></i><strong>Bank Transfer</strong>
                                </li>
                                <li class="list-group-item">
                                    <i class="pr-3"><strong>Owner:</strong></i>{{$accounts->bank_account_owner}}
                                </li>
                                <li class="list-group-item">
                                    <i class="pr-3"><strong>Type:</strong></i>{{$accounts->type}}
                                </li>
                                <li class="list-group-item">
                                    <i class="pr-3"><strong>Iban:</strong></i>{{$accounts->iban}}
                                </li>
                                <li class="list-group-item">
                                    <i class="pr-3"><strong>Bic/Swift:</strong></i>{{$accounts->bic_swift}}
                                </li>
                            </ul>
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