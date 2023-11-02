@extends('layouts.user-layout')
@section('title')
    Profile
@endsection
@section('content-area')
    @php
        $user = Auth()->user();
    @endphp
    <div class="container mb-5" style="margin-top: 10rem;">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-img text-center pt-3">
                            @if($user->userMedia)
                                <img src="{{asset('uploaded-user-images/endusers-images/'.$user->userMedia->image_name)}}" style="width: 10rem; height: 10rem;" class="img-thumbnail" alt=""/>
                            @else
                                <img src="{{asset('images/no-image.png')}}" style="width: 10rem; height: 10rem;" class="img-thumbnail" alt=""/>
                            @endif

                        </div>
                        <ul class="list-group list-group-flush bg-light p-4">
                            <li class="list-group-item list-contact side-links" style="cursor: pointer;">
                                <a href="{{url('user/profile')}}" class="contact-link">
                                    <h5 id="contact_text" class="text-uppercase">
                                        Contact Information
                                    </h5>
                                </a>
                            </li>
                            <li class="list-group-item list-pwd side-links" style="cursor: pointer;">
                                <a href="{{url('user/profile')}}" class="w-100">
                                    <h5 id="ch_pwd" class="text-uppercase">
                                        Change Password
                                    </h5>
                                </a>
                            </li>
                            <li class="list-group-item active side-links" style="cursor: pointer;">
                                <a href="{{url('user/notifications')}}" class="w-100">
                                    <h5 id="ch_pwd" class="text-uppercase text-white w-100">
                                        Notifications
                                    </h5>
                                </a>
                            </li>
                            <li class="list-group-item side-links" style="cursor: pointer;">
                                <a href="{{url('/')}}" class="w-100"><h5 id="ch_pwd" class="text-uppercase">
                                        MY Rides
                                    </h5> </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7 pr-0">
                <div class="row card-body">
                    <div class="col-md-12 mt-4 pr-0" id="contact">
                        <ul class="list-group list-group-flush mb-5">
                            <li class="list-group-item pl-0">
                                <h2 class="text-uppercase text-gray w-75"> notifications   </h2>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="comment-single">
                            <div id="comment-area">
                                @if(count(auth()->user()->unreadNotifications) >0 )
                                    <h4 class="ml-3 bg-light" >{{count(auth()->user()->notifications)}} Notifications   <small>( {{count(auth()->user()->unreadNotifications)}}New Notifications )</small>  </h4>
                                    <ul class="comment-list">
                                        @foreach(auth()->user()->unreadNotifications as $notification)

                                            {{$notification->markAsRead()}}
                                            <li class="comment">
                                                <div class="avatar">
                                                    <img src="{{asset('images/logo-new.png')}}" style="width: 3rem" height="3rem" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="name" style="font-weight: bold;">
                                                        Hathaway Limousines - <span class="date"> {{$notification->created_at}}</span>
                                                    </div>
                                                    {{-- <p class="m-0" style="font-weight: bold;">{{ $notification->data['body'] }}</p> --}}
                                                    <p class="m-0" style="font-weight: bold;">{{ htmlspecialchars($notification->data['body']) }}</p>
                                                    <div class="reply">
                                                        <a href="{{url($notification->data[0])}}">Thanks for choosing Hathaway Limousines</a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <hr>
                                @endif

                                @if(count($notifications)> 0)
                                    <ul class="comment-list">
                                        @foreach($notifications as $notification)

                                            <li class="comment text-bold">
                                                <div class="avatar" style="border-radius: 10%;">
                                                    <img src="{{asset('images/logo-new.png')}}" style="width: 3rem" height="3rem" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="name">
                                                        Hathaway Limousines - <span class="date"> {{$notification->created_at}}</span>
                                                    </div>
                                                    {{-- <p class="m-0">{!! $notification->data['body'] !!}</p> --}}
                                                    {{-- <p class="m-0">{!! implode(', ', $notification->data['body']) !!}</p> --}}
                                                    <p class="m-0">
                                                        @if(is_array($notification->data['body']))
                                                            {!! implode(', ', $notification->data['body']) !!}
                                                        @else
                                                            {!! $notification->data['body'] !!}
                                                        @endif
                                                    </p>
                                                    <div class="reply">
                                                    {{-- <a href="{{url($notification->data[0])}}">Thanks for choosing Hathaway Limousines</a> --}}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                            <hr>
                                    </ul>
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
@endsection




