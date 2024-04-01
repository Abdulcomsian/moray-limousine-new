@extends('layouts.master-admin')
@section('title')
  Add Vehicles
@endsection
<style>
    .dataTables_filter{
        float: right;
    }
</style>
@section('main-content')
    @include('parshall-views._main-vehicle-listings' , ['addVehicleRoute' => url('admin/add-vehicle')])
@endsection

@section('js')
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
    <script type="text/javascript" src="{{asset('js/admin/vehicle.js')}}"></script>
@endsection
