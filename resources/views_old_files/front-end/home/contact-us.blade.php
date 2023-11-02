@extends('layouts.app')
@section('title','Contact Us')
@section('content')
    <div class="sub-banner overview-bgi">
        <div class="overlay">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumbs">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Contact body start -->
    <div class="contact-1 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1>Contact Us</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <!-- Contact form start -->
                    <div class="contact-form">
                        <form id="contact_form" action="https://storage.googleapis.com/themevessel-products/the-nest/index.html" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group fullname">
                                        <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group enter-email">
                                        <input type="email" name="email" class="input-text" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="input-text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="input-text" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                    <div class="form-group message">
                                        <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group send-btn mb-0">
                                        <button type="submit" class="button-md button-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form end -->
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
                    <!-- Contact details start -->
                    <div class="contact-details">
                        <div class="main-title-2">
                            <h3>Our Address</h3>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4>Office Address</h4>
                                <p>Gujranwala</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>Phone Number</h4>
                                <p>
                                    <a href="tel:0477-0477-8556-552">office: 055 8556 552</a>
                                </p>
                                <p>
                                    <a href="tel:+55-417-634-7071">Mobile: +92 303 634 7071</a>
                                </p>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-left">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h4>Email Address</h4>
                                <p>
                                    <a href="mailto:info@themevessel.com">info@AimgetSolution.com</a>
                                </p>
                                <p>
                                    <a href="http://themevessel.com/" target="_blank">http://themevessel.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact details end -->
                </div>
            </div>
        </div>
    </div>
@endsection
