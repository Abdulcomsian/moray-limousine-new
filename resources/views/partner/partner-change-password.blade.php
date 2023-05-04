@extends('layouts.driver')
@section('title')
    Change Password
@endsection
@section('content')
    <div class="col-md-9">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible mt-2 mb-0">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{session('success')}}
            </div>
        @endif
        <div class="row justify-content-end">
            <div class="col-md-11">
                <div class="card mt-2">
                    <div class="card-header text-center"><h3> Change Password </h3>  </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('partner.change.password') }}">
                            @csrf

                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group row mb-2">
                                <div class="col-md-6 offset-md-3">
                                    <label for="password" class="col-md-4 m-0 pl-0 col-form-label">Current Password</label>
                                    <input id="password" type="password" class="form-control" placeholder="Current Password" name="current_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-md-6 offset-md-3">
                                    <label for="password" class="col-md-4 m-0 pl-0 col-form-label">New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password" placeholder="New Password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <label for="password" class="col-form-label m-0 pl-0">New Confirm Password</label>
                                    <input id="new_confirm_password" placeholder="Conform New Password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-dark">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('side-bar')
    <li class="nav-item">
    @include('parshall-views._partner-side-bar')
@endsection
