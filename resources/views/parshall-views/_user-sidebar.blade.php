{{--<li class="nav-item">--}}
{{--    <a class="nav-link" href="{{url('user/dashboard')}}">--}}
{{--        <span class="menu-title text-capitalize">My Dashboard </span>--}}
{{--        <i class="icon-user menu-icon"></i>--}}
{{--    </a>--}}
{{--</li>--}}

<li class="nav-item">
    <a class="nav-link" href="{{url('user/reservation')}}">
        <span class="menu-title">My Reservation</span>
        <i class="icon-globe menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('user/profile')}}">
        <span class="menu-title text-capitalize"> My Profile </span>
        <i class="icon-user menu-icon"></i>
    </a>
</li>

@if(Auth()->user()->endUser == null)
    <li class="nav-item">
        <a class="nav-link" href="{{url('user/build-profile')}}">
            <span class="menu-title text-capitalize">Build your profile </span>
            <i class="icon-check menu-icon"></i>
        </a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{url('user/update-profile')}}/{{Auth()->user()->endUser()->first()->id}}">
            <span class="menu-title text-capitalize">Edit your profile </span>
            <i class="icon-check menu-icon"></i>
        </a>
    </li>
@endif
<li class="nav-item">
    <a class="nav-link"  href="{{url('user/notifications')}}">
        <span class="menu-title"> Notifications</span>
        <i class="icon-note menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('/')}}">
        <span class="menu-title text-capitalize">Home Page </span>
        <i class="icon-home menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('user/change-password-form')}}">
        <span class="menu-title">Change Password</span>
        <i class="icon-settings menu-icon"></i>
    </a>
</li>
