@extends('layouts.driver')
@section('title')
My Reservations
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-3">
    <div class="row  bg-light">
        <div class="col-md-12 grid-margin m-0">
            <div class="card pr-0">
                <div class="card-body">
                    <h4 class="text-uppercase">My Bookings Summery</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                {{--                                        <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                        <div class=" col-md -6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">All Booking</span>
                                <h4>{{count($bookings)}}</h4>
                            </div>
                            <div class="inner-card-icon bg-success">
                                <i class="icon-list"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Pending Bookings</span>
                                <h4>{{count($pending_bookings)}}</h4>

                            </div>
                            <div class="inner-card-icon bg-danger">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Cancelled</span>
                                <h4>{{count($canceled_bookings)}}</h4>
                            </div>
                            <div class="inner-card-icon bg-primary">
                                <i class="icon-action-redo"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl report-inner-card">
                            <div class="inner-card-text">
                                <span class="report-title">Completed</span>
                                <h4>{{count($completed_bookings)}}</h4>
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
    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{session()->get('error')}}
        </div>
    @endif
    <style> body{background: white;} </style>
    <div class="row mt-5">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <img src="{{asset('images/loading-booking.gif')}}" alt="no-img" class="img-fluid loading-booking-img" style="position: absolute;top: 10rem; display: none;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group mb-0">
                                        <label for="form_date">From</label>
                                        <input id="form_date" type="date" class="form-control" placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group mb-0">
                                        <label for="to_date">To </label>
                                        <input id="to_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2 pr-0 pl-0">
                                    <div class="form-group mb-0 pt-1">
                                        <button id="filterByDate" type="button" class="btn btn-dark btn-sm pr-4 pl-4 mt-3"> Find </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="dropdown pull-right pt-4">
                                <button class="btn btn-outline-dark btn-lg dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Filter Bookings
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item  bg-dark text-white" id="all-bookings" type="button">All Bookings</button>
                                    <button class="dropdown-item  bg-dark text-white" id="pending-bookings" type="button">Pending Bookings</button>
                                    <button class="dropdown-item  bg-dark text-white" id="canceled-bookings" type="button">Canceled Bookings</button>
                                    <button class="dropdown-item bg-dark text-white" id="completed-bookings" type="button">Completed Bookings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <h4 class="bookings-hading text-center">All Bookings Requests</h4>
                    <div id="bookings-table-content">
                   @include('parshall-views._partner-bookings-table',['bookings',$bookings])
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
</div>
@endsection

@section('side-bar')
@include('parshall-views._partner-side-bar')
@endsection

@section('js')
<script>
    function bookingsUrl() {
        return [
            '{{url('partner/pending-bookings')}}',
            '{{url('partner/canceled-bookings')}}',
            '{{url('partner/completed-bookings')}}',
            '{{url('partner/all-bookings')}}',
            '{{url('partner/bookings-by-date')}}',
        ];
    }
</script>
    <script src="{{asset('js/partner/partner-bookings.js')}}"></script>
@endsection




