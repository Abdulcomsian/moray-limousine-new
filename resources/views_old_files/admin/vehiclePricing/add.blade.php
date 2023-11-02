{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Vehicle Pricing')

@section('content_header')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Vehicle Pricing Add</h1>
@stop

@section('content')
    <form method="post" action="{{url('admin/vehiclePricing/save')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="form-control">
                @foreach($vehicles AS $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="from">Pricing Type</label>
            <select name="pricing_type" id="pricing_type" onchange="pricingType(this.value);"  class="form-control">
                <option value="DISTANCE">Distance</option>
                <option value="LOCATION">Location</option>
            </select>
        </div>
        <div class="form-group" id="divPricingByDistance" style="display:none">
            <label for="pricingByDistance">Pricing By Distance</label>
            <select name="pricingByDistance" id="pricingByDistance"  class="form-control">
                @foreach($pricingByDistance AS $price)
                    <option value="{{$price->id}}">{{$price->from}} - {{$price->to}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="divPricingByLocation" style="display:none">
            <label for="pricingByLocation">Pricing By Location</label>
            <select name="pricingByLocation" id="pricingByLocation"  class="form-control">
                @foreach($pricingByLocation AS $price)
                    <option value="{{$price->id}}">{{$price->from}} - {{$price->to}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="base_price">Base Price</label>
            <input type="base_price" class="form-control" id="base_price" name="base_price" placeholder="" />
        </div>
        <div class="form-group">
            @csrf
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('admin/vehiclePricing')}}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function pricingType(value){
            switch(value){
                case 'DISTANCE':
                    $('div#divPricingByLocation').hide();
                    $('div#divPricingByDistance').show();
                break;
                case 'LOCATION':
                    $('div#divPricingByLocation').show();
                    $('div#divPricingByDistance').hide();
                break;
            }
        }        
        $(document).ready(function() {
            $('div#divPricingByDistance').show();
        });        
    </script>
@stop