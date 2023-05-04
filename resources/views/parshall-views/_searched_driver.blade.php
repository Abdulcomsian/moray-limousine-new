<h3 class="heading"> Searched Result </h3>
<table class="table table-striped table-bordered myTable">
    <thead>
    <tr>
        <th> User </th>
        <th> First name </th>
        <th> Last Name </th>
        <th> Email </th>
        <th> Contact NO </th>
        <th> Status </th>
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
                <td>
                    <div class="btn-group p-0" style="font-size: 1.6rem;">
                        @if(Auth()->user()->user_type == 'partner')
                            <a id="{{$driver->id}}" href="{{url('partner/driver-details/')}}/{{$driver->id}}" class="p-1" style="cursor: pointer"><i class="fa fa-eye"></i></a>
                        @else
                            <a id="{{$driver->id}}" href="{{url('admin/driver-details/')}}/{{$driver->id}}" class="p-1" style="cursor: pointer"><i class="fa fa-eye"></i></a>
                        @endif
                        <a href="{{url('partner/add-new-driver/')}}/{{$driver->id}}" title="Add Driver">
                            <strong id="{{$driver->id}}"  class="add-new-driver text-success p-1" style="cursor: pointer ; font-size: 1.7rem;">
                                <i class="fa fa-user-plus"></i>
                            </strong>
                        </a>
                    </div>

                </td>
            </tr>

        @endforeach
    @else
        <div class="heading">
            <h5>No Driver Found With This Email...</h5>
        </div>
    @endif
    </tbody>
</table>
