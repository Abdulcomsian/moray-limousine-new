@extends('layouts.main-home-layout')
@section('title')
    Extra Options
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Extras1.css') }}">
    <style>
        .minus,
        .plus {
            background-color: black;
            border: 1px solid black;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .fa-minus,
        .fa-plus {
            margin-top: 10px;
            color: white;
        }

        .active {
            color: #bf9c60;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 15px;
            /* line-height: 4; */
            font-weight: norma;
        }

        .number{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
@section('content-area')

    <div class="main_container">
        <div class="container" id="cont2">
            <div class="row">
                <div class="col-sm-3 bax active">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-5">
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
                        <div class="d-flex gap-5">
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

                        <div class="d-flex gap-5">
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

                        <div class="d-flex gap-5">
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

                    <form action="{{ route('extra.option.details') }}" id="options_form" method="get">
                        <input type="hidden" name="optionsData" value="" id="optionData">
                        <input type="hidden" name="formData" value="{{ json_encode($booking) }}" id="formData">
                        <input type="hidden" name="selectedClass" value="{{ json_encode($selected_category) }}"
                            id="selectedcalss">
                        <div class="container">
                            <p class=SK>Flight Information</p>
                            <div class="form-control">
                                <input type="text" id="flight"
                                    style="height: 151%; border: 1px solid black; font-size: 10px;" name="flight_no"
                                    maxlength="60" placeholder="Flight/Train Number">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-control">
                                        <input type="text" id="sign-board" style="height: 151%; border: 1px solid black"
                                            name="sign-board" maxlength="60" placeholder="MAX MUSTREMANN">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-control">
                                        <input type="text" id="ref" style="height: 151%; border: 1px solid black"
                                            name="reference_code" maxlength="60" placeholder="Reference Code">
                                    </div>
                                </div>

                            </div>
                            <div class="form-options">
                                <p class=SK>Extras</p>
                                @csrf
                                <ul class="list-group" id="options_checkboxes">
                                    @if (count($options) > 0)
                                        @foreach ($options as $option)
                                            <div class="row justify-content-between">
                                                <div class="col-md-6">
                                                    <p class="SK1">{{ $option->title }}<button class="btn SK2"
                                                            type="button">&euro; {{ $option->price }}</button></p>
                                                    <p class="SK3">
                                                        {{ \Illuminate\Support\Str::limit($option->description, 50) }}
                                                    </p>
                                                </div>

                                                    @if($option->is_quantity == 'yes')
                                                        <div class="number w-25 text-right">
                                                            <span class="minus"><i class="fa fa-minus"></i></span>
                                                            <input type="text" class="counter" readonly maxlength="{{$option->max_quantity}}" value="1" />
                                                            <span class="plus" disabled id="{{$option->max_quantity}}"><i class="fa fa-plus"></i></span>
                                                        </div>
                                                    @else
                                                        <div class="number w-25 text-right"></div>
                                                    @endif
                                                    <div class="number checkbox checkbox-success w-25">
                                                        <input id="{{ $option->id }}" style="margin-top: 60px;"
                                                            type="checkbox" name="{{ $option->title }}"
                                                            value="{{ $option->price }}">
                                                        <label for="{{ $option->id }}" style="padding-left: 0px">
                                                            Select Option
                                                        </label>
                                                    </div>                                                    
                                            </div>                                        
                                            <hr id="sline">
                                        @endforeach
                                    @endif
                                   
                                </ul>
                                <br>                        
                                <button type="submit" class="extra_submit_btn" id="btn_submit"><span class="SK23">Continue</span><i
                                    class="fa-solid fa-arrow-trend-up SK33"></i></button>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="card" id="curd2">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <p id="CK" class="m-0 p-0">Rides Summary</p>
                            </div>
                        </div>

                        From
                        <p title="{{ $booking['pick_address'] }}"><i class="fa-solid fa-location-dot"></i>
                            {{ substr($booking['pick_address'], 0, 40) }}...</p>
                        <div class="info">
                            @if ($form_data->booking_by === 'distance')
                                To
                            @else
                                Hours
                            @endif
                        </div>

                        @if ($form_data->booking_by === 'time')
                            <p>This Booking Is For :{{ $form_data->selected_hour }} Hour's</p>
                        @else
                            <p title="{{ $booking['drop_address'] }}"><i class="fa-solid fa-location-dot"></i>
                                {{ substr($booking['drop_address'], 0, 40) }}...</p>
                        @endif

                        <a><i class="fa-solid fa-calendar-days"> </i><span
                                class="CK5">{{ date('d - M - Y', strtotime($booking['pick_date'])) }}</span></a><br>
                        <a><i class="fa-solid fa-clock "> </i><span
                                class="CK5">{{ $booking['pick_time'] }}</span></a><br>
                        <img src="{{ asset('files/vehicleCategory/category_img') }}/{{ $selected_category->picture }}"
                            class="CK6">

                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p class="CK8" class="">{{ number_format($booking['estimated_distance'], 1) }}
                                    km</p>
                            </div>
                            <div class="">
                                <p class="CK8" class="">{{ number_format($booking['estimated_time'], 2) }}</p>
                            </div>
                        </div>


                        <hr id="s1line">
                        <p class="CK8">{{ $selected_category->name }}</p>
                        <div class="name-car s-categories">
                            @if (count($selected_category->subTypes) > 0)
                                @foreach ($selected_category->subTypes as $type)
                                    <p>{{ $type->title }}</p>
                                @endforeach
                            @endif
                        </div>
                        {{-- <hr id="s1line">
                        <p class="CK8">Extra Options</p>
                        <p class="CK10">1 x Child Seat -$5.00</p>
                        <p class="CK10">1 x Bouquet of Flower - $75.00</p>
                        <p class="CK10">2 x Vodka Bottle -$78.00</p>
                        <p class="CK10">1 x Bodyguard Service -$750.00</p> --}}

                    </div>
                    <div class="card" id="curd2222">
                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p class="CK10">Selected Vehicles</p>
                            </div>
                            <div class="">
                                <p class="CK10">&euro; {{ $travel_amount }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p class="CK10">Extras</p>
                            </div>
                            <div class="">
                                <p class="CK10">&euro; 00.00</p>
                            </div>
                        </div>

                        <hr id="s1line">
                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p class="LK7">Total</p>
                            </div>
                            <div class="">
                                <p class="LK7">&euro; {{ $travel_amount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            if ($("#bookforsomeoneelse").prop('checked', true)) {
                $(".forsomeone").removeClass('d-none').show();
            } else {
                $(".forsomeone").addClass('d-none').hide();
            }
            if ($("#bookdtls").prop('checked', true)) {
                $(".bookdtls").removeClass('d-none').show();
            } else {
                $(".bookdtls").addClass('d-none').hide();
            }
        });
        //scroll down show summary bar on top
        $(window).scroll(function() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if ($(".summary-bar-area").hasClass('open')) {
                    $(".summary-bar-area").attr("style", "position:fixed;top:0px !important;z-index:999999");
                    $(".summary-bar-area").addClass("custom-top-setter")
                }
            } else {
                $(".summary-bar-area").attr("style", "");
                $(".summary-bar-area").removeClass("custom-top-setter")
            }
        });
        //click on booking for some one else check box
        $(document).on('change', '#bookforsomeoneelse', function() {
            if ($(this).is(':checked')) {
                $(".forsomeone").removeClass('d-none').show();
            } else {
                $(".forsomeone").addClass('d-none').hide();
            }
        });
        $(document).on('change', "#bookdtls", function() {
            if ($(this).is(':checked')) {
                $(".bookdtls").removeClass('d-none').show();
            } else {
                $(".bookdtls").addClass('d-none').hide();
            }
        });

        function getLatLong() {
            let pick_latitude = parseFloat({{ $booking->lat_pck }});
            let pick_longitude = parseFloat({{ $booking->long_pck }});
            let drop_latitude = parseFloat({{ $booking->lat_drop }});
            let drop_longitude = parseFloat({{ $booking->long_drop }});
            return [pick_latitude, pick_longitude, drop_latitude, drop_longitude];
        }

        $(document).ready(function() {
            // Replace 'current-page' with the actual name of your page or route
            var currentPage = window.location.href;

            var page = new URL(currentPage);
            var url = page.pathname;
            if (url == '/booking/booking-details') {
                url = 'Extras';
                $('.bax').removeClass('active');
                $('.bax:contains(' + url + ')').addClass('active');
            }
        });
    </script>
    <script src="{{ asset('js/Extras.js') }}"></script>
    <script src="{{ url('js/front-end/select-options.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M1AxeqGt3ozXhX0qeeVP8CcA0OZIkgk&libraries=places&callback=initMap"
        async defer></script>
@endsection
