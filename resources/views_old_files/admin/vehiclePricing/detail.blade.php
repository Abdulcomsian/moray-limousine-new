@extends('layouts.master-admin')
@section('title', 'Pricing Detail')

@section('css')
    <style>
        .table thead th{
            font-weight: bold;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid pb-3">

                <div class="card-header bg-white">
                    <h2>Vehicle Pricing Detail</h2>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Category Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label><strong>Category Image</strong></label>
                                <img class="img-fluid" src="{{asset('files/vehicleCategory/category_img')}}/{{$vehicleCategory->picture}}" alt="Category Image">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Category Title:</strong></label>
                                        <div>{{$vehicleCategory->name}}</div>
                                        <label class="mt-3"><strong>Max Bag:</strong></label>
                                        <div>{{$vehicleCategory->max_bags}}</div>
                                        <label class="mt-3"><strong>Max Seats:</strong></label>
                                        <div>{{$vehicleCategory->max_seats}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Created By:</strong></label>
                                        <div>{{$vehicleCategory->user()->first()->first_name . ' ' . $vehicleCategory->user()->first()->last_name}}</div>
                                        <label class="mt-3"><strong>Category Description:</strong></label>
                                        <div>{!! $vehicleCategory->description !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Pricing in Kilometers</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price Type</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{! $counter = 1}}
                                @foreach($vehicleCategory->pricing()->where('pricing_type', 'per_km')->get() as $price)
                                    <tr>
                                    <td>{{$counter++}}</td>
                                    <td>{{$price->from}}</td>
                                    <td>{{$price->to}}</td>
                                    <td>{{(($price->is_price_fixed) ? 'Fixed' : 'Per/KM')}}</td>
                                    <td>{{($price->is_price_fixed) ? $price->fixed_price : $price->base_price}} {{\App\Utills\Constants\AppConsts::APP_CURRENCY_SYMBOL}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Pricing in Hours</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price Type</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{! $counter = 1}}
                            @foreach($vehicleCategory->pricing()->where('pricing_type', 'per_hr')->get() as $price)
                                <tr>
                                    <td>{{$counter++}}</td>
                                    <td>{{$price->from}}</td>
                                    <td>{{$price->to}}</td>
                                    <td>{{(($price->is_price_fixed) ? 'Fixed' : 'Per/Hour')}}</td>
                                    <td>{{($price->is_price_fixed) ? $price->fixed_price : $price->base_price}} {{\App\Utills\Constants\AppConsts::APP_CURRENCY_SYMBOL}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
