<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hathaway | @yield('title')</title>
  <!-- plugins:css -->

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('driver/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('driver/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('driver/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('driver/fonts/font-awesome/css/font-awesome.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css" rel="stylesheet" />

  <!-- Plugin css for this page -->
  <!-- Plugins css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('js/DataTables/datatables.min.css')}}" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('driver/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
  @yield('css')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar  col-md-12 col-sm-10 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center pt-5">
        <a class="navbar-brand brand-logo ml-4" href="{{url('admin/index')}}">
          <svg id="svgcomp-jgwzdv6cimg" version="1.1" role="img" aria-label="" width="110" height="85" viewBox="0 0 112 88">
            <defs>
              <style>
                #mask-comp-jgwzdv6cimg-svg * {
                  fill: #fff;
                  stroke: #fff;
                  stroke-width: 0;
                }
              </style>
              <mask id="mask-comp-jgwzdv6cimg">
                <use id="mask-comp-jgwzdv6cimg-svg-use" xlink:href="#mask-comp-jgwzdv6cimg-svg" width="100%" height="100%" x="0" y="0"></use>
              </mask>
              <svg id="mask-comp-jgwzdv6cimg-svg" preserveAspectRatio="none" data-bbox="20 20 160 160" viewBox="20 20 160 160" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="shape" role="img">
                <g>
                  <path d="M180 20v160H20V20h160z"></path>
                </g>
              </svg>

            </defs>
            <image width="112" height="88" x="0" y="0" transform="" preserveAspectRatio="xMidYMid slice" id="comp-jgwzdv6cimgimage" data-type="image" xlink:href="https://static.wixstatic.com/media/1a8026_45000581fcae4bc39fc0c65536134632~mv2.png/v1/crop/x_121,y_0,w_542,h_425/fill/w_112,h_88,al_c,q_80,usm_0.66_1.00_0.01/1a8026_45000581fcae4bc39fc0c65536134632~mv2.webp" mask="url(#mask-comp-jgwzdv6cimg)" data-svg-mask="mask-comp-jgwzdv6cimg-svg"></image>
          </svg>
        </a>
        {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>--}}
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Admin Dashboard !</h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">
          {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>--}}
          {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>--}}
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="icon-speech"></i>
              <span class="count">{{count(auth()->user()->unreadNotifications)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
              <a class="dropdown-item py-3" href="{{route('admin.notifications')}}">
                <p class="mb-0 font-weight-medium float-left">You have {{count(auth()->user()->unreadNotifications)}} unread Notifications </p>
                <span class="badge badge-pill badge-primary float-right ml-3">View all</span>
              </a>
              <div class="dropdown-divider"></div>

              @foreach(Auth()->user()->unreadNotifications as $notification)
              <a class="dropdown-item preview-item" href="{{route('admin.notifications')}}">
                <div class="preview-thumbnail" style="min-width: 10%;">
                  <img src="{{asset('images/logo-new.png')}}" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2" style="min-width: 90%; overflow: hidden;">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Hathaway Limousines</p>
                  <p class="font-weight-light small-text"> {{$notification->data['greeting']}} </p>
                </div>
              </a>

              @endforeach
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle ml-2" src="{{asset('images/logo-new.png') }}" alt="Profile image"> <span class="font-weight-normal"> {{Auth()->user()->first_name}} {{Auth()->user()->last_name}} </span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="{{asset('images/logo-new.png') }}" style="height: 4.5rem; width:5rem; " alt="Profile image">
                <p class="mb-1 mt-3">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</p>
                <p class="font-weight-light text-muted mb-0">{{Auth()->user()->email}}</p>
              </div>
              <a href="{{url('user/logout-user')}}" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile mt-5">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="{{ asset('images/logo-new.png') }}" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</p>
                <p class="designation">Admin</p>
              </div>

            </a>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/manage-bookings')}}">
              <span class="menu-title">Manage Bookings</span>
              <i class="icon-list menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.notifications')}}">
              <span class="menu-title">Notifications</span>
              <i class="icon-notebook menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/menage-drivers')}}">
              <span class="menu-title">Manage Drivers</span>
              <i class="icon-user menu-icon"></i>
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#managepartner" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Manage Partners</span>
              <i class="icon-user-follow menu-icon"></i>
            </a>
            <div class="collapse" id="managepartner">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/menage-partners')}}">Partner List</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#managevehicles" aria-expanded="false" aria-controls="managevehicles">
              <span class="menu-title">Manage Vehicles</span>
              <i class="icon-options-vertical menu-icon"></i>
            </a>
            <div class="collapse" id="managevehicles">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-category')}}">Add New Vehicle Class</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-vehicle')}}">Add new Vehicle</a>
          </li>--}}
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.vehicleSubtype.list')}}">Vehicle Model</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/vehicle-list')}}">Vehicles List</a></li>
           <li class="nav-item"> <a class="nav-link" href="{{url('admin/production-list')}}">Vehicle Production</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manageprices" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Prices</span>
        <i class="icon-paypal menu-icon"></i>
      </a>
      <div class="collapse" id="manageprices">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/vehiclePricing')}}">Pricing List</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/manage-discount')}}">Manage Discounts</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/manage-city-pricing')}}">City Wise Pricing</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#managelocation" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Locations</span>
        <i class="icon-paypal menu-icon"></i>
      </a>
      <div class="collapse" id="managelocation">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-locations')}}">Add Locations</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-booking-hours')}}">Add Booking Hours</a></li>
        </ul>
      </div>
    </li>

   <!--  <li class="nav-item">
      <a class="nav-link" href="{{url('admin/add-locations')}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Locations</span>
        <i class="icon-note menu-icon"></i>
      </a>
    </li> -->

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/add-documents')}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Documents</span>
        <i class="icon-note menu-icon"></i>
      </a>
    </li>
    {{-- <li class="nav-item">--}}
    {{-- <a class="nav-link"  href="{{url('admin/manage-discount')}}" aria-expanded="false" aria-controls="ui-basic">--}}
    {{-- <span class="menu-title">Discounts & MarkUp</span>--}}
    {{-- <i class="icon-note menu-icon"></i>--}}
    {{-- </a></li>--}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manageextra" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage extra Option</span>
        <i class="icon-options menu-icon"></i>
      </a>
      <div class="collapse" id="manageextra">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/add-extra-options')}}">Extra Option List</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#inquiries" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Inquiries</span>
        <i class="icon-options menu-icon"></i>
      </a>
      <div class="collapse" id="inquiries">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/inquiries')}}">Inquiries List</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manageDesign" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Design</span>
        <i class="icon-options menu-icon"></i>
      </a>
      <div class="collapse" id="manageDesign">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('manageHomePage')}}">
              Home Page
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/services-list')}}">
              Services CMS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/web-configuration')}}">
              Configuration CMS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/faq-list')}}">
              FAQ CMS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/happy-clients')}}">
              Happy Clinets Logo
            </a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/change-password')}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Change Password</span>
        <i class="icon-settings menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/home')}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Home Page</span>
        <i class="icon-eye menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/partner-registration-req')}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Partner Registration(Req)</span>
        <i class="icon-eye menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/legal-form-of-company')}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Legal Form of Company</span>
        <i class="icon-eye menu-icon"></i>
      </a>
    </li>

    </ul>
    </nav>



    @yield('main-content')

    {{-- <footer class="footer">--}}
    {{-- <div class="d-sm-flex justify-content-center justify-content-sm-between">--}}
    {{-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.aimgetsolution.com/" target="_blank">AimGet Solutions</a>. All rights reserved.</span>--}}
    {{-- </div>--}}
    {{-- </footer>--}}
    {{-- <!-- partial -->--}}
    {{-- </div>--}}
  </div>
  </div>
</body>

<!-- plugins:js -->
<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
<script src="{{asset('driver/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('driver/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('driver/vendors/moment/moment.min.js')}}"></script>
{{-- <script src="{{asset('driver/vendors/daterangepicker/daterangepicker.js')}}"></script>--}}
{{-- <script src="{{asset('driver/driver/vendors/daterangepicker/daterangepicker.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<!-- End plugin js for this page -->


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<!-- inject:js -->
<script src="{{asset('driver/js/off-canvas.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('driver/js/dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('js/BsMultiSelect.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/DataTables/datatables.min.js')}}"></script>

@yield('js')

</html>