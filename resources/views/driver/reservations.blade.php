@extends('layouts.driver')
@section('title', 'My Reservations')

@section('css')
    <style>
        .table thead th{
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
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

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{session('error')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>My Reservations</h3>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="myTable table table-striped dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Pickup address</th>
                                    <th>Pickup Date & Time</th>
                                    <th>Status</th>
                                    <th>Booking Status </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{! $counter = 1}}
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$booking->pick_address}}</td>
                                        <td>{{date('d - M - yy',strtotime($booking->pick_date)).' & ' . $booking->pick_time}}</td>
                                        <td>{{$booking->driver()->where('user_id', auth()->id())->first()->pivot->driver_status}}</td>
                                        <td>{{$booking->booking_status}}</td>
                                        <td>
                                            <a href="{{route('driver.reservation.detail', $booking->id)}}" class="d-inline-block mr-1 position-relative">
                                                <i class="fa fa-eye fa-2x text-dark"></i>
                                            </a>
                                            @if(count($booking->driver()->wherePivot('driver_status', 'accepted')->get()) == 0 && count($booking->driver()->wherePivot('driver_status', 'rejected')->get()) == 0)
                                            <a href="{{route('booking.driverAction', [$booking->id, 'accepted'])}}" class="d-inline-block mr-1 position-relative">
                                                <i class="fa fa-check fa-2x text-success"></i>
                                            </a>
                                            <a href="{{route('booking.driverAction', [$booking->id, 'rejected'])}}" class="d-inline-block mr-1 position-relative">
                                                <i class="fa fa-close fa-2x text-danger"></i>
                                            </a>
                                            @elseif(count($booking->driver()->wherePivot('status', 'approved')->get()) > 0 && $booking->booking_status != 'completed')
                                                <a title="Complete Booking" href="{{route('booking.completeBooking', $booking->id)}}" class="d-inline-block mr-1 position-relative">
                                                    <i class="fa fa-check-square-o fa-2x text-success"></i>
                                                </a>
                                            @endif

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
@endsection

@section('side-bar')
    @include('parshall-views._driver-side-bar')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.myTable').dataTable({
                responsive : true
            })
        });
    </script>
    @endsection
