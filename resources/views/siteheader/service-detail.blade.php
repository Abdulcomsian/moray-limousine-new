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

                <div class="col-md-8">
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
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget widget-category">
                            <h3>Service</h3>
                            <ul>
                                @foreach($services as $service)
                                <li>
                                    <a href="{{url('service/details/'.$service->id)}}" title="Service Detail">
                                        <img src="{{asset('images/icon/next.png')}}" alt="">{{$service->service_title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget-infomation">
                            <ul>
                                <li>
                                    <div class="text">
                                        <h5>Address</h5>
                                        <p>{!! \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS) !!}</p>
                                    </div>
                                    <div class="icon">
                                        <img src="{{asset('images/icon/address.png')}}" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <h5>Phone</h5>
                                        <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) ? \App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER) : '+49 (0) 69 330 889 08'}}</p>
                                    </div>
                                    <div class="icon">
                                        <img src="{{asset('images/icon/phone.png')}}" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="text">
                                        <h5>Email</h5>
                                        <p>{{\App\Models\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS)}}</p>
                                    </div>
                                    <div class="icon">
                                        <img src="{{asset('images/icon/email.png')}}" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





