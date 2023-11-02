@extends('layouts.main-home-layout')
@section('title')
    Booking Details
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Detail12.css') }}">
    <style>
         .active {
            color: #bf9c60;
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
                    <p id=SK> Passenger Detail</p>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="editbox" placeholder="Name" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="editbox" placeholder="Last Name" />
                        </div>
                    </div>
                    <div class="row gap-5">
                        <div class="col-md-6">
                            <div class="form-control">
                                <input required type="text" name="input" />
                                <label>Email Address </label>
                                <div class="border-around"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-control">
                                <input required type="text" name="input" />
                                <label>Phone Number </label>
                                <div class="border-around"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p id=SK1>Options</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="cars" id="dropdown">
                                <option value="passenger">Passenger</option>
                                <option value="passenger">Passenger1</option>
                                <option value="passenger">Passenger2</option>
                                <option value="passenger">Passenger3</option>
                                <option value="passenger">Passenger4</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="cars" id="dropdown">
                                <option value="luggage">Luggage</option>
                                <option value="luggage">Luggage1/option>
                                <option value="luggage">Luggage2</option>
                                <option value="luggage">Luggage3</option>
                                <option value="luggage">Luggage4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea id="messagebox" rows="4" cols="50" placeholder="Notes to Drivers"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn " id="bttn"><span>Continue</span><i
                            class="fa-solid fa-arrow-trend-up" id="SK3"></i></button>
                </div>

                <div class="col-md-4">
                    <div class="card" id="curd2">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <p id="" class="CK m-0 p-0">Rides Summary</p>
                            </div>
                            <div class="">
                                <a href="#" class="CK2">Edit</a>
                            </div>
                        </div>

                        <a><i class="fa-solid fa-location-dot" id="CK6"> </i><span class="CK5">Manchester,
                                UK</span></a><br>
                        <a><i class="fa-solid fa-location-dot" id="CK333"> </i><span class="CK44">London,
                                UK</span></a><br>
                        <a><i class="fa-solid fa-calendar-days" id="CK3"> </i><span class="CK4">Thur, Oct 06,
                                2022</span></a><br>
                        <a><i class="fa-solid fa-clock" id="Ck3"> </i><span class="CK4">6 PM : 15</span></a><br>
                        <img src="images/map.jpg" class="" id="CK7">

                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p id="" class="CK8">Total Distance</p>
                            </div>
                            <div class="">
                                <p class="CK9">Total time</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p class="CK10">311/km/194 miles</p>
                            </div>
                            <div class="CK11">
                                <p class="CK11">3h 43m</p>
                            </div>
                        </div>

                        <hr id="s1line">
                        <p class="LK">Vehicle</p>
                        <p class="LK1">Mercedes-Benz E220</p>
                        <hr id="s1line">
                        <p class="LK">Extra Options</p>
                        <p class="LK2">1 x Child Seat -$5.00</p>
                        <p class="LK2">1 x Bouquet of Flower - $75.00</p>
                        <p class="LK2">2 x Vodka Bottle -$78.00</p>
                        <p class="LK2">1 x Bodyguard Service -$750.00</p>

                    </div>
                    <div class="card" id="curd2222">
                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p id="LK3" class="">Selected Vehicles</p>
                            </div>
                            <div class="">
                                <p id="LK4" class="">$174</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p id="LK3" class="">Extras</p>
                            </div>
                            <div class="">
                                <p id="LK4" class="">$90.25</p>
                            </div>
                        </div>

                        <hr id="s1line">
                        <div class="d-flex justify-content-between align-items-center m-0 p-0">
                            <div class="">
                                <p id="LK7" class="">Total</p>
                            </div>
                            <div class="">
                                <p id="LK8" class="">$909.47</p>
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
        $(document).ready(function() {
            // Replace 'current-page' with the actual name of your page or route
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