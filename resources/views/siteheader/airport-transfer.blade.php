@extends('layouts.main-home-layout')
@section('title')
    Our Services
@endsection
@section('content-area')

    {{-- our services css included in own file because if I put it in the head file it will make a lot of conflicts with Homepage CSS because most of the classes and ids are Same  --}}
    <link rel="stylesheet" href="{{ asset('css/ourServices.css') }}">


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

    <div class="container team-container class1font">

        <div class="row text-left adjustCenID">

            @if (count($services) > 0)
                @foreach ($services as $service)
                    <div class="col-md-4 team-member">
                        <a href="{{ url('service/details', $service->id) }}">
                            <img src="{{ asset('files/services-images' . '/' . $service->service_image) }}"
                                alt="Team Member 1" id="con222" style="height: 250px">
                            <div class="check">{{ $service->service_title }}</div>
                            <div class="overlay">

                                <div class="overlay-circle">
                                    <div class="member-name">{{ $service->service_title }}</div>
                                    <div class="member-description">
                                        {{ strip_tags(\Illuminate\Support\Str::limit($service->long_description, 20)) }}
                                    </div>
                                    <i class="fas fa-arrow-trend-up"></i>
                                </div>
                            </div>
                        </a>
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
