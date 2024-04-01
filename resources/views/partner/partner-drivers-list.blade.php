@extends('layouts.driver')
@section('title')
    {{isset($driver) ? 'Update Profile ' : 'Add Driver'}}
@endsection
@section('content')
    <style>
        .error-field{
            font-family: "Dosis", sans-serif;
            color: red;
        }
        #DataTables_Table_0_filter{
            float: right;
            padding: 5px;
        }
        #DataTables_Table_0_paginate{
            float: right;
            padding-top: 10px;
        }
    </style>

    {{--    Modal for add driver--}}

    <div class="container position-absolute">  

        <!-- Modal -->
        <div class="modal fade" id="add-driver-modal" role="dialog">
            <div class="modal-dialog modal-lg w-75 mr-5 mt-5">
                <div class="modal-content">
                    <div class="modal-body bg-white">
                        <button type="button" class="close float-right" data-dismiss="modal"><i class="fa fa-remove"></i> </button>
                        <div class="login-booking">
                            <ul class="login">
                                <li class="active">Add New Driver</li>
                            </ul>
                            <div class="login-content">
                                <div id="tab-2" class="content-tab">
                                    <div class="register-form">

                                        <form action="{{ route('partner.save.driver') }}" method="post" accept-charset="utf-8" validate = true>
                                            @csrf

                                            <input type="hidden" name="user_type" value="driver">
                                            <input type="hidden" name="creator_id" value="{{Auth()->id()}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="one-half w-100 first-name">
                                                        <label for="firstname">First Name </label>
                                                        <input type="text" name="first_name" id="firstname" placeholder="First Name" value="{{ old('first_name') }}" required maxlength="20">
                                                        @if ($errors->has('first_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                                     </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="one-half w-100 last-name">
                                                        <label for="lastname">Last Name</label>
                                                        <input type="text" name="last_name" id="lastname" placeholder="Last Name" value="{{ old('last_name') }}" required maxlength="20">
                                                        @if ($errors->has('last_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                     </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="one-half w-100 email">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required maxlength="120">
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                                     </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="one-half w-100 phone">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" name="phone_number" id="phone" placeholder="Phone Number" value="{{ old('phone_number') }}">
                                                        @if ($errors->has('phone_number'))
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                                                     </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="one-half w-100 pass">
                                                        <label for="pass">Password</label>
                                                        <input type="password" name="password" id="pass" value="{{ old('password') }}"  >
                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                                     </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="one-half w-100 re-pass">
                                                        <label for="re-pass">Repeat Password</label>
                                                        <input type="password" name="password_confirmation" id="re-pass">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="btn-submit float-left pull-right ml-4">
                                                        <button type="submit" id="save_driver" >Add Driver</button>
                                                    </div>
                                                </div>
                                                </div>



                                            <div class="clearfix"></div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible w-75">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{session('success')}} </strong>
                    </div>
                @endif
                @if(session('error'))
                        <div class="alert alert-danger alert-dismissible w-75">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{session('error')}} </strong>
                        </div>
                    @endif


                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                     <li class="text-danger">{{ $error }}</li>
                                 @endforeach
                            </ul>
                        <div class="card-header">
                            <div class="heading">
                                <h4> Search Driver By Email To Add As Your Driver. </h4>
                            </div>
                        </div>
                            <div class="card-body pt-2 pr-3 pb-2 pl-3">
                                <form>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="search"></label>
                                        <input type="text" id="search" name="search_qry" style="font-size: 1rem;" class="form-control" placeholder="Search User By Email.." required>
                                    </div></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-dark"  id="btn_search" type="button">
                                                <i class="fa fa-search pr-2"></i> Search </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="searched-result"></div>
                            </div>
                    </div>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('images/loading.gif')}}" alt="Loading Gif"  id="loading_gif" class="img-fluid" style="display: none ; position: absolute; z-index: 10;">
                            <!-- Trigger the modal with a button -->
                            <div class="alert alert-success alert-dismissible w-75 mb-1" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"> <i class="fa fa-remove"></i> </a>
                                <strong class="suc-msg"> </strong>
                            </div>
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-8">
                                        <h4 class="card-title">List of All Drivers</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-dark float-right btn-show-modal" data-toggle="modal" data-target="#add-driver-modal">Add New Driver</button>
                                    </div>
                                </div>
                           </div>


                            <div class='driver-table'>
                                @include('parshall-views._driver-list-table', ['drivers'=>$drivers])
                            </div>
                        </div>
                    </div>
                </div>
            </div></div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @endsection

@section('side-bar')
   @include('parshall-views._partner-side-bar')
 @endsection

@section('js')
    <script type="text/javascript">
        function driversUrl() {
            return [
                '{{url('admin/register-driver')}}',
                '{{url('admin/drivers-list')}}',
                '{{url('partner/approve-driver')}}',
                '{{url('partner/disapprove-driver')}}',
                '{{url('partner/block-driver')}}',
                '{{url('partner/search-driver')}}'
            ]
        }
        $(document).ready(function () {
            $('.myTable').DataTable();
        });

    </script>
    <script type="text/javascript" src="{{asset('DataTable/datatables.min.js')}}"></script>
 <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
 <script src="{{asset('js/partner/drivers-list.js')}}"></script>

@endsection
