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
            <div class="col-md-3 textalign fleet-btn">
                <button class="btn btn" id="lastest" type="submit">Vehicle Type <i class="fa-solid fa-arrow-trend-up"
                        id="late" style="color:black;margin-bottom: 23px;"></i></button>
            </div>
            <div class="col-md-3 textalign fleet-btn">
                <button class="btn btn" id="lastest" type="submit">Vehicle Make <i class="fa-solid fa-arrow-trend-up"
                        id="late" style="color:black;margin-bottom: 23px;"></i></button>
            </div>

            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <div class="col-md-4">

                        <div class="car-container hover-element" style="height: auto">
                            <p class="text-left font-weight-bold car-container-text">{{ $category->name }}</p>
                            {{ strip_tags(\Illuminate\Support\Str::limit($category->description, 20)) }}
                            <img src="{{ asset('files/vehicleCategory/category_img') }}/{{ $category->picture }}"
                                alt="Car" class="car-picture" />
                            <div class="car-info">
                                <div class="row adjustCenID4242" >
                                    <div class="col-md-5">
                                        <span class="icon-text">
                                            <i class="fa-solid fa-people-group" id="persons"></i>
                                            <p id="passenger">Passengers {{ $category->max_seats }}</p>
                                        </span>
                                    </div>
                                    <div class="col-md-5">
                                        <span class="icon-text">
                                            <i class="fa-solid fa-briefcase" id="person1"></i>
                                            <p id="passenger1">Luggage {{ $category->max_bags }}</p>
                                        </span>
                                    </div>
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
