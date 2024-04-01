<table id="myTable" class="myTable table-condensed table table-striped dt-responsive nowrap">
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

    @if(count($partners) > 0)

        @foreach($partners as $partner)
            <tr>
                <td class="py-1">
                    <img src="{{asset('images/user.jpg')}}" alt="image" />
                </td>
                <td> {{$partner->first_name}} </td>
                <td> {{$partner->last_name}} </td>
                <td>
                    {{$partner->email}}
                </td>
                <td> {{$partner->phone_number}} </td>
                <td>
                    @if($partner->status == 'approved')
                        <label class="badge badge-success">{{$partner->status}}</label>
                    @elseif($partner->status == 'pending')
                        <label class="badge badge-warning">{{$partner->status}}</label>
                    @else
                        <label class="badge badge-danger">{{$partner->status}}</label>
                    @endif
                </td>
                <td>
                    <div>
                        <a href="{{url('admin/partner-details')}}/{{$partner->id}}" title="Partner Detail">
                            <i class="fa fa-eye text-primary p-1" style="font-size: 1.5rem"></i></a>
                        @if($partner->status == 'disapproved')
                            <a href="{{url('admin/approve-partner')}}/{{$partner->id}}" title="Approve Partner">
                                <i class="fa fa-universal-access text-primary p1" style="font-size: 1.5rem"></i></a>
                        @endif
                        @if($partner->status == 'approved')
                            <a href="{{url('admin/disapprove-partner')}}/{{$partner->id}}" title="Disapprove Partner">
                                <i class="fa fa-ban text-danger p-1" style="font-size: 1.5rem"></i></a>
                        @elseif($partner->status == 'pending')
                            <a href="{{url('admin/disapprove-partner')}}/{{$partner->id}}" title="Disapprove Partner">
                                <i class="fa fa-ban text-danger p-1" style="font-size: 1.5rem"></i></a>
                            <a href="{{url('admin/approve-partner')}}/{{$partner->id}}" title="Approve Partner">
                                <i class="fa fa-universal-access text-primary p1" style="font-size: 1.5rem"></i></a>
                        @elseif($partner->status == 'blocked')
                            <a href="{{url('admin/disapprove-partner')}}/{{$partner->id}}" title="Disapprove Partner">
                                <i class="fa fa-user-alt-slash text-danger p-1" style="font-size: 1.5rem"></i></a>
                            <a href="{{url('admin/approve-partner')}}/{{$partner->id}}" title="Approve Partner">
                                <i class="fa fa-universal-access text-primary p1" style="font-size: 1.5rem"></i></a>
                        @endif
{{--                        <a href="{{url('admin/delete-partner')}}/{{$partner->id}}" id="delete_partner" title="Delete Partner">--}}
{{--                            <i class="fa fa-trash text-dark p-1" style="font-size: 1.5rem"></i></a>--}}
                        @if($partner->status !== 'blocked')
                            <a href="{{url('admin/block-partner')}}/{{$partner->id}}" id="block_partner" title="blocked Partner">
                                <i class="fa fa-lock text-dark p-1" style="font-size: 1.5rem"></i></a>
                        @endif
                       <button class="notification text-info p-0" title="Send Email" id="{{$partner->id}}" style="font-size: 1.4rem; background: none;">
                           <i class="fa fa-envelope"></i>
                       </button>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <h2>No Record found</h2>
    @endif
    </tbody>
</table>
