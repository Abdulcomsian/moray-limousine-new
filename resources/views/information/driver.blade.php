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
</style>
<style>
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
</style>
<form method="post" action="{{route('save-driver')}}">
    @csrf
    <input type="hidden" name="id" value="{{$driver->id ?? ''}}" />
    <main id="step-2" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error"></div>
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <div class="pager-prev"><a href="{{url('info/company')}}" id="prev-page-2"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
                        <div class="pager-data"><span l10n class="cur">Step &nbsp; 2 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>
                    </div>
                </div>
            </div>
            <div class="lsp-page">
                <div class="row lsp-page--header">
                    <h2 class="lsp-page--title">Add first driver</h2>
                    <h4 class="lsp-page--description">You can add more drivers later.</h4>
                </div>
                <div class="apollo-infobox info">
                    <div class="apollo-infobox--title">
                        <h4>Please note:</h4>
                    </div>
                    <div class="apollo-infobox--description">
                        <p>You will later be asked to upload documents for this driver.</p>
                    </div>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>First name</label>
                    </div>
                    <div class="input-field">
                        <input id="first_name" name="first_name" type="text" required class="form-control input-field__element" value="{{old('first_name', $driver->first_name ?? '')}}">

                    </div>
                    @if($errors->has('first_name'))
                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Last name</label>
                    </div>
                    <div class="input-field">
                        <input id="last_name" name="last_name" type="text" required class="form-control input-field__element" value="{{old('last_name', $driver->last_name ?? '')}}">
                    </div>
                    @if($errors->has('last_name'))
                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input id="email" name="email" type="email" required class="form-control input-field__element" value="{{old('email', $driver->email ?? '')}}">

                    </div>
                    @if($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Phone number</label>
                    </div>
                    <div class="input-field">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="custom-select" name="code" style="height: 50px">
                                    <option value="">Select Code</option>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    @php $i=1;@endphp
                                    @foreach($coutnrycode as $code)
                                    <option value="{{$code->phonecode}}" @if(isset($driver) && $driver->country_code==$code->phonecode){{'selected'}}@elseif($i==1){{'selected'}}@endif>{{$code->phonecode}}</option>
                                    @php $i++ @endphp
                                    @endforeach
                                </select>
                            </div>
                            <input id="phone_number" name="phone_number" value="{{old('phone_number', $driver->phone_number ?? '')}}" type="text" required class="form-control input-field__element">
                        </div>
                    </div>
                    @if($errors->has('phone_number'))
                    <div class="text-danger">{{ $errors->first('phone_number') }}</div>
                    @endif
                </div>
                <!-- <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Phone number</label>
                    </div>
                    <div class="input-field">
                        <input id="phone_number" name="phone_number" type="number" required class="form-control input-field__element" value="{{$driver->phone_number ?? ''}}">
                    </div>
                    @if($errors->has('phone_number'))
                    <div class="text-danger">{{ $errors->first('phone_number') }}</div>
                    @endif
                </div> -->

                <div class="actions pt-5">
                    <button type="submit" class="second-next-page">Next</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
</form>
@endsection