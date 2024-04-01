@extends('layouts.main-home-layout')
@section('title')
    Our Services
@endsection
@section('content-area')

    {{-- our services css included in own file because if I put it in the head file it will make a lot of conflicts with Homepage CSS because most of the classes and ids are Same  --}}
    <link rel="stylesheet" href="{{ asset('css/ourServices.css') }}">

<style>
    .cardServiceStyle4 {
    height: auto;
    background-color: #fff;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    overflow: visible;
}
.cardService {
    height: auto;
    width: 100%;
    position: relative;
    border-radius: 6px;
}
.cardService a{
    color: #000;
    text-decoration: none;
}
.cardServiceStyle4 .cardImage {
    position: relative;
    top: auto;
}
.team-member{
    overflow: unset !important;
}
.cardService .cardImage {
    position: relative;
    top: auto;
    left: auto;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.cardService .cardImage::before {
    content: "";
    background-image: url("https://creativelayers.net/themes/luxride-html/assets/imgs/page/homepage1/bg-trans.png");
    background-position: bottom left;
    background-repeat: repeat-x;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 2;
}
.cardServiceStyle4 .cardImage img {
    width: 100%;
    border-radius: 6px 6px 0 0;
    display: block;
}
.cardService .cardImage img {
    height: 300px;
    min-height: 100%;
    position: relative;
    z-index: 1;
    width: 100%;
    display: block;
}
.cardServiceStyle4 .cardInfo {
    position: relative;
    bottom: auto;
    left: auto;
    padding: 20px 30px;
    width: 100%;
    z-index: 3;
}
.cardServiceStyle4 .cardInfo .color-white {
    color: #181A1F !important;
    margin: 0;
    font-size: 25px;
}
.page-link{
    color: #000;
}
.page-item.active .page-link{
    background-color: #000;
    border-color: #000;
}
</style>
    <div class="black-box class1font">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p id="txt1ID">{{$home_content['our_services_title']}}</p>
                    <p>Home-Services</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container team-container class1font" style="background-color: #fff;">

        <div class="row text-left adjustCenID">

            @if (count($services) > 0)
                @foreach ($services as $service)
                    <div class="col-md-4 team-member">
                        <div class="cardService cardServiceStyle4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <a href="{{ url('service/details', $service->id) }}">
                                <div class="cardImage"><img src="{{ asset('files/services-images' . '/' . $service->service_image) }}" alt="Luxride"></div>
                                <div class="cardInfo">
                                    <h3 class="cardTitle text-20-medium color-white mb-10">{{ $service->service_title }}</h3>
                                </div>
                            </a>
                        </div>
                        <!-- <a href="{{ url('service/details', $service->id) }}" class="service-link-tag">
                                <img src="{{ asset('files/services-images' . '/' . $service->service_image) }}" alt="services" id="con222">
                                <div class="check">{{ $service->service_title }}</div>
                                <div class="overlay">

                                    <div class="overlay-circle">
                                        <div class="member-name">{{ $service->service_title }}</div>
                                        <div class="member-description">
                                            {{ strip_tags(\Illuminate\Support\Str::limit($service->long_description, 20)) }}
                                        </div>
                                        <i class="fa-solid fa-arrow-up-long arrow"></i>
                                    </div>
                                </div>
                            </a> -->
                    </div>
                @endforeach
                {{-- pagination links  --}}
                {{ $services->links() }}
            @endif


        </div>
        {{-- old pagination -static and not workable  --}}
        {{-- <div class="pagination class1font">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></i></button>
            <button class="page active">1</button>
            <button class="page">2</button>
            <button class="page">3</button>
            <button class="page">...</button>
            <button class="page">10</button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div> --}}
    </div>
@endsection
