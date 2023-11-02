@extends('layouts.driver')
@section('title')
Vehicle List
@endsection
<style>
    #myTable_filter{
        float: right;
    }
    #myTable_paginate{
        float: right;
        padding-top: 10px;
        padding-right: 5px;
    }
</style>
@section('content')
    @include('parshall-views._main-vehicle-listings',['addVehicleRoute' => url('partner/add-new-vehicle')])
@endsection

@section('side-bar')
    @include('parshall-views._partner-side-bar')
@endsection

@section('js')
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    <script>
        function vehicleUrls(){
            return[
                '{{url('admin/approveVehicle')}}/',
                '{{url('admin/deleteVehicle')}}/',
                '{{url('admin/disapproveVehicle')}}/',
                '{{url('admin/vehicleDetail')}}/',

                '{{url('vehicle/all-vehicles')}}/',
                '{{url('vehicle/pending-vehicles')}}/',
                '{{url('vehicle/approved-vehicles')}}/',
                '{{url('vehicle/disapproved-vehicles')}}/',
                '{{url('vehicle/blocked-vehicles')}}/',
            ]
        }
    </script>
    <script type="text/javascript" src="{{asset('DataTable/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin/vehicle.js')}}"></script>
@endsection
