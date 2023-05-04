@extends('layouts.master-admin')
@section('title')
  Services List
@endsection
<style>
    .dataTables_filter{
        float: right;
    }
</style>
@section('main-content')

    <div class="main-panel">
        @if(session('success'))
            <div class="alert alert-success ml-4 alert-dismissible mt-2 w-75 mb-0">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success ... ! </strong> {{session('success')}}
            </div>
        @endif
        <div class="content-wrapper pt-0">

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card pt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="text-center">SERVICES LIST</h2>
                                </div>
                                <div class="col-md-4">
                                        <a href="{{url('admin/services-cms')}}">
                                            <button class="btn btn-dark float-right" > Create New Service </button>
                                        </a>
                                </div>
                            </div>

                        </div>
                        <div class="img-responsive">
                            <img src="{{asset('images/load.gif')}}" class="img-rounded"  id="loading_gif" alt="loading gif" style=" display: none; position: absolute; width: 95%; height: fit-content; z-index: 10;">
                        </div>
                        <div class="card-body vehicle-content">
                            <table id="myTable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th> Image </th>
                                    <th> Service Title</th>
                                    <th> Title 2</th>
                                    <th> Short Description</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($services->count() > 0)
                                    @foreach($services AS $service)
                                        <tr>
                                            <td class="py-1">
                                                <img  src="{{asset('files/services-images')}}/{{$service->service_image}}" alt="image" />
                                            </td>
                                            <td>{{$service->service_title}}</td>
                                            <td>{{$service->service_title2}}</td>
                                            <td>{{$service->short_description}}</td>
                                            <td style="font-size: 1.5rem;">
                                                    <a href="{{url('admin/service-edit/'.$service->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <a href="{{url('admin/service-delete/'.$service->id)}}" class="btn-delete">
                                                    <i class="fa fa-trash" style="color: #0f0001"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 | Moray Limousines </span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Moray Limousines <i class="fa fa-car text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('DataTable/datatables.min.js')}}"></script>
@endsection
