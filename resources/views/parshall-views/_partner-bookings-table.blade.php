
    <table id="myTable" class="myTable table">
        <thead>
        <tr>
            <th class="font-weight-bold">Booking ID</th>
            <th class="font-weight-bold">PickUp Date</th>
            <th class="font-weight-bold">{{auth()->user()->user_type == 'admin' ? 'Net Amount' :'Pay Out'}}  </th>
            {{auth()->user()->user_type == 'admin' ? '<th class="font-weight-bold">Paid Status</th>' : ''}}
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
                <td>
                    &euro; {{auth()->user()->user_type == "partner" ? $booking->partner()->where('user_id', auth()->user()->id)->first()->pivot->calculated_price : $booking->net_amount}}</td>
                @if(auth()->user()->user_type == 'admin')
                    <td>
                        @if($booking->payment_status == 'pending')
                            <div class="badge badge-danger p-2">Pending</div>
                        @elseif($booking->payment_status == 'paid')
                            <div class="badge badge-success p-2">Paid</div>
                        @elseif($booking->payment_status == 'canceled')
                            <div class="badge badge-dark p-2">Canceled</div>
                        @endif
                    </td>
                @endif
                <td>
                    @if($booking->booking_status == 'approved')
                        <div class="badge badge-success p-2">Approved</div>
                    @elseif($booking->booking_status == 'pending')
                        <div class="badge badge-warning p-2">Pending</div>
                    @elseif($booking->booking_status == 'disapproved')
                        <div class="badge badge-dark p-2">Disapproved</div>
                    @elseif($booking->booking_status == 'canceled')
                        <div class="badge badge-dark p-2">Canceled</div>
                    @endif
                </td>
                <td class="text-center">
                    <span class="text-center d-inline-block">
                        {{$booking->driver()->where('user_id', '!=', auth()->user()->id)->exists() ? 'YES' : 'NO'}}
                    </span>
                </td>
                <td>
                    <a title="View Booking Detail" class=" text-decoration-none mr-2"
                       href="{{url('/booking/details/')}}/{{$booking->id}}"> <i class="fa fa-2x  fa-eye"></i> </a>
                    @if($booking->partner()->first()->pivot->status == 'pending')
                        <a title="Accept Booking" class=" text-decoration-none mr-2" href="{{route('booking.driverAction', [$booking->id, 'approved'])}}"> <i
                                    class="fa fa-2x text-success fa-check"></i> </a>
                        <a title="Reject Booking" class=" text-decoration-none" href="{{route('booking.driverAction', [$booking->id, 'rejected'])}}"> <i
                                    class="fa fa-2x text-danger fa-close"></i> </a>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

