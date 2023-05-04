@extends('layouts.main-home-layout')
@section('title')
    Fahrzeugklasse
@endsection
@section('css')
<link rel="stylesheet" href="{{url('css/select-class.css')}}">
@endsection
@section('content-area')
    <section class="summary-bar-area open">
        <div class="container-fluid mr-0 ml-5">
            <div class="row">
                <div class="col-md-12 p-0">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Von
                            </div>
                            <p title="{{$form_data['pick_address']}}">{{ substr($form_data['pick_address'], 0, 40)}}...</p>
                        </li>
                        <li>
                            <div class="info">
                                @if($form_data['booking_by'] === 'distance')
                                    Nach
                                @else
                                    Stunden
                                @endif
                            </div>
                            @if($form_data['booking_by'] === 'time')
                                <p>This Booking Is For :{{$form_data['selected_hour']}} Hour's</p>
                            @else
                                <p title="{{$form_data['drop_address']}}">{{substr($form_data['drop_address'],0,40)}}...</p>
                            @endif

                        </li>
                        <li>
                            <div class="info">
                                Datum
                            </div>
                            <p>{{date('d - M - Y',strtotime($form_data['pick_date'])) }}</p>
                        </li>
                        <li>
                            <div class="info">
                                Zeit
                            </div>
                            <p>{{$form_data['pick_time']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Dauer
                            </div>

                            <p style="font-family: monospace;">voraussichtlich : {{isset($form_data['total_duration']) ? number_format($form_data['total_duration'] / 3600, 2) : $form_data['selected_hour'] }} – Strecke :  {{ isset($form_data['total_distance']) ? number_format($form_data['total_distance'] / 1000 , 1) : $form_data['selected_hour'] * 25}} km </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="booking-steps-area mht">
        <div class="container-fluid ml-4">
            <div class="row">
                <div class="col-md-12">
                    <ul class="booking-steps">
                        <li  class="active">
                            <span>1</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/car.png')}}" alt="">
                            </div>
                            <div class="text">
                                FAHRZEUGKLASSE
                            </div>
                        </li>
                        <li>
                            <span>2</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/login.png')}}" alt="">
                            </div>
                            <div class="text">
                                LOGIN
                            </div>
                        </li>
                        <li>
                            <span>3</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/options.png')}}" alt="">
                            </div>
                            <div class="text">
                                OPTIONEN
                            </div>
                        </li>

                        <li>
                            <span>4</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/card.png')}}" alt="">
                            </div>
                            <div class="text text-uppercase">
                                Bezahlung
                            </div>
                        </li>
                        <li>
                            <span>5</span>
                            <div class="icon">
                                <img src="{{asset('images/booking/check-out.png')}}" alt="">
                            </div>
                            <div class="text">
                                CHECK OUT
                            </div>
                        </li>
                    </ul>
                    <div class="button-summary-bar open">
                        <div class="icon">
                            <span class="ion-ios-arrow-thin-down"></span>
                        </div>
                        <p class="show">Ihre Auswahl </p>
                        <p class="hide">Hide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="main-content">
    <section class="select-vehicle-area pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if(count($classes) > 0)
                        @foreach($classes as $class)
                    <div class="select-car" style="border: 1px solid #bf9c60;">
                        <div class="image-car one-half">
                            <img src="{{asset('files/vehicleCategory/category_img')}}/{{$class->picture}}" alt="">
                        </div>
                        <div class="box-text one-half pt-3">
                            <div class="top">
                                <h3>{{$class->name}}</h3>
                                <div class="name-car">
                                    @foreach($class->subtypes as $subtype)
                                        {{$subtype->title}} ,
                                        @endforeach
                                        oder ähnlich
                                </div>
                            </div>
                            <div class="content">
                                <p>{!! $class->description !!} </p>
                                <ul>
                                    <li><img src="{{asset('images/people.png')}}" alt=""> Max . {{$class->max_seats}}</li>
                                    <li><img src="{{asset('images/vali.png')}}" alt=""> Max . {{$class->max_bags}}</li>
                                </ul>
                            </div>
                                <div class="bottom">
                                    <div class="price">
                                    <div class="w-100 mt-2">
                                        <span> {{$class->class_price}}</span> <strong>EUR</strong>
                                    </div>
                                        <small>( Alle Preise enthalten MwSt., Gebühren und Trinkgelder. )</small>
                                    </div>
                                    <div class="btn-select">
                                        <form action="{{asset(route('booking.details'))}}" method="get" >
                                            @csrf

                                        <input type="hidden" name="formData" value="{{json_encode($form_data)}}">
                                        <input type="hidden" name="distance" value="{{isset($distance) ?  number_format($distance , 1).'  Km' :  ''}}">
                                        <input type="hidden" name="selected_id" value="{{$class->id}}">
                                        <input type="hidden" name="travel_price" value="{{$class->class_price}}" class="selected-travel-price">
                                        <input type="hidden" name="tax_amount" value="{{$class->tax_amount}}" class="selected-travel-price">
                                        <button type="submit"  id="{{$class->id}}"  class="btn-theme btn-select ml-3 mb-2"><span class="mr-3">Auswählen</span> <i class="fa fa-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     @endforeach
                            @else
                        <h3> Keine Fahrzeugklasse gefunden </h3>
                        @endif
                </div>
            </div>
        </div>
    </section>
    </div>
    @endsection

@section('js')
<script type="text/javascript">
    $(window).scroll(function() {
             if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if($(".summary-bar-area").hasClass('open'))
                {
                  $(".summary-bar-area").attr("style","position:fixed;top:0px !important;z-index:999999");
                }
             }else{
                $(".summary-bar-area").attr("style","");
             }
        });
</script>
@endsection
