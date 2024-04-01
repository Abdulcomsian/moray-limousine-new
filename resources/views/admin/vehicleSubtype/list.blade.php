@extends('layouts.master-admin')

@section('title', 'Vehicle Subtypes')

@section('css')
    <style>
        .invalid-feedback{
            display: none;
        }
        .table thead th{
            font-weight: bold;
        }
        .action-button{
            width: 30px;
            height: 30px;
            display: inline-block;
            border-radius: 5px;
            text-align: center;
        }
        .action-button i{
            margin-top: 7px;
            vertical-align: middle;
        }
        #editSubtype{
            display: none;
        }
        .btn-danger {
            color: #fff;
            background-color: #ff274b !important;
            border-color: #ff1a41 !important;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
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
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Of All Model</h4>
                        </div>
                        <div class="card-body">
                            <div class="forms">
                                <form id="addSubtype" action="{{route('admin.vehicleSubtype.add')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 offset-md-5 mr-0 ml-auto col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control" placeholder="Model Name..">
                                                @include('admin._partials._error-feedback', ['message' => 'Model Name is required!'])
                                                <input type="hidden" name="created_by" value="{{auth()->id()}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <input type="submit" class="bt btn-block btn-dark" value="Add Model">
                                        </div>
                                    </div>
                                </form>
                                <form id="editSubtype" action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 offset-md-3 mr-0 ml-auto col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control" placeholder="Title..">
                                                @include('admin._partials._error-feedback', ['message' => 'Model is required!'])
                                                <input type="hidden" name="created_by" value="{{auth()->id()}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <input type="submit" class="bt btn-block btn-dark" value="Update Model Name">
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <input type="button" class="bt btn-block cancel-edit btn-danger" value="Cancel">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <span class="d-none">
                                {{! $counter = 1}}
                            </span>
                            <table class="myTable table-bordered ">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Model</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicleSubtypes as $vehicleSubtype)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td>{{$vehicleSubtype->title}}</td>
                                        <td>{{$vehicleSubtype->createdBy()->first()->first_name . ' ' . $vehicleSubtype->createdBy()->first()->last_name}}</td>
                                        <td>
                                            <a href="{{route('admin.vehicleSubtype.edit', $vehicleSubtype->id)}}" class="bg-dark edit-subtype action-button" data-title="{{$vehicleSubtype->title}}">
                                                <i class="fa fa-edit text-white"></i>
                                            </a> /
                                            <a href="{{route('admin.vehicleSubtype.delete', $vehicleSubtype->id)}}" class="bg-danger delete-subtype action-button" data-title="{{$vehicleSubtype->title}}">
                                                <i class="fa fa-trash text-white"></i>
                                            </a>
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
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
          $('.myTable').dataTable({
             responsive : true
          });
        });

        $(document).on('click', '.delete-subtype', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let isDelete = confirm(`Do you really want to delete Model Title ?`);
            if (isDelete){
                window.location.href = url;
            }
        });

        /**
         * form submit validation check
         */
        $(document).on('submit', 'form', function (e) {
            let title = $(this).find('input[name="title"]');
            if ($(title).val() === ""){
                e.preventDefault();
                $(title).siblings('.invalid-feedback').show();
            }
        });

        $(document).on('click', '.edit-subtype', function (e) {
            e.preventDefault();
            let title = $(this).attr('data-title');
            let url = $(this).attr('href');

            $('form#addSubtype').hide();
            $('form#editSubtype').find('input[name="title"]').val(`${title}`);
            $('form#editSubtype').attr('action', url).show();

        });

        $(document).on('click', '.cancel-edit', function (e) {
            $('form#addSubtype').show();
            $('form#editSubtype').hide();
        });
    </script>
@endsection
