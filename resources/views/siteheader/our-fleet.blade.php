@extends('layouts.main-home-layout')
@section('title')
    Fahrzeugflotte
@endsection
@section('content-area')
    <div class="black-box class1font">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p id="txt1ID">{{$home_content['our_fleet_title']}}</p>
                    <p>Home-Our Fleet</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container fleetContainer class1font">

        <div class="row">
            <div class="col-md-6">
                <p id="GK" style="margin-top: 0">Choose Your Fleet</p>
            </div>
            {{-- <div class="col-md-3 textalign fleet-btn">
                <button class="btn btn" id="lastest" type="submit">Vehicle Type <i class="fa-solid fa-arrow-trend-up"
                        id="late" style="color:black;"></i></button>
            </div>
            <div class="col-md-3 textalign fleet-btn">
                <button class="btn btn" id="lastest" type="submit">Vehicle Make <i class="fa-solid fa-arrow-trend-up"
                        id="late" style="color:black;"></i></button>
            </div> --}}
        </div>
        <div class="row">
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <div class="col-md-4">
                    <div class="car-container hover-element">
                                <p class="text-left font-weight-bold fleet-card--title">{{ $category->name }}</p>
                                <p class="car-descrip">{{ strip_tags(\Illuminate\Support\Str::limit($category->description, 20)) }}</p>
                                <img src="{{ asset('files/vehicleCategory/category_img') }}/{{ $category->picture }}"
                                    alt="Car" class="car-picture" />
                                    <!-- <img src="{{asset('/images/car1.png')}}" alt=""> -->
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
                {{-- pagination links --}}
                {{ $categories->links() }}
            @endif
        </div>

        {{-- old pagination - static - not workable --}}
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
