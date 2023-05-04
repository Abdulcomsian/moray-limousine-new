@extends('layouts.main-home-layout')
@section('title')
    Payment Details
@endsection

@section('content-area')
<style>
    .header-04 .bottom-header {
        background: rgb(30, 30, 30);}
    .summary-bar-area.open {
        top: 125px !important;
    }
</style>
    <section class="summary-bar-area">
        <div class="container-fluid mr-0 ml-5">
            <div class="row">
                <div class="col-md-12 p-0">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Pick Up Address
                            </div>
                            <p>{{$form_data['pick_address']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                @if($form_data->booking_type === 'time')
                                    Selected Hours
                                @else
                                    Drop Off Address
                                @endif
                            </div>
                            <p> @if($form_data->booking_type === 'time')
                                This Booking Is For    {{ $form_data->estimated_time }} Hours
                                @else
                                    {{$form_data->drop_address}}
                                @endif
                            </p>
                        </li>
                        <li>
                            <div class="info">
                                Pick Up Date
                            </div>
                            <p>{{$form_data['pick_date']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Pick Up Time
                            </div>
                            <p>{{$form_data['pick_time']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Duration & Distance
                            </div>
                            <p style="font-family: -webkit-body;">About : {{number_format($form_data['estimated_time'] , 2)  }} hours & Distance :  {{number_format($form_data['estimated_distance'] , 1)}} km </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
     <section class="booking-steps-area mht ">
            <div class="container-fluid ml-4 mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="booking-steps">
                            <li>
                                <span>1</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/car.png')}}" alt="">
                                </div>
                                <div class="text">
                                    CAR CLASS
                                </div>
                            </li>
                            <li>
                                <span>2</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/options.png')}}" alt="">
                                </div>
                                <div class="text">
                                    OPTIONS
                                </div>
                            </li>
                            <li>
                                <span>3</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/login.png')}}" alt="">
                                </div>
                                <div class="text">
                                    LOGIN
                                </div>
                            </li>
                            <li class="active">
                                <span>4</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/card.png')}}" alt="">
                                </div>
                                <div class="text">
                                    CREADIT CARD
                                </div>
                            </li>
                            <li>
                                <span>5</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/check-out.png')}}" alt="">
                                </div>
                                <div class="text">
                                    CHECK OUT
                                </div>
                            </li>
                        </ul>
                        <div class="button-summary-bar">
                            <div class="icon">
                                <span class="ion-ios-arrow-thin-down"></span>
                            </div>
                            <p class="show">Select Location &amp; Date</p>
                            <p class="hide">Hide</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section class="check-out-area mt-0 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="check-out">
                        <div class="middle p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>RESERVATION BASIC INFORMATION</h2>
                                    <ul class="summary-bar">
                                        <li>
                                            <div class="info">
                                                Pick Up Address
                                            </div>
                                            <p>{{$form_data->pick_address}}</p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                @if($form_data->booking_type === 'time')
                                                     Selected Hours
                                                @else
                                                    Drop Off Address
                                                @endif
                                            </div>
                                            <p>
                                                @if($form_data->booking_type === 'time')
                                                    {{$form_data->estimated_time}}
                                                @else
                                                    {{$form_data->drop_address}}
                                                @endif
                                                 </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Pick Up Date
                                            </div>

                                            <p>{{   date_format(date_create($form_data->pick_date),'d/m/Y') }}  </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Pick Up Time
                                            </div>
                                            <p>{{$form_data->pick_time}} </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                {{--                                        {{$form_data->description}}--}}
                                            </div>
                                            <p>About : {{$form_data->estimated_time}} hours -– Distance : {{$form_data->estimated_distance}} km </p>
                                        </li>
                                    </ul>
                                    <form action="{{route('submit.booking')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="FormData" value="{{json_encode($form_data)}}">
                                        <input type="hidden" name="selected_category" value="{{json_encode($class)}}">
                                        <input type="hidden" name="selected_category" value="{{json_encode($options_data)}}">
                                        <input type="hidden" name="optionsData" value="{{json_encode($options_data)}}">
                                        <div class="bottom p-5">
                                            <!-- <button type="submit" class="btn btn-lg"> Check Out </button> -->
                                            @if($form_data->orderId == '' || $form_data->orderId == null)
                                            <div id="paypal-button-container"></div>
                                            @else
                                            <h4>Already Paid</h4>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <h2>Selected Options </h2>
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Net Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $counter = 1 @endphp
                                        @if(count($options_data) > 0 )
                                            @foreach($options_data as $option)
                                                <tr>
                                                    <th scope="row">{{$counter++}}</th>
                                                    <td class="p-0 pt-2">{{$option->selected_option}}</td>
                                                    <td>{{$option->quantity}}</td>
                                                    <td>{{$option->option_price}}</td>
                                                    <td class="text-primary ">{{$option->option_price * $option->quantity}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h2>NO Extra Option Selected</h2>
                                        @endif

                                        </tbody>
                                    </table>
                                    <ul class="summary-bar" style="font-family: monospace;">
                                        <li>
                                            <div class="info mt-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock"></i> Travel Amount  <span class="w-50 float-right"> {{$form_data->travel_amount - $form_data->tax_amount}} EURO </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock "></i> Extra Options Amount  <span class="w-50 float-right"> {{$form_data->extra_options_amount}} EURO </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock "></i> Sub Total  <span class="w-50 float-right"> {{$form_data->extra_options_amount + ($form_data->travel_amount - $form_data->tax_amount)}} EURO </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                         Tax Amount  <span class="w-50 float-right"> {{$form_data->tax_amount}} EURO </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2" style="color: #af7e2b !important; font-weight: bold;">
                                                        <i class="fa fa-eur"></i> Grand Total
                                                        <span class="w-50 float-right">
                                                            {{$form_data->net_amount}} EURO </span>

                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('js')
    <script src="https://www.paypal.com/sdk/js?client-id=AfwgD8iiaecVXLk7mrsmXPzp-DQ6VyKF6VY17vIq0pfH0JvnUWuEH4svogD8FrCr8MqvwDlSDeRxRYFL&currency=EUR"></script>
    {{-- AUXGCQW8WwUWqay1Zsmf6zCxdtcGMUqeCPbV0HqW5jqd7MurPnPBsRJIbtFi-_3K2tqlgtl0ZQjqaOdb --}} 
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) 
            {
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '{{$form_data->net_amount}}'
                }
                }]
            });
            },
            onApprove: function(data, actions) 
            {
                console.log('data');
                console.log(data);
            return actions.order.capture().then(function(details) 
            {
                console.log(details);
                // Call your server to save the transaction
                return fetch('/paypal-transaction-complete', {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    orderID: data.orderID,
                    userDetail: details,
                    bookingId: '{{$form_data->id}}',
                    _token: '{{csrf_token()}}'
                })
                }).then(function(){
                    location.href = "{{url('booking/checkout')}}/{{$form_data->id}}";
                });
            });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
