@extends('layouts.main-home-layout')
@section('title')
    Home
@endsection
@section('content-area')

    <style>
        .img-slide-moray{
            width: 100%;
        }
        .navigation{
            display:block  !important;
            text-align: center;
            margin-top: 15px;
        }
        .pac-item {
            padding: 6px;
            font-size: 0.9rem;
            border-top: 1px solid #ef9657;
        }
        .carousel-control-next, .carousel-control-prev{
            display: inline-block !important;
            width: 5% !important;
        }
        .pac-icon {
            padding-top: 1px;
            background: url('{{ asset('images/icon/icon4.PNG') }}') no-repeat center !important;
            background-size: cover !important;
        }

        .pac-matched {
            font-size: 0.9rem
        }

        .theme-color {
            color: #6D6643;
        }

        .form-error {
            color: #ef9657;
        }

        .tp-splitted {
            font-size: 3rem;

        }

        .change_bg {
            background-color: white !important;
        }

        .datetimepicker {
            padding: 15px;
            margin-top: 0;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            direction: ltr;
            background-color: #151515;
            width: 300px !important;
            left: 844px !important;
            /* top: 392.5px !important; */
        }

        .schedule-booking .form-booking select {
            position: relative;
            z-index: 11;
            border-bottom: 2px solid #84797980;
            padding: 4px 4px 7px 4px;
            font-family: inherit;
        }

        .schedule-booking .form-booking select option {
            color: #ffff !important;
            background: #292828;
            z-index: 11;
            font-size: 1.5rem;
            font-family: inherit;

        }

        .cont2{
            background-image: url("{{ \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE)) : asset('images/slider/home04.jpg') }}") !important;
        }

        #pick-date,
        #pick-time,
        #drop-location,
        #pick-location-hour,
        #location-hour,
        #pick_date_hour,
        #pick_time_hour {
            background-color: whitesmoke;
            color: #5e5e5e;
            border: none;
            border-radius: 9px;
            margin-bottom: 30px;
        }

        .card-heading-para{
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 0;
        }

        .card-title-para{
            font-size: 15px;
            font-weight: 500;
            text-align: center;
        }

        .card-main-image{
            border-radius: 8px; 
            transition: transform .2s;
        }

        .card-main-image:hover{
            -ms-transform: scale(1.5); /* IE 9 */
            -webkit-transform: scale(1.5); /* Safari 3-8 */
            transform: scale(1.02); 
        }
        @media only screen and (max-width: 992px) {
	.datetimepicker {
		top: 573.219px !important;
		left: 50px !important;
	}

}
    </style>

    <div class="container-fluid cont2 class1font">

        <div class="row h-100">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div style="max-width: 500px;">
                    {{-- <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE)) : asset('images/slider/home04.jpg')}}"  alt=""> --}}

                    <p class="text">Where Would You Like To Go?</p> 
                    <p class="text1">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) : 'A new Class of Luxury<br />Limo Service'}}</p>                    
                    <a href="{{ url('/our-fleet') }}" target="_blank">
                        <button type="button" class=" btn1611ID">
                            Visit Our Fleet<i class="fas fa-arrow-trend-up" id="arrw" style="color:white"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-6 for-mobile-media">

                <div class="container class1font hero-form" style="z-index: 1; display: flex; justify-content: center;" id="con33">
                    <!-- Navigation Tabs -->
                    <div class="w-100 ">
                        <div class=" colorclass">
                            <div class="row navbclass adjustCenID">
                                <!-- Date Picker -->

                                <ul class="nav nav-tabs adjustCenID" id="myTabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="distance-tab" data-toggle="tab"
                                            href="#distance">Distance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="hourly-tab" data-toggle="tab" href="#hourly">Hourly</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="flat-rate-tab" data-toggle="tab" href="#flat-rate">Flat
                                            Rate</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="distance">
                                    @if (isset($message))
                                        <div class="row" style="margin-top: -594px;">
                                            <div class="col-md-8">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Ooops!</strong> {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <form id="formfromto" class="form-booking" method="GET"
                                        action="{{ route('get.booking') }}" validate="true">
                                        <input type="hidden" name="lat_pck" class="lat_pck">
                                        <input type="hidden" name="long_pck" class="long_pck">
                                        <input type="hidden" name="lat_drop" class="lat_drop">
                                        <input type="hidden" name="long_drop" class="long_drop">
                                        <input type="hidden" name="total_distance" class="total_distance">
                                        <input type="hidden" name="total_duration" class="total_duration">
                                        <input type="hidden" name="booking_by" value="distance">
                                        <input type="hidden" name="booking_city" value="">
                                        <input type="hidden" name="booking_country" value="">

                                        {{-- Date --}}
                                        <div class="row adjustCenID">
                                            @error('pick_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            {{-- <div class="input-group"> --}}
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div> --}}
                                                <div class="date form_date d-flex align-items-center form-input--container" data-date="3" data-date-format="dd MM yyyy"
                                                    data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                    <span class="icon--container" ><img src="{{asset('images/icon/calender.svg')}}" alt=""></span>
                                                    <input size="100%" class="mt-0 mb-0" type="text" id="pick-date"
                                                        placeholder="{{ date('d-M-Y') }}" readonly required>
                                                    <span class="add-on"><i class="icon-remove"></i></span>
                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                </div>
                                                <input type="hidden" name="pick_date" id="dtp_input2"
                                                    class="pick_date" /><br />
                                            {{-- </div> --}}
                                        </div>


                                        {{-- Time --}}
                                        <div class="row adjustCenID">
                                            <!-- Time Picker -->
                                            @error('pick_time')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            {{-- <div class="input-group"> --}}
                                                {{-- <div class="input-group-append">
                                                    <span class="input-group-text"><div class="input-group-prepend">
                                                    <span class="input-group-text"> <img src="{{asset('images/icon/backArrow.svg')}}"/></span>
                                                </div></span>
                                                </div> --}}
                                                <div class="controls input-append date form_time d-flex align-items-center form-input--container" data-date=""
                                                    data-date-format="hh:ii p" data-link-field="dtp_input3"
                                                    data-link-format="hh:ii">
                                                    <span class="icon--container" ><img src="{{asset('images/icon/clock.svg')}}" alt=""></span>
                                                    <input size="100%" class="mb-0 mt-0" type="text"
                                                        value="" id="pick-time" placeholder="12:25 am" readonly>
                                                    <span class="add-on"><i class="icon-remove"></i></span>
                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                </div>
                                                <input type="hidden" name="pick_time" id="dtp_input3"
                                                    value="" /><br />
                                            {{-- </div> --}}
                                        </div>



                                        {{-- Pick address  --}}
                                        <div class="row adjustCenID">
                                            @error('pick_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="d-flex align-items-center form-input--container">
                                                    <span class="icon--container" > <span class="icon-border"><img src="{{asset('images/icon/from.svg')}}"/></span></span>
                                                <input type="text" id="pick-location" name="pick_address"
                                                    class="form-control pick-address mb-0" placeholder="From" />
                                            </div>
                                        </div>

                                        {{-- Drop Address  --}}
                                        <div class="row adjustCenID">
                                            @error('drop_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="d-flex align-items-center form-input--container">
                                                <span class="icon--container"><span class="icon-border"> <img src="{{asset('images/icon/backArrow.svg')}}"/></span></span>
                                                <input type="text" id="drop-location" name="drop_address"
                                                    class="form-control drop-address mb-0" placeholder="To" />
                                            </div>
                                        </div>

                                        <div class="row adjustCenID">
                                            <button type="submit" class="btn btn-dark w-100 searchbtn22 btn-form-search" style="background-color: #CCA642;" id="enable" disabled>
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Hourly Tab -->
                                <div class="tab-pane fade" id="hourly">
                                    <form id="formfrom" class="form-booking" method="GET"
                                        action="{{ route('select.booking.by.hour') }}" validate="true">
                                        <input type="hidden" name="lat_pck" class="lat_pck">
                                        <input type="hidden" name="long_pck" class="long_pck">
                                        <input type="hidden" name="booking_by" value="time">
                                        <input type="hidden" name="booking_city" value="">
                                        <input type="hidden" name="booking_country" value="">

                                        <div class="row adjustCenID">
                                            @error('pick_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="">
                                                <div class="input-group-prepend d-flex align-items-center form-input--container">
                                                    <span class="icon--container ml-3" ><span class="icon-border"><img src="{{asset('images/icon/from.svg')}}" alt=""></span></span>
                                                            <input type="text" id="pick-location-hour" name="pick_address"
                                                                class="form-control pick-address mb-0" placeholder="From" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row adjustCenID">
                                            <div>
                                                <div class="pick-drop-day mb-2 d-flex align-items-center form-input--container">
                                                    @error('selected_hour')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <span class="icon--container ml-3" ><span class="icon-border"><img src="{{asset('images/icon/from.svg')}}" alt=""></span></span>
                                                    <select class="form-control browser-default custom-select mb-0"
                                                        name="selected_hour" id="location-hour">
                                                        <option selected value="">Length of Time</option>
                                                        <option class="select-it" value="1"> 1 Hour</option>
                                                        <option value="2"> 2 Hours </option>
                                                        <option value="3">3 Hours</option>
                                                        <option value="4">4 Hours</option>
                                                        <option value="5">5 Hours</option>
                                                        <option value="6">6 Hours</option>
                                                        <option value="7">7 Hours</option>
                                                        <option value="8">8 Hours</option>
                                                        <option value="9">9 Hours</option>
                                                        <option value="10">10 Hours</option>
                                                        <option value="11">11 Hours</option>
                                                        <option value="12">12 Hours</option>
                                                        <option value="13">13 Hours</option>
                                                        <option value="14">14 Hours</option>
                                                        <option value="15">15 Hours</option>
                                                        <option value="16">16 Hours</option>
                                                        <option value="17">17 Hours</option>
                                                        <option value="18">18 Hours</option>
                                                        <option value="19">19 Hours</option>
                                                        <option value="20">20 Hours</option>
                                                        <option value="21">21 Hours</option>
                                                        <option value="22">22 Hours</option>
                                                        <option value="23">23 Hours</option>
                                                        <option value="24">24 Hours</option>
                                                    </select>
                                                    <span class="hide valid-drop" style="color: rgba(190,181,12,0.97)"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row adjustCenID">
                                            <!-- Date Picker -->
                                            <div class="">
                                                @error('pick_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div> --}}
                                                
                                                <div class="d-flex align-items-center form-input--container">
                                                    <div class="date form_date d-flex" data-date="" data-date-format="dd MM yyyy"
                                                        data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                                        <span class="icon--container ml-3" ><img src="{{asset('images/icon/calender.svg')}}" alt=""></span>
                                                        <input class="mt-0 mb-0" size="100%" type="text"
                                                            id="pick_date_hour" placeholder="Wed 19 July, 2017" readonly>
                                                        <span class="add-on"><i class="icon-remove"></i></span>
                                                        <span class="add-on"><i class="icon-th"></i></span>
                                                    </div>
                                                    <input type="hidden" name="pick_date" id="dtp_input1"
                                                        class="pick_date" /><br />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row adjustCenID">
                                            <!-- Time Picker -->
                                            <div>
                                                <div class="d-flex align-items-center form-input--container">
                                                    @error('pick_time')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    {{-- <div class="input-group-append">
                                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                    </div> --}}
                                                    <div class="controls input-append date form_time d-flex" data-date=""
                                                        data-date-format="hh:ii p" data-link-field="dtp_input4"
                                                        data-link-format="hh:ii">
                                                        <span class="icon--container ml-3" ><img src="{{asset('images/icon/clock.svg')}}" alt=""></span>
                                                        <input class="mt-0 mb-0" size="100%" type="text"
                                                            value="" id="pick_time_hour" placeholder="12:25 am"
                                                            readonly>
                                                        <span class="add-on"><i class="icon-remove"></i></span>
                                                        <span class="add-on"><i class="icon-th"></i></span>
                                                    </div>
                                                    <input type="hidden" name="pick_time" id="dtp_input4"
                                                        value="" /><br />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row adjustCenID">
                                            <button type="submit" class="btn btn-dark w-100 searchbtn22" style="background-color: #CCA642;">
                                                <i class="fa fa-search mr-1" style="vertical-align: middle"></i> Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Flat Rate Tab -->
                                <div class="tab-pane fade" id="flat-rate">
                                    <h2>Flat Rate</h2>
                                    <!-- Add flat rate content here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Start of How it works Section  --}}

    <div class="container class1font" id="cont7">
        <div class="row">
            <div class="col">
                <div>
                    <p class="BK add-before">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) : 'Your Advantages'}}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3 workFlow-content">
                <div class="iconbox-icon">
                 <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE)) : asset('images/iconbox/001.png')}}" alt="">
                </div>
                <p class=" workFLow-heading"><span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE) : 'Easy Online Booking'}}</span></p>
                <p class="BK7 workFlow-desc">
                    {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION) : 'The most efficient booking system in this industry geared towards  handling single bookings to a full-fledged event'}}
                </p>
            </div>
            {{-- <div class="col-md-1 arrowbutton1">
                <div class="encircled-arrow">
                    <svg viewBox="0 0 20 20" fill="black" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.3901 3.54917C10.1197 3.81575 10.0944 4.23698 10.316 4.53253L10.3826 4.60981L14.9583 9.24992L3.25 9.24992C2.83579 9.24992 2.5 9.5857 2.5 9.99992C2.5 10.3823 2.78611 10.6978 3.15592 10.7441L3.25 10.7499H14.9583L10.3826 15.39C10.116 15.6604 10.0966 16.082 10.3224 16.3743L10.3901 16.4507C10.6605 16.7172 11.082 16.7366 11.3744 16.5108L11.4507 16.4431L17.2841 10.5265C17.548 10.2588 17.57 9.84232 17.3501 9.54985L17.2841 9.47336L11.4507 3.5567C11.1599 3.26173 10.6851 3.25837 10.3901 3.54917Z"
                            fill="black" />
                    </svg>
                </div>
            </div> --}}
            <div class="col-md-3 workFlow-content">
                <div class="iconbox-icon">
                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE)) : asset('images/iconbox/002.png')}}" alt="">
                </div>
                <p class=" workFLow-heading"> <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE) : 'Professional Drivers'}}</span></p>
                <p class="BK7 workFlow-desc">
                    {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION) : 'Our professional drivers are licensed, insured and are required to comply with local laws and regulations. '}}
                </p>
            </div>
            {{-- <div class="col-md-1 arrowbutton1">
                <div class="encircled-arrow">
                    <svg viewBox="0 0 20 20" fill="black" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.3901 3.54917C10.1197 3.81575 10.0944 4.23698 10.316 4.53253L10.3826 4.60981L14.9583 9.24992L3.25 9.24992C2.83579 9.24992 2.5 9.5857 2.5 9.99992C2.5 10.3823 2.78611 10.6978 3.15592 10.7441L3.25 10.7499H14.9583L10.3826 15.39C10.116 15.6604 10.0966 16.082 10.3224 16.3743L10.3901 16.4507C10.6605 16.7172 11.082 16.7366 11.3744 16.5108L11.4507 16.4431L17.2841 10.5265C17.548 10.2588 17.57 9.84232 17.3501 9.54985L17.2841 9.47336L11.4507 3.5567C11.1599 3.26173 10.6851 3.25837 10.3901 3.54917Z"
                            fill="black" />
                    </svg>
                </div>
            </div> --}}
            <div class="col-md-3 workFlow-content">
                <div class="iconbox-icon">
                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE)) : asset('images/iconbox/003.png')}}" alt="">
                </div>  
                <p class=" workFLow-heading" style="margin-top: 14px;"><span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE) : 'Guaranteed fixed prices'}}</span></p>
                <p class="BK7 workFlow-desc">
                    {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION) : 'At Hathaway Limousines there are no hidden costs. Our prices include all fees, taxes and are guaranteed with the booking.'}}
                </p>
            </div>
            {{-- <div class="col-md-1 arrowbutton1">
                <div class="encircled-arrow">
                    <svg viewBox="0 0 20 20" fill="black" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.3901 3.54917C10.1197 3.81575 10.0944 4.23698 10.316 4.53253L10.3826 4.60981L14.9583 9.24992L3.25 9.24992C2.83579 9.24992 2.5 9.5857 2.5 9.99992C2.5 10.3823 2.78611 10.6978 3.15592 10.7441L3.25 10.7499H14.9583L10.3826 15.39C10.116 15.6604 10.0966 16.082 10.3224 16.3743L10.3901 16.4507C10.6605 16.7172 11.082 16.7366 11.3744 16.5108L11.4507 16.4431L17.2841 10.5265C17.548 10.2588 17.57 9.84232 17.3501 9.54985L17.2841 9.47336L11.4507 3.5567C11.1599 3.26173 10.6851 3.25837 10.3901 3.54917Z"
                            fill="black" />
                    </svg>
                </div>
            </div> --}}
            <div class="col-md-3 workFlow-content">
                <div class="iconbox-icon">
                    <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE)) :asset('images/iconbox/004.png')}}" alt="">
                </div>
                <p class=" workFLow-heading"> <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE) : 'Free waiting time'}}</span></p>
                <p class="BK7 workFlow-desc">
                    {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION) : 'When picking up from the airport we wait 60 minutes for you. For all other pickups the free waiting time is 15 minutes'}}
                </p>
            </div>

            
        </div>
    </div>

    {{-- End of How it Works  --}}

    {{-- Start of Services  --}}

     <section class="team-container">
        <div class="container class1font">
            <p class="section-title">
                {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) : 'Our Services'}}
                    <a href="#" class="more-services">
                        More Services
                        <i class="fa-solid fa-arrow-up-long"></i>
                    </a>
            </p>

            {{-- <div class="row"> --}}
            {{-- <div class="col-md-12"> --}}
            <div class="services-slider">
                @if (count($services) > 0)
                    @foreach ($services as $service)
                        <div class="col-md-5 team-member service-card">
                            <a href="{{ url('service/details', $service->id) }}" class="service-link-tag">
                                <img src="{{ asset('files/services-images' . '/' . $service->service_image) }}" alt="services" id="con222">
                                <div class="check">{{ $service->service_title }}</div>
                                <div class="overlay">

                                    <div class="overlay-circle">
                                        <div class="member-name">{{ $service->service_title }}</div>
                                        <div class="member-description">
                                            {{ strip_tags(\Illuminate\Support\Str::limit($service->long_description, 20)) }}
                                        </div>
                                        <i class="fa-solid fa-arrow-up-long"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
     </section>           

    {{-- End of Services  --}}

    {{-- Start of our fleet  --}}

   <section class="fleetContainer py-5">
   <div class="container class1font">
        <p class="section-title" style="margin-bottom:30px;">
            {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE) : 'Our Fleet'}}
            <a href="#" class="more-services">
                More Fleet
                <i class="fa-solid fa-arrow-up-long"></i>
            </a>
        </p>
        @if (count($categories) > 0)
            <div class="w-95">
                <div class="fleet-slider">
                    @foreach ($categories as $category)
                        <div class="col-md-2 slick-slide">
                            <div class="car-container hover-element">
                                <p class="text-left font-weight-bold fleet-card--title">{{ $category->name }}</p>
                                <p class="car-descrip">{{ strip_tags(\Illuminate\Support\Str::limit($category->description, 20)) }}</p>
                                <!-- <img src="{{ asset('files/vehicleCategory/category_img') }}/{{ $category->picture }}"
                                    alt="Car" class="car-picture" /> -->
                                    <img src="{{asset('/images/car1.png')}}" alt="">
                                <div class="car-info">
                                    <div class="info">
                                        <i class="fa-solid fa-people-group" id="persons"></i>
                                        <p id="passenger" style="margin-bottom: 0">Passangers {{ $category->max_seats }}
                                        </p>
                                    </div>
                                    <div class="info">
                                        <i class="fa-solid fa-briefcase" id="person1"></i>
                                        <p id="passenger1">Luggage {{ $category->max_bags }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
   </section>

    {{-- End of Our Fleet  --}}

    {{-- Start of Showcase section  --}}
    
    <section class="sowcase-sec">
        <div class="container  class1font" id="cont3434">
            <div class="row align-items-center">

                <div class="col-md-6">
                        <!-- <iframe class ="iframeClass" width="100%" height="375"
                            src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::YOUTUBE_VIDEO_LINK) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::YOUTUBE_VIDEO_LINK) : 'https://www.youtube.com/embed/Ri8qrzOBSYA?si=cW7kzqD4oGt-ooo0'}}">
                        </iframe> -->

                        <div id="carouselExampleControls" class="carousel" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-slide-moray" src="{{asset('/images/car1.png')}}" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-slide-moray" src="{{asset('/images/car1.png')}}" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-slide-moray" src="{{asset('/images/car1.png')}}" alt="">
                                </div>

                            </div>
                            <div class="navigation">
                                <a class="carousel-control-prev " href="#carouselExampleControls" role="button"
                                    data-slide="prev"id="prev-slide">
                                    <span class="fa fa-arrow-alt-circle-left" style="color:black ;font-size: 20px;"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next displayarrow" href="#carouselExampleControls" role="button"
                                    data-slide="next"id="next-slide">
                                    <span class="fa fa-arrow-alt-circle-right" style="color:black ;font-size: 20px;"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>

                </div>

                <div class="col-md-6 align-items-center">
                    <div class="row">
                        <p class="IK112">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_TITLE) : 'Showcase some impressive numbers.'}}</p>
                    </div>
                    <div class="row">
                        <p class="IK1112">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_DESCRIPTION) : 'PO Box 1611 Collins Street West Victoria 8007 Australia'}}</p>
                    </div>
                    <div class="button-row">
                        <div class="custom-button">
                            <h4>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_VEHICLES) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_VEHICLES) : '285'}}<h4>
                                    <p class="textbtnclass">Vehicles</p>
                        </div>
                        <div class="custom-button">
                            <h4>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_AWARDS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_AWARDS) : '97'}}<h4>
                                    <p class="textbtnclass">Awards</p>
                        </div>
                        <div class="custom-button">
                            <h4>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_HAPPY_CUSTOMERS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::SHOWCASE_HAPPY_CUSTOMERS) : '13K'}}<h4>
                                    <p class="textbtnclass">Happy Customers</p>
                        </div>

                    </div>

                    <button class="btn161ID" type="button" class="btn" style="color: white;width: 100%; background-color: #CCA642;">Learn More
                        <i class="fas fa-arrow-trend-up" id="arrw" style="color:white"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    

    {{-- End of Showcase  --}}

    {{-- Start of Testimonial  --}}

    <!-- <div class="container displaycon222 class1font" id="cont2222">
        <div class="row ">
            <div class="col-md-6 d-flex flex-column gap-4 justify-content-center">
                <p class="IK11">Hear what our amazing<br> customers say</p>
                <p class="IK111">Ensuring global customer satisfaction, we consistently deliver high-quality services with prompt efficiency. Our commitment extends beyond borders, providing excellence to customers around the world.</p>

                {{-- <div calss="row " class="btn16ID">
                    <button type="button" class="btn" style="color: white;width: 100%;">Get Started <i
                            class="fas fa-arrow-trend-up" id="arrw" style="color:white"></i></button>
                </div> --}}
            </div>


            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($testimonial as $item)  
                            <div class="carousel-item active">
                                <div class="card1">
                                    <div style="text-align: center;">
                                        <p class="card-heading-para mb-2">{{$item->vehicle_designed_by}}</p>
                                        <img class="mb-2" src="{{asset('files/testimonials_images/' . $item->vehicle_designed_logo)}}" alt="Vehicle Logo" style="width: auto; height: 70px;">
                                    </div>
                                    <div>
                                        <p class="card-title-para">{{$item->vehicle_designed_name}}</p>
                                        <a href="{{$item->vehicle_designed_click_link}}" target="_blank">
                                            <img class="card-main-image" src="{{asset('files/testimonials_images/' . $item->vehicle_designed_image)}}" alt="office van">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- old carousel design  --}}
                        {{-- <div class="carousel-item">
                            <div class="card1">
                                <div class="d-flex gap-3">
                                    <img class="profile-photo" src="images/r2.jpg" alt="Profile Photo">
                                    <div>
                                        <h6>Jacob</h6>
                                        <p class="description">Frankfurt</p>
                                    </div>
                                </div>
                                <p class="ptextClass">"Our special event was elevated to new heights thanks to Hathaway Limousines. The sleek and stylish limousine, coupled with a professional and courteous chauffeur, made our journey through Germany not just a transportation service but a memorable part of the celebration. Exemplary service that truly stands out!"</p>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card1">
                                <div class="d-flex gap-3">
                                    <img class="profile-photo" src="images/review.png" alt="Profile Photo">
                                    <div>
                                        <h6>Frederick</h6>
                                        <p class="description">Hamburg</p>
                                    </div>
                                </div>
                                <p class="ptextClass">"A five-star experience! Hathaway Limousines in Germany exceeded our expectations in every way. The attention to detail, the luxurious fleet, and the friendly yet professional staff made our travel experience truly exceptional. If you're looking for a reliable and high-class limousine service in Germany, this is the company to choose."
                                </p>

                            </div>
                        </div> --}}

                    </div>
                    <div class="navigation">
                        <a class="carousel-control-prev " href="#carouselExampleControls" role="button"
                            data-slide="prev"id="prev-slide">
                            <span class="fa fa-arrow-alt-circle-left" style="color:black ;font-size: 20px;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next displayarrow" href="#carouselExampleControls" role="button"
                            data-slide="next"id="next-slide">
                            <span class="fa fa-arrow-alt-circle-right" style="color:black ;font-size: 20px;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <div class="slide-number">
                            <span id="current-slide">1</span> / <span id="total-slides">3</span>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div> -->

    {{-- End of Testimonial --}}


    {{-- Start of news  --}}
    {{-- Client Says hide this section for now. Please don`t delete this section as we will use this later  --}}

    {{-- <div class="container class1font mt-5" id="cont12">
        <div class="row justify-content-center align-items-center mb-4">

            <div class="col-md-5 ">
                <p class="section-title text-left mb-0">Latest From News</p>
            </div>
            <div class="col-md-4 text-right">
                <button class="btn btn" id="lastest" type="submit">More News <i class="fa-solid fa-arrow-trend-up"
                        id="late" style="color:black;"></i></button>
            </div>
        </div>

        <div class="row justify-content-center news-cards">
            <div class="col-md-3">
                <div class="card" id="CARD">
                    <div class="card-body latest-news--card">
                        <div class="card-image image1"> --}}
                            {{-- <img class="card-img-top" src="images/C5.jpg" alt="Card image cap"> --}}
                            {{-- <div class="image-content">
                                <h2>14.</h2>
                                <p>August,23</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <p id="GK3">Travel</p>
                            <p id="GK4">3 hidden-gem destination for your wish list</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" id="CARD">
                    <div class="card-body latest-news--card">
                        <div class="card-image image2"> --}}
                            {{-- <img class="card-img-top" src="images/C3.jpg" alt="Card image cap" id="opacitty"> --}}
                            {{-- <div class="image-content">
                                <h2>14.</h2>
                                <p>August,23</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <p id="GK3">Travel</p>
                            <p id="GK4">3 hidden-gem destination for your wish list</p>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-md-3">
                <div class="card" id="CARD">
                    <div class="card-body latest-news--card">
                        <div class="card-image image3">
                            <img class="card-img-top" src="images/c2.jpg" alt="Card image cap"
                            id="opacitty">
                            <div class="image-content">
                                <h2>14.</h2>
                                <p>August,23</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <p id="GK3">Travel</p>
                            <p id="GK4">3 hidden-gem destination for your wish list</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- End of news  --}}

    {{-- Start of Partners --}}

    <div class="container class1font">
        <div class="col-md-12">
            <div class="partner_con">
                <div class="row justify-content-center" style="align-items: center;">
                    <div class="col-md-4 text-start mb-3">
                        {!!\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HAPPY_CLIENTS_TEXT) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HAPPY_CLIENTS_TEXT) : '<h2>Partners Who Sell Our Product</h2>'!!}
                    </div>
                    @foreach ($logos as $logo)
                        <div class="col-md-2 col-6 text-center mb-3">
                            <img src="{{asset('files/clients-images/'.$logo->client_image)}}"/>
                        </div>
                    @endforeach
                </div>
                <hr id="linex" />
            </div>
        </div>
    </div>

    {{-- End of Partners  --}}

    {{-- Start of Mobile Apps  --}}

    {{-- <div class="container-fluid class1font" id="cont14">
        <div class="container" style="padding: 55px 0">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row adjustCenID text-center">
                        <p class="IK11">Download the app</p>
                    </div>
                    <div class="row text-center">
                        <p class="IK111">To download our app, simply visit your device's app store<br> (iOS App Store or
                            Google Play
                            Store).</p>
                    </div>
                    <div calss="row" class="btn14ID">
                        <button type="button" class="btn btn-dark" id="btn14"><a href="#"><i
                                    class="fa-brands fa-apple" id="apple1" style="color:white"></i></a>
                            <p id="lin11"> | </p>
                            <p class="IK21">Download on the</p>
                            </p>
                            <p class="IK31">Apple Store</p>
                        </button>
                        <button type="button" class="btn btn-dark" id="btn14"><a href="#"><i
                                    class="fa-brands fa-google-play" id="apple1" style="color:white"></i></a>
                            <p id="lin11"> | </p>
                            <p class="IK21">Get in on</p>
                            </p>
                            <p class="IK31">Play Store</p>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 adjustCenID">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/C7.jpg') }}" class="imgClassCon14" alt="Avatar">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- End of Mobile Apps --}}
@endsection
@section('js')
    <script type="text/javascript">
        function locationsUrl() {
            return '{{ url('home/getLocations') }}';
        }

        function bookinghoururl() {
            return '{{ url('home/getLocationsbookinghours') }}';
        }
        // <input type="hidden" name="lat_pck" class="lat_pck">
        //                                 <input type="hidden" name="long_pck" class="long_pck">
        //                                 <input type="hidden" name="lat_drop" class="lat_drop">
        //                                 <input type="hidden" name="long_drop" class="long_drop">

     
    </script>
    <script src="{{ asset('js/front-end/index.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M1AxeqGt3ozXhX0qeeVP8CcA0OZIkgk&libraries=places&callback=initMap"
        async defer></script>
    <script src="{{ asset('js/validater.js') }}"></script>
    <script>
        $.validate();
    </script>
@endsection
