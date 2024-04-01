<li class="nav-item">
    <a class="nav-link" href="{{route('driver.reservations')}}">
        <span class="menu-title">My Reservation</span>
        <i class="icon-globe menu-icon"></i>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{url('driver/profile')}}">
        <span class="menu-title text-capitalize"> My Profile </span>
        <i class="icon-user menu-icon"></i>
    </a>
</li>

@if(Auth()->user()->driver == null)
    <li class="nav-item">
        <a class="nav-link" href="{{url('driver/profile-view')}}">
            <span class="menu-title text-capitalize">Build your profile </span>
            <i class="icon-check menu-icon"></i>
        </a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{url('driver/update-profile')}}/{{auth()->id()}}">
            <span class="menu-title text-capitalize">Edit your profile </span>
            <i class="icon-check menu-icon"></i>
        </a>
    </li>
@endif
<li class="nav-item">
    <a class="nav-link" href="{{url('driver/upload-docs')}}">
        <span class="menu-title text-capitalize">Upload Documents </span>
        <i class="icon-paper-plane menu-icon"></i>
    </a>
</li>
@if(Auth()->user()->status == 'approved')
    <li class="nav-item">
        <a class="nav-link"  href="{{url('driver/my-partners')}}" >
            <span class="menu-title"> My Parties </span>
            <i class="icon-user-following menu-icon"></i>
        </a>
    </li>
@endif

<li class="nav-item">
    <a class="nav-link"  href="{{url('driver/notifications')}}" >
        <span class="menu-title"> Notifications</span>
        <i class="icon-note menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('driver/change-password-form')}}">
        <span class="menu-title">Change Password</span>
        <i class="icon-settings menu-icon"></i>
    </a>
</li>
