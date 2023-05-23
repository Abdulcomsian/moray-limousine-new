@extends('layouts.master-admin')
@section('title')
    Add Vehicle
@endsection

@section('main-content')
    {{--    Modal for add driver--}}
    <style>
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

        .ck-file-dialog-button {
            display: none;
        }

        .chosen-container.chosen-container-multi {
            width: 100% !important;
        }

        .chosen-container.chosen-container-multi .chosen-choices {
            padding: 5px;
            background-image: none;
            border: 1px solid #d7d2bd;
            border-radius: 3px;
        }

        .ck.ck-content ul, .ck.ck-content ol {
            list-style: initial;
        }

        .ck.ck-content ol {
            list-style-type: decimal;
        }
        .invalid-feedback{
            display: none;
        }
    </style>
    <div class="container position-absolute">
        <!-- Modal Add Vehicle Category -->
        <div class="modal fade" id="add-driver-modal" role="dialog">
            <div class="modal-dialog modal-lg w-75 mr-5 mt-3">
                <div class="modal-content">
                    <div class="modal-body pt-4 bg-white">
                        <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
                        <div class="login-booking">
                            <ul class="login">
                                <li class="active"> Add New Vehicle Class</li>
                            </ul>
                            <div class="login-content">
                                <div id="tab-2" class="content-tab">
                                    <input type="hidden" id="isEdit" value="0">
                                    <div class="register-form">
                                        <form action="{{route('save.category')}}" method="post" name="cateForm"
                                              id="cateForm" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{Auth()->id()}}" name="created_by" required>
                                            <input type="hidden" value="{{null}}" name="id" required>
                                            <div class="row justify-content-center">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="dob">Vehicle Class Name :</label>
                                                        <input type="text" data-name="Name" class="form-control validate" id="dob" name="name"
                                                               placeholder="Add Vehicle Type / Class " required
                                                               maxlength="20">
                                                        @include('admin._partials._error-feedback',
                                                         ['message' => $errors->has('name') ? $errors->first('name') : 'Name is required',
                                                          'role' => $errors->has('name') ? 'alert' : ''])
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                <label for="dob">Max No Of Seats :</label>
                                                                <input type="number" data-name="Max seats" class="form-control validate" id="dob"
                                                                       name="max_seats"
                                                                       value="{{isset($user) ? $user->date_of_birth : old('date_of_birth')}}"
                                                                       placeholder="Max seats" required>
                                                                @include('admin._partials._error-feedback',
                                                                 ['message' => $errors->has('max_seats') ? $errors->first('max_seats') : 'Max seats is required',
                                                                  'role' => $errors->has('max_seats') ? 'alert' : ''])
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6  mt-3">
                                                            <div class="form-group">
                                                                <label for="dob">Max No Of Bags :</label>
                                                                <input type="number" data-name="Max bags" class="form-control validate" id="dob"
                                                                       name="max_bags"
                                                                       value="{{isset($user) ? $user->date_of_birth : old('date_of_birth')}}"
                                                                       placeholder="Max bags" required>
                                                                @include('admin._partials._error-feedback',
                                                                 ['message' => $errors->has('max_bags') ? $errors->first('max_bags') : 'Max bags is required',
                                                                  'role' => $errors->has('max_bags') ? 'alert' : ''])
                                                            </div>
                                                        </div>

{{--                                                        <div class="col-md-6 mt-3">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="price_per_km">Price / KM: </label>--}}
{{--                                                                <input id="price_per_km" data-name="Price / KM" type="number" min="0"--}}
{{--                                                                       step="0.01" placeholder="Price per KM"--}}
{{--                                                                       name="price_per_km" class="form-control validate">--}}
{{--                                                                @include('admin._partials._error-feedback',--}}
{{--                                                                 ['message' => $errors->has('price_per_km') ? $errors->first('price_per_km') : 'Price / KM is required',--}}
{{--                                                                  'role' => $errors->has('price_per_km') ? 'alert' : ''])--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-md-6 mt-3">--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="price_per_hr">Price / Hour: </label>--}}
{{--                                                                <input id="price_per_hr" data-name="Perice / Hour" type="number" min="0"--}}
{{--                                                                       step="0.01" placeholder="Price per Hour"--}}
{{--                                                                       name="price_per_hr" class="form-control validate">--}}
{{--                                                                @include('admin._partials._error-feedback',--}}
{{--                                                                 ['message' => $errors->has('price_per_hr') ? $errors->first('price_per_hr') : 'Price / Hour is required',--}}
{{--                                                                  'role' => $errors->has('price_per_hr') ? 'alert' : ''])--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label for="subtypes">Vehicle Model : </label>
                                                                <select id="subtypes" data-name="Subtypes" class="form-control validate"
                                                                        name="subtypes[]" multiple>
                                                                    <option></option>
                                                                    @foreach($subtypes as $subtype)
                                                                        <option value="{{$subtype->id}}">{{$subtype->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @include('admin._partials._error-feedback',
                                                                  ['message' => $errors->has('subtypes') ? $errors->first('subtypes') : 'Select at least one subtype',
                                                                   'role' => $errors->has('subtypes') ? 'alert' : ''])
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-3 pt-2 ">
                                                    <div class="form-group input-group-sm">
                                                        <div class="edit-profile-photo  user-image-preview">
                                                            <div class="img-preview">
                                                                <img src="{{asset('images/no-image-icon.png')}}"
                                                                     id="output" alt="profile-photo" class="img-fluid">

                                                            </div>
                                                            {{--                                    <input type="hidden" name="user_id" value="{{$get_user->id}}">--}}
                                                            <div class="change-photo-btn mb-0">
                                                                <div class="photoUpload">
                                                                    <span><i class="fa fa-upload"></i></span>
                                                                    <input type="file" accept="image/*" data-name="Image"
                                                                           onchange="loadFile(event)"
                                                                           class="validate upload {{ $errors->has('image_name') ? ' is-invalid' : '' }}"
                                                                           name="picture" id="profile-img" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @include('admin._partials._error-feedback',
                                                          ['message' => $errors->has('image_name') ? $errors->first('image_name') : 'Image is required',
                                                           'role' => $errors->has('image_name') ? 'alert' : ''])
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-11 pt-4">
                                                    <div class="form-group ">
                                                        <label for="description">Vehicle Class Description :</label>
                                                        <textarea class="form-control validate" rows="5" id="description"
                                                                  name="description" data-name="Description"
                                                                  placeholder="Vehicle Type Description" required
                                                                  maxlength="300"></textarea>
                                                        @include('admin._partials._error-feedback',
                                                          ['message' => $errors->has('description') ? $errors->first('description') : 'description is required',
                                                           'role' => $errors->has('description') ? 'alert' : ''])
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="form-group-lg mt-3 float-left">
                                                        <button type="submit" class="btn btn-outline-dark">
                                                            Save Vehicle Class
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
                        <div class="card-header text-center">
                            <div class="heading">
                                <h2 class="card-title text-uppercase mb-0">List of All Classes</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('images/loading.gif')}}" alt="loading gif" id="loading_gif"
                                 class="img-fluid" style="display: none ; position: absolute; z-index: 10;">
                            <!-- Trigger the modal with a button -->
                            <button type="button" id="addVehicle" class="btn btn-dark float-right btn-create-category btn-show-modal"
                                    data-toggle="modal" data-target="#add-driver-modal">Add New Vehicle Class
                            </button>
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{session('success')}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-error alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> {{session('error')}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class='driver-table'>
                                @include('parshall-views._vehicle-category-listing', ['categories'=> $categories])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            let loadFile = function (event) {
                let output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        @stop
        @section('js')
            <script>

                let descriptionEditor;
                $(document).ready(function () {
                    ClassicEditor
                        .create(document.querySelector('#description'))
                        .then(editor => {
                            descriptionEditor = editor;
                        })
                        .catch(error => {
                            console.error(error);
                        });

                    $('#myTable').dataTable({
                        responsive : true
                    });
                    $('body').on('click' ,'.edit-btn',function ()
                     {
                        $('#add-driver-modal').modal('toggle');
                        let updateURL = '{{url('admin/vehicleCategory/update')}}/';
                        let $id = $(this).attr('id');
                        changeVehicleStatus(updateURL, $id);
                    });
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('body').on('click' ,'.edit-btn',function () {
                    $('#add-driver-modal').modal('toggle');
                    let updateURL = '{{url('admin/vehicleCategory/update')}}/';
                    let $id = $(this).attr('id');
                    $('input[name=picture]').removeAttr('required');
                    changeVehicleStatus(updateURL, $id);
                });

                function changeVehicleStatus(updateUrl, id) {
                    let user_id = parseInt({{Auth()->id()}});
                    let img = "{{url('files/vehicleCategory/category_img')}}/";

                    $.ajax({
                        type: 'get',
                        url: updateUrl + id,
                        success: function (response) {
                            let category = response;
                            let subtypes = response.subtypes;
                            // console.log(response);
                            $('input[name="max_seats"]').val(category.category.max_seats);
                            $('input[name="max_bags"]').val(category.category.max_bags);
                            $('input[name="price_per_km"]').val(category.category.price_per_km);
                            $('input[name="price_per_hr"]').val(category.category.price_per_hr);
                            $('input[name="name"]').val(category.category.name);
                            $('input[name="created_by"]').val(category.category.created_by);
                            $('input[name="modified_by"]').val(user_id);
                            $('input[name="id"]').val(id);
                            descriptionEditor.setData(category.category.description);
                            // $('textarea[name=description]').val(category.category.description);
                            $('#output').attr('src', img + category.category.picture);
                            // $('#subtypes').val('').trigger("chosen:updated");
                            let ids = [];
                            for (let i = 0; i < subtypes.length; i++){
                                ids[i] = subtypes[i].id;
                            }
                            $('#subtypes').val(ids).trigger("chosen:updated");
                            $('#isEdit').val(1);
                        }
                    });
                }

                $('body').on('click' ,'.btn-create-category',function () {
                    $('input[name="max_seats"]').val(null);
                    $('input[name="max_bags"]').val(null);
                    $('input[name="name"]').val(null);
                    $('input[name="id"]').val(null);
                    descriptionEditor.setData('');
                    $('input[name="price_per_km"]').val('');
                    $('input[name="price_per_hr"]').val('');
                    $('#output').attr('src', '{{url('images/no-image-icon.png')}}');
                    $('#output').attr('required', 'required');
                    $('#isEdit').val(0);
                    $('#subtypes').val('').trigger("chosen:updated");
                });

                //    chosen
                $('#subtypes').chosen({
                    'placeholder_text_multiple': 'Select subtypes'
                });

                //    form
                $(document).on('submit', '#cateForm', function (e) {
                    if (!isValid()){
                        e.preventDefault()
                    }
                });
            //    validation
                function isValid() {
                    let isValid = true;
                    let fields = $('.validate');
                    $('.invalid-feedback').hide();
                    $(fields).each(function () {
                        if ($(this).val() === ''){
                            console.log($(this).attr('data-name'));
                            if ($(this).attr('data-name') === 'Image'){
                                if ($('#isEdit').val() !== "1"){
                                    $(this).parents('.form-group').find('.invalid-feedback').html($(this).attr('data-name') + ' is required').show();
                                    isValid = false;
                                }
                            }else {
                                $(this).siblings('.invalid-feedback').html($(this).attr('data-name') + ' is required').show();
                                isValid = false;
                            }
                        }
                    });
                    if ($('#subtypes').val().length === 0){
                        isValid = false;
                        $('#subtypes').siblings('.invalid-feedback').show();
                    }
                    return isValid;
                }
            </script>
@endsection
