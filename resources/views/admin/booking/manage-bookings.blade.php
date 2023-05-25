@extends('layouts.master-admin')
@section('title')
    Admin Dashboard
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
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


            <div class="row card-header p-0 bg-white" style="border-top: 1px solid">
                <div class="row card-header w-100">
                <div class="col-md-3 pt-3">
                    <div class="dropdown">
                        <button class="btn btn-dark  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fa fa-filter pr-1"></i>   FILTER BOOKINGS
                        </button>
                        <div class="dropdown-menu" aria-labelledby="Drivers Lists">
                            <button class="dropdown-item bg-dark text-white all-booking" type="button">All Bookings
                                List
                            </button>
                            <button class="dropdown-item bg-dark text-white pending-booking" type="button">Pending
                                Bookings
                            </button>
                             <button class="dropdown-item bg-dark text-white new-booking" type="button">New
                                Bookings
                            </button>
                            <button class="dropdown-item admin-drivers-list bg-dark text-white approved-Booking"
                                    type="button">Approved Bookings
                            </button>
                            <button class="dropdown-item admin-drivers-list bg-dark text-white canceled-booking"
                                    type="button">Canceled Bookings
                            </button>
                            {{--                                <button class="dropdown-item admin-drivers-list bg-dark text-white paid-booking" type="button">paid Booking</button>--}}
                            <button class="dropdown-item admin-drivers-list bg-dark text-white completed-booking"
                                    type="button">Completed Bookings
                            </button>
                            <button class="dropdown-item  bg-dark text-white payout-bookings"
                                    type="button">PayOut Bookings
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 pt-3">
                    <input type="text" id="search_bookings" class="form-control" placeholder="Booking Id . . .">
                </div>
                <div class="col-md-1 pt-3">
                    <button class="btn btn-dark btn-search pl-4">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="form_date">From</label>
                                    <input id="form_date" type="date" class="form-control" placeholder="From Date">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
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
                </div>

                <div class="col-md-12 pt-4 grid-margin stretch-card">
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
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hathaway-Limousines<i
                            class="fa fa-car text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <div class="modal" id="approvemodal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Assign Driver</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{url('booking/adminapprove')}}" id="approvebookform" method="post">
                @csrf
                <input type="hidden" name="id" id="bookingapprovid">
              <div class="form-group">
                <label for="phone" class="col-form-label">Driver:</label>
                <select class="form-control" name="driver" required>
                    <option value="">Select Vehicle</option>
                    @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->first_name}} {{$driver->last_name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="phone" class="col-form-label">Vechicle:</label>
                <select class="form-control" name="vehicle" required>
                    <option value="">Select Vehicle</option>
                    @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->title}} | {{$vehicle->plate}}</option>
                    @endforeach
                </select>
              </div>
           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
           </form>
        </div>
      </div>
    </div>

     <div class="modal" id="editapprovemodal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Assign Driver</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{url('booking/editadminapprove')}}" id="approvebookform" method="post">
                @csrf
                 <input type="hidden" name="id" id="editbookingapprovid">
             <div class="form-group">
                <label for="phone" class="col-form-label">Driver:</label>
                <select class="form-control" name="driver" required id="editdriver">
                    <option value="">Select Driver</option>
                    @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->first_name}} {{$driver->last_name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="phone" class="col-form-label">Vechicle:</label>
                <select class="form-control" name="vehicle" required id="editvehicle">
                    <option value="">Select Vehicle</option>
                    @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->title}} | {{$vehicle->plate}}</option>
                    @endforeach
                </select>
              </div>
           
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">update changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
           </form>
        </div>
      </div>
    </div>
@endsection
@section('js')
    <script>

        $(document).ready(function () {
            $('#myTable').DataTable({
                responsive : true
            });
        });


        function bookingsUrl() {
            return ['{{url('admin/get-all-bookings')}}',
                '{{url('admin/get-pending-bookings')}}',
                '{{url('admin/get-assigned-bookings')}}',
                '{{url('admin/get-canceled-bookings')}}',
                '{{url('admin/get-completed-bookings')}}',
                '{{url('admin/get-approved-bookings')}}',
                '{{url('admin/get-paid-bookings')}}',
                '{{url('admin/booking_by_id')}}/',
                '{{url('admin/booking_by_date')}}',
                '{{url('admin/payout-bookings')}}',
                '{{url('admin/get-neww-bookings')}}',
            ];
        }
    </script>
    <script type="text/javascript">
     $(document).on('click',".approvebooking",function(e){
         e.preventDefault();
         id=$(this).attr('data-id');
         $("#bookingapprovid").val(id);
         $("#approvemodal").modal('show');
    })

     $(document).on('click','.editdriver',function(e){
        id=$(this).attr('data-id');
        driver=$(this).attr('data-driver');
        vehicle=$(this).attr('data-vehicle');
        $("#editbookingapprovid").val(id);
        $("#editdriver").val(driver);
        $("#editvehicle").val(vehicle);
        $("#editapprovemodal").modal('show');
     })
     </script>
    <script src="{{asset('js/admin/booking.js')}}"></script>
@endsection
