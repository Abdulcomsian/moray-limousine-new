@extends('layouts.driver')
@section('title')
    Documents Upload
@endsection
@section('content')
    <style>body{background: white;}</style>
{{--       Documents Area--}}
<div class="main-panel">
        <div class="content-wrapper p-4">
            <div class="page-header">
                <h4 class="text-uppercase w-100 text-center">
                    <i class="fa fa-upload pr-2 text-primary"></i>    Upload Documents Images  </h4>
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
                <form method="post"  action="{{route('store.documents')}}" enctype="multipart/form-data">
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
                    <div class="form-group input-group-sm  bg-light p-2 ml-3">
                        <label style="font-size: 0.9rem; font-weight: bold" class="img-doc-title text-uppercase"> </label>
                        <div class="edit-profile-photo  user-image-preview">
                            <div class="img-preview">
                                <img src="{{asset('images/Upload-PNG-Images.png')}}" id="output" alt="profile-photo" style="height: 11rem; width: 100%;" class="img-fluid mb-2">
                            </div>
                            <div class="change-photo-btn change_photo">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload text-info"></i></span>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" class="upload upload-file" name="document_img" id="profile-img" data-uid="undefined-field-9" required    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </form>
            </div>
                <div class="header-03 text-center text-uppercase mb-4 mt-4 card-footer">
                    <h4>  <i class="fa fa-picture-o text-info pr-2"></i>  Uploaded Documents </h4>
                </div>
            <div class="card-body">
                <div class="row">
                    @if(count($userDocuments)> 0)
                        @foreach($userDocuments as $document)
                            <div class="col-md-4">
                                <div class="form-group bg-light">
                                        <div class="img-responsive">
                                            <div class="heading bg-dark p-2 text-white text-uppercase mb-1 text-center ">
                                                {{$document->document_title}}
                                            </div>
                                            <img data-enlargable  style="cursor: zoom-in; height: 10rem; border-radius: 6px; border: 1px solid gray;"  src="{{asset('uploaded-user-images/partner-documents/'.$document->document_img)}}" alt="profile-photo"  class="img-fluid w-100">
                                        </div>
                                    <div class="images">
                                        <div class="w-100 pt-3 pb-2">
                                            <span>APPROVEL STATUS : </span>

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
                                        @if($document->document_status !== 'approved')
                                            <div class="card-footer p-0 p-0 mt-2">
                                                <button value="{{asset('uploaded-user-images/partner-documents')}}/{{$document->document_img}}"
                                                        id="{{$document->document_title}}" class="btn-primary btn-edit-img mt-2">
                                                    <i class="fa fa-edit pr-2"></i> Edit</button>
                                                <a href="{{url('partner/delete-document')}}/{{$document->id}}" class="delete-img" id="{{$document->id}}">
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
@section('side-bar')
    <li class="nav-item">
    @include('parshall-views._partner-side-bar')
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
            <script>
                $('img[data-enlargable]').addClass('img-enlargable').click(function(){
                    var src = $(this).attr('src');
                    $('<div>').css({
                        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
                        backgroundSize: 'contain',
                        width:'70%', height:'70%',
                        position:'fixed',
                        zIndex:'10000',
                        top:'0', left:'0',
                        cursor: 'zoom-out',
                    }).click(function(){
                        $(this).remove();
                    }).appendTo('body');
                });
            </script>
    @endsection
