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
</style>
<div id="informationCompany" class="paged">
    <div class="lsp-pager">
        <div class="wrapper">
            <div class="pager-prev"><a href="{{url('info/payment')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
            <div class="pager-data"><span l10n class="cur">Step &nbsp; 5 &nbsp; </span><span l10n class="max">of &nbsp; 6</span></div>
            <!-- <div class="pager-prev"><a href="{{url('info/driver')}}" id="prev-page-1"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div> -->
        </div>
    </div>
    <div class="lsp-page">
        <div class="row lsp-page--header " style="display: block;">
            <h2 class="lsp-page--title">Documents and Training</h2>
            <h4 class="lsp-page--description">To Continue, please complete the section below</h4>
            <div class="uploadDocuments">
                <h2 class="lsp-page--title">Upload documents</h2>
                <div class="listDiv">
                    <ul>
                        @php
                        $totaldocument=0;
                        $totaluploaded=0;
                        @endphp
                        @foreach($documents as $document)
                        @php
                        $uploadeddoc=0;
                        if($document->applied_on=="partner")
                        {
                        $docs=\App\Document::where('applied_on','partner')->get();
                        foreach($docs as $doc)
                        {
                        $uploadeddoc+= \App\UploadedDocument::where(['slug'=>$doc->slug,'user_id'=>\Auth::user()->id])->count();
                        }
                        $totaluploaded+=$uploadeddoc;
                        $title="Company";
                        }elseif($document->applied_on=="driver")
                        {
                        $docs=\App\Document::where('applied_on','driver')->get();
                        foreach($docs as $doc)
                        {
                        $driver = \App\User::where(['user_type' => 'driver', 'creator_id' => Auth::user()->id])->first();
                        $uploadeddoc+= \App\UploadedDocument::where(['slug'=>$doc->slug,'user_id'=>$driver->id])->count();
                        }
                        $totaluploaded+=$uploadeddoc;
                        $title="Driver";
                        }elseif($document->applied_on=="vehicle")
                        {
                        $docs=\App\Document::where('applied_on','vehicle')->get();
                        foreach($docs as $doc)
                        {
                        $uploadeddoc+= \App\UploadedDocument::where(['slug'=>$doc->slug,'user_id'=>\Auth::user()->id])->count();
                        }
                        $totaluploaded+=$uploadeddoc;
                        $title="Vehicle";
                        }
                        $totaldocument+=$document->total;

                        $bg='#80808047';
                        if((int)$uploadeddoc==(int)$document->total)
                        {
                        $bg='#97e2c6';
                        }
                        @endphp
                        <li style="background: {{$bg}};">
                            <a href="{{url('info/session?type='.$document->applied_on.'')}}">
                                <span>{{$title}}</span>
                                <div class="countDiv">
                                    <p>{{ $uploadeddoc}}/ {{$document->total}}</p>
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- <div class="uploadDocuments">
                <h2 class="lsp-page--title">Complete Traning</h2>
                <div class="listDiv">
                    <ul>
                        <li>
                            <a href="">
                                <span>Patner Traning</span>
                                <div class="countDiv">
                                    <p>0 / 8</p>
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uploadDocuments">
                <h2 class="lsp-page--title">Sign Contract</h2>
                <div class="listDiv">
                    <ul>
                        <li>
                            <a href="">
                                <span>View and Sign Contract</span>
                                <div class="countDiv">

                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> -->
            @php
            $disabled='';
            $style='';
            if($totaldocument!= $totaluploaded)
            {
            $disabled='disabled';
            $style="opacity:0.5";
            }
            @endphp

            <a href="{{url('info/thanku')}}"><button type="submit" class="documentbutton" style="margin-top:50px;{{$style}}" {{$disabled}}>Next</button></a>
        </div>
    </div>
</div>
@endsection