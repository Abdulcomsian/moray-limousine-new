
@extends('layouts.master-admin')
@section('title')
    Vehicle Documents
@endsection
@section('main-content')
    {{--       Documents Area--}}
    <div class="main-panel">
        <div class="content-wrapper p-4">
            <div class="page-header">
                <h2 class="page-title text-capitalize">  <i class="fa fa-user-circle "></i>    Upload Documents Images  </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
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
                        <div class="card-header">
                            <form method="post"  action="{{route('vehicle.store.docs')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="edit_id" value="{{null}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="select-doc">Select Document</label>
                                            <select id="select-doc" class="browser-default custom-select" name="document_title" required>
                                                <option value="">Select Document</option>
                                                @if(count($documents)> 0)
                                                    @foreach($documents as $document)
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
                                        <div class="form-group input-group-sm  bg-light p-4 ">
                                            <label style="font-size: 1rem; font-weight: bold" class="img-doc-title"> </label>
                                            <div class="edit-profile-photo  user-image-preview">
                                                <div class="img-preview">
                                                    <img src="{{asset('images/Upload-PNG-Images.png')}}" id="output" alt="profile-photo" style="height: 11rem; width: 100%;" class="img-fluid mb-2">
                                                </div>
                                                <div class="change-photo-btn change_photo">
                                                    <div class="photoUpload">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input type="file" accept="image/*" onchange="loadFile(event)" class="upload upload-file" name="document_img" id="profile-img" data-uid="undefined-field-9" required    >
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
                                @if(count($userDocuments)> 0)
                                    @foreach($userDocuments as $document)
                                        <div class="col-md-4">
                                            <div class="form-group bg-light p-3">
                                                <label style="font-size: 1rem; font-weight: bold"> {{$document->document_title}} </label>
                                                <div class="img-responsive">
                                                    <img src="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" alt="profile-photo"  class="img-fluid w-100">
                                                </div>
                                                <div class="form-group">
                                                    <div class="w-100 pt-3 pb-2">
                                                        <strong>Approval Status : </strong> <strong class="text-success p-2 text-capitalize">{{$document->document_status}}</strong>
                                                    </div>
                                                    @if($document->document_status === 'disapproved')
                                                        <div class="w-100 pt-3">
                                                            <strong>Remarks : </strong> <strong class="text-info p-2">View Remarks</strong>
                                                        </div>
                                                    @endif
                                                    @if($document->document_status !== 'approved')
                                                        <button value="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}" id="{{$document->document_title}}" class="btn btn-primary btn-edit-img p-2 pr-4 pl-4 mt-2">
                                                            <i class="fa fa-edit pr-2"></i>    Edit</button>
                                                        <a href="{{url('driver/delete-docs')}}/{{$document->id}}" class="delete-img" id="{{$document->id}}">
                                                            <button class="btn btn-dark float-right p-2 pr-4 mt-2 pl-4" id="{{$document->id}}">
                                                                <i class="fa fa-trash pr-2"></i> Delete</button></a>
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
            </div>


        </div>

        <script>
            let loadFile = function(event) {
                let output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    </div>

@endsection




        @section('js')
            <script>
                $('#select-doc').change(function () {
                    let doc_title = $(this).val();
                    $('.img-doc-title').html(doc_title);
                });

                //On click Edit Document Button
                $('.btn-edit-img').click(function () {
                    let img = $(this).val();
                    let img_view = $('#output');
                    $('#select-doc').val($(this).attr('id')).change();
                    img_view.attr('src',img);
                    $('.btn-save-img').html('Update Image');
                    $('.btn-cancel').show();
                    $('.upload-file').removeAttr('required');
                    let edit_id = $(this).next('.delete-img').attr('id');
                    $('input[name="edit_id"]').val(edit_id);
                });
                //On click Cancel Edit Button
                $('.btn-cancel').click(function () {
                    let img_views = $('#output');
                    let no_img_png = '{{asset('images/Upload-PNG-Images.png')}}';
                    $('.btn-save-img').html('Save Image');
                    $('#select-doc').val(null);
                    img_views.attr('src',no_img_png);
                    $('.upload-file').attr('required','required');
                    $('input[name="edit_id"]').val(null);
                    $(this).hide();

                })

            </script>
@endsection
