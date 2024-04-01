
@extends('layouts.driver')
@section('title')
    Partner
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper pt-3">

            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
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

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive border rounded p-1">
                                <table id="myTable" class="table">
                                    <thead>
                                    <tr>
                                        <th class="font-weight-bold">Booking ID</th>
                                        <th class="font-weight-bold">PickUp Date</th>
                                        <th class="font-weight-bold">Net Amount</th>
                                        <th class="font-weight-bold">Paid Status</th>
                                        <th class="font-weight-bold">Booking Status</th>
                                        <th class="font-weight-bold">Is Assigned</th>
                                        <th class="font-weight-bold">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking )
                                        <tr>
                                            <td>
                                                {{$booking->id}} </td>
                                            <td>{{$booking->pick_date}}</td>
                                            <td> &euro; {{$booking->net_amount}}</td>
                                            <td>
                                                @if($booking->payment_status == 'pending')   <div class="badge badge-danger p-2">Pending</div>
                                                @elseif($booking->payment_status == 'paid')  <div class="badge badge-success p-2">Paid</div>
                                                @elseif($booking->payment_status == 'canceled')  <div class="badge badge-dark p-2">Canceled</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($booking->booking_status == 'approved')   <div class="badge badge-success p-2">Approved</div>
                                                @elseif($booking->booking_status == 'pending')  <div class="badge badge-warning p-2">Pending</div>
                                                @elseif($booking->booking_status == 'disapproved')  <div class="badge badge-dark p-2">Disapproved</div>
                                                @elseif($booking->booking_status == 'canceled')  <div class="badge badge-dark p-2">Canceled</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="text-center d-inline-block">
                                                    {{$booking->driver()->where('user_id', '!=', auth()->user()->id)->exists() ? 'YES' : 'NO'}}
                                                </span>
                                            </td>
                                            <td>
                                                <a title="View Booking Detail" class=" text-decoration-none mr-2 " href="{{url('/booking/details/')}}/{{$booking->id}}"> <i class="fa fa-2x  fa-eye"></i> </a>
                                                <a title="Reject Booking" class=" text-decoration-none" href="#"> <i class="fa fa-2x text-danger fa-close"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 . All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hathaway Limousines<i class="fa fa-car text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
@section('side-bar')
    @include('parshall-views._partner-side-bar')

@endsection
