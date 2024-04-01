{{-- resources/views/admin/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Admin:Vehicle Type')

@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1>Vehicle Type</h1>
    <div class="row">
        <div class="col-md-12">
            <a class="pull-right btn btn-primary" href="{{url('admin/vehicleType/add')}}">Add Vehicle Type</a>
        </div>
    </div>
@stop

@section('content')
<table id="dataTable" class="display myTable" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicleType AS $vt)
                <tr>
                    <td>{{$vt->id}}</td>
                    <td>
                        <img src="{{asset('files/vehicleType/type_'.$vt->id.'/'.$vt->picture)}}" alt="no_img found" width="100px" height="100px"/></td>
                    <td>{{$vt->name}}</td>
                    <td>{{$vt->created_at->format('d-M-Y')}}</td>
                    <td><a href="{{url('admin/vehicleType/edit/'.$vt->id)}}">Edit</a> | <a href="{{url('admin/vehicleType/delete/'.$vt->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive : true
            });
        });
    </script>
@stop
