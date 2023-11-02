@php
$user_type = Auth()->user()->user_type;
@endphp
<table id="myTable" class="table myTable table-striped dt-responsive nowrap">
    <thead>
    <tr>
        <th> User </th>
        <th> First name </th>
        <th> Last Name </th>
        <th> Email </th>
        <th> Contact NO </th>
        <th> Status By Admin </th>
        @if($user_type == "partner")
            <th> Status </th>
         @endif
        <th> Actions </th>
    </tr>
    </thead>
    <tbody>

    @if(count($drivers) > 0)
        @foreach($drivers as $driver)
            <tr>
                <td class="py-1">
                    <img src="{{asset('uploaded-user-images/endusers-images/')}}/{{$driver->userMedia ? $driver->userMedia->image_name : 'user.jpg' }}" alt="image" />
                </td>
                <td>   {{$driver->first_name}} </td>
                <td>   {{$driver->last_name}} </td>
                <td>
                    {{$driver->email}}
                </td>
                <td> {{$driver->phone_number}} </td>
                <td>
                    @if($driver->status == 'approved')
                        <label class="badge badge-success">{{$driver->status}}</label>
                        @elseif($driver->status == 'pending')
                        <label class="badge badge-warning">{{$driver->status}}</label>
                       @else
                        <label class="badge badge-danger">{{$driver->status}}</label>
                        @endif
                </td>

                @if($user_type == "partner")
                    <td class="text-uppercase">
                        @if($driver->pivot->status == 'active')
                            <label class="badge badge-success">{{$driver->pivot->status}}</label>
                        @elseif($driver->pivot->status == 'blocked')
                            <label class="badge badge-danger">{{$driver->pivot->status}}</label>
                        @else
                            <label class="badge badge-secondary">{{$driver->pivot->status}}</label>
                        @endif
                    </td>
                    @endif

                <td>
                    <div class="btn-group p-0" style="font-size: 1.6rem;">
                        @if($user_type == 'partner')
                            @if($driver->pivot->status == 'active')
                                <a title="Block Driver">   <strong id="{{$driver->id}}" class="disapprove-driver text-danger p-1" style="cursor: pointer">  <i class="fa fa-ban "></i></strong></a>
                                @else
                                <a href="#" title="Approve Driver"> <strong id="{{$driver->id}}"  class="approve-driver text-success p-1" style="cursor: pointer">
                                        <i class="fa fa-universal-access"></i></strong></a>
                                @endif
                            <a id="{{$driver->id}}" href="{{url('partner/driver-details/')}}/{{$driver->id}}" title="Driver Detail" class="p-1" style="cursor: pointer">
                                <i class="fa fa-eye"></i>
                            </a>

                            @endif

                            @if($user_type == 'admin')
                                <a id="{{$driver->id}}" href="{{url('admin/driver-details/')}}/{{$driver->id}}" class="p-1" style="cursor: pointer"><i class="fa fa-eye"></i></a>
                            @if($driver->status === "pending")
                                <a href="#" title="Approve Driver"> <strong id="{{$driver->id}}"  class="approve-driver text-aqua p-1" style="cursor: pointer"> <i class="fa fa-universal-access"></i></strong></a>
                                <a title="Disapprove Driver">   <strong id="{{$driver->id}}" class="disapprove-driver text-danger p-1" style="cursor: pointer">  <i class="fa fa-ban "></i></strong></a>
                                @endif
                            @if($driver->status === "disapproved")
                                <a href="#" title="Approve Driver"> <strong id="{{$driver->id}}"  class="approve-driver text-aqua p-1" style="cursor: pointer"> <i class="fa fa-universal-access"></i></strong></a>
                             @endif
{{--                            @if($driver->status === "approved")--}}
{{--                             <a title="Disapprove Driver">   <strong id="{{$driver->id}}" class="disapprove-driver text-danger p-1" style="cursor: pointer">  <i class="fa fa-ban "></i></strong></a>--}}
{{--                             @endif--}}
                             @if($driver->status === "blocked")
                                <a href="#" title="Approve Driver"> <strong id="{{$driver->id}}"  class="approve-driver text-aqua p-1" style="cursor: pointer"> <i class="fa fa-universal-access"></i></strong></a>
                              @else
                                <strong id="{{$driver->id}}" title="Block Driver" class="block-driver text-primary p-1" style="cursor: pointer"><i class="fa fa-close"></i></strong>
                              @endif
                                <button class="notification text-info p-0" title="Send Email" id="{{$driver->id}}" style="font-size: 1.4rem; background: none;">
                                    <i class="fa fa-envelope mb-3 ml-2"></i>
                                </button>
                             @endif
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <h3>No Driver Found</h3>
    @endif
    </tbody>
</table>
