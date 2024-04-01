
@extends('layouts.driver')
@section('title')
    {{isset($driver) ? 'Update Profile ' : 'Build Profile'}}
@endsection
<style>
    .edit-profile-photo{
        height: 12.7rem;
        width: 13rem;
        margin-left: 45px;
    }
</style>

@section('content')
    @include('parshall-views._main-vehicle-listings' , ['addVehicleRoute' => url('driver/add-new-vehicle')])
@stop

@section('side-bar')
    <li class="nav-item">
        <a class="nav-link" href="{{url('driver/dashboard')}}">
            <span class="menu-title text-capitalize">My Dashboard </span>
            <i class="icon-user menu-icon"></i>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('driver/profile')}}">
            <span class="menu-title text-capitalize"> My Profile </span>
            <i class="icon-user menu-icon"></i>
        </a>
    </li>

    @if(Auth::user()->driver()->first() == null)
        <li class="nav-item">
            <a class="nav-link" href="{{url('driver/profile-view')}}">
                <span class="menu-title text-capitalize">Build your profile </span>
                <i class="icon-check menu-icon"></i>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{url('driver/update-profile')}}/{{Auth()->user()->driver()->first()->id}}">
                <span class="menu-title text-capitalize">Edit your profile </span>
                <i class="icon-check menu-icon"></i>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#managevehicles" aria-expanded="false" aria-controls="managevehicles">
            <span class="menu-title">Manage Vehicles</span>
            <i class="icon-support menu-icon"></i>
        </a>
        <div class="collapse" id="managevehicles">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('driver/add-new-vehicle')}}">Add new Vehicle</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('driver/vehicles-list')}}">Vehicle List</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title"> Notifications</span>
            <i class="icon-note menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span class="menu-title">My Reservation</span>
            <i class="icon-globe menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span class="menu-title">Change Password</span>
            <i class="icon-settings menu-icon"></i>
        </a>
    </li>

@endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let approveURL = '{{url('admin/approveVehicle')}}/';
        let DeleteVehicle = '{{url('admin/deleteVehicle')}}/';
        let disApproveVehicle = '{{url('admin/disapproveVehicle')}}/';

        //on click approve function
        $(document).ready(function(){
            $('body').on('click','.btn-approve',function(){
                let id =   $(this).attr('id');
                changeVehicleStatus(approveURL , id);
            });
        });

        $(document).ready(function(){
            $('body').on('click','.btn-disapprove',function(){
                let id = $(this).attr('id');
                changeVehicleStatus(disApproveVehicle, id);
            });
        });

        $(document).ready(function(){
            $('body').on('click','.btn-delete',function(){
                let id = $(this).attr('id');
                changeVehicleStatus(DeleteVehicle, id);
            });
        });


        function changeVehicleStatus(statusURL,id){
            $.ajax({
                type: 'get',
                url: statusURL+id,
                success: function (response) {
                    console.log(response);
                    $('.vehicle-content').html(response);
                }
            });
        }

    </script>
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
@endsection
