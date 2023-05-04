<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moray | @yield('title')</title>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('css/jquery.validity.css')}}">
    <link rel="stylesheet" href="{{asset('driver/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('driver/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('driver/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
{{--    <link rel="stylesheet" href="{{asset('driver/./vendors/daterangepicker/daterangepicker.css')}}">--}}
    <link rel="stylesheet" href="{{asset('driver/./vendors/chartist/chartist.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- endinject -->
    <link rel="stylesheet" type="text/css" href="{{asset('driver/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/DataTables/datatables.min.css')}}"/>
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('driver/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="shortcut icon" href="{{asset('/images/favicon.png')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    @yield('css')
</head>
<body>
<div class="container-scroller">
@php
    if (auth()->check()){
    $user = auth()->user();
    $user_type = $user->user_type;
    $user_img = $user->userMedia()->first();
    }
@endphp
<!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="{{url('/home')}}">
                <img src="{{asset('images/logo.png')}}" alt="logo" style="width: 2rem; height: 2rem;"
                     class="logo-dark"/>
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="{{asset('images/user.jpg')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
            <h5 class="mb-0 font-weight-medium d-none d-lg-flex text-uppercase">My Dashboard</h5>
            @php $user_status = $user->status  @endphp
            @if($user_type !== "end_user")
                <span class="w-50 text-center pl-4 font-weight-bold text-uppercase">Account Status :
            @if($user_status == "approved")
                        <span class="text-success pl-2">{{$user_status}}</span>
                    @elseif($user_status == 'pending')
                        <span class="text-warning pl-2">{{$user_status}}</span>
                    @else
                        <span class="text-secondary pl-2">{{$user_status}}</span>
                    @endif
                    @endif
            </span>

                <ul class="navbar-nav navbar-nav-right ml-auto">
                    @if($user->user_type =="end_user")
                    <li> <div class="p-0">
                            <a href="{{url('/')}}" class="pull-right text-white pr-3">
                                <button class="btn btn-md" style="background: #d0a955;font-family: sans-serif;font-size: 1rem; font-weight: bold;color: white;">
                                <i class="fa fa-car pr-2 text-dark"></i>BOOK NOW
                                </button>
                            </a>
                        </div></li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#"
                           data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-speech"></i>
                            <span class="count">{{count($user->unreadNotifications)}}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                             aria-labelledby="messageDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have {{count($user->unreadNotifications)}} unread Notifications </p>
                                <span class="badge badge-pill badge-primary float-right ml-3">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            @foreach($user->unreadNotifications as $notification)
                                @if($user_type == 'end_user')
                                    <a class="dropdown-item preview-item" href="{{url('user/notifications')}}">
                                        <div class="preview-thumbnail" style="min-width: 10%;">
                                            <img src="{{asset('images/logo-new.png')}}" alt="image" class="img-sm profile-pic"></div>
                                        <div class="preview-item-content flex-grow py-2" style="min-width: 90%; overflow: hidden;" >
                                            <p class="preview-subject ellipsis font-weight-medium text-dark">Moray Limousine </p>
                                            <p class="font-weight-light small-text"> {{$notification->data['greeting']}} </p>
                                        </div>
                                    </a>
                                        @elseif($user_type == 'driver')
                                            <a class="dropdown-item preview-item" href="{{url('driver/notifications')}}">
                                                <div class="preview-thumbnail" style="min-width: 10%;">
                                                    <img src="{{asset('images/logo-new.png')}}" alt="image" class="img-sm profile-pic"></div>
                                                <div class="preview-item-content flex-grow py-2" style="min-width: 90%; overflow: hidden;" >
                                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Moray Limousine </p>
                                                    <p class="font-weight-light small-text"> {{$notification->data['greeting']}} </p>
                                                </div>
                                            </a>
                                                @else
                                                    <a class="dropdown-item preview-item" href="{{url('partner/notifications')}}">
                                                        <div class="preview-thumbnail" style="min-width: 10%;">
                                                            <img src="{{asset('images/logo-new.png')}}" alt="image" class="img-sm profile-pic"></div>
                                                        <div class="preview-item-content flex-grow py-2" style="min-width: 90%; overflow: hidden;" >
                                                            <p class="preview-subject ellipsis font-weight-medium text-dark">Moray Limousine </p>
                                                            <p class="font-weight-light small-text"> {{$notification->data['greeting']}} </p>
                                                        </div>
                                                    </a>
                                                        @endif


                                    @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="{{url('driver/profile')}}"
                           data-toggle="dropdown" aria-expanded="false">
                            <img class="img-md rounded-circle" style="height: 4rem ; width: 4rem"
                                 src="{{ $user_img ? asset('uploaded-user-images/endusers-images/'.$user_img->image_name) : asset('images/user.jpg') }}" alt="Profile image">
                            <span class="font-weight-normal"> {{$user->first_name}}  {{$user->last_name}} </span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" style="height: 5rem ; width: 5rem"
                                     src="{{ $user_img ? asset('uploaded-user-images/endusers-images/'.$user_img->image_name) : asset('images/user.jpg') }}"
                                     alt="Profile image">
                                <p class="mb-1 mt-3">{{$user->first_name}}</p>
                                <p class="font-weight-light text-muted mb-0">{{$user->email}}</p>
                            </div>
                            <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>
                                <form id="logout-form" style="display: inline"
                                      action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"  style="background: none;
                                        border: none; color: black; padding-left: 1px">Sign out
                                    </button>
                                </form>
                            </a>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <img class="img-xs rounded-circle"
                                 src="{{ $user_img ? asset('uploaded-user-images/endusers-images/'.$user_img->image_name) : asset('images/user.jpg') }}"
                                 alt=""/>
                            <div class="dot-indicator bg-success"></div>
                        </div>
                        {{--                        @if(isset($Auth()::user()->id))--}}
                        <div class="text-wrapper">
                            <p class="profile-name">{{$user->first_name }} {{$user->last_name}}   </p>
                            @if($user_type !== 'end_user')
                                <p class="designation text-capitalize">{{$user_type}}</p>
                            @endif
                        </div>
                        {{--                        @endif--}}
                    </a>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Dashboard</span>
                </li>


                @yield('side-bar')

            </ul>
        </nav>

        <!-- partial -->
        @yield('content')
        <script src="{{asset('driver/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('driver/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('driver/vendors/moment/moment.min.js')}}"></script>
        {{--  <script src="{{asset('driver/vendors/daterangepicker/daterangepicker.js')}}"></script>--}}
        {{--  <script src="{{asset('driver/driver/vendors/daterangepicker/daterangepicker.js')}}"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('driver/js/off-canvas.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{asset('driver/js/dashboard.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/BsMultiSelect.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/DataTables/datatables.min.js')}}"></script>

        @yield('js')

    </div>
</div>
</body>
</html>




