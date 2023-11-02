@php
    use Carbon\Carbon;
function checkDataAndTime1($time , $date ,$hour){
     $booking_time =  $time .' '. $date;
     $current_time = Carbon::parse(Carbon::now())->addHours($hour);
     $pick_date_time = Carbon::parse($booking_time);
     //If Booking Time is greater then 2 hour form booking time
     if ($pick_date_time->greaterThan($current_time)){
         return true;
     }
         return false;
  }
@endphp
<table id="myTable" class="table table-striped dt-responsive nowrap">
    <thead>
    <tr>
        <th class="font-weight-bold">Datum</th>
        <th class="font-weight-bold">Summe</th>
        <th class="font-weight-bold">Buchungsstatus</th>
        <th class="font-weight-bold">Aktion</th>
    </tr>
    </thead>
    <tbody>
    @if(count($bookings)> 0)
        @foreach($bookings as $booking )
        @if($booking->pick_date < date('Y-m-d'))
            <tr>
                <td>{{date('d - M - yy',strtotime($booking->pick_date))}}</td>
                <td> &euro; {{$booking->net_amount}}</td>
                <td>
                    @if($booking->booking_status == 'approved')   <div class="badge badge-success p-2">Bestätigt</div>
                    @elseif($booking->booking_status == 'pending')  <div class="badge badge-warning p-2">in Bearbeitung</div>
                    @elseif($booking->booking_status == 'disapproved')  <div class="badge badge-dark p-2">Abgelehnt</div>
                    @elseif($booking->booking_status == 'canceled')  <div class="badge badge-dark p-2">Storniert</div>
                    @endif
                </td>
                <td style="font-size: 1.8rem;">

                    <a href="{{url('/user/booking-details/')}}/{{$booking->id}}" title="Booking Details" class="text-info booking-detail">
                        <i class="fa fa-eye"></i> </a>
                   <!--  <a href="{{url('/user/booking-confirm/')}}/{{$booking->id}}" title="Confirm Booking" class="text-info booking-detail">
                        <i class="fa fa-check"></i> </a> -->

                    @if(checkDataAndTime1($booking->pick_time , $booking->pick_date ,2) and $booking->booking_status !== 'canceled' and $booking->booking_status !== 'completed')
                        <a href="{{url('/user/cancel-booking/')}}/{{$booking->id}}" title="Cancel This Booking" class="text-danger cancel-bookings">
                            <i class="fa fa-times-circle-o"></i> </a>
                    @endif
                    @php
                        if(!empty($booking)){
                    $extendedBooking =  $booking->extended_bookings->where('payment_status','paid');
                                  }
                    @endphp
                    @if(count($extendedBooking) == 0 and $booking->booking_status !== "completed" and $booking->booking_status !== "canceled" and checkDataAndTime1($booking->pick_time , $booking->pick_date ,2))
                        <a href="{{url('/user/extend-booking/')}}/{{$booking->id}}" title="Extend Booking Time Or Distance" class="text-success pl-3">
                            <i class="fa fa-expand"></i>
                        </a>
                    @endif
                    @if($booking->booking_status === "completed")
                    <a href="{{url('/user/invoice/')}}/{{$booking->id}}" title="Extend Booking Time Or Distance" class="pl-3">
                        <i class="fa fa-print"></i>
                    </a>
                        @endif
                </td>
            </tr>
        @endif
        @endforeach
    @endif
    </tbody>
</table>