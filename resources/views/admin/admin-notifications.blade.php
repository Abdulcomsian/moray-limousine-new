
@extends('layouts.master-admin')
@section('title')
    Admin Dashboard
@endsection
@section('main-content')
    <div class="col-md-9">
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
                                    @if(is_array($notification->data['body']))
                                        @foreach($notification->data['body'] as $not)
                                            {{$not}}
                                        @endforeach
                                    @else
                                        <p class="m-0">{{$notification->data['body']}}</p>
                                    @endif
                                    <p class="m-0" style="font-weight: bold;">{{$notification->data['body']}}</p>
                                    <div class="reply">
                                        <a href="{{url($notification->data[0])}}">Thanks for choosing Hathaway Limousines</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                    <hr>
                 @if(count($notifications)> 0)
                <ul class="comment-list">
                    @foreach($notifications as $notification)
                    <li class="comment text-bold">
                        <div class="avatar">
                            <img src="{{asset('images/logo-new.png')}}" style="width: 3rem" height="3rem" alt="">
                        </div>
                        <div class="comment-content">
                            <div class="name">
                                Hathaway Limousines - <span class="date"> {{$notification->created_at}}</span>
                            </div>
                            @if(is_array($notification->data['body']))
                                @foreach($notification->data['body'] as $not)
                                   {{$not}}
                                @endforeach
                            @else
                                <p class="m-0">{{$notification->data['body']}}</p>                                
                            @endif
                            <div class="reply">
                                <a href="{{url($notification->data[0])}}">Thanks for choosing Hathaway Limousines</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                  @endif
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection




