@extends('layouts.main-home-layout')
@section('title')
Our Services
@endsection
@section('content-area')
    <style>
        @if(isset($config->service_list_img))
        .top-title {
            background: url({{asset('files/pages-images/'.$config->service_list_img)}})
        }
        @else
        .top-title {
            background: url({{asset('/images/template/page-title.jpg')}})
        }
        @endif
    </style>
    <section class="top-title">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>SERVICES</h1>
                            <p class="sub-title">Service at the highest level!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Title -->
    <!-- Start Services Area -->
    <section class="services-area mt-5">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="template-title center">
                        <h1>Our Services</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($services) > 0)
                    @foreach($services as $service)
                <div class="col-md-4 col-sm-6">
                    <div class="services-item center">
                        <div class="services-image">
                            <img src="{{asset('files/services-images'.'/'.$service->service_image)}}" alt="">
                        </div>
                        <div class="services-content">
                            <h4><a href="{{url('service/details/'.$service->id)}}">{{$service->service_title}}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->
    <!-- Start Footer -->

@endsection




