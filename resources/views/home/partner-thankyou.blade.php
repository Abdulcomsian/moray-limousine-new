@extends('layouts.partner-main-home-layout')
@section('title')
Become Partner
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
</style>
<main id="step-4" style="display: block; margin-top:7%;">

    <div id="registrationData">
        <div class="lsp-page">
            <div class="row lsp-page--header">
                <h2 class="lsp-page--title">Thank you!</h2>
                <h4 class="lsp-page--description">Confirm your amail address to begin the verification process.</h4>
            </div>
            <fieldset>
                <div class="form-card">
                    <div class="row justify-content-center pt-5">
                        <div class="col-3"> <img src="{{asset ('images/ic-email.svg')}}" class="fit-image"></div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <h5>Please check your email {{$user->email ?? ''}}</h5>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    </div>
    </div>
</main>
@endsection