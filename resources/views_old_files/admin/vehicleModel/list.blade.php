{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Vehicle Model')

@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1>Vehicle Model</h1>
    <div class="row">
        <div class="col-md-12">
            <a class="pull-right btn btn-primary" href="{{url('admin/vehicleModel/add')}}">Add Vehicle Model</a>
        </div>
    </div>
@stop

@section('content')
    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
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
            @foreach($vehicleModel AS $vm)
                <tr>
                    <td>{{$vm->id}}</td>
                    <td><img src="{{asset('files/vehicleModel/model_'.$vm->id.'/'.$vm->picture)}}" width="100px" height="100px"/></td>
                    <td>{{$vm->name}}</td>
                    <td>{{$vm->created_at->format('d-M-Y')}}</td>
                    <td><a href="{{url('admin/vehicleModel/edit/'.$vm->id)}}">Edit</a> | <a href="{{url('admin/vehicleModel/delete/'.$vm->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
