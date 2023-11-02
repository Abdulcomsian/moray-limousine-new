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
                                    <h2 class="text-center">FAQ LIST</h2>
                                </div>
                                <div class="col-md-4">
                                        <a href="{{url('/admin/faq-cms')}}">
                                            <button class="btn btn-dark float-right" > Create New FAQ </button>
                                        </a>
                                </div>
                            </div>

                        </div>
                        <div class="img-responsive">
                            <img src="{{asset('images/load.gif')}}" class="img-rounded"  id="loading_gif" alt="loading gif" style=" display: none; position: absolute; width: 95%; height: fit-content; z-index: 10;">
                        </div>
                        <div class="card-body vehicle-content table-responsive">
                            <table id="myTable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>FAQ Question</th>
                                    <th> FAQ Answer</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($faqs->count() > 0)
                                    @foreach($faqs AS $faq)
                                        <tr>
                                            <td>{{$faq->faq_question}}</td>
                                            <td style="max-width: 11rem; overflow: hidden;">{!! $faq->faq_answer !!}</td>
                                            <td style="font-size: 1.5rem;">
                                                    <a href="{{url('admin/faq-edit/'.$faq->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <a href="{{url('/admin/faq-delete/'.$faq->id)}}" class="btn-delete">
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 | Hathaway Limousines</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hathaway-Limousines<i class="fa fa-car text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{asset('DataTable/datatables.min.js')}}"></script>
@endsection
