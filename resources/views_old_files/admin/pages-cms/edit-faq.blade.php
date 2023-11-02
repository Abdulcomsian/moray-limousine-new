@extends('layouts.master-admin')
@section('title')
    Edit Faq
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
                        <h2>CMS FOR FAQ</h2>
                    </div>
                    <form action="{{route('update.faq')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="edit_id" value="{{$faq->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="tax">
                                            FAQ Question
                                        </label>
                                        <input class="form-control" id="tax" type="text" placeholder=" FAQ Question .." name="faq_question" value="{{$faq['faq_question']}}" required maxlength="160">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="long_des">
                                            FAQ Answer
                                        </label>
                                        <textarea id="description" rows="8" name="faq_answer" placeholder="FAQ Answer ...." required >{{$faq['faq_answer']}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input class="form-control btn btn-dark" id="tax" type="submit" value="Update Faq">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
