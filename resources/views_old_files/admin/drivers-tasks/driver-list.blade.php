@extends('layouts.master-admin')
@section('title')
    {{isset($driver) ? 'Update Profile ' : 'Add Driver'}}
@endsection
@section('main-content')
    <style>
        .error-field{
            color: red;
            font-size: 0.8rem;
        }
    </style>
{{--    Modal for add driver--}}
<div class="container position-absolute">
    <!-- Modal for send notification to driver-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Email and Notify User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('driver.send.notification')}}">
                    @csrf
                    <input type="hidden"  name="user_id" value="">
                    <div class="modal-body pt-0 pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea rows="6" name="msg_body" class="form-control" placeholder="Enter Message ..." required maxlength="600"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

                                    <form action="{{ route('admin.registerDriver') }}" method="post" accept-charset="utf-8" validate = true>
                                        @csrf

                                        <input type="hidden" name="user_type" value="driver">
                                        <input type="hidden" name="creator_id" value="{{Auth()->id() ? Auth()->id() : 1}}">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="one-half w-100  first-name">
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
                                               <div class="one-half w-100  last-name">
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
                                                   <input type="email" name="email" id="email" placeholder="MyLift@gmail.com" value="{{ old('email') }}" required maxlength="120">
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
                                               <div class="btn-submit float-right">
                                                   <button type="button" id="add_driver" >Add Driver</button>
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
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success ... ! </strong>  {{session('success')}} .
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title float-right drivers-list list-heading" style="width: 62%; font-size: 1.7rem;font-family: sans-serif;">LIST OF ALL DRIVERS</h3>
                            <div class="dropdown w-25">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-filter pr-1"></i> FILTER DRIVERS LIST
                                </button>

                                <div class="dropdown-menu" aria-labelledby="Drivers Lists">
                                    <button class="dropdown-item all-drivers-list bg-dark text-white border border-dark" type="button">All Driver List</button>
                                    <button class="dropdown-item pending-drivers-list bg-dark text-white border border-dark" type="button">Pending Driver List</button>
                                    <button class="dropdown-item approved-drivers-list bg-dark text-white border border-dark" type="button">Approved Driver List</button>
                                    <button class="dropdown-item disapproved-drivers-list bg-dark text-white border border-dark" type="button">Disapproved Drivers List</button>
                                    <button class="dropdown-item blocked-drivers-list bg-dark text-white border border-dark" type="button">Blocked Drivers List</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="img-responsive">
                                <img src="{{asset('images/load.gif')}}" class="img-bordered"  id="loading_gif" alt="loading gif" style=" display: none; position: absolute; width: 95%; height: fit-content; z-index: 10;">
                            </div>

                            <!-- Trigger the modal with a button -->
{{--                            <button type="button" class="btn btn-dark float-right btn-show-modal" data-toggle="modal" data-target="#add-driver-modal">Add New Driver</button>--}}
                            <div class="alert alert-success alert-dismissible w-75 mb-1" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"> <i class="fa fa-remove"></i> </a>
                                <strong class="suc-msg"> </strong>
                            </div>
                            <div class='driver-table'>
                            @include('parshall-views._driver-list-table', ['drivers'=>$drivers])
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
@endsection
@section('js')
        <script>
           function list_urls() {
               return [
                   '{{url('driver/all-drivers')}}',
                   '{{url('driver/pending-drivers')}}',
                   '{{url('driver/approved-drivers')}}',
                   '{{url('driver/disapproved-drivers')}}',
                   '{{url('driver/blocked-drivers')}}',
                   '{{url('admin/change-status')}}',
                   '{{url('admin/disapprove-status')}}',
                   '{{url('admin/block-status')}}'
               ]
           }
           </script>
        <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/admin/manage-drivers.js')}}"></script>
    @endsection
