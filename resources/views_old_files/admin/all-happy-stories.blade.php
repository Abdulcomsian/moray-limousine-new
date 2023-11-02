@extends('layouts.admin-layout')
@section('title','All Members')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Happy Stories</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                    <li class="breadcrumb-item active"></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <!-- end row-->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group">   <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Print</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>PDF</span></button> </div></div><div class="col-sm-12 col-md-6"><div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable-buttons" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1029px;">
                                                <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 101px;" aria-sort="ascending" aria-label="image: activate to sort column descending">image</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 104px;" aria-label="User ID: activate to sort column ascending">User ID</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 95px;" aria-label="Name: activate to sort column ascending">Name</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 95px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 116px;" aria-label="Member: activate to sort column ascending">Member</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 266px;" aria-label="Option: activate to sort column ascending">Option</th></tr>
                                                </thead>


                                                <tbody>



























                                                <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1"><img src="img/img3.jpg" style="height:40px;" class=""></td>
                                                    <td>11205522</td>
                                                    <td>Ali Sufyan</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>2011/04/25</td>

                                                    <td>



                                                        <a href="pages-lock-screen.html" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Profile"><i class="fa fa-eye"></i></a>

                                                        <a href="#" id="demo-dt-delete-btn" data-target="#package_modal" data-toggle="tooltip" class="btn btn-info btn-sm add-tooltip" data-placement="top" title="" data-original-title="Packages">
                                                            <i class="fa fa-object-ungroup"></i>
                                                        </a>

                                                        <button data-target="#block_modal" data-toggle="tooltip" class="btn btn-dark btn-sm add-tooltip" data-placement="top" title="" data-original-title="Block">
                                                            <i class="fa fa-ban"></i></button>

                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="detalse"><i class="fa fa-eye"></i></a>





                                                    </td>






                                                </tr><tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1"><img src="img/img3.jpg" style="height:40px;" class=""></td>
                                                    <td>11205522</td>
                                                    <td>Ali Sufyan</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>2011/04/25</td>

                                                    <td>



                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Profile"><i class="fa fa-eye"></i></a>

                                                        <a href="#" id="demo-dt-delete-btn" data-target="#package_modal" data-toggle="tooltip" class="btn btn-info btn-sm add-tooltip" data-placement="top" title="" data-original-title="Packages">
                                                            <i class="fa fa-object-ungroup"></i>
                                                        </a>

                                                        <button data-target="#block_modal" data-toggle="tooltip" class="btn btn-dark btn-sm add-tooltip" data-placement="top" title="" data-original-title="Block">
                                                            <i class="fa fa-ban"></i></button>

                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="detalse"><i class="fa fa-eye"></i></a>





                                                    </td>






                                                </tr><tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1"><img src="img/img3.jpg" style="height:40px;" class=""></td>
                                                    <td>11205522</td>
                                                    <td>Ali Sufyan</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>2011/04/25</td>

                                                    <td>



                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Profile"><i class="fa fa-eye"></i></a>

                                                        <a href="#" id="demo-dt-delete-btn" data-target="#package_modal" data-toggle="tooltip" class="btn btn-info btn-sm add-tooltip" data-placement="top" title="" data-original-title="Packages">
                                                            <i class="fa fa-object-ungroup"></i>
                                                        </a>

                                                        <button data-target="#block_modal" data-toggle="tooltip" class="btn btn-dark btn-sm add-tooltip" data-placement="top" title="" data-original-title="Block">
                                                            <i class="fa fa-ban"></i></button>

                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="detalse"><i class="fa fa-eye"></i></a>





                                                    </td>






                                                </tr><tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1"><img src="img/img3.jpg" style="height:40px;" class=""></td>
                                                    <td>11205522</td>
                                                    <td>Ali Sufyan</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>2011/04/25</td>

                                                    <td>



                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Profile"><i class="fa fa-eye"></i></a>

                                                        <a href="#" id="demo-dt-delete-btn" data-target="#package_modal" data-toggle="tooltip" class="btn btn-info btn-sm add-tooltip" data-placement="top" title="" data-original-title="Packages">
                                                            <i class="fa fa-object-ungroup"></i>
                                                        </a>

                                                        <button data-target="#block_modal" data-toggle="tooltip" class="btn btn-dark btn-sm add-tooltip" data-placement="top" title="" data-original-title="Block">
                                                            <i class="fa fa-ban"></i></button>

                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="detalse"><i class="fa fa-eye"></i></a>





                                                    </td>






                                                </tr><tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1"><img src="img/img3.jpg" style="height:40px;" class=""></td>
                                                    <td>11205522</td>
                                                    <td>Ali Sufyan</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>2011/04/25</td>

                                                    <td>



                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Profile"><i class="fa fa-eye"></i></a>

                                                        <a href="#" id="demo-dt-delete-btn" data-target="#package_modal" data-toggle="tooltip" class="btn btn-info btn-sm add-tooltip" data-placement="top" title="" data-original-title="Packages">
                                                            <i class="fa fa-object-ungroup"></i>
                                                        </a>

                                                        <button data-target="#block_modal" data-toggle="tooltip" class="btn btn-dark btn-sm add-tooltip" data-placement="top" title="" data-original-title="Block">
                                                            <i class="fa fa-ban"></i></button>

                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="detalse"><i class="fa fa-eye"></i></a>





                                                    </td>






                                                </tr><tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1"><img src="img/img3.jpg" style="height:40px;" class=""></td>
                                                    <td>11205522</td>
                                                    <td>Ali Sufyan</td>
                                                    <td><span class="badge badge-success">Active</span></td>
                                                    <td>2011/04/25</td>

                                                    <td>



                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Profile"><i class="fa fa-eye"></i></a>

                                                        <a href="#" id="demo-dt-delete-btn" data-target="#package_modal" data-toggle="tooltip" class="btn btn-info btn-sm add-tooltip" data-placement="top" title="" data-original-title="Packages">
                                                            <i class="fa fa-object-ungroup"></i>
                                                        </a>

                                                        <button data-target="#block_modal" data-toggle="tooltip" class="btn btn-dark btn-sm add-tooltip" data-placement="top" title="" data-original-title="Block">
                                                            <i class="fa fa-ban"></i></button>

                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="" title="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a href="#" id="demo-dt-view-btn" class="btn btn-primary btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="detalse"><i class="fa fa-eye"></i></a>





                                                    </td>






                                                </tr></tbody>
                                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">Showing 1 to 6 of 6 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div></div></div></div>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->


                <!-- end row-->

            </div> <!-- container-fluid -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        function pagePath(){
            return [
                "{{asset('images/uploaded-images')}}/",
                '{{url('admin/edit-package')}}/',
                '{{asset('/images/upload.png')}}'
            ];
        }
    </script>
    <script src="{{asset('admin/assets/pages/validation-demo.js')}}"> </script>
    <script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"> </script>
    <script src="{{asset('admin/assets/pages/fileuploads-demo.js')}}"> </script>
    <script src="{{asset('js/packages.js')}}"> </script>
@endsection
