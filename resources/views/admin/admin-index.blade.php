@extends('layouts.master-admin')
@section('title')
  Admin Dashboard
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper pt-4">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-sm-flex align-items-baseline report-summary-header">
{{--                                        <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row report-inner-cards-wrapper">
                                <div class=" col-md -6 col-xl report-inner-card">
                                    <div class="inner-card-text all-bookings" style="cursor: pointer;">
                                        <span class="report-title mb-2">All Bookings</span>
                                        <h4 class='pt-2 text-center'>{{count($bookings)}}</h4>
                                    </div>
                                    <div class="inner-card-icon bg-success">
                                        <i class="icon-list"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl report-inner-card pending-bookings" style="cursor: pointer;">
                                    <div class="inner-card-text">
                                        <span class="report-title  mb-2">Pending </span>
                                        <h4 class='pt-2 text-center'>{{$pending_count}}</h4>

                                    </div>
                                    <div class="inner-card-icon bg-danger">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl report-inner-card assigned-bookings" style="cursor: pointer;">
                                    <div class="inner-card-text">
                                        <span class="report-title mb-2">Assigned</span>
                                        <h4 class='pt-2 text-center'>2</h4>
                                    </div>
                                    <div class="inner-card-icon bg-primary">
                                        <i class="icon-action-redo"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl report-inner-card completed-bookings" style="cursor: pointer;">
                                    <div class="inner-card-text">
                                        <span class="report-title text-center mb-2">Completed</span>
                                        <h4 class="text-center mb-2 pt-2">{{$completed_count}}</h4>
                                        {{--                                       <span class="report-count"> 5 Reports</span>--}}</div>
                                    <div class="inner-card-icon bg-warning">
                                        <i class="icon-logout"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card">
                <h3 class="heading booking-heading text-center w-100 pt-4">ALL BOOKINGS LIST </h3>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card" id="bookings-list-table">
                        @include('parshall-views._booking-list-table',['booking' => $bookings])
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 </span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Moray-Lamosine <i class="fa fa-car text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('DataTable/datatables.min.js')}}"></script>
    <script>
        function bookingsUrl() {
            return ['{{url('admin/get-all-bookings')}}',
                '{{url('admin/get-pending-bookings')}}',
                '{{url('admin/get-assigned-bookings')}}',
                '{{url('admin/get-canceled-bookings')}}',
                '{{url('admin/get-completed-bookings')}}',
                '{{url('admin/get-approved-bookings')}}',
                '{{url('admin/get-paid-bookings')}}',
                '{{url('admin/booking_by_id')}}/',
            ];
        }
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script src="{{asset('js/admin/booking.js')}}"></script>
    @endsection
