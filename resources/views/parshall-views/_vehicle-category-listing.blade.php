
<table id="myTable" class="myTable table table-striped dt-responsive nowrap">
    <thead>
    <tr>
        <th> Image </th>
        <th> Name </th>
        <th> Max Seats </th>
        <th> Max Bags </th>
        <th> Created By </th>
        <th> Total Vehicle </th>
        <th> Actions </th>
    </tr>
    </thead>
    <tbody>

    @if(count($categories) > 0)

        @foreach($categories as $category)
            <tr class="row{{$category->id}}">
                <td class="py-1">
                    <img src="{{asset('files/vehicleCategory/category_img')}}/{{$category->picture}}" alt="image" />
                </td>
                <td>   {{$category->name}} </td>
                <td>   {{$category->max_seats}} </td>
                <td>
                    {{$category->max_bags}}
                </td>
                <td> {{Auth()->user()->first_name}} </td>
                <td>
                 <span> {{count($category->vehicles()->get()) }} </span>
                </td>

                <td class="action-td">
                    <div class="btn-group p-0">
                        <button type="button" value="{{$category->id}}" class="btn btn-dark dropdown-toggle btn-outline-dark" style="height: 2.5rem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a> <button type="button"  id="{{$category->id}}" class="dropdown-item edit-btn btn btn-outline-dark approve-driver" style="height: 2.5rem">Edit</button></a>
                            <a href="{{url('admin/delete-category/')}}/{{$category->id}}"><button type="button" value="{{$category->id}}" class="dropdown-item btn btn-outline-dark disapprove-driver" style="height: 2.5rem">Delete</button></a>
{{--                            <button type="button" value="{{$category->id}}" class="dropdown-item btn btn-outline-dark block-driver" style="height: 2.5rem">Make Private</button>--}}
                        </div>
                    </div>
                </td>
            </tr>

        @endforeach
    @else
        <h2>No Driver Find</h2>
    @endif
    </tbody>
</table>
