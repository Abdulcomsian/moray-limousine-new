{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Pricing By Distance')

@section('content_header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1>Pricing By Distance</h1>
    <div class="row">
        <div class="col-md-12">
            <a class="pull-right btn btn-primary" href="{{url('admin/pricingByDistance/add')}}">Add Pricing By Distance</a>
        </div>
    </div>
@stop

@section('content')
<table id="dataTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>From</th>
                <th>To</th>
                <th>Price</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pricingByDistance AS $vm)
                <tr>
                    <td>{{$vm->id}}</td>
                    <td>{{$vm->from}}</td>
                    <td>{{$vm->to}}</td>
                    <td>{{$vm->price}}</td>
                    <td>{{$vm->created_at->format('d-M-Y')}}</td>
                    <td><a href="{{url('admin/pricingByDistance/edit/'.$vm->id)}}">Edit</a> | <a href="{{url('admin/pricingByDistance/delete/'.$vm->id)}}">Delete</a></td>
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