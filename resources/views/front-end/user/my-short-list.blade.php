@extends('layouts.app')
@section('title','Short List')
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
                                    <a href="{{asset('/my-profile')}}" >
                                        <i class="flaticon-social"></i>My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/my-rishty')}}">
                                        <i class="glyphicon glyphicon-user"></i>My Rishta
                                    </a>
                                </li>
                                <li>
                                    <a href="{{'/my-short-list'}}" class="active">
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
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-info">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="main-title-2">
                                <h1 style="margin-left:40px;padding-top: 9px;"><span>My</span> Short List</h1>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div align="center">  <a href="ad-rishta.html"><button class="btn btn-success" style="background:#337ab7; color:white;margin-top:5px;">Add New Rishta</button></a></div>

                        </div>

                    </div>

                    <!-- table start -->
                    <table class="manage-table responsive-table">
                        <tbody>


                        <tr>
                            <td class="title-container">
                                <div class=" col-lg-4 col-md-5 col-sm-5 col-xs-5">
                                    <img src="img/Ranbir_Kapoor12.jpg" alt="my-properties-5" style="width:100% !important;height:150px;" class="img-responsive img-rounded">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="title">

                                        <h4><a href="#">Usman </a></h4>
                                        <span><i class="fa fa-map-marker"></i>Lahor City</span>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Age:25</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Coast:Jutt</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Height:6.5Feet</span>
                                    </div>


                                </div></td><td class="expire-date hidden-xs">December 17 2017</td>
                            <td class="action">
                                <a href="ad-rishta.html"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="profile.html"><i class="fa  fa-eye"></i>Details</a>
                                <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="title-container">
                                <div class=" col-lg-4 col-md-5 col-sm-5 col-xs-5">
                                     <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="my-properties-5" style="width: 100% !important; height: 150px;" class="img-responsive img-rounded">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="title">

                                        <h4><a href="#">Usman </a></h4>
                                        <span><i class="fa fa-map-marker"></i>Lahor City, </span>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Age:25</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Coast:Jutt</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Height:6.5Feet</span>
                                    </div>


                                </div></td><td class="expire-date hidden-xs">December 17 2017</td>
                            <td class="action">
                                <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="profile.html"><i class="fa  fa-eye"></i>Details</a>
                                <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="title-container">
                                <div class=" col-lg-4 col-md-5 col-sm-5 col-xs-5">
                                     <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="my-properties-5" style="width: 100% !important; height: 150px;" class="img-responsive img-rounded">
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <div class="title">

                                        <h4><a href="#">Usman </a></h4>
                                        <span><i class="fa fa-map-marker"></i>Lahor City, </span>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Age:25</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Coast:Jutt</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Height:6.5Feet</span>
                                    </div>


                                </div></td><td class="expire-date hidden-xs">December 17 2017</td>
                            <td class="action">
                                <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="profile.html"><i class="fa  fa-eye"></i>Details</a>
                                <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="title-container">
                                <div class=" col-lg-4 col-md-5 col-sm-5 col-xs-5">
                                     <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="my-properties-5" style="width: 100% !important; height: 150px;" class="img-responsive img-rounded">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="title">

                                        <h4><a href="#">Usman </a></h4>
                                        <span><i class="fa fa-map-marker"></i>Lahor City, </span>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Age:25</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Coast:Jutt</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Height:6.5Feet</span>
                                    </div>


                                </div></td><td class="expire-date hidden-xs">December 17 2017</td>
                            <td class="action">
                                <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="profile.html"><i class="fa  fa-eye"></i>Details</a>
                                <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="title-container">
                                <div class=" col-lg-4 col-md-5 col-sm-5 col-xs-5">
                                     <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="my-properties-5" style="width: 100% !important; height: 150px;" class="img-responsive img-rounded">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="title">

                                        <h4><a href="#">Usman </a></h4>
                                        <span><i class="fa fa-map-marker"></i>Lahor City, </span>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Age:25</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Coast:Jutt</span><br>
                                        <span class="table-property-price"><i class="fas fa-graduation-cap"></i>Height:6.5Feet</span>
                                    </div>


                                </div></td><td class="expire-date hidden-xs">December 17 2017</td>
                            <td class="action">
                                <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="profile.html"><i class="fa  fa-eye"></i>Details</a>
                                <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <!-- table end -->
                </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('js/user/profile.js')}}"> </script>
@endsection


