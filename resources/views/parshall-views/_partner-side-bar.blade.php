<li class="nav-item">
    <a class="nav-link" href="{{url('partner/reservations')}}">
        <span class="menu-title">My Reservation</span>
        <i class="icon-globe menu-icon"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('partner/profile')}}">
        <span class="menu-title text-capitalize"> My Profile </span>
        <i class="icon-user menu-icon"></i>
    </a>
</li>

@if(Auth::user()->partner()->first() == null)
    <li class="nav-item">
        <a class="nav-link" href="{{url('partner/build-profile')}}">
            <span class="menu-title text-capitalize">Build your profile </span>
            <i class="icon-check menu-icon"></i>
        </a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{url('partner/update-profile')}}/{{Auth()->user()->partner()->first()->id}}">
            <span class="menu-title text-capitalize">Edit your profile </span>
            <i class="icon-check menu-icon"></i>
        </a>
    </li>
@endif
<li class="nav-item">
    <a class="nav-link" href="{{url('partner/manage-documents')}}">
        <span class="menu-title">Upload Documents</span>
        <i class="icon-globe menu-icon"></i>
    </a>
</li>
@if(auth()->user()->status == 'approved')
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#managedriver" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Manage Drivers</span>
        <i class="icon-user menu-icon"></i>
    </a>
    <div class="collapse" id="managedriver">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{url('partner/add-new-driver')}}">
                    Driver List
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#managevehicles" aria-expanded="false" aria-controls="managevehicles">
        <span class="menu-title">Manage Vehicles</span>
        <i class="icon-support menu-icon"></i>
    </a>
    <div class="collapse" id="managevehicles">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('partner/add-new-vehicle')}}">Add new Vehicle</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('partner/vehicles-list')}}">Vehicle List</a></li>
        </ul>
    </div>
</li>
@endif
<li class="nav-item">
    <a class="nav-link"  href="{{url('partner/notifications')}}">
        <span class="menu-title"> Notifications</span>
        <i class="icon-note menu-icon"></i>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{url('partner/change-password-form')}}">
        <span class="menu-title">Change Password</span>
        <i class="icon-settings menu-icon"></i>
    </a>
</li>
