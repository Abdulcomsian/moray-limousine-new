@extends('layouts.master-admin')
@section('title', 'Vehicle Pricing')

{{-- style --}}
@section('css')
    <style>
        .table thead th{
            font-weight: bold;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List of All Vehicle Type / Classes</h4>
                                <p class="card-description"> -----         </p>
                            </div>
                            <div class="card-body">
                                <img src="{{asset('images/loading.gif')}}" alt="loading gif"  id="loading_gif" class="img-fluid" style="display: none ; position: absolute; z-index: 10;">
                                <div class="alert alert-success alert-dismissible w-75 mb-1" style="display: none;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> A New Driver is Registered Successfully.
                                </div>
                                <div class='table table-striped'>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>
                                            <th class="text-center">Detail</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{! $counter = 1}}
                                        @foreach($vehicleCategories as $vehicleCategory)
                                            <tr>
                                                <td>{{$counter++}}</td>
                                                <td>{{$vehicleCategory->name}}</td>
                                                <td class="py-1">
                                                    <img src="{{asset('files/vehicleCategory/category_img')}}/{{$vehicleCategory->picture}}" alt="image" />
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.vehiclePricing.detail', $vehicleCategory->id)}}" class="btn btn-dark"> <i class="fa fa-eye"></i> &nbsp; View Detail </a>
                                                </td>
                                                <td class="text-center">
                                                    @if($vehicleCategory->pricing()->exists())
                                                        <a href="{{route('admin.vehiclePricing.edit', $vehicleCategory->id)}}" class="btn btn-dark"><i class="fa fa-edit"></i> &nbsp; Edit Pricing</a>
                                                    @else
                                                        <a href="{{route('admin.vehiclePricing.add', $vehicleCategory->id)}}" class="btn btn-dark"><i class="fa fa-plus"></i> &nbsp; Add Pricing</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
