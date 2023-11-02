{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Admin:Pricing By Distance')

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
    <h1>Pricing By Distance Edit</h1>
@stop

@section('content')
    <form method="post" action="{{url('admin/pricingByDistance/update')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="from">From</label>
            <input type="from" class="form-control" id="from" name="from" placeholder="" value="{{$pricingByDistance->from}}"/>
        </div>
        <div class="form-group">
            <label for="to">To</label>
            <input type="to" class="form-control" id="to" name="to" placeholder="" value="{{$pricingByDistance->to}}"/>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="price" class="form-control" id="price" name="price" placeholder="" value="{{$pricingByDistance->price}}"/>
        </div>
        <div class="form-group">
            @csrf
            <input type="hidden" name="id" value="{{$pricingByDistance->id}}" />
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{url('admin/pricingByDistance')}}" class="btn btn-danger">Cancel</a>
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