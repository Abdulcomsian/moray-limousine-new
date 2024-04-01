<div class="card-body p-0">
    <img src="{{asset('images/ZImk.gif')}}" style="position: absolute;height: 22rem;width: 95%; z-index: 33; display: none;" id="loader" alt="User Img" class="img-fluid">
    <table id="myTable" class="table myTable table-bordered">
        <thead>
            <tr>
                <th class="font-weight-bold">Booking ID</th>
                <th class="font-weight-bold">PickUp Date</th>
                <th class="font-weight-bold">Net Amount</th>
                <th class="font-weight-bold">Booking City</th>
                <th class="font-weight-bold">Booking Status</th>
                <th class="font-weight-bold">Is Assigned</th>
                <th class="font-weight-bold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking )
            @php 
               $style="";
              if(isset($booking->checkdriverassign) && count($booking->checkdriverassign)>0)
              {
                $style="display:none";
              }
            @endphp
            <tr style="{{$style}}">
                <td>{{$booking->id}} </td>
                <td>{{date('d - M - yy',strtotime($booking->pick_date))}}</td>
                <td> &euro; {{$booking->net_amount}}</td>
                <td>
                    {{$booking->booking_city}}
                    {{-- @if($booking->payment_status == 'pending')   <div class="badge badge-danger p-2">Pending</div>--}}
                    {{-- @elseif($booking->payment_status == 'paid')  <div class="badge badge-success p-2">Paid</div>--}}
                    {{-- @elseif($booking->payment_status == 'canceled')  <div class="badge badge-dark p-2">Canceled</div>--}}
                    {{-- @endif--}}
                </td>
                <td>
                    @if($booking->booking_status == 'approved') <div class="badge badge-success p-2">Approved </div>&nbsp;&nbsp;@if(isset($booking->adminassign[0]->pivot))<span class="fa fa-edit editdriver" data-id="{{$booking->id}}" data-driver="{{$booking->adminassign[0]->id ?? ''}}" data-vehicle="{{$booking->vehicle[0]->id ?? ''}}"></span>  @endif
                    @elseif($booking->booking_status == 'new') <div class="badge badge-primary p-2">New</div>
                    @elseif($booking->booking_status == 'pending') <div class="badge badge-warning p-2">Pending</div>
                    @elseif($booking->booking_status == 'disapproved') <div class="badge badge-warning p-2">Disapproved</div>
                    @elseif($booking->booking_status == 'canceled') <div class="badge badge-danger p-2">Canceled</div>
                    @elseif($booking->booking_status == 'completed') <div class="badge badge-dark p-2">Completed</div>
                    @endif
                </td>
                <td class="text-center">
                    <span class="text-center d-inline-block">
                        {{$booking->driver()->exists() || $booking->partner()->exists() ? 'YES' : 'NO'}}
                    </span>
                </td>
                <td style="font-size: 1.7rem">
                    @if($booking->booking_status == 'approved')
                    <a class="text-success pr-2 approvebooking" data-id="{{$booking->id}}" title="Admin Approve Booking " href="#"> <i class="fa fa-user"></i> </a>
                    <a title="Dis Approve Booking" class="text-danger pr-2 disapprove-booking" href="{{url('/booking/disapprove/')}}/{{$booking->id}}"> <i class="fa fa-ban"></i> </a>
                    @endif
                    @if($booking->booking_status == 'disapproved')
                    <a class="text-success pr-2 approvebooking" data-id="{{$booking->id}}" title="Admin Approve Booking " href="#"> <i class="fa fa-user"></i> </a>
                    <a class="text-success pr-2" data-id="{{$booking->id}}" title="Approve Booking" href="{{url('/booking/approve/')}}/{{$booking->id}}"> <i class="fa fa-universal-access"></i> </a>

                    @endif
                    @if($booking->booking_status == 'pending')
                     <a class="text-success pr-2 approvebooking" data-id="{{$booking->id}}" title="Admin Approve Booking " href="#"> <i class="fa fa-user"></i> </a>
                    <a class="text-success pr-2 " data-id="{{$booking->id}}" title="Approve Booking" href="{{url('/booking/approve/')}}/{{$booking->id}}"> <i class="fa fa-universal-access"></i> </a>

                    <!--  $dattimearray=explode(" ",$booking->created_at);
                                 $today=date('Y-m-d');
                                 $currentime=time();
                                 $nextday = date('Y-m-d',strtotime($dattimearray[0] . "+1 days"));
                                 $nexttime = strtotime($dattimearray[1]);
                                 if($today>$nextday)
                                 {
                                    $text="you have detuct 25% amount Do you want to continue";
                                 }
                                 else
                                 {
                                    $text="Do You want to cancel";
                                 } 
                                 $nexttime=$dattimearray[1];-->

                    <a title="Dis Approve Booking" onclick="return confirm('Do You Want to Cancel?');" class="pr-2 text-danger disapprove-booking" href="{{url('/booking/disapprove/')}}/{{$booking->id}}"> <i class="fa fa-ban"></i> </a>
                    @endif
                    <a title="Booking Details" href="{{url('/booking/details/')}}/{{$booking->id}}"> <i class="fa fa-info"></i> </a>
                    @if($booking->booking_status != "completed")
                    <a title="Complete Booking" href="{{url('/booking/complete/')}}/{{$booking->id}}" class="text-success">
                        <i class="fa fa-check-circle"></i>
                    </a>
                    @endif

                    @if($booking->booking_status == "completed")
                    <a title="Get Invoice" href="{{url('/user/invoice/')}}/{{$booking->id}}" class="text-success">
                        <i class="fa fa-print"></i>
                    </a>
                    @endif
                    {{-- <a title="Delete Booking" class="delete-bookings" href="{{url('/booking/delete/')}}/{{$booking->id}}"> <i class="fa fa-trash"></i> </a>
                </td>--}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>