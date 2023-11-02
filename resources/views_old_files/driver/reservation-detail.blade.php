@extends('layouts.driver')
@section('title', 'Reservation Detail')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Reservation Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 pt-2 border-bottom">
                            <h3 class="text-center">{{$booking->vehicleType->name . ' Class'}}</h3>
                            <img src="{{asset('files/vehicleCategory/category_img/'.$booking->vehicleType->picture)}}" alt="Vehicle Class Image" class="img-fluid">
                        </div>
                        <div class="col-md-4 pt-2 pl-4 border-left border-bottom">
                            <strong class="d-inline-block mb-2">Booking Date:</strong>
                            <div class="border-bottom mb-3">
                                {{date('d - M - yy',strtotime($booking->pick_created_at))}}
                            </div>
                            <strong class="d-inline-block mb-2">Pickup Date:</strong>
                            <div class="border-bottom mb-3">
                                {{date('d - M - yy',strtotime($booking->pick_date))}}
                            </div>
                            <strong class="d-inline-block mb-2">Pickup Time:</strong>
                            <div class="border-bottom mb-2">{{$booking->pick_time}}</div>
                        </div>
                        <div class="col-md-4 pl-4 pt-2 border-left border-bottom">
                            <strong class="d-inline-block mb-2">Pickup Address:</strong>
                            <div class="border-bottom mb-3">{{$booking->pick_address}}</div>
                            <strong class="d-inline-block mb-2">Drop Address:</strong>
                            <div class="border-bottom mb-2">{{$booking->drop_address}}</div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <h3 class="text-center">Assigned Vehicle</h3>
                            <img src="{{asset('admin-vehicle-img/'.$booking->vehicle()->first()->image_name)}}" alt="Vehicle Image" class="img-fluid">
                            <strong class="d-block text-center">{{$booking->vehicle()->first()->title}} | {{$booking->vehicle()->first()->model_no}}</strong>
                        </div>
                        <div class="col-md-8 pl-3 border-left pt-2">
                            <h3>Extra Options</h3>
                                @php $counter = 1 @endphp
                                @if(count($booking->selectedOptions) > 0)
                                <table id="myTable" class="table myTable table-condensed">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Net Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($booking->selectedOptions as $option)
                                        <tr>
                                            <th scope="row">{{$counter++}}</th>
                                            <td>{{$option->option_name}}</td>
                                            <td>{{$option->quantity}}</td>
                                            <td>{{$option->price}}</td>
                                            <td>{{$option->price * $option->quantity}}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                @else
                                    <h4>NO Extra Option Selected</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('side-bar')
    @include('parshall-views._driver-side-bar')
@endsection
