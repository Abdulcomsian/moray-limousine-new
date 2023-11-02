@extends('layouts.app')
@section('title','Packages')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>My Profile</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">My Profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
@php
    if(!empty($user)){
$profile = $user->profile;
 }
    @endphp
<!-- My profile start -->
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

            <div class="col-lg-8 col-md-8 col-sm-12">
                <!-- My address start-->
                <div class="my-address">
                    <div class="main-title-2">
                        <h1><span>Build </span> Profile</h1>
                    </div>

                    <form action="{{route('save.profile')}}" method="POST" enctype="multipart/form-data" novalidate>
                       @csrf
                        <input type="hidden" name="user_id" value="{{auth()->id()}}">
                        <input type="hidden" name="edit_id" value="{{$profile ? $profile->id : null}}">
                        <div class="form-group">
                            <label for="validationCustom">Your Name</label>
                            <input type="text" id="validationCustom" class="input-text" name="display_name" placeholder="Enter Name .." value="{{old('name') ? old('name') : $user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="tag">Your Tag Line</label>
                            <input type="text" id="tag" class="input-text" name="tag_line" placeholder="Your title" value="{{$profile ? $profile->tag_line : old('tag_line')}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="input-text" name="phone_number" placeholder="cell no .." value="{{$profile ? $profile->phone_number : old('phone_number')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="input-text" name="email" placeholder="Add Email" value="{{old('email') ? old('email') : $user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="about">About Me</label>
                            <textarea  id="about" name="about_me" class="input-text" placeholder="Describe About Your Self .."> {{$profile ? $profile->about_me : old('about_me')}} </textarea>
                        </div>
                        <button type="submit" class="btn button-md button-theme">Save Changes</button>
                    </form>
                </div>
                <!-- My address end -->
            </div>
        </div>
    </div>
</div>

<!-- My profile end -->
    @endsection
@section('js')
    <script src="{{asset('admin/assets/pages/validation-demo.js')}}"> </script>
    <script src="{{asset('js/user/profile.js')}}"> </script>

    @endsection
