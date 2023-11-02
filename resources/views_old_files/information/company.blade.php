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
<form method="post" action="{{route('save-company')}}">
    @csrf
    <main id="step-1">
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <div class="pager-data"><span l10n class="cur">Step &nbsp; 1 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>
                    </div>
                </div>
            </div>
            <div class="lsp-page">
                <div class="row lsp-page--header " style="    display: block;">
                    <h2 class="lsp-page--title">Company information</h2>
                    <h4 class="lsp-page--description">Please provide a few more details about your company.</h4>
                </div>

                <div class="row validate validate--name">
                    <div class="apollo-input" style="width: 100%;">
                        <div class="input-label">
                            <label>Company name</label>
                        </div>
                        <div class="input-field">
                            <input id="companyName" name="company_name" value="{{\Auth::user()->partner->company_name ?? ''}}" placeholder="Example Company Inc." type="text" class="form-control input-field__element" required>
                        </div>
                        @if($errors->has('company_name'))
                        <div class="text-danger">{{ $errors->first('company_name') }}</div>
                        @endif
                        <span class="text-danger companyerror"></span>
                        <div class="input-desc">
                            <label>Legal name of your company. Sole proprietors enter first and last name.</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>City</label>
                        </div>
                        <div class="input-field">
                            <select id="city" name="city" class="form-control" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" @if(\Auth::user()->partner->city == $city->id){{'selected'}}@endif>{{$city->location_city}}</option>
                                @endforeach
                            </select>

                            <!-- <input id="city" name="city" value="{{\Auth::user()->partner->city ?? ''}}" type="text" required class="form-control input-field__element"> -->
                        </div>
                        @if($errors->has('city'))
                        <div class="text-danger">{{ $errors->first('city') }}</div>
                        @endif
                        <div class="input-desc">
                            <label>Enter the city where your company is based, which may differ from where you operate.</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-4" style="width: 100%;">
                        <div class="input-label">
                            <label>Legal form of company</label>
                        </div>
                        <div class="input-field">
                            <select class="custom-select" id="legal-form" name="legal_form">
                                <option value=" ">Please select</option>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                @foreach($legalform as $form)
                                <option value="{{$form->id}}" @if(\Auth::user()->partner->legal_form_company==$form->id){{'selected'}}@endif>{{$form->legal_form}}</option>
                                @endforeach
                            </select>

                        </div>
                        @if($errors->has('legal_form'))
                        <div class="text-danger">{{ $errors->first('legal_form') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>First name of authorised representative</label>
                        </div>
                        <div class="input-field">
                            <input id="authorizedFname" name="authorizedFname" value="{{\Auth::user()->first_name ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                        @if($errors->has('authorizedFname'))
                        <div class="text-danger">{{ $errors->first('authorizedFname') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Last name of authorised representative</label>
                        </div>
                        <div class="input-field">
                            <input id="authorizedLname" name="authorizedLname" value="{{\Auth::user()->last_name ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        @if($errors->has('authorizedLname'))
                        <div class="text-danger">{{ $errors->first('authorizedLname') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Phone number</label>
                        </div>
                        <div class="input-field">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                    <select  class="custom-select" name="code" style="height: 50px">
                                        <option value="">Select Code</option>
                                         <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        @php $i=1;@endphp
                                        @foreach($coutnrycode as $code)
                                         <option value="{{$code->phonecode}}" @if(\Auth::user()->partner->country_code==$code->phonecode){{'selected'}}@elseif($i==1){{'selected'}}@endif>{{$code->phonecode}}</option>
                                         @php $i++ @endphp
                                        @endforeach
                                    </select>
                              </div>
                              <input id="phoneNumber" name="phoneNumber" value="{{\Auth::user()->phone_number ?? ''}}" type="text" required class="form-control input-field__element">
                            </div>
                        </div>
                        @if($errors->has('phoneNumber'))
                        <div class="text-danger">{{ $errors->first('phoneNumber') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Company address</label>
                        </div>
                        <div class="input-field">
                            <input id="companyAddress" name="companyAddress" value="{{\Auth::user()->partner->address ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        @if($errors->has('companyAddress'))
                        <div class="text-danger">{{ $errors->first('companyAddress') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Postal code</label>
                        </div>
                        <div class="input-field">
                            <input id="postalCode" name="postalCode" value="{{\Auth::user()->partner->postal_code ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        @if($errors->has('postalCode'))
                        <div class="text-danger">{{ $errors->first('postalCode') }}</div>
                        @endif
                    </div>

                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Country</label>
                        </div>
                        <div class="input-field">
                            <select id="country" name="country"  required class="custom-select">
                             <option value="">Select Country</option>
                             <i class="fa fa-chevron-down" aria-hidden="true"></i>
                             @foreach($countries as $code)
                            <option value="{{$code->nicename}}" @if(\Auth::user()->partner->country==$code->nicename){{'selected'}}@endif>{{$code->nicename}}</option>        
                            @endforeach
                            </select>
                        </div>
                        @if($errors->has('country'))
                        <div class="text-danger">{{ $errors->first('country') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>VAT/Sales Tax Number</label>
                        </div>
                        <div class="input-field">
                            <input id="vat-sales" name="vat_sales" value="{{\Auth::user()->partner->vat_sales_tax_no ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        @if($errors->has('vat_sales'))
                        <div class="text-danger">{{ $errors->first('vat_sales') }}</div>
                        @endif
                    </div>

                </div>

                <div class="row subsection">

                </div>
                <div class="actions pt-5">
                    <button type="submit">Next</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
</form>
@endsection
@section('js')
<script>
    $("#city").on('change', function() {
        cityid = $("#city").val();
        $.ajax({
            url: "{{url('/get-city-legal-form')}}",
            method: "get",
            data: {
                cityid: cityid
            },
            success: function(res) {
                $("#legal-form").html(res);
            }

        })
    })
</script>
@endsection