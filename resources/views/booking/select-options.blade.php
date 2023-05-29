@extends('layouts.main-home-layout')
@section('title')
Extra Options
@endsection
@section('content-area')

<style>
    .gm-style-mtc,
    .gm-style-mtc {
        display: none;
    }

    .header-04 .bottom-header {
        background: rgb(30, 30, 30);
    }

    .summary-bar-area.open {
        top: 125px !important;
    }

    label {
        font-weight: bold;
    }

    input[type="checkbox"] {
        top: 3px !important;
        left: auto !important;
    }

    .inputerror {
        border: 1px solid red !important;
    }
</style>
<section class="summary-bar-area open">
    <div class="container-fluid mr-0 ml-5">
        <div class="row">
            <div class="col-md-12 p-0">
                <ul class="summary-bar">
                    <li>
                        <div class="info">
                            Von
                        </div>
                        <p title="{{$booking['pick_address']}}">{{substr($booking['pick_address'],0,40)}}...</p>
                    </li>
                    <li>
                        <div class="info">
                            @if($form_data->booking_by === 'distance')
                            Nach
                            @else
                            Stunden
                            @endif
                        </div>
                        @if($form_data->booking_by === 'time')
                        <p>This Booking Is For :{{$form_data->selected_hour}} Hour's</p>
                        @else
                        <p title="{{$booking['drop_address']}}">{{substr($booking['drop_address'],0,40)}}...</p>
                        @endif

                    </li>
                    <li>
                        <div class="info">
                            Datum
                        </div>
                        <p>{{date('d - M - Y',strtotime($booking['pick_date'])) }}</p>
                    </li>
                    <li>
                        <div class="info">
                            Zeit
                        </div>
                        <p>{{$booking['pick_time']}}</p>
                    </li>
                    <li>
                        <div class="info">
                            Dauer
                        </div>
                        <p style="font-family: -webkit-body;">voraussichtlich : {{number_format($booking['estimated_time'] , 2)  }} – Strecke : {{number_format($booking['estimated_distance'] , 1)}} km </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="booking-steps-area mht">
    <div class="container-fluid ml-4">
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
                            <img src="{{asset('images/booking/login.png')}}" alt="">
                        </div>
                        <div class="text">
                            LOGIN
                        </div>
                    </li>
                    <li class="active">
                        <span>3</span>
                        <div class="icon">
                            <img src="{{asset('images/booking/options.png')}}" alt="">
                        </div>
                        <div class="text">
                            OPTIONEN
                        </div>
                    </li>

                    <li>
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
                <div class="button-summary-bar open mt-3">
                    <div class="icon">
                        <span class="ion-ios-arrow-thin-down"></span>
                    </div>
                    <p class="show">Ihre Auswahl </p>
                    <p class="hide">Hide</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container selected-class-content">
    <div class="row">
        <div class="col-md-12">
            <h2 class="p-2"> Ausgewählte Fahrzeugklasse </h2>
            <div class="select-car" style="border: 1px solid #bf9c60; border-radius: 4px">
                <div class="row">
                    <div class="box-text  col-md-8 pr-2">
                        <div class="bags-seats">
                            <ul class="list-inline pull-right">
                                <li class="list-inline-item"><img src="{{asset('images/people.png')}}" class="pr-2 pb-1" alt=""> Max . <span class="s-max-seats mr-2">{{$selected_category->max_seats}} </span> </li>
                                <li class="list-inline-item"><img src="{{asset('images/vali.png')}}" class="pr-2 pb-1" alt=""> Max . <span class="s-max-bags mr-2"> {{$selected_category->max_bags}}</span></li>
                            </ul>
                        </div>
                        <div class="top">
                            <h3 class="s-title">{{$selected_category->name}}</h3>
                            <div class="name-car s-categories">
                                @if(count($selected_category->subTypes) > 0)
                                @foreach($selected_category->subTypes as $type)
                                {{$type->title}} ,
                                @endforeach
                                oder ähnlich
                                @endif
                            </div>
                        </div>
                        <img class="s-image" src="{{asset('files/vehicleCategory/category_img')}}/{{$selected_category->picture}}" alt="">
                        <div class="content s-description">
                            <p>{!! $selected_category->description !!}</p>
                        </div>
                        <div class="bottom">
                            <div class="price">
                                <div class="w-100">
                                    <span style="font-size: 1.8rem">&euro; </span> <span class="s-price">{{$travel_amount}} </span>
                                </div>
                                <small>( Alle Preise enthalten MwSt., Gebühren und Trinkgelder. )</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="route_map" style="height: 16rem;border: 2px solid #bf9c60; border-radius: 14px;"></div>
                        <ul class="list-group">
                            <li class="list-group-item location-list" style="border-top: none;">
                                <span class="w-100" style="font-size: 1.2rem;"> Von </span>
                                <span class="d-inline"> <img src="{{asset('images/location-icon.png')}}" class="d-inline" style="max-height: 1.3rem; margin-top: 1px; margin-right: 10px" alt="icon">
                                    {{$booking->pick_address}}</span>
                            </li>
                            <li class="list-group-item location-list">
                                <span class="w-100" style="font-size: 1.2rem;"> Nach </span>
                                <span class="float-right d-inline" style="width: 90%;"> <img src="{{asset('images/location-icon.png')}}" style="max-height: 1.3rem; margin-top: -11px; margin-right: 10px" alt="icon">
                                    {{$booking->drop_address ? $booking->drop_address : 'This booking is for '.$booking->estimated_time .' Hours'}} </span>
                            </li>
                            <li class="list-group-item location-list">
                                <span class="w-100" style="font-size: 1.2rem;"> Strecke & Dauer </span>
                                <div class="w-100">
                                    <i class="fa fa-location-arrow pr-3" style="color: #b97a57;"></i>
                                    <strong>
                                        {{number_format($booking->estimated_distance, 2)}} Km
                                    </strong>
                                </div>
                                <div class="w-100">
                                    <i class="fa fa-clock-o pr-3" style="color: #b97a57;"></i>

                                    <strong>{{number_format($booking->estimated_time, 2)}} Stunden</strong>
                                </div>
                            </li>
                            <li class="list-group-item location-list">
                                <span class="w-100" style="font-size: 1.2rem;"> Datum & Zeit </span>
                                <span> <i class="fa fa-calendar pr-2" style="color: #b97a57;"></i> {{date('d - M - Y',strtotime($booking['pick_date'])) }}</span>
                                <span class="pl-4"> <i class="fa fa-clock-o pr-2" style="color: #b97a57;"></i> {{$booking->pick_time }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form">
    <form action="{{route('extra.option.details')}}" id="options_form" method="get">
        <input type="hidden" name="optionsData" value="" id="optionData">
        <input type="hidden" name="formData" value="{{json_encode($booking)}}" id="formData">
        <input type="hidden" name="selectedClass" value="{{json_encode($selected_category)}}" id="selectedcalss">
        <section class="options-area pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="heading">
                            <h3 class="mb-3">Flight Information</h3>
                        </div>
                        <div class="card-body pt-2" style="border-top: 1px solid #bf9c60;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="flight">Flugdaten</label>
                                        <input type="text" id="flight" name="flight_no" class="form-control" maxlength="60" placeholder="LH 2020">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sign-board">Abholschild</label>
                                        <input type="text" id="sign-board" name="sign_board" placeholder="MAX MUSTREMANN" class="form-control" maxlength="60">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ref">Reference Code</label>
                                        <input type="text" id="ref" name="reference_code" class="form-control" placeholder="Reference Code" maxlength="60">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 offset-2">
                        <div class="form-options pt-4">
                            <h2 class="pb-3">
                                Extras
                            </h2>
                            @csrf
                            <ul class="list-group" id="options_checkboxes">
                                @if(count($options) > 0)
                                @foreach($options as $option)
                                <li class="list-group-item d-flex" style="border: 1px solid rgb(191, 156, 96);border-left: none; border-right: none; border-radius: 0;">
                                    <strong class="w-25"> {{$option->title}}</strong>
                                    @if($option->is_quantity == 'yes')
                                    <div class="number w-25 text-right">
                                        <small> Anzahl : </small>
                                        <span class="minus"><i class="fa fa-minus"></i></span>
                                        <input type="text" class="counter" readonly maxlength="{{$option->max_quantity}}" value="1" />
                                        <span class="plus" disabled id="{{$option->max_quantity}}"><i class="fa fa-plus"></i></span>
                                    </div>

                                    @else
                                    <div class="number w-25 text-right"></div>
                                    @endif
                                    <div class="w-25 text-right">
                                        <label>
                                            € {{$option->price}}
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-success w-25 text-right">
                                        <input id="{{$option->id}}" class="styled w-50 h-75" type="checkbox" name="{{$option->title}}" value="{{$option->price}}">
                                        <label for="{{$option->id}}">
                                            Auswählen
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="booksomeone" id="bookforsomeoneelse">
                                <label>Booking For SomeoneElse
                                    <!-- Buchung für Dritte vornehmen -->
                                </label>
                            </div>
                            <div class="d-none forsomeone">
                                <div class="one-half first-name">
                                    <label for="firstname">Vorname <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" id="firstname" placeholder=" Ihr Vorname">
                                </div>
                                <div class="one-half last-name">
                                    <label for="lastname">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" id="lastname" placeholder="Ihr Name">
                                </div>
                                <div class="one-half email">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="Ihre Email">
                                </div>

                                <div class="one-half phone">
                                    <label for="phone">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" name="phone_number" id="phone" placeholder="+49 175 678 91 00">
                                </div>
                                <div class="one-half phone">
                                    <label for="phone">Firma/Company <span class="text-danger">*</span></label>
                                    <input type="text" name="company" id="company" placeholder="company">
                                </div>
                                <div class="one-half phone">
                                    <label for="phone">Billing Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" placeholder="address">
                                </div>
                                <div class="one-half phone">
                                    <label for="phone">Postcode </label>
                                    <input type="text" name="postcode" id="postcocde" placeholder="plz/Postcode">
                                </div>
                                <div class="one-half phone">
                                    <label for="phone">Land </label>
                                    <input type="text" name="land" id="land" placeholder="Land/Country">
                                </div>
                                <!-- <div class="one-half phone">
                                <label for="phone2">Flugdaten</label>
                                <input type="text" name="flight_number" id="phone2" placeholder="LH 2020 " maxlength="50">
                            </div>
                            <div class="one-half phone">
                                <label for="phone3">Abholschild</label>
                                <input type="text" name="banner_words" id="phone3" placeholder="MAX MUSTERMANN" maxlength="50">
                            </div>-->

                                <div class="infomation">
                                    <label for="infomation">weitere Wünsche</label>
                                    <textarea name="additional_information" id="infomation" placeholder="Haben Sie besondere Wünsche (z.B. Getränke)"></textarea>
                                </div>
                            </div>
                            <br>
                            <!-- workin for new booking fields -->

                            <!-- Checkbox -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="bookdtls" id="bookdtls">
                                <label class="form-check-label" for="exampleCheck1">Billing Details</label>
                            </div>
                            <div class="d-none bookdtls">
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="Billing address" name="bill_address" class="form-control" value="@if(isset($enduser_billing_details->billing_address)){{$enduser_billing_details->billing_address}}@endif" />
                                            <label class="form-label" for="form3Example1">Billing address</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="Postcode" name="post_code" class="form-control" value="@if(isset($enduser_billing_details->billing_postal_code)){{$enduser_billing_details->billing_postal_code}}@endif" />
                                            <label class="form-label" for="form3Example2">Postcode</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="place" name="place" class="form-control" value="@if(isset($enduser_billing_details->billing_city)){{$enduser_billing_details->billing_city}}@endif" />
                                            <label class="form-label" for="form3Example3">Place</label>
                                        </div>
                                    </div>
                                    <!-- Password input -->
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="country" name="country" class="form-control" value="@if(isset($enduser_billing_details->billing_country)){{$enduser_billing_details->billing_country}}@endif" />
                                            <label class="form-label" for="form3Example4">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="Company" name="Company" class="form-control" value="@if(isset($enduser_billing_details->skype_id)){{$enduser_billing_details->skype_id}}@endif" />
                                            <label class="form-label" for="form3Example3">Company</label>
                                        </div>
                                    </div>
                                    <!-- Password input -->
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="vat" name="vat" class="form-control" value="@if(isset($enduser_billing_details->vat_no)){{$enduser_billing_details->vat_no}}@endif" />
                                            <label class="form-label" for="form3Example4">Vat/Ust</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of new work -->
                            <div class="btn-submit">
                                <button type="submit" id="btn_submit">Weiter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
    </form>
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

    function getLatLong() 
    {
        let pick_latitude = parseFloat({{$booking->lat_pck}});
        let pick_longitude = parseFloat({{$booking->long_pck}});
        let drop_latitude = parseFloat({{$booking->lat_drop}});
        let drop_longitude = parseFloat({{$booking->long_drop}});
        return [pick_latitude, pick_longitude, drop_latitude, drop_longitude];
    }
</script>

<script src="{{url('js/front-end/select-options.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHpSgm-hy0_G_NC6PynKEYgASntQIi1Y&libraries=places&callback=initMap" async defer></script>

@endsection