@extends('layouts.master-admin')
@section('title')
   Partners List
@endsection
@section('main-content')

    <div class="container position-absolute">
        <!-- Modal For Send and notify msg to partner -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Email and Notify User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('admin.send.notification')}}">
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

        <!-- Modal For Add New Partner -->
        <div class="modal fade" id="add-driver-modal" role="dialog">
            <div class="modal-dialog modal-lg w-75 mr-5 mt-5">
                <div class="modal-content">
                    <div class="modal-body bg-white">
                        <button type="button" class="close float-right" data-dismiss="modal"><i class="fa fa-remove"></i> </button>
                        <div class="login-booking">
                            <ul class="login">
                                <li class="active">Add New Partner</li>
                            </ul>
                            <div class="login-content">
                                <div id="tab-2" class="content-tab">
                                    <div class="register-form">
                                        <form action="{{ route('admin.registerPartner') }}" method="post" accept-charset="utf-8" validate = true>
                                            @csrf
                                            <input type="hidden" name="user_type" value="partner">
                                            <input type="hidden" name="creator_id" value="{{Auth()->id() ? Auth()->id() : 1}}">
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
                                                       <input type="email" name="email" id="email" placeholder="Enter Your Email.." value="{{ old('email') }}" required maxlength="120">
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
                                               </div>


                                            <div class="col-md-10">
                                                <div class="form-group float-right">
                                                    <button type="submit" id="add_driver" >Create Partner</button>
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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success ... ! </strong>  {{session('success')}} .
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-error alert-dismissible fade show" role="alert">
                                <strong>Error . . . !</strong> {{session('error')}}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            <div class="card-header">
                                <h3 class="card-title float-right drivers-list list-heading" style="width: 62%; font-size: 1.7rem;font-family: sans-serif;">LIST OF ALL DRIVERS</h3>
                                <div class="dropdown w-25">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-filter pr-1"></i> FILTER PARTNERS LIST
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="Partners Lists">
                                        <button class="dropdown-item all-partners-list bg-dark text-white border border-dark" type="button">All Partner List</button>
                                        <button class="dropdown-item pending-partners-list bg-dark text-white border border-dark" type="button">Pending Partners List</button>
                                        <button class="dropdown-item approved-partners-list bg-dark text-white border border-dark" type="button">Approved Partners List</button>
                                        <button class="dropdown-item disapproved-partners-list bg-dark text-white border border-dark" type="button">Disapproved Partners List</button>
                                        <button class="dropdown-item blocked-partners-list bg-dark text-white border border-dark" type="button">Blocked Partners List</button>
                                    </div>
                                </div>
                            </div>
                        <div class="card-body">
                            <button class="btn btn-dark pull-right" type="button" id="create-partner"  aria-haspopup="true" aria-expanded="false">
                                Create Partner
                            </button>
                            <div class="img-responsive">
                                <img src="{{asset('images/load.gif')}}" class="img-rounded"  id="loading_gif" alt="loading gif" style=" display: none; position: absolute; width: 95%; height: fit-content; z-index: 10;">
                            </div>
                            <div class="table-content">
                                @include('parshall-views._partner-list-table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Hathaway Limousines © 2020 </span>
{{--                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>--}}
            </div>
        </footer>
        <!-- partial -->
    </div>

@endsection
@section('js')
    <script>
        function partner_list_urls() {
            return [
                '{{url('admin/all-partners')}}',
                '{{url('admin/pending-partners')}}',
                '{{url('admin/approved-partners')}}',
                '{{url('admin/disapproved-partners')}}',
                '{{url('admin/blocked-partners')}}',
                '{{url('admin/search-partners')}}',
            ]
        }
    </script>
    <script type="text/javascript" src="{{asset('js/admin/manage-partners.js')}}"></script>
    @endsection
