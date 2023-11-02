

    @if(count($vehiclePricing) > 0)
        <table class="table table-striped table-bordered" id="myTable">
            <thead>
            <tr>
                <th> Category Name </th>
                <th> Type </th>
                <th> Created By </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>

        @foreach($vehiclePricing as $price)

            <tr>
                <td> {{$price->category->name}} </td>
                <td> <strong class="pricing-type" id="{{$price->category_id}}" style="cursor: pointer;">{{($price->pricing_type == \App\Utills\Constants\AppConsts::PRICE_TYPE_PER_KM) ? 'Per Kilometer' : 'Per Hour'}}</strong>  </td>
                <td> {{$price->user->first_name}} </td>
                <td class="action-td">
                    <div class="btn-group p-0">
                        <button type="button" value="{{$category->id}}" class="btn btn-dark dropdown-toggle btn-outline-dark" style="height: 2.5rem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{url('admin/vehiclePricing/edit/'.$price->id)}}"><button type="button" value="" class="dropdown-item btn btn-outline-dark approve-driver" style="height: 2.5rem">Edit</button></a>
                            <a href="{{url('admin/vehiclePricing/delete/'.$price->id)}}"><button type="button" value="" class="dropdown-item btn btn-outline-dark disapprove-driver" style="height: 2.5rem">Delete</button></a>
                        </div>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @else
        <h2>Vehicle Pricing Not Found</h2>
    @endif
