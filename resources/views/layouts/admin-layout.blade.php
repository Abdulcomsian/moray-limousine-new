<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from myrathemes.com/xacton/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jan 2020 09:28:35 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Admin | @yield('title','Home')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <!-- App css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">

            <div class="d-flex align-items-left">
                <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-plus"></i> Create New
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            Application
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            Software
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            EMS System
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            CRM App
                        </a>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-none d-sm-inline-block ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="" src="{{asset('admin/assets/images/flags/us.jpg')}}" alt="Header Language" height="16">
                        <span class="d-none d-sm-inline-block ml-1">English</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{asset('admin/assets/images/flags/spain.jpg')}}" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{asset('admin/assets/images/flags/germany.jpg')}}" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">German</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{asset('admin/assets/images/flags/italy.jpg')}}" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{asset('admin/assets/images/flags/russia.jpg')}}" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="mdi mdi-bell"></i>
                        <span class="badge badge-danger badge-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small"> View All</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <img src="{{asset('admin/assets/images/users/avatar-2.jpg')}}"
                                         class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                        <p class="font-size-12 mb-1">You have new follower on Instagram</p>
                                        <p class="font-size-12 mb-0 text-muted"><i
                                                class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-success rounded-circle">
                                                <i class="mdi mdi-cloud-download-outline"></i>
                                            </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Download Available !</h6>
                                        <p class="font-size-12 mb-1">Latest version of admin is now available.
                                            Please download here.</p>
                                        <p class="font-size-12 mb-0 text-muted"><i
                                                class="mdi mdi-clock-outline"></i> 4 hours ago</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="text-reset notification-item">
                                <div class="media">
                                    <img src="{{asset('admin/assets/images/users/avatar-3.jpg')}}"
                                         class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                                        <p class="font-size-12 mb-1">Just upgraded to premium account.</p>
                                        <p class="font-size-12 mb-0 text-muted"><i
                                                class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top">
                            <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                            </a>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('admin/assets/images/users/avatar-3.jpg')}}"
                             alt="Header Avatar">
                        <span class="d-none d-sm-inline-block ml-1">Jamie D.</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Inbox</span>
                            <span>
                                    <span class="badge badge-pill badge-info">3</span>
                                </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Profile</span>
                            <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            Settings
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Lock Account</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">
            <div class="navbar-brand-box">
                <a href="index.html" class="logo">
                    <i class="mdi mdi-alpha-x-circle"></i>
                    <span>
                            FastRishta.pk
                        </span>
                </a>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">


                    <li>
                        <a href="index.html" class="waves-effect"><i class="feather-airplay"></i><span
                                class="badge badge-pill badge-primary float-right"></span><span>Dashboard</span></a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="fas fa-users"></i><span>Member</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{url('/admin/all-members')}}">Free Member</a></li>
                            <li><a href="{{url('/admin/all-members')}}">Premium Member</a></li>

                            <!--li><a href="pages-register.html">Register</a></li>

                            <li><a href="pages-pricing.html">Pricing</a></li>
                            <li><a href="pages-login.html">Login</a></li>
                            <li><a href="pages-maintenance.html">Add Member</a></li>
                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                            <li><a href="pages-404.html">Error 404</a></li>
                            <li><a href="pages-500.html">Error 500</a></li-->
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="fas fa-users"></i><span>Add Rishty</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{url('/admin/all-reshty')}}">Free Rishty</a></li>
                            <li><a href="{{url('/admin/all-reshty')}}">Premium Rishty</a></li>
                            {{--                            <!--li><a href="pages-register.html">Register</a></li>--}}
                            {{--                            <!--li><a href="pages-faqs.html">FAQs</a></li>--}}
                            {{--                            <li><a href="pages-pricing.html">Pricing</a></li>--}}
                            {{--                            <li><a href="pages-login.html">Login</a></li>--}}
                            {{--                            <li><a href="pages-maintenance.html">Add Member</a></li>--}}
                            {{--                            <li><a href="pages-recoverpw.html">Recover Password</a></li>--}}
                            {{--                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>--}}
                            {{--                            <li><a href="pages-404.html">Error 404</a></li>--}}
                            {{--                            <li><a href="pages-500.html">Error 500</a></li-->--}}
                        </ul>
                    </li>


                    <li><a href="{{url('admin/add-package')}}" class=" waves-effect">
                            <i class='fas fa-money-check' style='font-size:20px'></i>
                            <span>Package</span></a></li>
                    <li><a href="{{url('admin/all-happy-stories')}}" class=" waves-effect">
                            <i class='fas fa-money-check' style='font-size:20px'></i>
                            <span>Happy Stories</span></a></li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users"></i><span>Profile Attributes</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="pages-.html">Religion</a></li>
                            <li><a href="pages-s.html">Cast </a></li>
                            <li><a href="pages-starter.html">Sub-Cast</a></li>
                            <li><a href="pages-starter.html">Family Value</a></li>
                            <li><a href="pages-starter.html">Family Status</a></li>
                            <li><a href="pages-starter.html">On Behalf</a></li>
                            <li><a href="pages-starter.html">Language</a></li>
                        </ul>
                    </li>


                    <li><a href="earning.html" class=" waves-effect">
                            <i class='fas fa-dollar-sign' style='font-size:20px'></i>
                            <span>Earning </span></a></li>


                    <li><a href="messag.html" class=" waves-effect">
                            <i class="fa fa-comment" style="font-size:20px"></i>
                            <span>My Message</span></a></li>


                    <li><a href="pages-recoverpw.html" class=" waves-effect">

                            <span>Front End </span></a></li>


                    <li><a href="pages-recoverpw.html" class=" waves-effect">
                            <i class='fas fa-user-check' style='font-size:20px'></i>

                            <span>My Shortlist</span></a></li>



                    <li><a href="pages-faqs.html" class=" waves-effect">
                            <span>FAQs</span></a></li>



                    <li><a href="pages-recoverpw.html" class=" waves-effect">

                            <span>Change Password</span></a></li>




                    <li><a href="pages-recoverpw.html" class=" waves-effect">
                            <i class='fas fa-power-off' style='font-size:20px'></i>
                            <span>Logout</span></a></li>










                    <!--li class="menu-title">Components</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="feather-briefcase"></i><span>UI Elements</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-carousel.html">Carousel</a>
                            <li><a href="ui-embeds.html">Embeds</a>
                            <li><a href="ui-general.html">General</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-media-objects.html">Media Objects</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                            <li><a href="ui-tabs.html">Tabs</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-toasts.html">Toasts</a></li>
                            <li><a href="ui-tooltips-popovers.html">Tooltips & Popovers</a></li>
                            <li><a href="ui-scrollspy.html">Scrollspy</a></li>
                            <li><a href="ui-spinners.html">Spinners</a></li>
                            <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="feather-list"></i><span>Tables</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="tables-basic.html">Basic Tables</a></li>
                            <li><a href="tables-datatables.html">Data Tables</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="feather-bar-chart-2"></i><span>Charts</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="charts-morris.html">Morris</a></li>
                            <li><a href="charts-google.html">Google</a></li>
                            <li><a href="charts-chartjs.html">Chartjs</a></li>
                            <li><a href="charts-sparkline.html">Sparkline</a></li>
                            <li><a href="charts-knob.html">Jquery Knob</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect"><i class="feather-book"></i><span
                                class="badge badge-pill badge-danger float-right">6</span><span>Forms</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="forms-elements.html">Elements</a></li>
                            <li><a href="forms-plugins.html">Plugins</a></li>
                            <li><a href="forms-validation.html">Validation</a></li>
                            <li><a href="forms-mask.html">Masks</a></li>
                            <li><a href="forms-quilljs.html">Quilljs</a></li>
                            <li><a href="forms-uploads.html">File Uploads</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="feather-box"></i><span>Icons</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="icons-materialdesign.html">Material Design</a></li>
                            <li><a href="icons-fontawesome.html">Font awesome</a></li>
                            <li><a href="icons-dripicons.html">Dripicons</a></li>
                            <li><a href="icons-feather.html">Feather Icons</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">More</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="feather-map"></i><span>Maps</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="maps-google.html">Google Maps</a></li>
                            <li><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>


                             <li><a href="pages-faqs.html" class=" waves-effect">
                               <span>FAQs</span></a></li>




                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="mdi mdi-share-variant"></i><span>Multi Level</span></a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);">Level 1.1</a></li>
                            <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);">Level 2.1</a></li>
                                    <li><a href="javascript: void(0);">Level 2.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li-->

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    @yield('content')
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    {{date('Y')}} © Xacton.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Design & Develop by Myra
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

<!-- END layout-wrapper -->

<!-- Overlay-->
<div class="menu-overlay"></div>


<!-- jQuery  -->
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('admin/assets/js/waves.js')}}"></script>
<script src="{{asset('admin/assets/js/simplebar.min.js')}}"></script>
<!-- Morris Js-->
<script src="{{asset('admin/plugins/morris-js/morris.min.js')}}"></script>
<!-- Raphael Js-->
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<!-- Morris Custom Js-->
<script src="{{asset('admin/assets/pages/dashboard-demo.js')}}"></script>

@yield('js')
<!-- App js -->
<script src="{{asset('admin/assets/js/theme.js')}}"></script>
</body>
</html>
