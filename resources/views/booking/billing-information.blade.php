@extends('layouts.main-home-layout')
@section('title')
    Payment Details
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/payment1.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Vehicle.css') }}">
@endsection

@section('content-area')
    <style>
        .header-04 .bottom-header {
            background: rgb(30, 30, 30);
        }

        .summary-bar-area.open {
            top: 125px !important;
        }

        .active {
            color: #bf9c60;
        }
    </style>
    <div class="main_container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container" id="cont2">
            <div class="row">
                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-5 booking-step">
                            <div class="mdclass">
                                <i class="fa-solid fa-car-side" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Vehicle</p>
                            </div>
                        </div>

                        <div class="mdclass">
                            <p class="AK1"> 01</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-5 booking-step">
                            <div class="mdclass">
                                <i class="fa-solid fa-sliders" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Extras</p>
                            </div>
                        </div>
                        <div class="mdclass">
                            <p class="AK1"> 02</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

                {{-- <div class="col-sm-3 ">
                    <div class="d-flex justify-content-between">

                        <div class="d-flex gap-5">
                            <div class="mdclass">
                                <i class="fa-solid fa-people-group" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Details</p>
                            </div>
                        </div>
                        <div class="mdclass">
                            <p class="AK1"> 03</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div> --}}

                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">

                        <div class="d-flex gap-5 booking-step">
                            <div class="mdclass">
                                <i class="fa-regular fa-credit-card" id="ikons"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Payment</p>
                            </div>
                        </div>

                        <div class="mdclass">
                            <p class="AK1"> 03</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">

                        <div class="d-flex gap-5 booking-step">
                            <div class="mdclass">
                                <i class="fa fa-check" id="ikons" aria-hidden="true"></i>
                            </div>
                            <div class="mdclass mx-3">
                                <p class="AK">Checkout</p>
                            </div>
                        </div>

                        <div class="mdclass">
                            <p class="AK1"> 04</p>
                        </div>

                    </div>
                    <hr id="lien">
                </div>

            </div>
        </div>
        <!-- PASSENGER DETAIL -->
        <div class="container" id="cont3">
            <div class="row">
                <div class="col-md-8">
                    <p class="SK">Reservation Information</p>

                    @if (count($options_data) > 0)
                    <h2>Overview (Extras)</h2>
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
                            @foreach ($options_data as $option)
                                <tr>
                                    <th scope="row">{{ $counter++ }}</th>
                                    <td class="p-0 pt-2">{{ $option->selected_option }}</td>
                                    <td>{{ $option->quantity }}</td>
                                    <td>&euro; {{ $option->option_price }}</td>
                                    <td class="text-primary ">
                                        &euro; {{ $option->option_price * $option->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                    <div class="row reservation-form">
                        <div class="col-md-6">
                            <label for="pickAddress">From</label>
                            <input type="text" value="{{ $form_data->pick_address }}" disabled />
                        </div>
                        <div class="col-md-6">
                            <div>
                                @if ($form_data->booking_type === 'time')
                                    <label for="pickAddress">Hours</label>
                                @else
                                    <label for="pickAddress">To</label>
                                @endif
                            </div>
                                @if ($form_data->booking_type === 'time')
                                    <input type="text" value="{{ $form_data->estimated_time }}" disabled />
                                @else
                                    <input type="text" value="{{ $form_data->drop_address }}" disabled />
                                @endif

                        </div>
                    </div>
                    <div class="row reservation-form">
                        <div class="col-md-12">
                            <label for="date">Date</label>
                            <input type="text" value="{{ date_format(date_create($form_data->pick_date), 'd/m/Y') }}"
                                disabled />
                            <label for="date">Time</label>
                            <input type="text" value="{{ $form_data->pick_time }}" disabled />
                        </div>
                    </div>
                    <div class="row reservation-form">
                        <div class="col-md-6">
                            <label for="date">Total Time</label>
                            <input type="text" value="{{ $form_data->estimated_time }} Hours" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="date">Total Distance</label>
                            <input type="text" value="{{ $form_data->estimated_distance }} km" disabled />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form id="payment-form" action="{{ route('submit.booking') }}" method="post">
                            @csrf
                            <input type="hidden" name="FormData" value="{{ json_encode($form_data) }}">
                            <input type="hidden" name="bookingId" value="{{ json_encode($form_data->id) }}">
                            <input type="hidden" name="selected_category" value="{{ json_encode($class) }}">
                            <input type="hidden" name="selected_category" value="{{ json_encode($options_data) }}">
                            <input type="hidden" name="optionsData" value="{{ json_encode($options_data) }}">
                            <div class="bottom p-5 col-md-12 strip-container">
                                @if ($form_data->orderId == '' || $form_data->orderId == null)
                                    <div id="strip-button-container">
                                    </div>
                                    <br>
                                    <p><img class="payment-card--image" src="{{ asset('images/creditcard.png') }}" alt="credit card icons"
                                            style="width:30%;" /></p>
                                    {{-- <button>Pay With Credit Card</button> --}}
                                    <button class="btn" id="bttn">
                                        <span>Book Now</span><i class="fa-solid fa-arrow-trend-up" id="SK8"></i>
                                    </button>



                                    {{-- <div id="paypal-button-container">
                        </div>
                        <br> --}}
                                    {{-- <p><img src="{{ asset('images/creditcard.png') }}" alt="credit card icons" style="width:30%;" /></p> --}}

                                    {{-- <p style="padding:5px;margin-top:30px;color: #000;font-size: 16px;border-radius:50px;background: #fff;border: 1px solid goldenrod !important;">Mit Kreditkarte ohne Paypal direkt bezahlen uber den Paypal Button oben! </p> --}}
                                @else
                                    <h4>Amount Payed!</h4>
                                @endif
                            </div>
                        </form>
                    </div>


                </div>

                {{-- sidebar  --}}
                <div class="col-md-4">
                    <div class="card" id="curd2">
                        <div class="d-flex justify-content-between align-items-center"> <div><i class="fa fa-clock"></i><span> Amount</span></div><span
                                class="CK5">{{ $form_data->travel_amount - $form_data->tax_amount }}
                                EUR</span></div>
                        <div class="d-flex justify-content-between align-items-center"> <div><i class="fa fa-clock"></i><span> Extras</span></div><span class="CK5">{{ $form_data->extra_options_amount }}
                                EUR </span></div>
                        <div class="d-flex justify-content-between align-items-center"> <div><i class="fa fa-clock"></i><span> Summery</span></div><span
                                class="CK5">{{ $form_data->extra_options_amount + ($form_data->travel_amount - $form_data->tax_amount) }}
                                EUR </span></div>
                        {{ $tax_rate }}% MwSt. <span class="w-50 float-right">
                            {{ $form_data->tax_amount }} EUR </span>
                        <div style="margin-top: 10px;" class="totalPayment"> <div><i class="fa fa-eur"></i> <span>Total</span></div><span
                                class="CK5">{{ $form_data->extra_options_amount + $form_data->travel_amount }}
                                EUR </span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AfwgD8iiaecVXLk7mrsmXPzp-DQ6VyKF6VY17vIq0pfH0JvnUWuEH4svogD8FrCr8MqvwDlSDeRxRYFL&currency=EUR">
    </script>
    {{-- Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1 --}}
    <script src="https://js.stripe.com/v3/"></script>
    <!-- &disable-funding=credit,card <script
        src="https://www.paypal.com/sdk/js?client-id=AUXGCQW8WwUWqay1Zsmf6zCxdtcGMUqeCPbV0HqW5jqd7MurPnPBsRJIbtFi-_3K2tqlgtl0ZQjqaOdb&currency=EUR">
    </script> -->



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
        $(document).ready(function() {
            // var stripe = Stripe(
            //     'pk_test_51O79eiJ1EtA0iMLvT0268GL0tPpUIxwatoUqobeqd13qCAhsHOZRkKDGs0yAgZmNZBwfApo5uMaJn9G0Yrhx14Vf00ga5LlUGa'
            // );
            let publicStripeKey = '{{env('STRIPE_PUBLIC_KEY')}}'
            var stripe = Stripe(
                publicStripeKey
            );

            // console.log(stripe); 
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
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#strip-button-container');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
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

            function stripeTokenHandler(token) {
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

    
        
            var currentPage = window.location.href;

            var page = new URL(currentPage);
            var url = page.pathname;
            if (url == '/booking/extra-options-details') {
                url = 'Payment';
                $('.bax').removeClass('active');
                $('.bax:contains(' + url + ')').addClass('active');
            }
        });
    </script>
@endsection
