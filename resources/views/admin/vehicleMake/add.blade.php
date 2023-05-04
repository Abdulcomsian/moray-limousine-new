{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Vehicle Make')

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
    <h1>Vehicle Make Add</h1>
@stop

@section('content')
    <form method="post" action="{{url('admin/vehicleMake/save')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="" />
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" class="form-control-file" id="picture" name="picture">
        </div>
        <div class="form-group">
            @csrf
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('admin/vehicleMake')}}" class="btn btn-danger">Cancel</a>
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