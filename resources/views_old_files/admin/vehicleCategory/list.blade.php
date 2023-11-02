{{-- resources/views/admin/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Admin:Vehicle Category')

@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1>Vehicle Category</h1>
    <div class="row">
        <div class="col-md-12">
            <a class="pull-right btn btn-primary" href="{{url('admin/vehicleCategory/add')}}">Add Vehicle Category</a>
        </div>
    </div>
@stop

@section('content')
<table id="dataTable" class="display" style="width:100%">
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
            @foreach($vehicleCategory AS $vm)
                <tr>
                    <td>{{$vm->id}}</td>
                    <td><img src="{{asset('files/vehicleCategory/category_'.$vm->id.'/'.$vm->picture)}}" width="100px" height="100px"/></td>
                    <td>{{$vm->name}}</td>
                    <td>{{$vm->created_at->format('d-M-Y')}}</td>
                    <td><a href="{{url('admin/vehicleCategory/edit/'.$vm->id)}}">Edit</a> | <a href="{{url('admin/vehicleCategory/delete/'.$vm->id)}}">Delete</a></td>
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
            $('#dataTable').DataTable();
        });        
    </script>
@stop