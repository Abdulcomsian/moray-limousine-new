@extends('layouts.app')
@section('title','Packages')
@section('content')
    <!-- Pricing tables 2 start -->
    <div class="pricing-tables-2 content-area">
        <div class="container">
            <div class="main-title">
                <h1>Packages List</h1>
            </div>
            <div class="row">
                @if(session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success wow fadeInLeft delay-03s"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Well done ... !</strong>
                         {{session('success')}}
                    </div>
                </div>
                @endif

                @if(count($packages)> 0)
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-2">
                        <div class="img">
                            <img src="{{asset('images/uploaded-images/'.$package->icon_img)}}" class="img-circle " style="width: 10rem;" alt="no_img">
                        </div>
                        <div class="title" style="color:#d20023eb !important;">{{$package->title}}</div>
                        <div class="price-for-user">
                            <div class="price">
                                <span style="font-size: 3rem;">Rs :</span>
                                <span class="dolar"> {{$package->package_price}}</span>
                                <small class="month"></small></div>
                        </div>
                        <div class="content">
                            <ul>
                                <li>{{$package->interests}} Interests</li>
                                <li>{{$package->reshty}} Storage</li>
                                <li> Unlimited Messages</li>
                                <li>Unlimited Shortlists</li>
                                <li>Valid For  <strong>{{$package->expiry_duration}}</strong> Months</li>
                            </ul>
                        </div>
                        <div class="button">
                            <a href="{{url('/purchase-package/'.$package->id)}}" class="btn btn-outline pricing-btn">Get started</a>
                        </div>
                    </div>
                </div>
                 @endforeach
                @else
                    <h3>No Package Defined ...</h3>
                @endif
            </div>
        </div>
    </div>
    <!-- Pricing tables 2 end -->
@endsection
