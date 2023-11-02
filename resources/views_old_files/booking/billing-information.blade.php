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
    <section class="summary-bar-area open">
        <div class="container-fluid mr-0 ml-5">
            <div class="row">
                <div class="col-md-12 p-0">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Pick Up Address
                            </div>
                            <p title="{{$form_data['pick_address']}}">{{ substr($form_data['pick_address'], 0, 40)}}...</p>
                        </li>
                        <li>
                            <div class="info">
                                @if($form_data->booking_type === 'time')
                                    Selected Hours
                                @else
                                    Drop Off Address
                                @endif
                            </div>
                            @if($form_data->booking_type === 'time')
                                <p> This Booking Is For    {{ $form_data->estimated_time }} Hours</p>
                                @else
                                    <p title="{{$form_data['drop_address']}}">{{substr($form_data['drop_address'],0,40)}}...</p>
                                @endif
                        </li>
                        <li>
                            <div class="info">
                                Datum
                            </div>
                            <p>{{$form_data['pick_date']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Zeit
                            </div>
                            <p>{{$form_data['pick_time']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Dauer
                            </div>
                            <p style="font-family: -webkit-body;">voraussichtlich : {{number_format($form_data['estimated_time'] , 2)  }} Strecke :  {{number_format($form_data['estimated_distance'] , 1)}} km </p>
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
                                    FAHRZEUGKLASSE
                                </div>
                            </li>
                            <li>
                                <span>2</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/options.png')}}" alt="">
                                </div>
                                <div class="text">
                                    OPTIONEN
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
                                <div class="text text-uppercase">
                                    Bezahlung
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
                        <div class="button-summary-bar open">
                            <div class="icon">
                                <span class="ion-ios-arrow-thin-down"></span>
                            </div>
                            <p class="show">Ihre Auswahl</p>
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
                     @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                                    @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{session('error')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    <div class="check-out">
                        <div class="middle p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Reservierungsinformationen</h2>
                                    <ul class="summary-bar">
                                        <li>
                                            <div class="info">
                                                Von                                            </div>
                                            <p>{{$form_data->pick_address}}</p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                @if($form_data->booking_type === 'time')
                                                    Stunden
                                                @else
                                                    Nach
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
                                                Datum
                                            </div>

                                            <p>{{   date_format(date_create($form_data->pick_date),'d/m/Y') }}  </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Zeit
                                            </div>
                                            <p>{{$form_data->pick_time}}</p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Dauer    {{--                                        {{$form_data->description}}--}}
                                            </div>
                                            <p>voraussichtlich : {{$form_data->estimated_time}} <br>Strecke : {{$form_data->estimated_distance}} km </p>
                                        </li>
                                    </ul>

                                    <form id="payment-form" action="{{route('submit.booking')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="FormData" value="{{json_encode($form_data)}}">
                                        <input type="hidden" name="bookingId" value="{{json_encode($form_data->id)}}">
                                        <input type="hidden" name="selected_category" value="{{json_encode($class)}}">
                                        <input type="hidden" name="selected_category" value="{{json_encode($options_data)}}">
                                        <input type="hidden" name="optionsData" value="{{json_encode($options_data)}}">
                                        <div class="bottom p-5">


                                            @if($form_data->orderId == '' || $form_data->orderId == null)
                                           <div id="strip-button-container">
                                            </div>
                                            <br>
                                            <button>Pay With Credit Card</button>
                                            <p><img src="{{ asset('images/creditcard.png') }}" alt="credit card icons" style="width:30%;" /></p>


                                             {{-- <div id="paypal-button-container">
                                            </div>
                                            <br> --}}
											{{-- <p><img src="{{ asset('images/creditcard.png') }}" alt="credit card icons" style="width:30%;" /></p> --}}

											{{-- <p style="padding:5px;margin-top:30px;color: #000;font-size: 16px;border-radius:50px;background: #fff;border: 1px solid goldenrod !important;">Mit Kreditkarte ohne Paypal direkt bezahlen uber den Paypal Button oben! </p> --}}
                                            @else
                                            <h4>Betrag Bezahlt!</h4>
                                            @endif
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <h2>Übersicht</h2>
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Anzahl</th>
                                            <th scope="col">Betrag</th>
                                            <th scope="col">Total</th>
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
                                            <h2>keine weiteren Optionen ausgewählt</h2>
                                        @endif

                                        </tbody>
                                    </table>
                                    <ul class="summary-bar" style="font-family: monospace;">
                                        <li>
                                            <div class="info mt-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock"></i> Betrag<span class="w-50 float-right"> {{$form_data->travel_amount - $form_data->tax_amount}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock "></i> Extras  <span class="w-50 float-right"> {{$form_data->extra_options_amount}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock "></i> Summe  <span class="w-50 float-right"> {{$form_data->extra_options_amount + ($form_data->travel_amount - $form_data->tax_amount)}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">

                                                        {{$tax_rate}}% MwSt.  <span class="w-50 float-right">  {{$form_data->tax_amount}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2" style="color: #af7e2b !important; font-weight: bold;">
                                                        <i class="fa fa-eur"></i> Total
                                                        <span class="w-50 float-right">
                                                            {{$form_data->extra_options_amount + ($form_data->travel_amount)}} EUR </span>

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
    {{-- Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1 --}}
	<script src="https://js.stripe.com/v3/"></script>
<!-- &disable-funding=credit,card <script src="https://www.paypal.com/sdk/js?client-id=AUXGCQW8WwUWqay1Zsmf6zCxdtcGMUqeCPbV0HqW5jqd7MurPnPBsRJIbtFi-_3K2tqlgtl0ZQjqaOdb&currency=EUR"></script> -->



    {{-- <script>
        paypal.Buttons({
	style: {
	 layout: 'horizontal',
	 fundingicons: 'true',
	},
	funding: {
	 allowed: [ paypal.FUNDING.CARD ],

	},
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '{{$form_data->net_amount}}'
                }
                }]
            });
            },
            onApprove: function(data, actions) {
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
        $(window).scroll(function() {
             if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if($(".summary-bar-area").hasClass('open'))
                {
                  $(".summary-bar-area").attr("style","position:fixed;top:0px !important;z-index:999999");
                }
             }else{
                $(".summary-bar-area").attr("style","");
             }
        });

	</script> --}}




<script>
    $(document).ready(function (){
        var stripe = Stripe('pk_test_51LevsRISpHce1qMwKr8rZn4M1gkcDDYWjJSu5Y3JVsTVrJKOOjXhQ1Xyfz3Qs8PrzSxv5PL65iZYRi2WuyOTZ1BX00ewppUhkw');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.

        var style = {
            base: {
                color: "#32325d",
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#32325d"
                }
            },
            invalid: {
                fontFamily: 'Arial, sans-serif',
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#strip-button-container');

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the customer that there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token)
        {
            // Insert the token ID into the form so it gets submitted to the server

            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            hiddenInput.setAttribute('style', "border:1px");
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    })
</script>

@endsection
