@extends('layouts.master-admin')
@section('title')
    Edit Vehicle
@endsection
@section('main-content')

    <div class="col-md-8 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2 >Edit Vehical</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-sample" action="{{url('admin/updateVehicle')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{$vehicle->name}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vehical Type</label>
                                <div class="col-sm-9">
                                    <select name="type_id" id="type_id" class="form-control">
                                        @foreach($type AS $t)
                                            <option value="{{$t->id}}" {{$vehicle->type_id == $t->id ? 'selected' : ''}}>{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Make</label>
                                <div class="col-sm-9">
                                    <select name="make_id" id="make_id" class="form-control">
                                        @foreach($make AS $m)
                                            <option value="{{$m->id}}" {{$vehicle->make_id == $m->id ? 'selected' : ''}}>{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-9">
                                    <select name="model_id" id="model_id" class="form-control">
                                        @foreach($model AS $m)
                                            <option value="{{$m->id}}" {{$vehicle->model_id == $m->id ? 'selected' : ''}}>{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Model Year</label>
                                <div class="col-sm-9">
                                    <input type="text" name="model_year" id="model_year" class="form-control" value="{{$vehicle->model_year}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max Passengers</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="max_passenger" value="{{$vehicle->max_passenger}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max Bags</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="max_bags" value="{{$vehicle->max_bags}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Standard</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($category AS $c)
                                            <option value="{{$c->id}}" {{$vehicle->category_id == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Engine</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="engine" value="{{$vehicle->engine}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Power</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="power" value="{{$vehicle->power}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Interior Color</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="interior_color" value="{{$vehicle->interior_color}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Enterior Color</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="exterior_color" value="{{$vehicle->exterior_color}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Length</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="length" value="{{$vehicle->length}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Transmission</label>
                                <div class="col-sm-9">
                                    <select name="transmission" id="transmission" class="form-control">
                                        <option value="MANUAL" {{$vehicle->transmission == 'MANUAL' ? 'selected' : ''}}>MANUAL</option>
                                        <option value="AUTOMATIC" {{$vehicle->transmission == 'AUTOMATIC' ? 'selected' : ''}}>AUTOMATIC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fuel Type</label>
                                <div class="col-sm-9">
                                    <select name="fuel_type" id="fuel_type" class="form-control">
                                        <option value="PETROL" {{$vehicle->fuel_type == 'PETROL' ? 'selected' : ''}}>PETROL</option>
                                        <option value="DIESEL" {{$vehicle->fuel_type == 'DIESEL' ? 'selected' : ''}}>DIESEL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Baby Seats:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="baby_seats" value="{{$vehicle->baby_seats}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price Per Hour:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="price_per_hour" value="{{$vehicle->price_per_hour}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3">Extra Features</label>
                                <textarea class=" form-control" id="extra_features" name="extra_features" rows="4">{{$vehicle->extra_features}}</textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$vehicle->id}}" />
                    <button type="submit" class="btn btn-primary mr-2 algissn-center">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection