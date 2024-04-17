@extends('layouts.main-home-layout')
@section('title')
    Fahrzeugflotte
@endsection
@section('content-area')
<style>
    .heading-banner{
        font-weight: 500;
        font-size: 44px;
        line-height: 58px;
        color: #fff;
    }
    .heading-class{
        font-weight: 500;
        font-size: 44px;
        line-height: 58px;
        color: #000;
        text-align: center;
        margin-bottom: 40px;
    }
    .box-breadcrumb ul{
        padding: 0;
    }
    .box-breadcrumb ul li {
    display: inline-block;
    position: relative;
    padding: 0px 22px 0px 0px;
    }
    .box-breadcrumb ul li::before {
        content: "-";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 4px;
        color: #fff;
    }
    .box-breadcrumb ul li:last-child::before {
        content: none;
    }
    .box-breadcrumb ul li a {
        color: #fff;
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
    }
    .section-fleet-detail{
        padding-top: 100px;
        padding-bottom: 60px;
    }
    .weight-600{
        font-weight: 600;
    }
    .content-single{
        font-size: 16px;
    }
    .content-single p{
        font-size: 16px;
        line-height: 30px;
    }
    h6{
        font-weight: 600;
    }
    .list-ticks{
        padding-left: 0;
    }
    .list-ticks li {
    font-size: 16px;
    line-height: 50px;
    font-weight: 600;
    color: #181A1F;
    padding: 0px 0px 0px 40px;
    position: relative;
}

.list-ticks li::before {
    content: "";
    height: 25px;
    width: 25px;
    background-color: #FDEEEC;
    border-radius: 50%;
    background-image: url("https://creativelayers.net/themes/luxride-html/assets/imgs/page/homepage3/tick.svg");
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 50%;
    left: 0px;
    transform: translateY(-50%);
}
.section-class{
    padding-top: 60px;
    padding-bottom: 30px;
}
.cardIconTitleDesc .cardIcon {
    margin-bottom: 30px;
}
.cardIconTitleDesc .cardTitle {
    margin-bottom: 10px;
}
.cardIconTitleDesc .cardDesc {
    margin-bottom: 30px;
}
.cardIconTitleDescLeft .cardIconTitleDesc {
    text-align: left;
    padding: 40px 40px 10px 40px;
}
.cardIconTitleDescLeft .cardIconTitleDesc:hover {
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.05);
    border-radius: 18px;
}
</style>
    <div class="section-fleet-detail pt-60 pb-60 bg-black">
        <div class="container"> 
          <h1 class="heading-banner">Impressum</h1>
          <div class="box-breadcrumb"> 
            <ul>
              <li> <a href="#">Home</a></li>
              <li> <a href="fleet-list.html">Impressum</a></li>
            </ul>
          </div>
        </div>
    </div>
    <section class="section">
        {{-- <img src="{{asset('/images/banner.png')}}" alt="Car" class="car-picture w-100" /> --}}
        <div class="container"> 
          <div class="mt-120 text-dark "> 
            {!!$footerPageOne->item_content!!}
          </div>
        </div>
    </section>
@endsection
