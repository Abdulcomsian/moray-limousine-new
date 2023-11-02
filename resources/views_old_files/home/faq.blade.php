@extends('layouts.main-home-layout')
@section('title')
    FAQ
@endsection
@section('content-area')
    <section class="top-title">
        <div class="top-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-page-heading">
                            <h1>Most frequently asked Question</h1>
                            <p class="sub-title">Here is the list of Most frequently asked Questions and their answers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
{{--                    <div class="col-md-12">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="{{url('/')}}">Home </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                / FAQ--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <section class="accordion-area">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="accordion">
                        @foreach($faqs as $faq)
                            <div class="accordion-toggle">
                                <div class="toggle-title font-weight-bold">
                                    {{$faq->faq_question}}
                                    <span>
										<img src="{{asset('images/icon/right-2.png')}}" alt="no image found">
									</span>
                                </div>
                                <div class="toggle-content" style="display: none;">
                                    <p>
                                        {!! $faq->faq_answer !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
@endsection









