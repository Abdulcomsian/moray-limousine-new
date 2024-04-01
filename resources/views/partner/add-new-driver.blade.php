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
    </style>


    <ul>
     @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
       </ul>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading">
                                <h4> Search Driver By Email To Add As Your Driver </h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="search"></label>
                                            <input type="text" id="search" class="form-control" placeholder="Search User By Email..">
                                        </div></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-dark"><i class="fa fa-search pr-2"></i> Search </button>
                                        </div>
                                    </div>

                                </form>
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
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add_driver').click(function () {
            $('.alert-success').hide();
            let fist_name = $('input[name="first_name"]').val();
            let last_name = $('input[name="last_name"]').val();
            let email = $('input[name="email"]').val();
            let phone_number = $('input[name="phone_number"]').val();
            let password = $('input[name="password"]').val();
            let password_confirmation = $('input[name="password_confirmation"]').val();
            let user_type = $('input[name="user_type"]').val();
            let creator_id = $('input[name="creator_id"]').val();
            console.log(fist_name);

            $.ajax({
                type: 'post',
                url: '{{url('admin/register-driver')}}',
                data: {
                    first_name : fist_name ,
                    last_name : last_name,
                    email : email,
                    password : password,
                    password_confirmation: password_confirmation,
                    creator_id: creator_id,
                    user_type : user_type,
                    phone_number : phone_number
                },
                success: function (response) {
                    // $(".rooms-listing-container").html(response);
                    console.log(response);
                    $('.alert-success').show();
                    $('.suc-msg').html(response);
                    $('#add-driver-modal').modal('toggle');

                }
            });
            //for the list of all drivers
            $.ajax({
                type: 'get',
                url: '{{url('admin/drivers-list')}}',
                success: function (response) {
                    console.log(response);
                    $('.driver-table').html(response);
                }
            });
        });


        $(document).ready(function(){
            $('body').on('click','.btn-detail',function(){
                let id = $(this).attr('id');
                vehicleDetails(detailURL, id);
                $('#myModal').modal('toggle');
            });
        });
        $(document).ready(function() {
            $('body').on('click','.approve-driver',function(){
                let id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: '{{url('partner/approve-driver')}}',
                    data: {id: id},
                    success: function (response) {
                        console.log(response);
                        $('.driver-table').html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('body').on('click','.disapprove-driver',function(){
                let id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: '{{url('partner/disapprove-driver')}}',
                    data: {id: id},
                    success: function (response) {
                        console.log(response);
                        $('.driver-table').html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('body').on('click', '.block-driver', function () {

                let id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    url: '{{url('partner/block-driver')}}',
                    data: {id: id},
                    success: function (response) {
                        console.log(response);
                        $('.driver-table').html(response);
                    }
                });
            });
        });

        // Function for get the list of MyLift driver not created by the admin
        $('.driver-list').click(function () {
            $('#loading_gif').show();
            $.ajax({
                type: 'get',
                url: '{{url('admin/drivers-list')}}',

                success: function (response) {
                    console.log(response);
                    $('.driver-table').html(response);
                    $('#loading_gif').hide();
                }
            });
        });



        // function to to get all driver list
        $('.all-drivers-list').click(function () {
            $('#loading_gif').show();
            $.ajax({
                type: 'get',
                url: '{{url('admin/all-driver-list')}}',

                success: function (response) {
                    $('#loading_gif').hide();
                    console.log(response);
                    $('.driver-table').html(response);
                }
            });
        });

        //for the list of all drivers registered by admin
        $('.admin-drivers-list').click(function () {
            $('#loading_gif').show();
            $.ajax({
                type: 'get',
                url: '{{url('admin/admin-drivers-list')}}',
                success: function (response) {
                    $('#loading_gif').hide();
                    $('.driver-table').html(response);
                }
            });
        });


    </script>
@endsection
