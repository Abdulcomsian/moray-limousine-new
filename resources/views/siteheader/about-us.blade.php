@extends('layouts.main-home-layout')
@section('title')
About Us
@endsection
@section('content-area')
{{-- am adding this here about us css here because in the head file its conflicting with others  --}}
<link rel="stylesheet" href="{{ asset('css/aboutus.css') }}" />

<div class="black-box">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p id="txt1ID">About Us</p>
          <p>Home-About</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="imgClass">
        
      </div>
    </div>
  </div>

  <div class="container class1font">
    <div class="row mt-4">
      <div class="col-md-12">
        <h1>We remagine the way the world moves for the better</h1>
        <p>Welcome to [Company Name], your trusted partner for all your transportation needs. With [X] years of
          experience in the industry, we take pride in offering safe,
          reliable, and convenient taxi services to our valued customers.</p>
        <p>At [Company Name], we understand the importance of punctuality, comfort, and
          affordability when it comes to getting from one place to another. Our dedicated team
          of professional drivers and a modern fleet of vehicles are at your service 24/7, ensuring
          that you reach your destination comfortably and on time.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <ul class="custom-list">
          <li id="listID1">Lorem ipsum dolor sit amet.</li>
          <li id="listID1">Consectetur adipiscing elit.</li>
          <li id="listID1">Nulla vehicula odio sed justo.</li>
          <li id="listID1">Integer in mauris nec tellus consectetur.</li>
          <li id="listID1">Etiam consequat lacus eu odio dictum.</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container-fluid adjustCenID class1font">

    <div class="col-md-12">
      <div id="number_con">
        <div class="row">
          <div class="col-md-5 text-center">
            <h3>Showcase some <br>impressive numbers</h3>
          </div>
          <div class="col-md-2 text-center">
            <h3>285<h3>
                <p class="small">vehicles</p>
          </div>
          <div class="col-md-2 text-center">
            <h3>97<h3>
                <p class="small">Awards</p>
          </div>
          <div class="col-md-3 text-center">
            <h3>13K<h3>
                <p class="small">Happy Customers</p>
          </div>
        </div>

      </div>
    </div>

  </div>

  <div class="container class1font" id="cont7">
    <div class="row">
      <div class="col">
        <div>
          <p class="BK">Make Your Trip Your Way With Us</p>
        </div>
      </div>
    </div>
    <div class="row adjustCenID">
      <div class="col-md-3">

        <a href="#"><i class="fa-solid fa-user-shield center BK1" style="color:black;"></i></a>
        <p class="BK4">Safety First</p>
        <p class="BK7">At Safety First Car Company, your well-<br>being is paramount. Drive with confidence,<br> knowing
          our vehicles prioritize your safety<br> at every turn.</p>
      </div>
      <div class="col-md-3">
        <a href="#"><i class="fa-solid fa-hand-holding-dollar center BK1" style="color:black;"></i></a>
        <p class="BK4">Price With No Suprise</p>
        <p class="BK7">Experience transparent pricing at its finest with our cars<br> no surprises, just straightforward
          and honest pricing practices.<br> at every turn.</p>

      </div>
      <div class="col-md-3">
        <a href="#"><i class="fa-solid fa-car-rear center BK1" style="color:black;"></i></a>
        <p class="BK4">Private Travel Solutions</p>
        <p class="BK7">Discover the ultimate private travel solution,<br> tailored to provide luxury, comfort, and<br>
          convenience for your journeys.</p>
      </div>

    </div>
  </div>

  <div class="container-fluid class1font" id="cont10">
    <div class="row">
      <div class="col-md-6 adjustCenID">

        <ul class="custom-list2">
          <h1 style="color: White">How It Works</h1>
          <li class="liID21">Create Your Route.</li>
          <p class="txtpara1">Enter your pickup and drop<br> of loaction or the number of hours<br>
            you wish to book a car</p>
          <li class="liID22">Choose Vehicle For You</li>
          <p class="txtpara">Enter your pickup and drop<br> of loaction or the number of hours<br>
            you wish to book a car</p>
          <li class="liID21">Enjoy The Journey</li>
          <p class="txtpara1">Enter your pickup and drop<br> of loaction or the number of hours<br>
            you wish to book a car</p>
        </ul>

      </div>
      <div class="col-md-4 adjustCenID">
        <div>
          <a href="#"><img src="images/DD2.jpg" class="EK4" alt="Avatar"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid class1font" id="cont11">
    <div class="row">
      <div class="col-md-6 adjustCenID">

        <div class="Devtxt">
          <a href="#"><i class="fa-regular fa-user EK" style="color:white;"></i></a>
          <p class="EK1">Hamza</p>
          <p class="EK2">Web-Developer</p>
          <p class="EK3">I really recommend this theme,<br>because it's coded very well and it's<br>really easy to build
            your own websites!</p>
        </div>

      </div>
      <div class="col-md-4 adjustCenID">
        <div>
          <a href="#"><img src="images/C8.jpg" class="EK41" alt="Avatar"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid class1font">
    <div class="col-md-12">
      <div class="partner_con border-bottom">
        <div class="row">
          <div class="col-md-4 text-center">
            <h4>The Partners who sell<br>our products</h4>
          </div>
          <div class="col-md-2 text-center">
            <i class="fa-solid fa-car fa-3x"></i>
          </div>
          <div class="col-md-2 text-center">
            <i class="fa-solid fa-motorcycle fa-3x"></i>
          </div>
          <div class="col-md-2 text-center">
            <i class="fa-solid fa-business-time fa-3x"></i>
          </div>
          <div class="col-md-2 text-center">
            <i class="fa-solid fa-user-secret fa-3x"></i>
          </div>
        </div>

      </div>
    </div>

  </div>

  
    <div class="container adjustCenID class1font">
        <div class="col-md-6">
            <p class="ptitle adjustCenID">Frequently Asked Questions</p>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <p class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <p class="font-weight-bold">How do I Create an account?
                            <p>
                        </button>
                    </p>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                            body.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <p class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <p class="font-weight-bold">How do I earn Easy Ride Rewads points?
                            <p>
                        </button>
                    </p>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                            body. Let's imagine this being filled with some actual content.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <p class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <p class="font-weight-bold">How can I add my credit card on the app for payments?
                            <p>
                        </button>
                    </p>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                            body. Nothing more exciting
                            happening here in terms of content, but just filling up the space to make it look, at least
                            at first glance, a bit more representative of how this would look in a real-world
                            application.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <p class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                            aria-controls="flush-collapseFour">
                            <p class="font-weight-bold">How do I became a Captain?
                            <p>
                        </button>
                    </p>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                            body. Nothing more exciting happening here in terms of content, but just filling up the
                            space to make it look, at least at first glance, a bit more representative of how this would
                            look in a real-world application.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <p class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFive" aria-expanded="false"
                            aria-controls="flush-collapseFive">
                            <p class="font-weight-bold">Where can I get more information,support or make a claim?
                            <p>
                        </button>
                    </p>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                            body.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid class1font" id="cont14">
      <div class="row align-items-center">
        <div class="col-md-5">
          <div class="row adjustCenID text-center">
            <p class="IK11">Download the app</p>
          </div>
          <div class="row text-center">
            <p class="IK111">To download our app, simply visit your device's app store<br> (iOS App Store or Google Play
              Store).</p>
          </div>
          <div calss="row" class="btn14ID">
            <button type="button" class="btn btn-light" id="btn14"><a href="#"><i class="fa-brands fa-apple" id="apple1"
                  style="color:black"></i></a>
              <p id="lin11"> | </p>
              <p class="IK21">Download on the</p>
              </p>
              <p class="IK31">Apple Store</p>
            </button>
            <button type="button" class="btn btn-light" id="btn14"><a href="#"><i class="fa-brands fa-google-play"
                  id="apple1" style="color:black"></i></a>
              <p id="lin11"> | </p>
              <p class="IK21">Get in on</p>
              </p>
              <p class="IK31">Play Store</p>
            </button>
          </div>
        </div>
        <div class="col-md-6 adjustCenID">
          <div>
            <a href="#"><img src="images/C7.jpg" class="imgClassCon14" alt="Avatar"></a>
          </div>
        </div>
    
      </div>
    </div>




    {{-- <section class="top-title">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>ABOUT</h1>
                            <p class="sub-title">We are the most popular limousine service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="template-title center">
                        <h1 class="title has-over">{{$home_content['about_us_title']}}</h1>
                        <span>{{$home_content['about_us_title']}}</span>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="images">
                        <img src="{{asset('images/fleet/single_f.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-about">
                        <p>
                          {{$home_content['about_us_description']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    </section> --}}

@endsection




