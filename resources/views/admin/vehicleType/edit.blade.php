{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Vehicle Type')

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
    <h1>Vehicle Type Edit</h1>
@stop

@section('content')
    <form method="post" action="{{url('admin/vehicleType/update')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="" value="{{$vehicleType->name}}"/>
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <br/>
            <img src="{{asset('files/vehicleType/type_'.$vehicleType->id.'/'.$vehicleType->picture)}}" width="100px" height="100px" />
            <input type="file" class="form-control-file" id="picture" name="picture">
        </div>
        <div class="form-group">
            @csrf
            <input type="hidden" name="id" value="{{$vehicleType->id}}" />
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('admin/vehicleType')}}" class="btn btn-danger">Cancel</a>
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