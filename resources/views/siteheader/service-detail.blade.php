@extends('layouts.main-home-layout')
@section('title')
    Service Details
@endsection
@section('content-area')
<style>
    @if(isset($config->service_detail_img))
        .top-title 
        {
        background: url({{asset('files/pages-images/'.$config->service_detail_img)}}) !important; 
        background-repeat: no-repeat;
        background-repeat: no-repeat !important;
        background-position: center;
        background-size: 100% 100% !important;
    }
    @else
        .top-title {
        background: url({{asset('images/template/services-single.jpg')}});
    }
    @endif
    ul{
        padding-left:0 ;
    }
    a, a:hover{
        color: dodgerblue;
        text-decoration: none
    }
    #pick-date,
    #pick-time{
        border: none
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
    }
</style>
    <section class="top-title ver-1">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-page-heading">
                            <h1 style="color: white">{{$service->service_title}} </h1>
                        
                            <p class="sub-title">{{$service->short_description}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" colorclass" style="margin-left: auto">
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
                                            <button type="submit" class="btn btn-dark w-100 searchbtn22">
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
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-map-marker-alt"></i></span>
                                                            <input type="text" id="pick-location-hour" name="pick_address"
                                                                class="form-control pick-address" placeholder="From" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row adjustCenID">
                                            <div class="pick-drop-day mb-2">
                                                @error('selected_hour')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <select class="form-control browser-default custom-select"
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


                                        <div class="row adjustCenID">
                                            <!-- Date Picker -->
                                            <div class="input-group">
                                                @error('pick_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div> --}}
                                                <div class="date form_date" data-date="" data-date-format="dd MM yyyy"
                                                    data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                                    <input class="mt-0 mb-0" size="100%" type="text"
                                                        id="pick_date_hour" placeholder="Wed 19 July, 2017" readonly>
                                                    <span class="add-on"><i class="icon-remove"></i></span>
                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                </div>
                                                <input type="hidden" name="pick_date" id="dtp_input1"
                                                    class="pick_date" /><br />
                                            </div>
                                        </div>

                                        <div class="row adjustCenID">
                                            <!-- Time Picker -->
                                            <div class="input-group">
                                                @error('pick_time')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                {{-- <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div> --}}
                                                <div class="controls input-append date form_time" data-date=""
                                                    data-date-format="hh:ii p" data-link-field="dtp_input4"
                                                    data-link-format="hh:ii">
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
                                        <div class="row adjustCenID">
                                            <button type="submit" class="btn btn-dark w-100 searchbtn22">
                                                <i class="fa fa-search"></i> Search
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
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
    </section>
    <section class="customs-single ver-1">
        <div class="container">
            <div class="row">

                <div class="col">
                    <article class="block-customs-single ver-1">
                        <div class="featured-customs">
                            <div class="images">
                                <img src="{{asset('files/services-images/'.$service->service_image)}}" class="w-100" alt="">
                            </div>
                        </div>
                        <div class="entry-customs">
                            <div class="entry-box">
                                <h3>{{$service->service_title2}} </h3>
                                {!! $service->long_description !!}
                            </div>
                        </div>
                    </article>
                </div>
                
            </div>
        </div>
    </section>
@endsection





