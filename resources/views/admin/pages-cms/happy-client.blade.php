@extends('layouts.master-admin')

@section('title', 'Happy Clients')

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
                            <h4 class="card-title">List Of All Clients Logos</h4>
                        </div>
                        <div class="card-body">
                            <div class="forms">
                                {{-- this form used for the text addition in database  --}}
                                <form action="{{route('store.happyclient.text')}}">
                                    <div class="row mb-4">
                                        <div class="col-md-8">
                                            <textarea class="form-control editor" id="partnerText" placeholder="Enter Partner text"
                                           name="happy-text-client">{!!$partnerText['item_content']!!}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <form id="addSubtype" action="{{route('save.client')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                   <input type="hidden" name="edit_id" value="{{null}}">
                                    <div class="row">
                                        <div class="col-md-3 offset-1 offset-md-1 mb-4">
                                            <div class="edit-profile-photo  user-image-preview">
                                                <div class="img-preview">
                                                    <img src="{{asset('images/no-image-icon.png')}}" id="output" alt="profile-photo" style="height: 9.6rem; width: 100%;" class="img-fluid">
                                                </div>
                                                <div class="change-photo-btn">
                                                    <div class="photoUpload">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input type="file" accept="image/*" onchange="loadFile(event)" class=" upload {{ $errors->has('service_image') ? ' is-invalid' : '' }}" name="client_image" id="profile-img" required>
                                                        @if ($errors->has('client_image'))
                                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('service_image') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-md-2 col-md-3">
                                            <input type="submit" class="bt btn-block btn-dark mt-4" value="Add New Client Image" >
                                            <button type="button" id="{{asset('images/no-image-icon.png')}}" class="btn btn-danger btn_cancel mt-3" style="display: none;">Cancel Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <span class="d-none">
                                {{! $counter = 1}}
                            </span>
                            <table class="table table-bordered table-striped table-responsive-sm pt-5">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Happy Clint Logo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($client_images as $image)
                                    <tr>
                                        <td>{{$counter++}}</td>
                                        <td><img src="{{asset('files/clients-images/'.$image->client_image)}}" alt="no image" style="width: 8rem;height: 9rem" class="img-thumbnail"></td>
                                        <td>
                                            <a href="#" id="{{$image->id}}" class="bg-dark edit-subtype action-button" title="Edit Image">
                                                <i class="fa fa-edit text-white"></i>
                                            </a> /
                                            <a href="{{url('admin/delete-client/'.$image->id)}}" class="bg-danger delete-subtype action-button" title="Delete Image">
                                                <i class="fa fa-trash text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2">
{{--                                {{$client_images->links()}}--}}
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
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('click', '.delete-subtype', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            let title = $(this).attr('data-title');
            let isDelete = confirm(`Do you really Want To Delete Logo ?`);
            if (isDelete){
                window.location.href = url;
            }
        });
        $(document).on('click', '.edit-subtype', function (e) {
            e.preventDefault();
             let img_src =  $(this).parent('td').prev('td').find('img').attr('src');
             let id = $(this).attr('id');
             $('#output').attr('src',img_src);
             $('input[name="edit_id"]').val(id);
             $('.btn_cancel').show();
            $('input[name="client_image"]').prop('required',false);
        });

        $(document).on('click', '.btn_cancel', function (e) {
            $('input[name="edit_id"]').val(null);
          let input =   $('input[name="client_image"]');
            input.val(null);
            $('#output').attr('src',$(this).attr('id'));
            $(this).hide();
            input.prop('required',true);

        });

        let descriptionEditor;
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#partnerText'))
                .then(editor => {
                    descriptionEditor = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
