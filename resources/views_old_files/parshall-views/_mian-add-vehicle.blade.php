
<div class="row">
    <div class="col-md-12  ml-3 grid-margin">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{$route}}" method="post" enctype="multipart/form-data" validate = true>
            <input type="hidden" value="3 Yard" name="length">
            @if(isset($vehicle))
                <input type="hidden" value="{{$vehicle->id}}" name="ID">
            @else
                <input type="hidden" value="{{Auth()->id()}}" name="creator_id" required>
                <input type="hidden" value="{{null}}" name="ID" >
            @endif
            @csrf
            <div class="card">
                <div class="card-header text-center mt-2">
                    <h2>
                        @if(isset($vehicle))
                            Edit  Vehicle
                        @else Add New Vehicle
                        @endif
                    </h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sel1">Select Vehicle Type</label>
                                <select class="form-control" id="sel1" name="vehicleCategory_id" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->vehicleCategory->id}}">
                                            {{$vehicle->vehicleCategory->name}}
                                        </option>
                                    @else  <option value="">Select Vehicle Type</option>
                                    @endif
                                    @if(count($category) > 0){
                                    @foreach($category as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 0.9rem;">
                                <label for="plate">Plate No</label>
                                <input type="text" class="form-control" id="plate" name="plate" placeholder="Plate NO"  value="{{isset($vehicle) ? $vehicle->plate : old('plate')}}" required/>
                            </div>
                            {{--                        Add vehicle Model --}}
                            <div class="form-group-lg mb-4">
                                <label for="location">Select Service Locations: </label>
                                <select id="location" data-name="Locations" class="form-control validate p-2" name="locations[]" multiple>
                                    <option></option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->default_location}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Transmission</label>
                                <select class="form-control" id="sel1" name="transmission" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->transmission}}">
                                            {{$vehicle->transmission}}
                                        </option>
                                    @else <option value="">Select Transmission</option>
                                    @endif
                                    <option value="manual">Manual</option>
                                    <option value="auto">Auto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Vehicle Exterior Color</label>
                                <select class="form-control" id="sel1" name="exterior_color" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->exterior_color}}">
                                            {{$vehicle->exterior_color}}
                                        </option>
                                    @endif
                                    <option value="">Select Exterior Color</option>
                                    <option value="Black">Black</option>
                                </select>
                            </div>
                            {{--                        Drop Down--}}
                        </div>
                        {{--                    right side of form--}}
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="vehicle-title">Vehicle Title</label>
                                <select class="form-control" id="vehicle-title" name="title" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->title}}">
                                            {{$vehicle->title}}
                                        </option>
                                    @else <option value="">Select Title</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Add Vehicle Model</label>
                                <select class="form-control" id="sel1" name="model_no" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->model_no}}">
                                            {{$vehicle->model_no}}
                                        </option>
                                    @else  <option value="">Select Model</option>
                                    @endif
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Engine Capacity</label>
                                <input type="text" class="form-control" id="name"  name="engine_capacity" value="{{isset($vehicle) ? $vehicle->engine_capacity : old('engine_capacity')}}" placeholder="Engine Capacity" />
                            </div>
                            <div class="form-group">
                                <label for="sel1">Standard</label>
                                <select class="form-control" id="sel1"  name="standard" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->standard}}">
                                            {{$vehicle->standard}}
                                        </option>
                                    @endif
                                    <option value="">Select Standard</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Vehicle Interior Color</label>
                                <select class="form-control" id="sel1" name="interior_color" required>
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->interior_color}}">
                                            {{$vehicle->interior_color}}
                                        </option>
                                    @endif
                                    <option value="">Select Interior Color</option>
                                    <option value="Black">Black</option>
                                </select>
                            </div>

                            {{--                        //drop down--}}

                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm mb-5">
                                <div class="edit-profile-photo  user-image-preview mt-4 ml-5 mr-5">
                                    <div class="img-preview">
                                        <img src="{{isset($vehicle) ? asset('admin-vehicle-img').'/'.$vehicle->image_name  : asset('images/no-image-icon.png')}}" id="output" alt="profile-photo" class="img-fluid">
                                    </div>
                                    <div class="change-photo-btn mb-0">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i></span>
                                            <input type="file" accept="image/*" onchange="loadFile(event)" class=" upload {{ $errors->has('image_name') ? ' is-invalid' : '' }}" name="image_name" value="{{isset($vehicle) ? $vehicle->image_name : old('image_name')}}" {{isset($vehicle) ? '' : 'required' }}  id="profile-img" >
                                            @if ($errors->has('image_name'))
                                                <strong>{{ $errors->first('image_name') }}</strong>
                                                <span class="invalid-feedback" role="alert">
                                                  </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Fuel Type</label>
                                <select class="form-control" id="sel1" name="fuel_type">
                                    @if(isset($vehicle))
                                        <option value="{{$vehicle->fuel_type}}">
                                            {{$vehicle->fuel_type}}
                                        </option>
                                    @endif
                                    <option>Select Fuel Type</option>
                                    <option value="petrol">Petrol</option>
                                    <option value="diesel">Diesel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="description">Additional Information </label>
                                <textarea  class="form-control" id="description" name="short_description" rows="6" maxlength="300" placeholder="Additional Information"> {{isset($vehicle) ? $vehicle->short_description : old('short_description')}} </textarea>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-dark">
                                Save Vehicle
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
{{--    Add Documents Area --}}
    <div class="col-md-12">
    @if(isset($vehicle))
        <div class="row ml-3">
            <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card border-top border-dark p-0">
            <form method="post"  action="{{$docs_route}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_id" value="{{null}}">
                <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-5">
                            <label for="select-doc">Select Document</label>
                            <select id="select-doc" class="browser-default custom-select" name="document_title" required>
                                <option value="">Select Document</option>
                                @if(count($vehicle_documents)> 0)
                                    @foreach($vehicle_documents as $document)
                                        <option value="{{$document->document_title}}">{{$document->document_title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="button">
                                <button class="btn-save-img">Save Document</button>
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-danger btn-cancel" type="button" style="display: none;">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group input-group-sm  bg-light p-4 mb-0 ">
                            <label style="font-size: 1rem; font-weight: bold" class="img-doc-title"> </label>
                            <div class="edit-profile-photo  user-image-preview">
                                <div class="img-preview">
                                    <img src="{{asset('images/Upload-PNG-Images.png')}}" id="output2" alt="profile-photo" style="height: 11rem; width: 100%;" class="img-fluid mb-2">
                                </div>
                                <div class="change-photo-btn change_photo">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i></span>
                                        <input type="file" accept="image/*" onchange="loadFile2(event)" class="upload upload-file" name="document_img" id="profile-img" data-uid="undefined-field-9" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row">
                @if(count($uploaded_docs)> 0)
                    @foreach($uploaded_docs as $document)
                        <div class="col-md-4">
                            <div class="form-group bg-light p-3">
                                <div class="img-responsive">
                                    <div class="heading bg-dark p-2 text-white text-uppercase mb-1 text-center ">
                                        {{$document->document_title}}
                                    </div>
                                    <img data-enlargable  style="cursor: zoom-in; height: 10rem; border-radius: 6px; border: 1px solid gray;" src="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" alt="profile-photo"  class="img-fluid w-100">
                                </div>
                                <div class="images">
                                    <div class="w-100 pt-3 pb-2">
                                        <span>APPROVAL STATUS : </span>

                                        @if($document->document_status === 'approved')
                                            <span class="p-2 text-uppercase bg-success text-white rounded">
                                                            {{$document->document_status}}
                                                        </span>
                                        @elseif($document->document_status === 'disapproved')
                                            <span class="p-2 text-uppercase bg-danger text-white rounded">
                                                            {{$document->document_status}}
                                                           </span>
                                        @elseif($document->document_status === 'pending')
                                            <strong class="p-2 text-uppercase bg-warning text-white rounded">
                                                {{$document->document_status}}
                                            </strong>
                                        @endif
                                    </div>
                                    @if($document->document_status === 'disapproved')
                                        <div class="w-100 pt-3">
                                            <strong>Remarks : </strong> <strong class="text-info p-2">View Remarks</strong>
                                        </div>
                                    @endif
                                    @if($document->document_status !== 'approved')
                                        <div class="card-footer p-0 p-0 mt-2">
                                        <button value="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" id="{{$document->document_title}}" class="btn btn-primary btn-edit-img p-2 pr-4 pl-4 mt-2">
                                            <i class="fa fa-edit pr-2"></i>    Edit</button>
                                        <a href="{{url('vehicle/delete-docs')}}/{{$document->id}}" class="delete-img" id="{{$document->id}}">
                                            <button class="btn btn-dark float-right p-2 pr-4 mt-2 pl-4" id="{{$document->id}}">
                                                <i class="fa fa-trash pr-2"></i> Delete</button></a>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
        </div>
        @endif
    </div>
</div>
