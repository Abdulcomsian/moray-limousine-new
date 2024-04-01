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
<form method="post" action="{{route('save-vehicle')}}">
    @csrf
    <input type="hidden" name="id" value="{{$vehicle->id ?? ''}}" />
    <main id="step-3" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error"></div>
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <div class="pager-prev"><a href="{{url('info/driver')}}" id="prev-page-3"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
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
                        <select class="custom-select" id="vehicleCategory_id" name="vehicleCategory_id" required>
                            <option value="">Select Vehicle Type</option>
                            @if(count($data['category']) > 0){
                            @foreach($data['category'] as $c)
                            <option value="{{$c->id}}" @if(isset($vehicle->vehicleCategory_id) && $vehicle->vehicleCategory_id==$c->id){{'selected'}}@endif>{{$c->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <div class="input-desc">
                            <label>Service class:</label>
                        </div>
                    </div>
                    @if($errors->has('vehicleCategory_id'))
                    <div class="text-danger">{{ $errors->first('vehicleCategory_id') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-4" style="width: 100%;">
                    <div class="input-label">
                        <label>vehicle title</label>
                    </div>
                    <div class="input-field">
                        <select id="vehicletitle" name="vehicletitle" class="form-control" required>
                            <option value="">Select Title</option>
                            @foreach($VehicleSubtype as $type)
                            <option value="{{$type->title}}" @if($vehicle->title ?? ''==$type->title){{'selected'}}@endif>{{$type->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('vehicletitle'))
                    <div class="text-danger">{{ $errors->first('vehicletitle') }}</div>
                    @endif
                </div>

                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Vehicle Exterior Color</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="exterior_color" name="exterior_color" required>
                            <option value="">Select Exterior Color</option>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            <option value="Black" @if($vehicle->exterior_color ?? ''=="Black"){{'selected'}}@endif>Black</option>
                        </select>
                    </div>
                    @if($errors->has('exterior_color'))
                    <div class="text-danger">{{ $errors->first('exterior_color') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Vehicle Interior Color</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="interior_color" name="interior_color" required>
                            <option value="">Select Interior Color</option>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            <option value="Black" @if($vehicle->interior_color ?? ''=="Black"){{'selected'}}@endif>Black</option>
                        </select>
                    </div>
                    @if($errors->has('interior_color'))
                    <div class="text-danger">{{ $errors->first('interior_color') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Year of production</label>
                    </div>
                    <div class="input-field">
                        <select class="custom-select" id="model_no" name="model_no" required>
                            <option value="">Please select</option>
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            @foreach($proudctionyear as $year)
                            <option value="{{$year->production_year}}" @if(isset($vehicle->model_no) && $vehicle->model_no==$year->production_year){{'selected'}}@endif>{{$year->production_year}}</option>
                            @endforeach
                        </select>

                    </div>

                    @if($errors->has('model_no'))
                    <div class="text-danger">{{ $errors->first('model_no') }}</div>
                    @endif
                </div>
                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>Standard</label>
                    </div>
                    <div class="input-field">
                        <select class="form-control" id="standard" name="standard" required>
                            <option value="">Select Standard</option>
                            @foreach($standards as $standard)
                            <option value="{{$standard->standard}}" @if(isset($vehicle->standard) && $vehicle->standard==$standard->standard){{'selected'}}@endif>{{$standard->standard}}</option>
                            @endforeach
                        </select>

                    </div>
                    @if($errors->has('standard'))
                    <div class="text-danger">{{ $errors->first('standard') }}</div>
                    @endif
                </div>

                <div class="apollo-input pt-3" style="width: 100%;">
                    <div class="input-label">
                        <label>License plate</label>
                    </div>
                    <div class="input-field">
                        <input id="license-plate" name="license_plate" type="text" required class="form-control input-field__element" value="{{$vehicle->plate ?? ''}}">

                    </div>
                    @if($errors->has('license_plate'))
                    <div class="text-danger">{{ $errors->first('license_plate') }}</div>
                    @endif
                </div>

                <div class="actions pt-5">
                    <button type="submit" class="third-next-page">Next</button>
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
    $('#vehicleCategory_id').change(function() {
        let categoryUrl = '{{url('admin/get-categories-title')}}/';
        let id = $(this).val();
        if (id !== 0 || id !== '0') {
            getTitlesList(categoryUrl, id);
        } else {
            $('#vehicletitle').children().remove().end();
        }
    });

    function getTitlesList(categoryURl, id) {
        $.ajax({
            type: 'get',
            url: categoryURl + id,
            success: function(response) {
                console.log(response);
                let types = response;
                $('#vehicletitle').children().remove().end();
                for (let i = 0; i < types.length; i++) {
                    $('#vehicletitle').append(`<option value="${types[i].title}">
                    ${types[i].title}
                    </option>`);
                }
            }
        });
    }
</script>
@endsection