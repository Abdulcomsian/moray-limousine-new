@extends('layouts.partner-main-home-layout')
@section('title')
Company Information
@endsection
@section('content-area')
<style>
    .header-04 .bottom-header {
        background: rgb(0, 0, 0);
        position: absolute;
        z-index: 9;
        width: 100%;
    }

    .section-iconbox:not(.fix-mtb) {
        padding: 0 0 64px;
        margin-top: 10rem;
    }

    .btn-secondary:focus {
        background: #1e1e1e;
        color: white;
        font-weight: bold;
    }

    .intl-tel-input {
        display: table-cell;
    }

    .intl-tel-input .selected-flag {
        z-index: 4;
    }

    .intl-tel-input .country-list {
        z-index: 5;
    }

    .input-group .intl-tel-input .form-control {
        border-top-left-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 0;
    }

    .lsp-pager {
        background-color: #F6F6F6;
        padding: 1rem0;
        font-size: 1.125rem;
    }

    .lsp-pager {
        background-color: #F6F6F6;
        padding: 1rem 0;
        font-size: 1.125rem;
    }

    .lsp-pager .wrapper {
        display: flex;
        max-width: 35rem;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .lsp-pager .pager-prev,
    .lsp-pager .pager-data,
    .lsp-pager .pager-next {
        display: inline-block;
    }

    .lsp-pager .pager-data {
        margin: 0 auto;
        text-align: center;
        flex: 1 0 auto;
    }

    .lsp-pager .pager-data .cur {
        color: #1F1F1F;
    }

    .lsp-pager .pager-data .max {
        color: #A8A8A8;
    }

    .lsp-pager .pager-prev,
    .lsp-pager .pager-next {
        flex: 0 1 auto;
    }

    .lsp-pager .pager-prev.hidden,
    .lsp-pager .pager-next.hidden {
        visibility: hidden;
    }

    .lsp-pager .pager-prev img,
    .lsp-pager .pager-next img {
        width: 1rem;
        height: 1rem;
        object-fit: contain;
    }

    .lsp-pager a {
        font-size: 1.125rem;
        font-weight: normal;
        line-height: normal;
        text-decoration: none;
    }

    div#informationCompany {
        padding-top: 8%;
    }

    .lsp-pager .pager-prev img,
    .lsp-pager .pager-next img {
        width: 1rem;
        height: 1rem;
        object-fit: contain;
    }

    .lsp-pager a {
        font-size: 1.125rem;
        font-weight: normal;
        line-height: normal;
        text-decoration: none;
    }

    .lsp-pager .pager-prev,
    .lsp-pager .pager-next {
        flex: 0 1 auto;
    }

    .lsp-pager .wrapper {
        display: flex;
        max-width: 35rem;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .uploadDocuments .lsp-page--title {
        font-size: 24px;
        margin: 20px 0px;
    }

    .uploadDocuments ul li {
        padding: 10px 5px;
        background: #80808047;
        margin-bottom: 5px;
    }

    .uploadDocuments ul li a {
        font-size: 18px;
        font-weight: 500;
    }

    .uploadDocuments ul li .countDiv {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .uploadDocuments ul li a {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .uploadDocuments ul li .countDiv p {
        margin-right: 20px;
    }

    .uploadDocuments ul li .countDiv i {
        color: #000;
    }

    .editText {
        color: blue;
    }

    .itemDiv .textItem {
        font-size: 18px;
        color: #000;
        font-weight: 600;
    }

    .itemDiv i {
        font-weight: 600;
        color: #000;
    }

    .uploadDocuments {
        margin-top: 40px;
    }
</style>
<div id="informationCompany" class="paged">
    <div class="lsp-pager">
        <div class="wrapper">
            <div class="pager-prev"><a href="{{url('info/documents')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;&nbsp;Documents and Training</a></div>
        </div>
    </div>
    <div class="lsp-page">
        <div class="row lsp-page--header " style="    display: block;">
            <h2 class="lsp-page--title">{{ucfirst($documents[0]->applied_on)}}</h2>
            <h4 class="lsp-page--description">Please Upload all Documents</h4>
             @php
                if($_GET['type']=='driver')
                {
                $url='info/driver';
                $name=$driver->first_name .' '.$driver->last_name;
                $class='fa-user';
                }elseif($_GET['type']=='vehicle')
                {
                $url='info/vehicle';
                 $name= $vehicle->title ?? '';
                  $class='fa-car';
                }
                else{
                $url='info/company';
                $name=\Auth::user()->first_name.' '.\Auth::user()->last_name;
                $class='fa-user';
                }
                @endphp
            <div class="itemDiv">
                <i class="fa {{$class}}"></i>
                <span class="textItem">{{$name}}</span>
                <p class="editText">
                    <a href="{{url($url)}}">Edit</a>
                </p>
            </div>
            <div class="uploadDocuments">
                <div class="listDiv">
                    <ul>
                        @foreach($documents as $document)
                        @php
                        if($document->applied_on=='driver')
                        {
                        $driver=\App\User::where('creator_id',\Auth::user()->id)->first();
                        $uploadedcount=\App\UploadedDocument::where(['slug'=>$document->slug,'user_id'=>$driver->id])->count();
                        }else{
                        $uploadedcount=\App\UploadedDocument::where(['slug'=>$document->slug,'user_id'=>\Auth::user()->id])->count();
                        }

                        if($uploadedcount<=0) { $class="fa-upload" ;$bg='#80808047' ; } else { $class="fa-check" ; $bg='#97e2c6' ; } @endphp <li style="background:{{$bg}}">
                            <a href="{{url('info/upload?type='.$documents[0]->applied_on.'&title='.$document->slug.'')}}">
                                <span>{{$document->document_title}}</span>
                                <div class="countDiv">
                                    <i class="fa {{$class}}"></i>
                                </div>
                            </a>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>
            <a href="{{url('info/documents')}}"><button style="margin-top:50px;">Next</button></a>
        </div>
    </div>
</div>
@endsection