{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Pricing By Location')

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
    <h1>Pricing By Location Add</h1>
@stop

@section('content')
    <form method="post" action="{{url('admin/pricingByLocation/save')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="from">From</label>
            <input type="from" class="form-control" id="from" name="from" placeholder="" />
        </div>
        <div class="form-group">
            <label for="to">To</label>
            <input type="to" class="form-control" id="to" name="to" placeholder="" />
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="price" class="form-control" id="price" name="price" placeholder="" />
        </div>
        <div class="form-group">
            @csrf
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('admin/pricingByLocation')}}" class="btn btn-danger">Cancel</a>
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