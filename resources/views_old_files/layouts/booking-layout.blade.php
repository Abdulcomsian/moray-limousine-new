<section class="summary-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="summary-bar">
                    <li>
                        <div class="info">
                            Pick Up Address
                        </div>
                        <p>Airport Istanbul-Atatürk (IST) ...</p>
                    </li>
                    <li>
                        <div class="info">
                            Drop Off Address
                        </div>
                        <p>Airport Ankara-Esenboğa (ESB)... </p>
                    </li>
                    <li>
                        <div class="info">
                            Pick Up Date
                        </div>
                        <p>Sep 15, 2017</p>
                    </li>
                    <li>
                        <div class="info">
                            Pick Up Time
                        </div>
                        <p>9:45PM (21:45)</p>
                    </li>
                    <li>
                        <div class="info">
                            Duration
                        </div>
                        <p>About 5 hours – Distance: 476.2 km </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Summary Bar Area -->
<!-- Start Booking Steps Area -->
<section class="booking-steps-area mht">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="booking-steps">
                    <li class="active">
                        <span>1</span>
                        <div class="icon">
                            <img src="images/booking/car.png" alt="">
                        </div>
                        <div class="text">
                            CAR CLASS
                        </div>
                    </li>
                    <li>
                        <span>2</span>
                        <div class="icon">
                            <img src="images/booking/options.png" alt="">
                        </div>
                        <div class="text">
                            OPTIONS
                        </div>
                    </li>
                    <li>
                        <span>3</span>
                        <div class="icon">
                            <img src="images/booking/login.png" alt="">
                        </div>
                        <div class="text">
                            LOGIN
                        </div>
                    </li>
                    <li>
                        <span>4</span>
                        <div class="icon">
                            <img src="images/booking/card.png" alt="">
                        </div>
                        <div class="text">
                            CREADIT CARD
                        </div>
                    </li>
                    <li>
                        <span>5</span>
                        <div class="icon">
                            <img src="images/booking/check-out.png" alt="">
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
                    <p class="show">Select Location & Date</p>
                    <p class="hide">Hide</p>
                </div>
            </div>
        </div>
    </div>
</section>
        @yield('content-area-booking')

<!-- Javascript -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waves.min.js')}}"></script>
<!--   -->
<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/template.js')}}"></script>
<!-- Revolution Slider -->
<script type="text/javascript" src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/slider.js')}}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
@yield('js')