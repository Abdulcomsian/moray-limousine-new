@extends('layouts.main-home-layout')
@section('title')
    Service Details
@endsection
@section('content-area')
<style>
    @if(isset($config->service_detail_img))
        .top-title 
        {
        background: url({{asset('files/pages-images/'.$config->service_detail_img)}}) !important;
    }
    @else
        .top-title {
        background: url({{asset('images/template/services-single.jpg')}});
    }
    @endif
    ul{
        padding-left:0 ;
    }
    a, a:hover{
        color: dodgerblue;
        text-decoration: none
    }
</style>
    <section class="top-title ver-1">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>{{$service->service_title}} </h1>
                        
                            <p class="sub-title">{{$service->short_description}}</p>
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
    <section class="customs-single ver-1">
        <div class="container">
            <div class="row">

                <div class="col">
                    <article class="block-customs-single ver-1">
                        <div class="featured-customs">
                            <div class="images">
                                <img src="{{asset('files/services-images/'.$service->service_image)}}" class="w-100" alt="">
                            </div>
                        </div>
                        <div class="entry-customs">
                            <div class="entry-box">
                                <h3>{{$service->service_title2}} </h3>
                                {!! $service->long_description !!}
                            </div>
                        </div>
                    </article>
                </div>
                
            </div>
        </div>
    </section>
@endsection





