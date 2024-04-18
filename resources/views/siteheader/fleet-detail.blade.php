@extends('layouts.main-home-layout')
@section('title')
    Fahrzeugflotte
@endsection
@section('content-area')
    <style>
        .heading-banner {
            font-weight: 500;
            font-size: 44px;
            line-height: 58px;
            color: #fff;
        }

        .heading-class {
            font-weight: 500;
            font-size: 44px;
            line-height: 58px;
            color: #000;
            text-align: center;
            margin-bottom: 40px;
        }

        .box-breadcrumb ul {
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

        .section-fleet-detail {
            padding-top: 100px;
            padding-bottom: 60px;
        }

        .weight-600 {
            font-weight: 600;
        }

        .content-single {
            font-size: 16px;
        }

        .content-single p {
            font-size: 16px;
            line-height: 30px;
        }

        h6 {
            font-weight: 600;
        }

        .list-ticks {
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

        .section-class {
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
        <img src="{{ asset('/images/banner.png') }}" alt="Car" class="car-picture w-100" />
        <!-- <img class="" src="assets/imgs/page/fleet/banner.png" alt="luxride"> -->
        <div class="container">
            <div class="mt-120 text-dark ">
                <h2 class="heading-banner mb-30 text-dark title-fleet wow fadeInUp">{{ $fleetData->name }}</h2>
                <div class="content-single wow fadeInUp weight-600">
                    {!! $fleetData->long_description !!}
                    <button class="btn161ID" type="button" style="color: white;width: 100%; background-color: #000;">Book
                        Now
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="section-class mt-120">
        <div class="container">
            <h2 class="heading-class wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                {{ $fleetData->feature_heading }}</h2>
            <div class="row mt-50 cardIconTitleDescLeft">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="cardIcon">
                            @if (isset($featureOne->icon))
                                <img src="{{ asset('files/vehicleCategory/category_img/' . $featureOne->icon) }}"
                                    alt="luxride">
                            @else
                                <img src="{{ asset('/images/camera.svg') }}" alt="luxride">
                            @endif
                        </div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">{{ $featureOne->heading ?? '' }}</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">{{ $featureOne->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="cardIcon">
                            @if (isset($featureTwo->icon))
                                <img src="{{ asset('files/vehicleCategory/category_img/' . $featureTwo->icon) }}"
                                    alt="luxride">
                            @else
                                <img src="{{ asset('/images/water.svg') }}" alt="luxride">
                            @endif
                        </div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">{{ $featureTwo->heading ?? '' }}</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">{{ $featureTwo->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="cardIcon">
                            @if (isset($featureThree->icon))
                                <img src="{{ asset('files/vehicleCategory/category_img/' . $featureThree->icon) }}"
                                    alt="luxride">
                            @else
                                <img src="{{ asset('/images/coffee.svg') }}" alt="luxride">
                            @endif
                        </div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">{{ $featureThree->heading ?? '' }}</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">{{ $featureThree->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="cardIcon">
                            @if (isset($featureFour->icon))
                                <img src="{{ asset('files/vehicleCategory/category_img/' . $featureFour->icon) }}"
                                    alt="luxride">
                            @else
                                <img src="{{ asset('/images/newspaper.svg') }}" alt="luxride">
                            @endif

                        </div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">{{ $featureFour->heading ?? '' }}</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">{{ $featureFour->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="cardIcon">
                            @if (isset($featureFive->icon))
                                <img src="{{ asset('files/vehicleCategory/category_img/' . $featureFive->icon) }}"
                                    alt="luxride">
                            @else
                                <img src="{{ asset('/images/cooperation.svg') }}" alt="luxride">
                            @endif

                        </div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">{{ $featureFive->heading ?? '' }}</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">{{ $featureFive->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-30">
                    <div class="cardIconTitleDesc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="cardIcon">
                            @if (isset($featureSix->icon))
                                <img src="{{ asset('files/vehicleCategory/category_img/' . $featureSix->icon) }}"
                                    alt="luxride">
                            @else
                                <img src="{{ asset('/images/rim.svg') }}" alt="luxride">
                            @endif

                        </div>
                        <div class="cardTitle">
                            <h5 class="text-20-medium color-text">{{ $featureSix->heading ?? '' }}</h5>
                        </div>
                        <div class="cardDesc">
                            <p class="text-16 color-text">{{ $featureSix->description ?? '' }}</p>
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
                            <div id="card{{ $category->id }}" class="car-container hover-element clickable-card">
                                <p class="text-left font-weight-bold fleet-card--title">{{ $category->name }}</p>
                                <p class="car-descrip">
                                    {{ strip_tags(\Illuminate\Support\Str::limit($category->description, 20)) }}</p>
                                <img src="{{ asset('files/vehicleCategory/category_img') }}/{{ $category->picture }}"
                                    alt="Car" class="car-picture" />
                                {{-- <img src="{{asset('/images/car1.png')}}" alt=""> --}}
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

@section('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            let cards = document.querySelectorAll('.clickable-card');
            cards.forEach(function(card) {
                let categoryId = card.getAttribute('id').replace('card', '');
                card.addEventListener('click', function() {
                    window.location.href = "{{ url('/fleet-detail/') }}" + '/' + categoryId;
                });
            });
        });
    </script>
@endsection
