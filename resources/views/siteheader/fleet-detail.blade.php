@extends('layouts.main-home-layout')
@section('title')
    Fahrzeugflotte
@endsection
@section('content-area')
<style>
    .heading-banner{
        font-weight: 500;
        font-size: 44px;
        line-height: 58px;
        color: #fff;
    }
    .heading-class{
        font-weight: 500;
        font-size: 44px;
        line-height: 58px;
        color: #000;
        text-align: center;
        margin-bottom: 40px;
    }
    .box-breadcrumb ul{
        padding: 0;
    }
    .box-breadcrumb ul li {
    display: inline-block;
    position: relative;
    padding: 0px 22px 0px 0px;
    }
    .box-breadcrumb ul li::before {
        content: "-";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 4px;
        color: #fff;
    }
    .box-breadcrumb ul li:last-child::before {
        content: none;
    }
    .box-breadcrumb ul li a {
        color: #fff;
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
    }
    .section-fleet-detail{
        padding-top: 100px;
        padding-bottom: 60px;
    }
    .weight-600{
        font-weight: 600;
    }
    .content-single{
        font-size: 16px;
    }
    .content-single p{
        font-size: 16px;
        line-height: 30px;
    }
    h6{
        font-weight: 600;
    }
    .list-ticks{
        padding-left: 0;
    }
    .list-ticks li {
    font-size: 16px;
    line-height: 50px;
    font-weight: 600;
    color: #181A1F;
    padding: 0px 0px 0px 40px;
    position: relative;
}

.list-ticks li::before {
    content: "";
    height: 25px;
    width: 25px;
    background-color: #FDEEEC;
    border-radius: 50%;
    background-image: url("https://creativelayers.net/themes/luxride-html/assets/imgs/page/homepage3/tick.svg");
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 50%;
    left: 0px;
    transform: translateY(-50%);
}
.section-class{
    padding-top: 60px;
    padding-bottom: 30px;
}
.cardIconTitleDesc .cardIcon {
    margin-bottom: 30px;
}
.cardIconTitleDesc .cardTitle {
    margin-bottom: 10px;
}
.cardIconTitleDesc .cardDesc {
    margin-bottom: 30px;
}
.cardIconTitleDescLeft .cardIconTitleDesc {
    text-align: left;
    padding: 40px 40px 10px 40px;
}
.cardIconTitleDescLeft .cardIconTitleDesc:hover {
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.05);
    border-radius: 18px;
}
</style>
    <div class="section-fleet-detail pt-60 pb-60 bg-black">
        <div class="container"> 
          <h1 class="heading-banner">Our Fleet</h1>
          <div class="box-breadcrumb"> 
            <ul>
              <li> <a href="#">Home</a></li>
              <li> <a href="fleet-list.html">Our Fleet</a></li>
            </ul>
          </div>
        </div>
    </div>
    <section class="section">
        <img src="{{asset('/images/banner.png')}}" alt="Car" class="car-picture w-100" />
        <!-- <img class="" src="assets/imgs/page/fleet/banner.png" alt="luxride"> -->
        <div class="container"> 
          <div class="mt-120 text-dark "> 
            <h2 class="heading-banner mb-30 text-dark title-fleet wow fadeInUp">Mercedes - Benz E-Class</h2>
            <div class="content-single wow fadeInUp weight-600"> 
              <p>The Mercedes S-Class is in a class of it’s own. It sets the standard in first-class chauffeur-driven luxury and prestige. This latest incarnation exceeds all expectations. Settle back and enjoy the sumptuous ride for working or relaxing. A truly luxurious and stylish limousine for comfortable chauffeur journeys.</p>
              <p>Et, morbi at sagittis vehicula rutrum. Lacus tortor, quam arcu mi et, at lectus leo nunc. Mattis cras auctor vel pharetra tempor. Rhoncus pellentesque habitant ac tempor. At aliquam euismod est in praesent ornare etiam id. Faucibus libero sit vehicula sed condimentum. Vitae in nam porttitor rutrum sed aliquam donec sed. Sapien facilisi lectus.</p>
              <h6 class="heading-24-medium color-text mb-30">We offer</h6>
              <ul class="list-ticks list-ticks-small">
                <li class="text-16 mb-20">100% Luxurious Fleet</li>
                <li class="text-16 mb-20">All Our Fleet Are Fully Valeted &amp; Serviced</li>
                <li class="text-16 mb-20">A Safe &amp; Secure Journey</li>
                <li class="text-16 mb-20">Comfortable And Enjoyable</li>
                <li class="text-16 mb-20">Clean, Polite &amp; Knowledgeable</li>
              </ul>
              <button class="btn161ID" type="button" style="color: white;width: 100%; background-color: #000;">Book Now
                    </button>
            </div>
          </div>
        </div>
    </section>
    <section class="section-class mt-120">
        <div class="container"> 
          <h2 class="heading-class wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Features Of Our Mercedes-Benz E-Class Vehicles</h2>
          <div class="row mt-50 cardIconTitleDescLeft"> 
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="cardIcon"><img src="{{asset('/images/camera.svg')}}" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Safety First</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="cardIcon"><img src="{{asset('/images/water.svg')}}" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Prices With No Surprises</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="cardIcon"><img src="{{asset('/images/coffee.svg')}}" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Private Travel Solutions</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="cardIcon"><img src="{{asset('/images/newspaper.svg')}}" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Safety First</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="cardIcon"><img src="{{asset('/images/cooperation.svg')}}" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Prices With No Surprises</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-30"> 
              <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="cardIcon"><img src="{{asset('/images/rim.svg')}}" alt="luxride"></div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">Private Travel Solutions</h5>
                </div>
                <div class="cardDesc">
                  <p class="text-16 color-text">Both you and your shipments will travel with professional drivers. Always with the highest quality standards.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
      <div class="container fleetContainer class1font">

        <div class="row">
            <div class="col-md-12">
                <p id="GK" style="margin-top: 0">Choose Your Fleet</p>
            </div>

            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <div class="col-md-4">
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
            @endif
        </div>


        </div>
@endsection
