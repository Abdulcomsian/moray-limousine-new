@extends('layouts.main-home-layout')
@section('title')
    Resend Email
@endsection
@section('content-area')

    <div class="container" style="margin-top: 13rem ; margin-bottom: 5rem;">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Thanks For Registration On Moray Limousines</h2>
                        <h4 class="p-3"> Please verify your email for further Process .. </h4>
                    </div>

                    <div class="card-body">

                        @if($verified)
                            <div class="alert alert-success">
                                Your Email Is Verified Successfully ...
                            </div>
                        @else

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('resendVerificationEmail') }}">
                                {!! csrf_field() !!}


                                <div class="alert alert-warning dark">
                                    <p>We sent an email on your email address  :
                                    <strong>{{old('email', $email)}}</strong>
                                        Please Verify it . You Can Resend it If you Did not Receive The email
                                    </p>
                                <p>If you have not received a verification email or if you have mistyped your email address, you can resend the verification mail.</p>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">@lang('emailverification::messages.resend.email')</label>

                                    <div class="col-md-10">

                                        <input type="text" class="form-control" name="email"
                                               value="{{ old('email', $email) }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-dark">
                                           <span> Resend Conformation link  </span>
                                            <img src="{{asset('/images/icon/next.png')}}" class="ml-3" alt="Forward_img" >
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

