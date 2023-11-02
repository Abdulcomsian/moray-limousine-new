@extends('layouts.main-home-layout')
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

<form method="post" action="{{ route('save-company-info') }}" id="partner-register-form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_type" value="partner">
    <main id="step-1" class="d-block" style="margin: top 2px;">
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <!-- <div class="pager-prev"><a id="prev-page-1"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div> -->
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
                        <span class="text-danger companyerror"></span>
                        <div class="input-desc">
                            <label>Legal name of your company. Sole proprietors enter first and last name.</label>
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
                                <option value="Sole Proprietorship" @if(\Auth::user()->partner->legal_form_company=='Sole Proprietorship'){{'selected'}}@endif>Sole Proprietorship</option>
                                <option value="S.A." @if(\Auth::user()->partner->legal_form_company=='S.A.'){{"selected"}}@endif>S.A.</option>
                                <option value="S.L." @if(\Auth::user()->partner->legal_form_company=="S.L."){{'selected'}}@endif>S.L.</option>
                                <option value="S.L.N.E." @if(\Auth::user()->partner->legal_form_company=="S.L.N.E."){{'selected'}}@endif>S.L.N.E.</option>
                                <option value="S.L.L." @if(\Auth::user()->partner->legal_form_company=="S.L.L."){{'seleted'}}@endif>S.L.L.</option>
                                <option value="S.C." @if(\Auth::user()->partner->legal_form_company=="S.C."){{'selected'}}@endif>S.C.</option>
                                <option value="S.C.P." @if(\Auth::user()->partner->legal_form_company=="S.C.P."){{'selected'}}@endif>S.C.P.</option>
                                <option value="S.Cra." @if(\Auth::user()->partner->legal_form_company=="S.Cra."){{'selected'}}@endif>S.Cra.</option>
                                <option value="S.Coop." @if(\Auth::user()->partner->legal_form_company==='S.Coop.'){{'selected'}}@endif>S.Coop.</option>
                            </select>

                        </div>
                        <span class="text-danger leagalformerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>First name of authorised representative</label>
                        </div>
                        <div class="input-field">
                            <input id="authorizedFname" name="authorizedFname" value="{{\Auth::user()->first_name ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                        <span class="text-danger authorizedFnameerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Last name of authorised representative</label>
                        </div>
                        <div class="input-field">
                            <input id="authorizedLname" name="authorizedLname" value="{{\Auth::user()->last_name ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                        <span class="text-danger authorizedLnameerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Phone number</label>
                        </div>
                        <div class="input-field">
                            <input id="phoneNumber" name="phoneNumber" value="{{\Auth::user()->phone_number ?? ''}}" type="number" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger phoneNumbererror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Company address</label>
                        </div>
                        <div class="input-field">
                            <input id="companyAddress" name="companyAddress" value="{{\Auth::user()->partner->address ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger companyAddresserror"></span>
                    </div>

                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>City</label>
                        </div>
                        <div class="input-field">
                            <input id="city" name="city" value="{{\Auth::user()->partner->city ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger cityerror"></span>
                        <div class="input-desc">
                            <label>Enter the city where your company is based, which may differ from where you operate.</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Postal code</label>
                        </div>
                        <div class="input-field">
                            <input id="postalCode" name="postalCode" value="{{\Auth::user()->partner->postal_code ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                    </div>

                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Country</label>
                        </div>
                        <div class="input-field">
                            <input id="country" name="country" value="{{\Auth::user()->partner->country ?? ''}}" type="text" class="form-control input-field__element">
                        </div>
                        <span class="text-danger countryerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>VAT/Sales Tax Number</label>
                        </div>
                        <div class="input-field">
                            <input id="vat-sales" name="vat_sales" value="{{\Auth::user()->partner->vat_sales_tax_no ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                    </div>

                </div>

                <div class="row subsection">

                </div>
                <div class="actions pt-5">
                    <button type="button" class="next-page">Next</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    <main id="step-2" class="d-none" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error"></div>
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <div class="pager-prev"><a id="prev-page-2"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
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
                        <input id="first_name" name="first_name" type="text" required class="form-control input-field__element">

                    </div>
                    <span class="text-danger firstnameerror"></span>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Last name</label>
                    </div>
                    <div class="input-field">
                        <input id="last_name" name="last_name" type="text" required class="form-control input-field__element">
                    </div>
                    <span class="text-danger lastnameerror"></span>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input id="email" name="email" type="email" required class="form-control input-field__element">

                    </div>
                    <span class="text-danger emailerror"></span>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Phone number</label>
                    </div>
                    <div class="input-field">
                        <input id="phone_number" name="phone_number" type="number" required class="form-control input-field__element">
                    </div>
                    <span class="text-danger phoneerror"></span>
                </div>

                <div class="actions pt-5">
                    <button type="button" class="second-next-page">Next</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    <main id="step-3" class="d-none" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error"></div>
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <div class="pager-prev"><a id="prev-page-3"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
                        <div class="pager-data"><span l10n class="cur">Step &nbsp; 3 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>

                    </div>
                </div>
            </div>
            <div class="lsp-page">
                <div class="row lsp-page--header">
                    <h2 class="lsp-page--title">Add first vehicle</h2>
                    <h4 class="lsp-page--description">You can add more vehicles later.</h4>
                </div>

                <div class="apollo-infobox info">
                    <div class="apollo-infobox--title">
                        <h4>Please note:</h4>
                    </div>
                    <div class="apollo-infobox--description">
                        <p>You will later be asked to upload documents for this vehicle.</p>
                    </div>
                </div>

                <div class="apollo-input pt-4" style="width: 100%;">
                    <div class="input-label">
                        <label>Your vehicle type</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="vehicleCategory_id" name="vehicleCategory_id">
                            <option value="">Select Vehicle Type</option>
                            @if(count($data['category']) > 0){
                            @foreach($data['category'] as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <div class="input-desc">
                            <label>Service class:</label>
                        </div>
                    </div>
                    <span class="text-danger vehicleCategory_iderror"></span>
                </div>
                <div class="apollo-input pt-4" style="width: 100%;">
                    <div class="input-label">
                        <label>vehicle title</label>
                    </div>
                    <div class="input-field">
                        <select id="vehicletitle" name="vehicletitle" class="form-control">
                            <option>Select Title</option>
                            @foreach($VehicleSubtype as $type)
                            <option value="{{$type->title}}">{{$type->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="text-danger vehicletitleerror"></span>
                </div>

                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Vehicle Exterior Color</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="exterior_color" name="exterior_color">
                            <option value="">Select Exterior Color</option>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            <option value="Black">Black</option>
                        </select>
                    </div>
                    <span class="text-danger exterior_colorerror"></span>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Vehicle Interior Color</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="interior_color" name="interior_color">
                            <option value="">Select Interior Color</option>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            <option value="Black">Black</option>
                        </select>
                    </div>
                    <span class="text-danger interior_colorerror"></span>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Year of production</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="model_no" name="model_no">
                            <option value="">Please select</option>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                        </select>

                    </div>
                    <span class="text-danger model_noerror"></span>
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Standard</label>
                    </div>
                    <div class="input-field">
                        <select class="form-control" id="standard" name="standard" required>
                            <option value="">Select Standard</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                    </div>
                    <span class="text-danger standarderror"></span>
                </div>

                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>License plate</label>
                    </div>
                    <div class="input-field">
                        <input id="license-plate" name="license_plate" type="text" required class="form-control input-field__element">

                    </div>
                    <span class="text-danger license-plateerror"></span>
                </div>

                <div class="actions pt-5">
                    <button type="button" class="third-next-page">Next</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
    <main id="step-4" class="d-none" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
            <div class="apollo-notification__content"></div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div id="informationCompany" class="paged">
                    <div class="lsp-pager">
                        <div class="wrapper">
                            <div class="pager-prev"><a id="prev-page-4"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
                            <div class="pager-data"><span l10n class="cur">Step &nbsp; 4 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>

                        </div>
                    </div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Payment information</h2>
                        <h4 class="lsp-page--description">Please tell us how you would like to receive payment.</h4>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <input type="radio" name="bank_transfer" class="input-field__radio-element" checked>
                            <label>Bank Transfer</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Bank account owner</label>
                        </div>
                        <div class="input-field">
                            <input id="bank-account-owner" name="bank_account_owner" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger bank-account-ownererror"></span>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <label>Bank account owner type</label>
                        </div>
                        <div class="input-field input-field--grouped">
                            <label for="language-yes" class="input-field__radio">
                                <input type="radio" id="language-yes" name="account_type" value="Individual" class="input-field__radio-element" checked>Individual</label>
                            <label for="language-no" class="input-field__radio">
                                <input type="radio" id="language-no" name="account_type" value="Corporation" class="input-field__radio-element">Corporation</label>
                        </div>
                        <span class="text-danger languageerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Iban</label>
                        </div>
                        <div class="input-field">
                            <input id="iban" name="iban" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger ibanerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>BIC/Swift</label>
                        </div>
                        <div class="input-field">
                            <input id="bicswift" name="bicswift" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger bicswifterror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Payments outside the UK and EU (including Russia and Turkey) are issued in US dollars. Next</label>
                        </div>
                    </div>
                    <div class="actions pt-5">
                        <button type="button" class="fourth-next-page">Next</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <main id="step-5" class="d-none" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
            <div class="apollo-notification__content">
                <div class="lsp-pager">

                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div id="informationCompany" class="paged" style="padding-top: 6%;">
                    <div class="lsp-pager">
                        <div class="wrapper">
                            <div class="pager-prev"><a id="prev-page-5"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
                            <div class="pager-data"><span l10n class="cur">Step &nbsp; 5 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>

                        </div>
                    </div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Documents and training</h2>
                        <h4 class="lsp-page--description">To continue, please complete the sections below.</h4>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <label>Upload documents</label>
                        </div>
                    </div>
                    @foreach($documents as $key => $doc)
                    @if($doc->applied_on=='partner')
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">

                            <label><strong>Company:</strong> {{$doc->document_title}}</label>

                        </div>
                        <div class="input-field">
                            <input type="hidden" name="document_company_title[]" value="{{$doc->document_title}}" />
                            <input type="file" name="company_doc[]" required class="form-control input-field__element" accept="image/*">
                        </div>
                    </div>
                    @endif
                    @if($doc->applied_on=='driver')
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label><strong>Driver:</strong> {{$doc->document_title}}</label>
                        </div>
                        <div class="input-field">
                            <input type="hidden" name="document_driver_title[]" value="{{$doc->document_title}}" />
                            <input type="file" name="company_driver[]" type="file" required class="form-control input-field__element">
                        </div>
                    </div>
                    @endif
                    @if($doc->applied_on=='vehicle')
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label><strong>Vehicle:</strong> {{$doc->document_title}}</label>
                        </div>
                        <div class="input-field">
                            <input type="hidden" name="document_vehicle_title[]" value="{{$doc->document_title}}" />
                            <input type="file" name="company_vehicle[]" type="file" required class="form-control input-field__element">
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- <div class="apollo-input pt-5">
                        <div class="input-label">
                            <label>Complete training</label>
                        </div>
                    </div> -->
                    <!-- <div class="apollo-input pt-3">
                        <div class="input-label">
                            <label>Partner training</label>
                        </div>
                        <div class="input-field">
                            <input id="bank-account-owner" name="bank-account-owner" type="file" required class="form-control input-field__element">
                        </div>
                    </div>
                    <div class="apollo-input pt-5">
                        <div class="input-label">
                            <label>Sign contract</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <label>View and sign contract</label>
                        </div>
                        <div class="input-field">
                            <input id="bank-account-owner" name="bank-account-owner" type="file" required class="form-control input-field__element">
                        </div>
                    </div> -->
                    <div class="actions pt-5">
                        <button type="submit">Submit</button>
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
    // ***********

    $("#prev-page-2").on('click', function() {
        $("#step-2").removeClass('d-block').hide();
        $("#step-1").removeClass('d-none').show();
    })
    $("#prev-page-3").on('click', function() {
        $("#step-3").removeClass('d-block').hide();
        $("#step-2").removeClass('d-none').show();
    })
    $("#prev-page-4").on('click', function() {
        $("#step-4").removeClass('d-block').hide();
        $("#step-3").removeClass('d-none').show();
    })
    $("#prev-page-5").on('click', function() {
        $("#step-5").removeClass('d-block').hide();
        $("#step-4").removeClass('d-none').show();
    })
    $("#prev-page-6").on('click', function() {
        $("#step-6").removeClass('d-block').hide();
        $("#step-5").removeClass('d-none').show();
    })

    // *************
    $(".next-page").on('click', function() {
        //validations

        var companyName = $("#companyName").val();
        var legal_form = $("#legal-form").val();
        var authorizedFname = $("#authorizedFname").val();
        var authorizedLname = $("#authorizedLname").val();
        var phoneNumber = $("#phoneNumber").val();
        var companyAddress = $("#companyAddress").val();
        var city = $("#city").val();
        var postalCode = $("#postalCode").val();
        var country = $("#country").val();
        //by default all field is empty
        $(".companyerror").html("");
        $(".leagalformerror").html("");
        $(".authorizedFnameerror").html("");
        $(".authorizedLnameerror").html("");
        $(".phoneNumbererror").html("");
        $(".companyAddresserror").html("");
        $(".cityerror").html("");

        if (companyName === '') {
            $(".companyerror").html("The field is required");
            return false;
        } else if (legal_form == "") {
            $(".leagalformerror").html("the field is required");
            return false;
        } else if (authorizedFname === '') {
            alert();
            $(".authorizedFnameerror").html("the field is required");
            return false;
        } else if (authorizedLname === '') {
            $(".authorizedLnameerror").html("the field is required");
            return false;
        } else if (phoneNumber === '') {
            $(".phoneNumbererror").html("the field is required");
            return false;
        } else if (companyAddress === '') {
            $(".companyAddresserror").html("the field is required");
            return false;
        } else if (city === '') {
            $(".cityerror").html("the field is required");
            return false;
        }

        $("#step-1").removeClass('d-block').hide();
        $("#step-2").removeClass('d-none').show();
    })
    $(".second-next-page").on('click', function() {
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("email").val();
        var phone_number = $("#phone_number").val();
        //validation 
        $(".firstnameerror").html("");
        $(".lastnameerror").html("");
        $(".emailerror").html("");
        $(".phoneerror").html("");
        if (first_name == '') {
            $(".firstnameerror").html("the field is required");

        } else if (last_name == '') {
            $(".lastnameerror").html("the field is required");

        } else if (email == '') {
            $(".emailerror").html("the field is required");
        } else if (phone_number == '') {
            $(".phoneerror").html("the field is required");
        }
        $('#step-2').removeClass('d-block').hide();
        $('#step-3').removeClass('d-none').show();
    })
    $(".third-next-page").on('click', function() {
        var vehicletitle = $("#vehicletitle").val();
        var vehicleCategory_id = $("#vehicleCategory_id").val();
        var exterior_color = $("#exterior_color").val();
        var interior_color = $("#interior_color").val();
        var model_no = $("#model_no").val();
        var license_plate = $("#license-plate").val();
        var standard = $("#standard").val();
        //validation
        $(".vehicletitleerror").html("");
        $(".vehicleCategory_iderror").html("");
        $(".exterior_colorerror").html("");
        $(".interior_colorerror").html("");
        $(".model_noerror").html("");
        $(".license-plateerror").html("");
        $(".standarderror").html("");
        if (vehicletitle == '') {
            $(".vehicletitleerror").html("the field is required");
        } else if (vehicleCategory_id == '') {
            $(".vehicleCategory_iderror").html("the field is required");
        } else if (exterior_color == '') {
            $(".exterior_colorerror").html("the field is required");
        } else if (interior_color == '') {
            $(".interior_colorerror").html("the field is required");
        } else if (model_no == '') {
            $(".model_noerror").html("the field is required");
        } else if (standard == '') {
            $(".standarderror").html("the field is required");
        } else if (license_plate == '') {
            $(".license-plateerror").html("the field is required");
        }
        $('#step-3').removeClass('d-block').hide();
        $('#step-4').removeClass('d-none').show();
    })
    $(".fourth-next-page").on('click', function() {
        var bank_account_owner = $("#bank-account-owner").val();
        var iban = $("#iban").val();
        var bicswift = $("#bicswift").val();
        //validation
        $(".bank-account-ownererror").html("");
        $(".ibanerror").html("");
        $(".bicswift").html("");
        if (bank_account_owner == '') {
            $(".bank-account-ownererror").html("the filed is required");
        } else if (iban == '') {
            $(".ibanerror").html("the filed is required");
        } else if (bicswift == '') {
            $(".bicswift").html("the filed is required");
        }
        $('#step-4').removeClass('d-block').hide();
        $('#step-5').removeClass('d-none').show();
    })
</script>
@endsection