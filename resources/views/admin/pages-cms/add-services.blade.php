@extends('layouts.master-admin')
@section('title')
   Configuration
@endsection
@section('main-content')
    <div class="col-md-9">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible mt-2 mb-0">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{session('success')}}
            </div>
        @endif
        <div class="row justify-content-end">
            <div class="col-md-11">
                <div class="card mt-2">
                    <div class="card-header text-center">
                        <a href="{{URL::previous()}}" class="pull-right">
                            <button> <i class="fa fa-backward"></i> back To List</button></a>
                        <h2>CMS For Services</h2>
                    </div>
                    <form action="{{route('store.services')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="map_key">
                                                Service Title
                                            </label>
                                            <input class="form-control" id="map_key" type="text" placeholder="Service Title" name="service_title" value="{{old('service_title')}}" required maxlength="90">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tax">
                                                Service Title 2
                                            </label>
                                            <input class="form-control" id="tax" type="text" placeholder="Service Title 2 ..." name="service_title2" value="{{old('service_title2')}}" required maxlength="90">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-4 offset-1 offset-md-1">
                                <div class="edit-profile-photo  user-image-preview">
                                    <div class="img-preview">
                                            <img src="{{asset('images/no-image-icon.png')}}" id="output" alt="profile-photo" style="height: 9.6rem; width: 100%;" class="img-fluid">
                                    </div>
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i></span>
                                            <input type="file" accept="image/*" onchange="loadFile(event)" class=" upload {{ $errors->has('service_image') ? ' is-invalid' : '' }}" name="service_image" id="profile-img" required>
                                            @if ($errors->has('service_image'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('service_image') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="tax">
                                        Service Short Description
                                    </label>
                                    <input class="form-control" id="tax" type="text" placeholder="Service Short Description" name="short_description" value="{{old('short_description')}}" required maxlength="120">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="tax">
                                        Short Description 2
                                    </label>
                                    <input class="form-control" id="tax" type="text" placeholder="Service Short Description .." name="short_description2" value="{{old('short_description2')}}">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="long_des">
                                        Service Long Description
                                    </label>
                                    <textarea id="description" rows="8" name="long_description" placeholder="Service Long Description ...." >{{old('long_description')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input class="form-control btn btn-dark" id="tax" type="submit" value="Save">
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
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
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection

