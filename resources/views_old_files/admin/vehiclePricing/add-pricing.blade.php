@extends('layouts.master-admin')
@section('title', $edit ? 'Edit Vehicle Pricing' : 'Add Vehicle Pricing')

@section('css')
    <style>
        .invalid-feedback{
            display: none;
        }
    </style>
@endsection

@section('main-content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{session('success')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <h2 class="card-header bg-light">{{$edit ? 'Edit Vehicle Pricing' : 'Add New Vehicle Pricing'}}</h2>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active " id="price-km" data-toggle="tab" href="#km" role="tab"
                                   aria-controls="price-km" aria-selected="true">Price Per KM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="price-hr" data-toggle="tab" href="#hr" role="tab"
                                   aria-controls="price-hr" aria-selected="false">Price Per Hour</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Tab for price per kilometer -->
                            <div class="tab-pane fade show pt-3 active" id="km" role="tabpanel"
                                 aria-labelledby="price-km">
                                <form id="price-km-form" class="add-new-price-form" action="{{route('admin.vehiclePricing.save')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="is_edit" value="{{$edit}}">
                                    <input type="hidden" name="pricing_type" value="per_km">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-6 mr-auto ml-0">
                                            <div class="form-group">
                                                <label for="categoryKM">Category:</label>
                                                <input type="hidden" value="{{$vehicleCategory->id}}" name="category_id">
                                                <input type="text" disabled value="{{$vehicleCategory->name}}" id="categoryKM">
                                            </div>
                                        </div>
                                        <div class="col-12 price-container">
                                            @if($vehicleCategory->pricing()->where('pricing_type', 'per_km')->exists())
                                                {{! $number = 1}}
                                                @foreach($vehicleCategory->pricing()->where('pricing_type', 'per_km')->get() as $price)
                                                    @if($loop->last)
                                                        @include('admin._partials._add-new-price-fields-edit', ['unit' => 'KM', 'wrapper' => 'last',  'number' => $number++, 'price' => $price])
                                                    @else
                                                        @include('admin._partials._add-new-price-fields-edit', ['unit' => 'KM', 'number' => $number++, 'price' => $price])
                                                    @endif
                                                @endforeach
                                            @else
                                                @include('admin._partials._add-new-price-fields', ['unit' => 'KM', 'number' => '1'])
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2 text">
                                            <input type="submit" class="bt btn-dark rounded-0" value="{{$edit ? 'Update Pricing' : 'Save Pricing'}}">
                                            <span class="d-inline-block action-button add-price-fields pull-right" data-price-unit="KM">
                                                <i class="fa fa-plus-circle fa-2x"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Tab for price per hour -->
                            <div class="tab-pane fade pt-3" id="hr" role="tabpanel" aria-labelledby="price-hr">
                                <form id="price-km-form" class="add-new-price-form" action="{{route('admin.vehiclePricing.save')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="pricing_type" value="per_hr">
                                    <input type="hidden" name="is_edit" value="{{$edit}}">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-6 mr-auto ml-0">
                                            <div class="form-group">
                                                <label for="categoryHR">Category:</label>
                                                <input type="hidden" value="{{$vehicleCategory->id}}" name="category_id">
                                                <input type="text" disabled value="{{$vehicleCategory->name}}" id="categoryHR">
                                            </div>
                                        </div>
                                        <div class="col-12 price-container">
                                            @if($vehicleCategory->pricing()->where('pricing_type', 'per_hr')->exists())
                                                {{! $number = 1}}
                                                @foreach($vehicleCategory->pricing()->where('pricing_type', 'per_hr')->get() as $price)
                                                    @if($loop->last)
                                                        @include('admin._partials._add-new-price-fields-edit', ['unit' => 'HOUR', 'wrapper' => 'last',  'number' => $number++, 'price' => $price])
                                                    @else
                                                        @include('admin._partials._add-new-price-fields-edit', ['unit' => 'HOUR', 'number' => $number++, 'price' => $price])
                                                    @endif
                                                @endforeach
                                            @else
                                                @include('admin._partials._add-new-price-fields', ['unit' => 'HOUR', 'number' => '1'])
                                            @endif
                                        </div>
                                        <div class="col-12 mt-2 text">
                                            <input type="submit" class="bt btn-dark rounded-0" value="{{$edit ? 'Update Pricing' : 'Save Pricing'}}">
                                            <span class="d-inline-block action-button add-price-fields pull-right" data-price-unit="HOUR">
                                                <i class="fa fa-plus-circle fa-2x"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        let routePricingFields = '{{route('admin.vehiclePricing.priceFields')}}';
    </script>
    <script type="text/javascript" src="{{asset('js/add-pricing.js')}}"></script>
@endsection