@php
    $userType = Auth()->user()->user_type;
    @endphp

<div class="container">
    <!-- Modal for the details of vehicle-->
    <div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog modal-lg" style="margin-top: 11px;margin-right: 0; max-width: 80% !important;">
            <!-- Modal content-->
            <div class="modal-content bg-white">
                <div class="card-header text-center p-1">
                    <button type="button" class="close pt-3" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title mt-3 text-uppercase">Vehicle Detail</h3>
                </div>
                <div class="modal-body pt-1 pb-1">
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img id="vehicle_img" src="{{asset('images/user.jpg') }}" alt="no image"/>
                                        <div class="file btn btn-lg btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <a class="pull-right" href="">
                                        <input type="button" class="btn btn-dark" name="btnAddMore" value="Update Vehicle "/>
                                    </a>
                                    <div class="profile-head pt-3">
                                        <h5>
                                            {{Auth()->user()->first_name}} {{Auth()->user()->last_name}}
                                        </h5>
                                        <h6 class="text-capitalize">
                                            Vehicle Details
                                        </h6>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vehicle</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vehicle Type Info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false">Services Areas / Cities</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-work">
                                        <strong>Additional Information</strong>
                                        <p class="v-information"></p>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" style="margin-top: -60px" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Vehicle Title  :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-title"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Plate no  :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-plate"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Vehicle Type : </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-type"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Standard :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-standard"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Model </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-model"> </p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Engine Capacity</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-engine"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Exterior Color </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-ecolor"></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Interior Color </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-ecolor"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Transmission</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-transmission"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Fuel Type :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="v-fuel"></p>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Vehicle Type Name :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="c-name"></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Max Seats :</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="c-seats"></p>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-6">
                                                    <label>Max - Bags :</label>
                                                </div>
                                                <div class="col-md-6">
                                                   <p class="c-bags"></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Additional Information</label><br/>
                                                    <p class="c-info"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <ul class="list-group locations-list">
                                                        <li class="list-group-item">Cras justo odio</li>
                                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<table id="myTable" class="myTable table table-striped dt-responsive nowrap">
            <thead>
            <tr>
                <th> Image </th>
                <th> Name  & Model</th>
                <th> Type / Class</th>
                <th> Bags & Seats</th>
                <th> Plate</th>
                <th> Status </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @if($vehicles->count() > 0)
                @foreach($vehicles AS $vehicle)
                    <tr>
                        <td class="py-1">
                            <img  src="{{$vehicle->image_name ? asset('admin-vehicle-img').'/'.$vehicle->image_name  : asset( 'images/user.jpg')}}" alt="image" />
                        </td>
                        <td>{{$vehicle->title}} & {{$vehicle->model_no}}</td>
                        <td>{{$vehicle->vehicleCategory->name}} </td>
                        <td>  <strong>{{$vehicle->vehicleCategory->max_bags}}</strong>   <i class="fa fa-shopping-bag"></i>
                          &  <strong> {{$vehicle->vehicleCategory->max_seats}} </strong>    <i class="fa fa-male"></i> </td>
                        <td>{{$vehicle->plate}} </td>
                        <td>
                            @if($vehicle->status == 'pending')
                                <label class="badge badge-warning">Pending</label>
                            @elseif($vehicle->status == 'approved')
                                <label class="badge badge-success">Approved</label>
                            @elseif($vehicle->status == 'blocked' or $vehicle->status == 'BLOCKED')
                                <label class="badge badge-danger">Disapproved</label>
                            @endif
                        </td>
                        <td style="font-size: 1.5rem;">
                            @if($userType == 'admin' or $userType == 'ADMIN' )
                            <a href="{{url('admin/vehicle/vehicleDetail')}}/{{$vehicle->id}}" class="btn-detail text-info" title="Vehicle Details" id="{{$vehicle->id}}">
                                <i class="fa fa-eye"></i>
                            </a>
                                @else
                                <a href="{{url('vehicle/vehicleDetail')}}/{{$vehicle->id}}" class="btn-detail text-info" title="Vehicle Details" id="{{$vehicle->id}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
{{--                            {{url('admin/approveVehicle/'.$vehicle->id)}}--}}
                            @if($userType == 'admin' or $userType == 'ADMIN')
                             @if($vehicle->status == 'blocked' or $vehicle->status == 'BLOCKED')
                                    <a href="#" class="btn-approve" id="{{$vehicle->id}}">
                                        <i class="fa fa-universal-access" style="color: #129000"></i>
                                    </a>
                             @endif
                             @if($vehicle->status == 'approved' or $vehicle->status == 'APPROVED' )
                                     <a href="#" class="btn-disapprove" id="{{$vehicle->id}}">
                                         <i class="fa fa-ban" style="color: #c20012"></i>
                                     </a>
                              @endif
                                @if($vehicle->status == 'pending' or $vehicle->status == 'PENDING')
                                     <a href="#" class="btn-disapprove" id="{{$vehicle->id}}">
                                         <i class="fa fa-ban" style="color: #c20012"></i>
                                     </a>
                                     <a href="#" class="btn-approve" id="{{$vehicle->id}}">
                                         <i class="fa fa-universal-access" style="color: #129000"></i>
                                     </a>
                                 @endif
                            @endif
                            @if($userType == 'admin')
                            <a href="{{url('admin/update-vehicle/'.$vehicle->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
{{--                            @elseif($userType == 'driver' or $userType == 'end_user')--}}
{{--                            <a href="{{url('driver/update-vehicle/'.$vehicle->id)}}">--}}
{{--                                <i class="fa fa-edit"></i>--}}
{{--                            </a>--}}
                            @elseif($userType == 'partner')
                                <a href="{{url('partner/update-vehicle/'.$vehicle->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endif
                            <a href="#" class="btn-delete" id="{{$vehicle->id}}">
                                <i class="fa fa-trash" style="color: #0f0001"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


