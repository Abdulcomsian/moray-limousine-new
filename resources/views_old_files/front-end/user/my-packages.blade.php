@extends('layouts.app')
@section('title','Packages')
@section('content')
    @php
        $user = auth()->user();
        $image = $user->userMedia ? $user->userMedia->first() : null;
    @endphp
    <div class="content-area my-profile">
        <div class="container">
            <div class="row">
                @if(session('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success wow fadeInLeft delay-03s"  role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Well done ... !</strong>
                            {{session('success')}}
                        </div>
                    </div>
                @endif
                <div class="col-md-12 image_uploaded" style="display: none;">
                    <div class="alert alert-success wow fadeInLeft delay-03s"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Well done ... !</strong>
                        Image Uploaded Successfully ..
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <!-- User account box start -->
                    <div class="user-account-box">
                        <div class="header clearfix">
                            <form id="img_form" action="{{route('save.img')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                                <div class="edit-profile-photo">
                                    <img src="{{isset($image) ? asset('images/users-images/'.$image->user_image) : asset('images/upload.png')}}" alt="agent-1" class="img-responsive user-image">
                                    <div class="change-photo-btn w-75">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i> </span>
                                            <input type="file" name="user_image" id="image_file" class="upload">
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <h3>{{$user->name}}</h3>
                            <p>{{$user->email}}</p>
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="{{asset('/my-profile')}}" class="active">
                                        <i class="flaticon-social"></i>My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/my-rishty')}}">
                                        <i class="glyphicon glyphicon-user"></i>My Rishta
                                    </a>
                                </li>
                                <li>
                                    <a href="{{'/my-short-list'}}">
                                        <i class="fa fa-list"></i>My Short List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/my-interests')}}">
                                        <i class="fa fa-heart"></i>My Interest
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/my-packages')}}">
                                        <i class="fa fa-rss-p"></i>My Packages
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('my-messages')}}">
                                        <i class="glyphicon glyphicon-comment"></i>My Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('change-password')}}">
                                        <i class="flaticon-security"></i>Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/logout')}}">
                                        <i class="flaticon-sign-out-option"></i>Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="panel panel-default panel-primary">
                            <div class="panel-heading text-center" id="pkg">Packages</div>

                            <div class="panel-body" style="margin-top: 15px;">



                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="pricing-2">
                                        <div class="title">Basic Plan</div>
                                        <div class="price-for-user">
                                            <div class="price"><sup>$</sup><span class="dolar">54</span><small class="month">per month</small></div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>20 Projects</li>
                                                <li>32GB Storage</li>
                                                <li>50 Email Accounts</li>
                                                <li>12GB Bandwidth</li>
                                                <li>32GB Storage</li>
                                            </ul>
                                        </div>
                                        <div class="button"><a href="#" class="btn btn-outline pricing-btn">Get started</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="pricing-2">
                                        <div class="title">Professional</div>
                                        <div class="price-for-user">
                                            <div class="price"><sup>$</sup><span class="dolar">35</span><small class="month">per month</small></div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>20 Projects</li>
                                                <li>32GB Storage</li>
                                                <li>50 Email Accounts</li>
                                                <li>12GB Bandwidth</li>
                                                <li>32GB Storage</li>
                                            </ul>
                                        </div>
                                        <div class="button"><a href="#" class="btn button-theme pricing-btn">Get started</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="pricing-2">
                                        <div class="title">Exclusive</div>
                                        <div class="price-for-user">
                                            <div class="price"><sup>$</sup><span class="dolar">38</span><small class="month">per month</small></div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>20 Projects</li>
                                                <li>32GB Storage</li>
                                                <li>50 Email Accounts</li>
                                                <li>12GB Bandwidth</li>
                                                <li>32GB Storage</li>
                                            </ul>
                                        </div>
                                        <div class="button"><a href="#" class="btn btn-outline pricing-btn">Get started</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('js/user/profile.js')}}"> </script>
@endsection

