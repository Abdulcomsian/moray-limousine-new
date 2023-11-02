@extends(auth()->user()->user_type != 'partner' ? 'layouts.master-admin' : 'layouts.driver')
@section('title', 'Booking Detail')
@section('css')
<link rel="stylesheet" href="{{asset('css/details.css')}}">
@endsection
@php
$user_type = auth()->user()->user_type;
@endphp
@section($user_type != 'partner' ? 'main-content' : 'content')

<div class="col-md-9 emp-profile ml-5">

    <div class="row">
        <div class="col-md-4">
            <a href="{{URL::previous()}}" class="text-aqua" style="margin-top: -10px">
                <i class="fa fa-backward"></i> Back
                <hr>
            </a>
            <div class="profile-img">
                <h6>{{$booking->vehicleType->name}}</h6>
                <img src="{{asset('files/vehicleCategory/category_img')}}/{{$booking->vehicleType->picture}}" alt="no image" />
                <div class="file btn btn-lg btn-primary">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    Booking Detail
                </h5>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">Booking By (User Details)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="other-user-tab" data-toggle="tab" href="#otherUser" role="tab" aria-controls="otherUser" aria-selected="true">Other Information</a>
                    </li>
                </ul>
            </div>
        </div>

        @if($user_type == 'admin' and $booking->booking_status != 'completed')
        <div class="col-md-2 pull-right p-0">
            <!-- <a title="Booking Pay Out" href="{{url('/booking/complete')}}/{{$booking->id}}">
                  <button class="btn btn-dark p-2">Complete Booking</button>
                </a> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookModal" data-whatever="@mdo">Complete Booking</button>
        </div>
        @else
        <div class="col-md-2 pull-right p-0">
            <button class="btn btn-dark p-2">Booking Completed</button>
        </div>
        @endif

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <strong>Booking Date</strong>
                <p>{{date('d - M - Y',strtotime($booking->created_at))}}</p>
                <strong>Pickup Address</strong>
                <p>{{$booking->pick_address}}</p>
                <strong>Drop Address</strong>
                <p>{{$booking->drop_address}}</p>
                <strong>Pickup Date & Time</strong>
                <p>{{date('d - M - Y',strtotime($booking->pick_date))}} & {{date('g:i a', strtotime($booking->pick_time))}} </p>

            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" style="margin-top: -30px" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-10 pr-0">
                            <h3>Selected Options </h3>
                            <table class="table table-striped table-borderless ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Net Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $counter = 1; @endphp
                                    @if(count($booking->selectedOptions) > 0)
                                    @foreach($booking->selectedOptions->unique('option_id') as $option)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$option->option_name}}</td>
                                        <td>{{$option->quantity}}</td>
                                        <td>{{$user_type == 'partner' ? '-' : $option->price}}</td>
                                        <td>{{$user_type == 'partner' ? '-' : $option->price * $option->quantity}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <h6 class="pt-4">NO Extra Option Selected</h6>
                                    @endif
                                    <tr style="border-bottom: none; border-top: none;">
                                        <td colspan="5" style="border-bottom: none;"></td>
                                    </tr>
                                    @if($user_type == 'admin')
                                    <tr class="mt-3">
                                        <td colspan="4" style="border-top: none;"> Total Extra Options Amount</td>
                                        <td colspan="1">{{$booking->extra_options_amount}}</td>
                                    </tr>
                                    <tr class="mt-3">
                                        <td colspan="4">Travel Amount</td>
                                        <td colspan="1">{{$booking->travel_amount - $booking->tax_amount}}</td>
                                    </tr>
                                    <tr class="mt-3">
                                        <td colspan="4">Extra Options Amount</td>
                                        <td colspan="1">{{$booking->extra_options_amount}}</td>
                                    </tr>
                                    <tr class="mt-3">
                                        <td colspan="4">Sub Total</td>
                                        <td colspan="1">{{$booking->extra_options_amount + ($booking->travel_amount - $booking->tax_amount)}}</td>
                                    </tr>
                                    <tr class="mt-3">
                                        <td colspan="4">Tax Amount</td>
                                        <td colspan="1">{{$booking->tax_amount}}</td>
                                    </tr>

                                    <tr class="mt-3">
                                        <td colspan="4">Partner Payment Status</td>
                                        <td colspan="1" class="font-weight-bold">{{$booking->partner_payment_status ? "Paid" : 'Unpaid'}}</td>
                                    </tr>

                                    @endif


                                    <tr class="pt-3 font-weight-bold">
                                        <td colspan="4">{{auth()->user()->user_type == 'admin' ? 'Grand Total' : 'Pay Out'}}</td>
                                        <td colspan="1" class="text-danger"> € {{$user_type == "partner" ? $booking->partner()->where('user_id', auth()->id())->first()->pivot->calculated_price : $booking->net_amount}}</td>
                                    </tr>

                                    @if($booking->driver()->exists() && $user_type == 'admin')
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Commission Amount ({{$booking->partner()->first()->pivot->commission}} %)</td>
                                        <td colspan="1" class="text-danger"> € {{($user_type == "partner" ? $booking->partner()->where('user_id', auth()->user()->id)->first()->pivot->calculated_price : $booking->net_amount) * ($booking->partner()->first()->pivot->commission) / 100}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Tax Amount ({{App\Configuration::first()->tax_rate}} %)</td>
                                        <td colspan="1" class="text-danger"> € {{($user_type == "partner" ? $booking->partner()->where('user_id', auth()->user()->id)->first()->pivot->calculated_price : $booking->net_amount) * (App\Configuration::first()->tax_rate) / 100}}</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                            <hr>
                            <h3>Billing Information</h3>
                            <table class="table table-striped table-borderless ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Billing Address</th>
                                        <th scope="col">Postal Code</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($enduser_billing_details)>0)
                                    <tr>
                                        <td>{{1}}</td>
                                        <td>{{$enduser_billing_details[0]->billing_address}}</td>
                                        <td>{{$enduser_billing_details[0]->billing_postal_code}}</td>
                                        <td>{{$enduser_billing_details[0]->billing_city}}</td>
                                        <td>{{$enduser_billing_details[0]->billing_country}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="5">No Billing Information</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- Extended Booking Details--}}
                        @if($user_type == 'admin')
                        @if(isset($extended_booking))
                        <div class="col-md-8 pt-3">
                            <div class="card-footer">
                                <h4 class="text-uppercase text-center">
                                    Extended Booking details
                                </h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($booking->booking_type == 'distance')
                                <li class="list-group-item">Previous Drop Location
                                </li>
                                <li class="list-group-item">
                                    <strong> <i class="fa fa-location-arrow pr-2"></i> {{$booking->drop_address }}</strong>
                                </li>
                                <li class="list-group-item">New Drop Location</li>
                                <li class="list-group-item">
                                    <strong><span>
                                            <i class="fa fa-map-marker pr-2"></i> {{$extended_booking->new_drop_location}}</span></strong>
                                </li>
                                <li class="list-group-item">Extended Distance
                                    <span class="float-right mr-3">
                                        <i class="fa fa-location-arrow pr-2"></i> {{$extended_booking->extended_distance}} Km</span>
                                </li>
                                @else
                                <li class="list-group-item">Previous Selected Hour
                                    <strong class="float-right mr-4"> <i class="fa fa-clock-o pr-2"></i> {{$booking->estimated_time }} Hour's</strong>
                                </li>
                                <li class="list-group-item">Extended Hour's
                                    <strong class="float-right mr-4">
                                        <span>
                                            <i class="fa fa-clock-o pr-2"></i>
                                            {{$extended_booking->extended_duration - $booking->estimated_time }}
                                            Hour's </span>
                                    </strong>
                                </li>
                                <li class="list-group-item">Total Hours
                                    <span class="float-right mr-4">
                                        <i class="fa fa-clock-o pr-2"></i> {{$extended_booking->extended_duration }} Hour</span>
                                </li>
                                @endif

                                <li class="list-group-item">Extended Amount <span class="float-right mr-4">
                                        <i class="fa fa-eur pr-2"></i>
                                        {{$extended_booking->extended_amount}}</span>
                                </li>
                                <li class="list-group-item">Previous Net Amount <span class="float-right mr-4">
                                        <i class="fa fa-eur pr-2"></i> {{$booking->net_amount}}</span>
                                </li>
                                <li class="list-group-item">New Net Amount <span class="float-right mr-4">
                                        <i class="fa fa-eur pr-2"></i> {{$extended_booking->extended_amount + $booking->net_amount}}</span>
                                </li>
                                <li class="list-group-item">Extended On <span class="float-right mr-4">
                                        <i class="fa fa-calculator pr-2"></i> {{$extended_booking->created_at}}</span>
                                </li>
                            </ul>
                        </div>
                        @endif
                        @else
                        @if(isset($extended_booking))
                        <div class="col-md-8 pt-3">
                            <div class="card-footer">
                                <h4 class="text-uppercase text-center">
                                    Extended Booking details
                                </h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($booking->booking_type == 'distance')
                                <li class="list-group-item">Previous Drop Location
                                </li>
                                <li class="list-group-item">
                                    <strong> <i class="fa fa-location-arrow pr-2"></i> {{$booking->drop_address }}</strong>
                                </li>
                                <li class="list-group-item">New Drop Location</li>
                                <li class="list-group-item">
                                    <strong><span>
                                            <i class="fa fa-map-marker pr-2"></i> {{$extended_booking->new_drop_location}}</span></strong>
                                </li>
                                <li class="list-group-item">Extended Distance
                                    <span class="float-right mr-3">
                                        <i class="fa fa-location-arrow pr-2"></i> {{$extended_booking->extended_distance}} Km</span>
                                </li>
                                @else
                                <li class="list-group-item">Previous Selected Hour
                                    <strong class="float-right mr-4"> <i class="fa fa-clock-o pr-2"></i> {{$booking->estimated_time }} Hour's</strong>
                                </li>
                                <li class="list-group-item">Extended Hour's
                                    <strong class="float-right mr-4">
                                        <span>
                                            <i class="fa fa-clock-o pr-2"></i>
                                            {{$extended_booking->extended_duration - $booking->estimated_time }}
                                            Hour's </span>
                                    </strong>
                                </li>
                                <li class="list-group-item">Total Hours
                                    <span class="float-right mr-4">
                                        <i class="fa fa-clock-o pr-2"></i> {{$extended_booking->extended_duration }} Hour</span>
                                </li>
                                @endif

                                <li class="list-group-item">Extended On <span class="float-right mr-4">
                                        <i class="fa fa-calculator pr-2"></i> {{$extended_booking->created_at}}</span>
                                </li>
                            </ul>
                        </div>
                        @endif
                        @endif

                    </div>
                </div>
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                    @php if(!empty($booking)){
                    $user = $booking->user;
                    } @endphp
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>User Name </label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{$user->first_name}} {{$user->last_name}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <label>Phone Number</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $user->phone_number }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-5">
                                    <p>Male</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Whats App</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $user->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="otherUser" role="tabpanel" aria-labelledby="other-user-tab">
                    @if(isset($booking->otherUser) and $booking->otherUser != null)

                    @php

                    if(!empty($booking)){
                    $other_user = $booking->otherUser;
                    }
                    @endphp
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>User Name </label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{$other_user->first_name}} {{$other_user->last_name}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $other_user->email }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <label>Phone Number</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $other_user->phone_number }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Flight Number</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{$other_user->flight_number}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Banner Words</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $other_user->banner_words ? $other_user->banner_words : '---'}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Additional Information</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $other_user->additional_information ? $other_user->additional_information : '---'}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Flight Number </label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{$booking->flight_no}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Sign Board</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $booking->sign_board}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Reference Code</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $booking->reference_code}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    @else
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-7">
                                <label>Flight Number </label>
                            </div>
                            <div class="col-md-5">
                                <p>{{$booking->flight_no}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <label>Sign Board</label>
                            </div>
                            <div class="col-md-5">
                                <p>{{ $booking->sign_board}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <label>Reference Code</label>
                            </div>
                            <div class="col-md-5">
                                <p>{{ $booking->reference_code}}</p>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 border-bottom border-dark my-3"></div>
        @if($booking->booking_status == 'approved' || $booking->booking_status == 'completed')
        @if($booking->driver()->exists() && $user_type != 'partner' )         
        <div class="col-md-11 offset-md-1 ml-auto mr-auto">
            <div>
                <strong class="d-inline-block mb-2">Assigned To:</strong>
            </div>
            @if($booking->driver()->exists() && $booking->driver()->first()->user_type == 'driver')
            <table class="table table-responsive-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Driver</th>
                        <th>Status</th>
                        <th>Assigned at</th>
                    </tr>
                </thead>
                <tbody>
                    {{! $counter = 1}}
                    @foreach($booking->driver()->get() as $driver)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td><a href="{{route('admin.driverDetail', $driver->id)}}" target="_blank">{{$driver->userName()}}</a></td>
                        <td>{{$booking->driver()->where('user_id', $driver->id)->first()->pivot->status}}</td>
                        <td>{{$booking->driver()->where('user_id', $driver->id)->first()->pivot->assigned_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($booking->vehicle()->exists())
            <table class="table mt-3 table-responsive-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Vehicle</th>
                        <th>Model</th>
                        <th>Image</th>
                        <th>Assigned at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{$booking->vehicle()->first()->title}}</td>
                        <td>{{$booking->vehicle()->first()->model_no}}</td>
                        <td>
                            <img src="{{asset('/admin-vehicle-img/'.$booking->vehicle()->first()->image_name)}}" alt="vehicle image">
                        </td>
                        <td>{{$booking->vehicle()->first()->pivot->assigned_at}}</td>
                    </tr>
                </tbody>
            </table>
            @endif
            @elseif($booking->partner()->where('user_id', '!=', auth()->user()->id)->exists())
            <table class="table table-responsive-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Partner</th>
                        <th>Commission</th>
                        <th>Assigned Status</th>
                        <th>Assigned at</th>
                    </tr>
                </thead>
                <tbody>
                    {{! $counter = 1}}
                    @foreach($booking->partner()->where('user_id', '!=', auth()->user()->id)->get() as $partner)
                    @if($partner->user_type == 'partner')
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$partner->userName()}}</td>
                        <td>{{$booking->partner()->where('user_id', $partner->id)->first()->pivot->commission}} (%)</td>
                        <td>
                            @if($booking->isDriverAssigned())
                            Driver Assigned
                            @else
                            @switch($booking->partner()->where('user_id', $partner->id)->first()->pivot->status)
                            @case('pending')
                            Offer
                            @break
                            @case('approved')
                            Accepted
                            @break
                            @case('rejected')
                            Rejected
                            @break
                            @endswitch
                            @endif
                        </td>
                        <td>{{$booking->partner()->where('user_id', $partner->id)->first()->pivot->assigned_at}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            @if($booking->isDriverAssigned())
            <table class="table mt-3 table-responsive-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Driver</th>
                        <th>Contact No.</th>
                        <th>Assigned Status</th>
                        <th>Assigned at</th>
                    </tr>
                </thead>
                <tbody>
                    {{! $counter = 1}}
                    @foreach($booking->partner()->where('user_id', '!=', auth()->user()->id)->get() as $partner)
                    @if($partner->user_type == 'driver')
                    <tr>
                        <td>{{$counter++}}</td>
                        <td>{{$partner->userName()}}</td>
                        <td>{{$booking->partner()->where('user_id', $partner->id)->first()->phone_number}}</td>
                        <td>{{$booking->driver()->where('user_id', $partner->id)->first()->pivot->driver_status}}</td>
                        <td>{{$booking->partner()->where('user_id', $partner->id)->first()->pivot->assigned_at}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            @endif
            @endif
        </div>
        @if($booking->booking_status == 'approved')
        <div class="col-md-11 offset-md-1 ml-auto mr-auto mt-3">
            <a href="{{route('unAssignBooking', $booking->id)}}" id="unAssign" class="btn btn-dark ml-auto">Un-Assign</a>
        </div>
        @endif
        @elseif($user_type == 'partner' && $booking->driver()->wherePivot('assigned_to', 'driver')->exists())

        <table class="table table-responsive-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Driver</th>
                    <th>Status</th>
                    <th>Assigned at</th>
                </tr>
            </thead>
            <tbody>
                {{! $counter = 1}}
                @foreach($booking->driver()->wherePivot('user_id', '!=', auth()->user()->id)->get() as $driver)
                <tr>
                    <td>{{$counter++}}</td>
                    <td><a href="{{route('admin.driverDetail', $driver->id)}}" target="_blank">{{$driver->userName()}}</a></td>
                    <td>{{$booking->driver()->where('user_id', $driver->id)->first()->pivot->status}}</td>
                    <td>{{$booking->driver()->where('user_id', $driver->id)->first()->pivot->assigned_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($booking->vehicle()->exists())
        <table class="table mt-3 table-responsive-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Vehicle</th>
                    <th>Model</th>
                    <th>Image</th>
                    <th>Assigned at</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$booking->vehicle()->first()->title}} - {{$booking->vehicle()->first()->plate}}</td>
                    <td>{{$booking->vehicle()->first()->model_no}}</td>
                    <td><img src="{{asset('/admin-vehicle-img/'.$booking->vehicle()->first()->image_name)}}" alt="vehicle image"></td>
                    <td>{{$booking->vehicle()->first()->pivot->assigned_at}}</td>
                </tr>
            </tbody>
        </table>
        @endif
        @elseif($booking->partner()->wherePivot('user_id', auth()->user()->id)->wherePivot('status', 'pending')->exists())
        <h3 class="text-center w-100">Please accept booking to make assignment</h3>
        @else
        <input type="hidden" id="loginUserType" value="{{$user_type}}">
        {{-- driver and vehicle assigning form   --}}
        <div class="col-md-12">
            {{-- @if($user_type != 'partner')--}}
            {{-- <div class="row justify-content-center mb-3">--}}
            {{-- <div class="col-md-4">--}}
            {{-- <label for="assignToOption">Assign To:</label>--}}
            {{-- <select id="assignToOption" data-placeholder="Select Party">--}}
            {{-- <option></option>--}}
            {{-- <option value="1">Driver</option>--}}
            {{-- <option value="2">Partner</option>--}}
            {{-- </select>--}}
            {{-- </div>--}}
            {{-- <div class="col-7"></div>--}}
            {{-- </div>--}}
            {{-- @endif--}}
            {{-- assign to form place    --}}
            <div id="assignToFormContainer">
            </div>
        </div>
        @endif
        @else
        <div class="col-md-12">
            <h3 class="text-center">Booking is not approved!</h3>
        </div>
        @endif
    </div>
</div>
<!-- modal for booking completed -->
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pending Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="{{url('/booking/complete')}}/{{$booking->id}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Total: {{$booking->extra_options_amount + ($booking->travel_amount - $booking->tax_amount)}}</label>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pending Payment</label>
                        <input type="number" name="pending_payment" class="form-control" id="pending_payment">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Complete Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  -->

@endsection

{{-- if login user is partner, attach partner side-bar  --}}
@if($user_type == 'partner')
@section('side-bar')
@include('parshall-views._partner-side-bar')
@endsection
@endif

@section('js')
<script>
    /**
     * confirm from user before un-assigning
     */
    $(document).on('click', '#unAssign', function(e) {
        e.preventDefault();
        let option = confirm('Do you really want to un-assign?');
        if (option) {
            window.location.href = $(this).attr('href');
        }
    });

    $(document).ready(function() {
        let loginUserType = $('#loginUserType').val();
        let selectedOption, data;
        let bookingId = '{{$booking->id}}';
        if (loginUserType === 'partner') {
            selectedOption = 1;
        } else if (loginUserType === 'admin') {
            selectedOption = 2;
        }
        data = {
            'bookingId': bookingId,
            'assignTo': selectedOption
        };
        console.log(data);
        $.get('{{route("booking.assignToForm")}}', data, function(response) {
            $('#assignToFormContainer').html(response);
            $('select').chosen();
        });
    });
    $('select').chosen();

    $(document).on('submit', '#bookingAssignForm', function(e) {
        if (!isDataValid()) {
            e.preventDefault();
        }
    });

    // if data valid
    function isDataValid() {
        let isValid = true;
        $('.invalid-feedback').hide();
        $('.assign-booking').each(function() {
            let attr = $(this).attr('multiple');
            if (typeof attr !== typeof undefined && attr !== false) {
                let selected = $(this).val().length;
                if (selected === 0) {
                    isValid = false;
                    $(this).siblings('div').find('ul').addClass('is-invalid');
                    $(this).siblings('.invalid-feedback').show();
                }
            }
            if ($(this).val() === '' || $(this).val() === []) {
                isValid = false;
                $(this).siblings('div').find('a').addClass('is-invalid');
                $(this).siblings('.invalid-feedback').show();
            }
        });
        return isValid;
    }

    $(document).on('change', '#assignToOption', function(e) {
        let selectedOption = $(this).val();
        let bookingId = '{{$booking->id}}';
        let data = {
            'bookingId': bookingId,
            'assignTo': selectedOption
        };
        console.log(data);
        $.get('{{route("booking.assignToForm")}}', data, function(response) {
            $('#assignToFormContainer').html(response);
            $('select').chosen();
        });
    });


    let pick_latitude = parseFloat({{$booking->lat_pck}});
    let pick_longitude = parseFloat({{$booking->long_pck}});

    function initMap() {
        let uluru = {
            lat: pick_latitude,
            lng: pick_longitude
        };
        let map = new google.maps.Map(
            document.getElementById('route_map'), {
                zoom: 9,
                center: uluru
            });
        let marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgV-mkhz5pqHJrtexHQXJdV12D8nGefoI&libraries=places&callback=initMap" async defer></script>
@endsection