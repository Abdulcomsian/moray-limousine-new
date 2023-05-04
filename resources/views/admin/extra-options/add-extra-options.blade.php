@extends('layouts.master-admin')
@section('title')
    Add Vehicle
@endsection
@section('main-content')
    <style>
        .chosen-container-multi .chosen-choices {
            padding: 6px 5px;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 11rem;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -60%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: none;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #2e7028;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #2e7028;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #111111;
        }
        .modal-body .login-booking input {
            height: 2.5rem;
        }
        .register-form form div {
            margin-bottom: 0;
        }
        .edit-profile-photo {
            background: #787d77;
            border: 1px solid;
        }
        .photoUpload {
            background: #3e423e;
        }
        .chosen-container{
            width: 100% !important;
        }
    </style>

    {{--    Modal for Details of extra Options --}}
    <div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog modal-lg" style="margin-top: 11px;margin-right: 0; max-width: 80% !important;">
            <!-- Modal content-->
            <div class="modal-content bg-white">
                <div class="card-header text-center p-1">
                    <button type="button" class="close pr-4" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title mt-3 text-uppercase">Extra Option Detail</h3>
                </div>
                <div class="modal-body pt-1 pb-1">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img id="optionImg" src="{{asset('images/user.jpg') }}" class="thumbnail" alt="no image"/>
                                    <div class="file btn btn-lg btn-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head pt-3">
                                    <h5>
                                        Extra Option Details Page
                                    </h5>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Option Details</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-work">
                                    <strong>Applied On Floowing Types</strong>
                                    <ul class="list-group list-group-flush pt-2 o-information">
                                        <li class="list-group-item">Cras justo odio</li>

                                    </ul>
{{--                                    <p class="o-information"></p>--}}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" style="margin-top: -30px" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Option Title  :</label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="o-title"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Price  :</label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="o-price"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Is Quantity </label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="is_quantity"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Max Quantity :</label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="o-max-quantity"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Active Status   </label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="active-status"> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 border-bottom">
                                                <label class="text-capitalize"> Description  :  </label>
                                            </div>
                                            <div class="col-md-10 border-bottom">
                                                <p class="extra-information mt-3"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Vehicle Type Name :</label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="c-name"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <label>Max Seats :</label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="c-seats"></p>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-md-6 border-bottom">
                                                <label>Max - Bags :</label>
                                            </div>
                                            <div class="col-md-6 border-bottom">
                                                <p class="c-bags"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Additional Information</label><br/>
                                                <p class="o-description"></p>
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

       {{--    modal for add options--}}
    <div class="container position-absolute">
        <!-- Modal -->
        <div class="modal fade" id="add-driver-modal" role="dialog">
            <div class="modal-dialog modal-lg w-75 mr-5 mt-3">
                <div class="modal-content bg-white">
                    <div class="modal-body pt-2 bg-white">
                        <button type="button" class="close float-right pr-3"  data-dismiss="modal"><i class="fa fa-close"></i></button>
                        <div class="login-booking">
                            <ul class="login mb-3">
                                <li class="active"> Add Extra Options</li>
                            </ul>
                            <div class="login-content">
                                <div id="tab-2" class="content-tab">
                                    <div class="register-form">
                                        <form action="{{route('save.option')}}" method="post"  enctype="multipart/form-data" validate = true >
                                            @csrf
                                            <input type="hidden" value="{{null}}" name="id">
                                            <div class="row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="dob">Option Title :</label>
                                                        <input type="text" class="form-control" id="dob" name="title"  placeholder="Title Of Option" required maxlength="60">
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('title') }}</strong>
                                                                     </span>
                                                        @endif
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-md-12">

                                                            <div class="form-group">
                                                                <label for="dob">Price :</label>
                                                                <input type="number" class="form-control" id="dob" name="price" value="{{isset($user) ? $user->date_of_birth : old('price')}}" placeholder="Price" required>
                                                                @if ($errors->has('price'))
                                                                    <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $errors->first('price') }}</strong>
                                                                            </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pt-3">
                                                            <div class="form-group-lg">
                                                                <label for="location">Select Categories : </label>
                                                                <select id="location" data-name="Locations" class="form-control validate p-2" name="categories[]" placeholder="Select Categories" multiple>
                                                                    <option> </option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><div class="col-md-2"></div>
                                                <div class="col-md-3 mr-4 pt-2 ">
                                                    <div class="form-group input-group-sm">
                                                        <div class="edit-profile-photo  user-image-preview">
                                                            <div class="img-preview">
                                                                <img src="{{asset('images/no-image-icon.png')}}" id="output" alt="profile-photo" class="img-fluid">
                                                            </div>
                                                            <div class="change-photo-btn mb-0">
                                                                <div class="photoUpload">
                                                                    <span><i class="fa fa-upload"></i></span>
                                                                    <input type="file" accept="image/*" onchange="loadFile(event)" class=" upload {{ $errors->has('image_name') ? ' is-invalid' : '' }}" name="image_name" id="profile-img" required>
                                                                    @if ($errors->has('image_name'))
                                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_name') }}</strong>
                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><div class="col-md-1"></div>
                                                <div class="col-md-11  mr-5">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <input class="checkbox ml-2 mt-1 " type="checkbox" id="dob" value="no" name="is_quantity" >
                                                                <label for="dob" class="m-3">Is Quantity :</label>
                                                                @if ($errors->has('is_quantity'))
                                                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('is_quantity') }}</strong>
                                                                   </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group max_quantity hide max-quantity">
                                                                <input class=" ml-2 mt-2 " type="number" id="dob" name="max_quantity" placeholder="Max Quantity" >
                                                                <label for="dob" class="m-3"></label>
                                                                @if ($errors->has('max_quantity'))
                                                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('max_quantity') }}</strong>
                                                                   </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="dob">Option Description :</label>
                                                        <textarea class="form-control" rows="5" id="dob" name="description" placeholder="Vehicle Type Description" required maxlength="300"></textarea>
                                                        @if ($errors->has('description'))
                                                            <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('description') }}</strong>
                                                                   </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="form-group-lg mt-3 float-left">
                                                        <button type="submit" class="btn btn-outline-dark">
                                                            Save Option
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title text-uppercase">List Of Extra Options</h4>
{{--                                    <p class="card-description"> -----         </p>--}}
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-dark btn-create-option float-right btn-show-modal" data-toggle="modal">Create Extra Options</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('images/loading.gif')}}" alt="loading gif"  id="loading_gif" class="img-fluid" style="display: none ; position: absolute; z-index: 10;">
                            <!-- Trigger the modal with a button -->
                            <div class="alert alert-success alert-dismissible w-75 mb-1" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> New Extra Options is Added Successfully.
                            </div>
                            <div class='driver-table'>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th> Image </th>
                                        <th> Option Title </th>
                                        <th> Option Price </th>
                                        <th> Is Active  </th>
                                        <th> Category </th>
                                        <th> Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($options) > 0)
                                        @foreach($options as $option)
                                            <tr class="row{{$category->id}}">
                                                <td class="py-1">
                                                    <img src="{{asset('files/options-images')}}/{{$option->image_name}}" alt="image" />
                                                </td>
                                                <td>   {{$option->title}} </td>
                                                <td>   {{$option->price}} </td>
                                                <td>
                                                    {{isset($option->is_available) ? $option->is_active : 'Yes'}}
                                                </td>
                                                <td><i class="fa fa-info-circle"></i>
                                                    <span class="label-info options-details text-info" id="{{$option->id}}" style="cursor: pointer;"> Details  </span> </td>
                                                <td class="action-td">
                                                    <div class="btn-group p-0">
                                                        <button type="button" value="{{$category->id}}" class="btn btn-dark dropdown-toggle btn-outline-dark" style="height: 2.5rem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a> <button type="button"  id="{{$option->id}}" class="dropdown-item edit-btn btn btn-outline-dark approve-driver" style="height: 2.5rem">Edit</button></a>
                                                            <a href="{{url('admin/option/delete')}}/{{$option->id}}"><button type="button" value="{{$category->id}}" class="dropdown-item btn btn-outline-dark disapprove-driver" style="height: 2.5rem">Delete</button></a>
{{--                                                            <button type="button" value="{{$category->id}}" class="dropdown-item btn btn-outline-dark block-driver" style="height: 2.5rem">Make Private</button>--}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @else
                                        <h2>No Record Found</h2>
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            let loadFile = function(event) {
                let output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        @stop
        @section('js')

            <script>
                function getURL(){
                    return[

                        '{{url('admin/option/update')}}/',
                        '{{url('admin/option/details')}}/',
                        '{{Auth()->id()}}',
                        '{{asset('images/no-image-icon.png')}}',
                        '{{asset('files/options-images')}}/'
                    ];
                }

            </script>
            <script type="text/javascript" src="{{asset('js/admin/extra-options.js')}}"></script>
          @endsection
