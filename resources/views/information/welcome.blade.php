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
                <h2 class="lsp-page--title"><strong>Welcome Back</strong></h2>
                <h4 class="lsp-page--description">Please Provide Your Password</h4>
            </div>
            <fieldset>
                <div class="form-card">
                    <form method="post" action="{{route('info-save-basic')}}">
                        @csrf
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Email</label>
                            </div>
                            <div class="input-field">
                                <p>{{\Auth::user()->email}}</p>
                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Password</label>
                            </div>
                            <div class="input-field">
                                <input id="password" name="password" type="password" required class="form-control input-field__element">
                                <span>minimum 8 character length</span>
                            </div>
                            @if($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Confirm Password</label>
                            </div>
                            <div class="input-field">
                                <input id="cpassword" name="password_confirmation" type="password" required class="form-control input-field__element">
                                <span>minimum 8 character length</span>
                            </div>
                            @if($errors->has('password_confirmation'))
                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                        <div class="actions pt-5">
                            <button type="submit" class="second-next-page">Submit</button>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
    </div>
    </div>
</main>
@endsection