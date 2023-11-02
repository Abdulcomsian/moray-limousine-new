{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Vehicle Category')

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
    <h1>Vehicle Category Edit</h1>
@stop

@section('content')
    <form method="post" action="{{url('admin/vehicleCategory/update')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="" value="{{$vehicleCategory->name}}"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="" >{{$vehicleCategory->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <br/>
            <img src="{{asset('files/vehicleCategory/category_'.$vehicleCategory->id.'/'.$vehicleCategory->picture)}}" width="100px" height="100px" />
            <input type="file" class="form-control-file" id="picture" name="picture">
        </div>
        <div class="form-group">
            @csrf
            <input type="hidden" name="id" value="{{$vehicleCategory->id}}" />
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('admin/vehicleCategory')}}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
        });        
    </script>
@stop