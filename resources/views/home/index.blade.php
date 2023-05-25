@extends('layouts.main-home-layout')
@section('title')
Home
@endsection
@section('content-area')
    <style>
        .pac-item{
            padding: 6px; font-size: 0.9rem; border-top: 1px solid #ef9657;
        }
        .pac-icon {
            padding-top: 1px;
            background: url('{{asset('images/icon/icon4.PNG')}}') no-repeat center !important;
            background-size: cover !important;
        }
        .pac-matched{
            font-size: 0.9rem
        }
        .theme-color{
            color: #6D6643;
        }

        .form-error{
            color: #ef9657;
        }
        .tp-splitted{
            font-size: 3rem;

        }
        .change_bg{
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
        }
        .schedule-booking .form-booking select {
            position: relative;
            z-index: 11;
            border-bottom: 2px solid #84797980;
            padding: 4px 4px 7px 4px;
            font-family: inherit;
        }
        .schedule-booking .form-booking select option{
            color: #ffff !important;
            background: #292828;
            z-index: 11;
            font-size: 1.5rem;
            font-family: inherit;

        }

    </style>
    <!-- Start Tp Banner -->
    <section class="tp-banner has-tab">
        <div id="rev_slider_1078_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
            <div id="rev_slider_1078_2" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                <div class="slotholder"></div>
                <ul><!-- SLIDE  -->
                    <!-- SLIDE 1 -->
                    <li data-index="rs-3049" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE)) : asset('images/slider/home04.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption title ff-2 theme-color text-capitalize"
                             id="slide-3049-layer-1"
                             data-x="['center','center','center','center']" data-hoffset="['275','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['21','21','21','21']"
                             data-fontsize="['30','30','30','26']"
                             data-lineheight="['65','60','50','32']"
                             data-fontweight="['400','400','400','400']"
                             data-width="100%"
                             data-height="auto"
                             data-type="text"
                             data-whitespace="normal"
                             data-responsive_offset="on"
                             data-frames='[{"delay":0,"split":"chars","splitdelay":0.05,"speed":1000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 16;  white-space: nowrap;font-weight: 500; font-size: 2rem !important;;">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) : 'Book Your Own Chauffeur Drive!'}}

                        </div>
                    </li>

                    <li data-index="rs-3050" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE)) : asset('images/slider/home04.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption title ff-2 theme-color"
                             id="slide-3049-layer-1"
                             data-x="['center','center','center','center']" data-hoffset="['275','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['21','21','21','21']"
                             data-fontsize="['30','30','30','26']"
                             data-lineheight="['65','60','50','32']"
                             data-fontweight="['400','400','400','400']"
                             data-width="100%"
                             data-height="auto"
                             data-type="text"
                             data-whitespace="normal"
                             data-responsive_offset="on"
                             data-frames='[{"delay":0,"split":"chars","splitdelay":0.05,"speed":1000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 16; font-size: 2rem !important; white-space: nowrap;font-weight: 400;;">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) : 'Book Your Own Chauffeur Drive!'}}
                        </div>
                    </li>
                    <li data-index="rs-3050" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE)) : asset('images/slider/home04.jpg')}}"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption title ff-2 theme-color"
                             id="slide-3049-layer-1"
                             data-x="['center','center','center','center']" data-hoffset="['275','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['21','21','21','21']"
                             data-fontsize="['60','40','30','26']"
                             data-lineheight="['65','60','50','32']"
                             data-fontweight="['400','400','400','400']"
                             data-width="100%"
                             data-height="auto"
                             data-type="text"
                             data-whitespace="normal"
                             data-responsive_offset="on"
                             data-frames='[{"delay":0,"split":"chars","splitdelay":0.05,"speed":1000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 16; font-size: 2rem !important; white-space: nowrap;font-weight: 400;">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_SLIDER_IMAGE_TEXT) : 'Book Your Own Chauffeur Drive!'}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- END REVOLUTION SLIDER -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(isset($message))
                    <div class="row" style="margin-top: -594px;">
                        <div class="col-md-8">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Ooops!</strong> {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                     @endif
                    <div class="sdl-booking add-box">
                        <ul class="tab_booking text-center">
                            <li class="active w-50 text-center"><a href="#bk-1" class="distance-tab">Transferfahrt</a></li>
                            <li style="width: 49%"><a href="#bk-2" class="hourly-form-tab">Stundenbuchung</a></li>
                        </ul>
                        <div id="bk-1" class="schedule-booking">
                            <h1 class="text-over">Preis berechnen</h1>
                            <form id="formfromto" class="form-booking" method="GET" action="{{route('get.booking')}}" validate="true">
                                <input type="hidden" name="lat_pck" class="lat_pck">
                                <input type="hidden" name="long_pck" class="long_pck">
                                <input type="hidden" name="lat_drop" class="lat_drop">
                                <input type="hidden" name="long_drop" class="long_drop">
                                <input type="hidden" name="total_distance" class="total_distance">
                                <input type="hidden" name="total_duration" class="total_duration">
                                <input type="hidden" name="booking_by" value="distance">
                                <input type="hidden" name="booking_city" value="">
                                <input type="hidden" name="booking_country" value="">
                                <div class="pick-address">
                                    <label for="pick">Von</label>
                                    <input type="text" class="pick-address" data-validation="required" id="pick-location" name="pick_address" style="text-align: inherit;" placeholder="Adresse, Flughafen, Hotel, ...">
                                    <span class="hide valid-pick" style="color: rgba(190,181,12,0.97)"></span>
                                </div>
                                <div class="pick-dropday">
                                    <label for="drop">Nach</label>
                                    <input type="text" class="drop-address"  data-validation="required" style="text-align: inherit;" id="drop-location" name="drop_address" placeholder="Adresse, Flughafen, Hotel, ...">
                                    <span class="hide valid-drop" style="color: rgba(190,181,12,0.97)"></span>
                                </div>
                                <div class="pick-date">
                                    <label for="pick-date">Datum</label>
                                    <div class="date form_date"  data-date="3" data-date-format="dd MM yyyy"  data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input size="16" type="text" style="text-align: inherit;" data-validation="required" id="pick-date"  placeholder="{{date('d-M-Y')}}" readonly>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    <input type="hidden" name="pick_date" id="dtp_input2" class="pick_date"/><br/>
                                </div>
                                <div class="pick-time">
                                    <label for="pick-time">Zeit</label>
                                    <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii p" data-link-field="dtp_input3" data-link-format="hh:ii">
                                        <input size="16" type="text" data-validation="required" style="text-align: inherit" value="" id="pick-time" placeholder="12:25 am" readonly>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    <input type="hidden" name="pick_time" id="dtp_input3" value="" /><br/>
                                </div>
                                <div class="p-0">
                                    <h6 class="text-white">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_TEXT_UNDER_PICK_TIME) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_TEXT_UNDER_PICK_TIME) : 'Free Waiting For 15 min'}}</h6>
{{--                                    <hr class="m-0">--}}
                                </div>
                                <div class="btn-submit">
                                    <button type="submit" id="fromto" class="btn btn-resurve register_now">Preis berechnen
                                        <img src="{{asset('images/icon/arrow-white.png')}}" alt="">
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div id="bk-2" class="schedule-booking">
                            <h1 class="text-over">Preis berechnen</h1>
                            <form id="formfrom" class="form-booking" method="GET" action="{{route('select.booking.by.hour')}}" validate="true">
                                <input type="hidden" name="lat_pck" class="lat_pck">
                                <input type="hidden" name="long_pck" class="long_pck">
                                <input type="hidden" name="booking_by" value="time">
                                <input type="hidden" name="booking_city" value="">
                                <input type="hidden" name="booking_country" value="">
                                <div class="pick-address">
                                    <label for="pick-location-hour">Von</label>
                                    <input type="text" class="pick-address" data-validation="required" id="pick-location-hour" name="pick_address" style="text-align: inherit;" placeholder="From: address, airport, hotel, ...">
                                    <span class="hide valid-pick" style="color: rgba(190,181,12,0.97)"></span>
                                </div>
                                <div class="pick-drop-day">
                                    <label for="location-hour">Dauer</label>
                                    <select class="browser-default custom-select" name="selected_hour" id="location-hour" required>
                                        <option selected value="">Dauer</option>
                                        <option class="select-it" value="1"> 1 Stunde</option>
                                        <option value="2">  2 Stunden </option>
                                        <option value="3">3 Stunden</option>
                                        <option value="4">4 Stunden</option>
                                        <option value="5">5 Stunden</option>
                                        <option value="6">6 Stunden</option>
                                        <option value="7">7 Stunden</option>
                                        <option value="8">8 Stunden</option>
                                        <option value="9">9 Stunden</option>
                                        <option value="10">10 Stunden</option>
                                        <option value="11">11 Stunden</option>
                                        <option value="12">12 Stunden</option>
                                        <option value="13">13 Stunden</option>
                                        <option value="14">14 Stunden</option>
                                        <option value="15">15 Stunden</option>
                                        <option value="16">16 Stunden</option>
                                        <option value="17">17 Stunden</option>
                                        <option value="18">18 Stunden</option>
                                        <option value="19">19 Stunden</option>
                                        <option value="20">20 Stunden</option>
                                        <option value="21">21 Stunden</option>
                                        <option value="22">22 Stunden</option>
                                        <option value="23">23 Stunden</option>
                                        <option value="24">24 Stunden</option>
                                    </select>
                                    <span class="hide valid-drop" style="color: rgba(190,181,12,0.97)"></span>
                                </div>
                                <div class="pick-date">
                                    <label for="pick_date_hour">Datum</label>
                                    <div class="date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input size="16" type="text" style="text-align: inherit;" data-validation="required" id="pick_date_hour"  placeholder="Wed 19 July, 2017" readonly>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    <input type="hidden" name="pick_date" id="dtp_input1" class="pick_date"/><br/>
                                </div>
                                <div class="pick-time">
                                    <label for="pick_time_hour">Zeit</label>
                                    <div class="controls input-append date form_time" data-date="" data-date-format="hh:ii p" data-link-field="dtp_input4" data-link-format="hh:ii">
                                        <input size="16" type="text" data-validation="required" style="text-align: inherit" value="" id="pick_time_hour" placeholder="12:25 am" readonly>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                    <input type="hidden" name="pick_time" id="dtp_input4" value="" /><br/>
                                </div>
                                <div class="btn-submit">
                                    <button type="submit"  id="from" class="btn-resurve">Preis berechnen<img src="{{asset('images/icon/arrow-white.png')}}" alt=""></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Tp Banner -->
    <!-- Start Template title -->
    <section class="block-fleet change_bg  mt-0">
        <div class="container">
            <div class="template-title has-over">
                <div class="container">
                    <h3 class="title">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_FLEET_TITLE) : 'Our Fleet'}}</h3>
                </div>
            </div>
            <ul class="tab_menu" style="display: none;">
                <li class="current"><a href="#tab-1">All</a></li>
                <li><a href="#tab-2">Party Bus</a></li>
                <li><a href="#tab-3">Sedan</a></li>
                <li><a href="#tab-4">Stretch Limo</a></li>
            </ul>

            @if(count($categories) >0)
                    <div id="tab-1" class="fleet-carousel" data-columns="3">
                        <div class="owl-carousel">
                            @foreach($categories as $category)
                            <div class="fleet-item">
                                <div class="images">
                                    <img src="{{asset('files/vehicleCategory/category_img')}}/{{$category->picture}}" alt="">
                                </div>
                                <div class="fleet-content">
                                    <h4 class="fleet-title">
                                        <a href="#">{{$category->name}}</a>
                                    </h4>

                                    <ul>
                                        <li class="author">
                                            <a href="#"><img src="images/icon/author.png" alt="">Max . {{$category->max_seats}}</a>
                                        </li>
                                        <li class="mail">
                                            <a href="#"><img src="images/icon/mail.png" alt="">Max . {{$category->max_bags}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

            @endif

        </div>
    </section>
    <!-- End Template title --

    <-- Start Template title -->
    <section class="template-title has-over text-up m-0 p-5" style="background-color: #d7d7d73d">
        <div class="container">
            <h3 class="title">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) : 'Your Advantages'}}</h3>
            <p class="subtitle">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_DESCRIPTION) : 'Explore our first class limousine & car rental services'}}</p>
        </div>
    </section>
{{--    <!-- End Template title -->--}}
{{--    <!-- Start Section Iconbox -->--}}
    <section class="section-iconbox fix-ts" style="background-color: #d7d7d73d">
        <div class="container">
            <div class="row">
                <!-- Col 1 -->
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_IMAGE)) : asset('images/iconbox/001.png')}}" alt="">

                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_TITLE) : 'Easy Online Booking'}}</span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL1_DESCRIPTION) : 'The most efficient booking system in this industry geared towards  handling single bookings to a full-fledged event'}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_IMAGE)) : asset('images/iconbox/002.png')}}" style="max-width: 20%;" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_TITLE) : 'Professional Drivers'}}</span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL2_DESCRIPTION) : 'Our professional drivers are licensed, insured and are required to comply with local laws and regulations. '}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_IMAGE)) : asset('images/iconbox/003.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_TITLE) : 'Guaranteed fixed prices'}}</span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL3_DESCRIPTION) : 'At Hathaway Limousines there are no hidden costs. Our prices include all fees, taxes and are guaranteed with the booking.'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_IMAGE)) :asset('images/iconbox/004.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_TITLE) : 'Free waiting time'}}</span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADVANTAGE_COL4_DESCRIPTION) : 'When picking up from the airport we wait 60 minutes for you. For all other pickups the free waiting time is 15 minutes'}} .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Iconbox -->
    <!-- Start Info Box -->
    <section class="info-box parallax parallax_one change_text">
        <div class="container p-4">
          <div class="row justify-content-center">
              <div class="col-md-8 col-sm-12" style="background-color: #04040491; border-radius: 10px;">
                  <div class="wrapper-content">
                      <h3 class="title">
                          {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_TITLE) : 'ABOUT US'}}
                      </h3>
                      <div class="content">
                          <div class="col-md-12 col-sm-12">
                              <p>
                                  {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ABOUT_US_DESCRIPTION) : 'We at Hathaway Limousines have set ourselves the goal of making premium travel on the road even more comfortable and luxurious. The well-being of our guests always comes first. We look forward to welcome you as a passenger on Borad!'}}
                              </p>
                          </div>
                      </div>
                      <dic class="contact">
                          <div class="col-md-12 col-sm-12">
                              <div class="text-center">
                             <div class="row justify-content-center">
                                  <span class="col-sm-12 col-md-3">Jetzt Anrufen</span>
                                  <span class="col-sm-12 col-md-3">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : "+49 (0) 69 330 889 08"}} </span>
                             </div>
                              </div>
                          </div>
                      </dic>
                      {{--                <a href="#" class="booking book_scroll-top">Online Booking<img src="images/icon/arrow-white.png" alt=""></a>--}}
                  </div>
              </div>
          </div>

        </div>
    </section>

    <!-- End Info Box -->
    <!-- Start Template title -->
    <section class="template-title has-over text-up">
        <div class="container">
            <h3 class="title">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) : 'Our Services'}}</h3>
            <p class="subtitle">{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_DESCRIPTION) : 'Explore our first class limousine & car rental services'}}</p>
        </div>
    </section>
    <!-- End Template title -->
    <!-- Start Section Iconbox -->
    <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-2  size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE)) : asset('images/icon/forma1.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_TITLE) : 'Limousine Service'}} </span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_DESCRIPTION) : 'We deal with the best world class limo\'s through Germany we have all the latest range of limo\'s And enjoy the title of first limo dealer in Germany.'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE)) : asset('images/icon/forma3.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_TITLE) : 'Airport Transfers'}}</span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL2_DESCRIPTION) : 'If you’re looking for the best in private airport transfers , look no further than Hathaway Limousines. As  we know exactly what you need from a private transfer at Airports'}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <img src="{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE) ? asset(\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL1_IMAGE)) : asset('images/iconbox/004.png')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <span>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_TITLE) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_TITLE) : 'Free waiting time'}}</span>
                            </h3>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_DESCRIPTION) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_OUR_SERVICES_COL3_DESCRIPTION) : 'When picking up from the airport we wait 60 minutes for you. For all other pickups the free waiting time is 15 minutes.'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Icon Box -->
    <!-- Start Testimonial -->
    <section class="testimonial parallax">
        <div class="container">
            <div class="fleet-carousel" data-columns="1">
                <div class="owl-carousel">
                    <div class="items">
                        <div class="info">
{{--                            <h4 class="name">Sufyan </h4>--}}
{{--                            <p class="company">General Manager, AimGet & Co </p>--}}
                        </div>
                    </div>
{{--                    <div class="items">--}}
{{--                        <div class="info">--}}
{{--                            <h4 class="name">Malik Sheeraz</h4>--}}
{{--                            <p class="company">General Manager, Coca Co.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="items">--}}
{{--                        <div class="info">--}}
{{--                            <h4 class="name">Malik Sheeraz</h4>--}}
{{--                            <p class="company">General Manager, Coca Co.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="items">--}}
{{--                        <div class="content">--}}

{{--                            <p>I have used MyLift on a business level for a number of years now and always find them to have high quality vehicles--}}
{{--                                available even at short notice, their drivers are always well turned out and very professional with any potential clients--}}
{{--                                we have with us. The booking and payment process is very easy and I wouldn’t hesitate to recommend--}}
{{--                                iChauffeur to anyone and have done so on many occasions!</p>--}}

{{--                        </div>--}}
{{--                        <div class="info">--}}
{{--                            <h4 class="name">Malik Sheeraz</h4>--}}
{{--                            <p class="company">General Manager, Coca Co.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <section class="template-title has-over ovvs">
        <div class="container">
            <h3 class="title">Eine Auswahl unserer Gäste </h3>
        </div>
    </section>
    <section class="blog-slider">
        <div class="container">
            <div class="fleet-carousel" data-columns="3">
                <div class="owl-carousel">
                   @foreach($logos as $logo)
                      <article class="post">
                        <div class="featured-image">
                            <img src="{{asset('files/clients-images/'.$logo->client_image)}}" class="w-100" style="height: 9rem" alt="">
                        </div>

                    </article>
                         @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- End Testimonial -->
    <section class="contact-area ver-1" style="margin-top: 5%">
        <div class="container">
            <div class="template-title center has-over">
                <h1>Enjoy Coffee With Us</h1>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/address-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Adresse</h4>
                            <p>{!! \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) : 'Hathaway Limousines (A brand of Hathaway Group UG) Friedrich-Ebert-Anlage 36 60325 Frankfurt am Main' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/phone-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Telefon</h4>
                            <p> {{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-item center">
                        <div class="icon">
                            <img src="{{asset('images/icon/email-1.png')}}" alt="">
                        </div>
                        <div class="content-text">
                            <h4>Email</h4>
                            <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) : 'info@hathaway-limousines.com'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="contact-form ver-1">
                        <div class="template-title center has-over">
                            <h1 class="text-capitalize">Kontakt</h1>
                        </div>
                        <form action="{{route('contact.us')}}" method="post" accept-charset="utf-8">
                            <div class="form form-name one-half">
                                <label for="first_name">Vorname</label>
                                <input type="text" id="first_name" required name="first_name" placeholder="Geben Sie ihren Vornamen ein" value="{{old('first_name')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="last_name">Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Geben Sie ihren Namen ein" value="{{old('last_name')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Geben Sie ihre E-Mail ein" value="{{old('email')}}">
                            </div>
                            <div class="form form-name one-half">
                                <label for="cellno">Telefon</label>
                                <input type="text" id="cellno" required name="cellno" placeholder="Geben Sie ihre Telefonnummer ein" value="{{old('cellno')}}">
                            </div>
                            <div class="form form-comment">
                                <label for="comment">Nachricht</label>
                                <textarea name="comment" id="comment" required  placeholder="Geben Sie ihre Nachricht ein" > </textarea>
                            </div>
                            <div class="btn-submit-form">
                                <button type="submit">Senden <img src="{{asset('images/icon/right-3.png')}}" alt=""></button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="urgentbook">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: antiquewhite;">
            <h5 class="modal-title">Urgent Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
		  <p class="text-primary" style="color: #000000!important">Your selected time is less then  <span id="selecthour"></span>  hours. </p>
            <p style="color: #000000!important" class="text-primary">For Urgent Booking Please Contact Us +49 (0) 15906406598</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" style="background: goldenrod !important" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        function locationsUrl(){
            return '{{url('home/getLocations')}}';
        }
         function bookinghoururl(){
            return '{{url('home/getLocationsbookinghours')}}';
        }
    </script>
    <script src="{{asset('js/front-end/index.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHpSgm-hy0_G_NC6PynKEYgASntQIi1Y&libraries=places&callback=initMap" async defer></script>
    <script src="{{asset('js/validater.js')}}"></script>
    <script>
        $.validate();
    </script>
@endsection


