@extends('layouts.main-home-layout')
@section('title')
Contact Us
@endsection
@section('content-area')
    <!-- End Map -->
    <!-- Start Contact Area -->
    <section class="contact-area ver-1" style="margin-top: 5%">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 text-center">
                  <div class="content">
                      {!! \App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::FOOTER_PAGE_ONE) ? \App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::FOOTER_PAGE_ONE) : 'No Data' !!}
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection





