@extends('layouts.master-admin')
@section('title')
Production List
@endsection
@section('main-content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>{{session('error')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-sm-flex align-items-baseline report-summary-header">
                                    <h3>Production , Standard </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row card-header p-0 bg-white" style="border-top: 1px solid">
            <div class="col-md-12 pt-4 grid-margin stretch-card">
                <div class="card" id="bookings-list-table">
                    <div class="container">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{url('admin/production-save')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Year:</label>
                                            <input type="number" id="year" name="year" required class="form-control" placeholder="Enter year" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Year</th>
                                            <th>Created at</th>
                                            <th>update at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($production_years as $year)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$year->production_year}}</td>
                                            <td>{{$year->created_at}}</td>
                                            <td>{{$year->updated_at}}</td>
                                            <td>
                                                <span class="fa fa-trash" onclick="deletereq('{{$year->id}}')"></span>
                                                <span class="fa fa-pencil" onclick="editreq('{{json_encode($year)}}')"></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{url('admin/standard-save')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Standard:</label>
                                        <input type="text" id="standard" name="standard" required class="form-control" placeholder="Enter Standard" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Standard</th>
                                            <th>Created at</th>
                                            <th>update at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($standards as $standard)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$standard->standard}}</td>
                                            <td>{{$standard->created_at}}</td>
                                            <td>{{$standard->updated_at}}</td>
                                            <td>
                                                <span class="fa fa-trash" onclick="deletereqs('{{$standard->id}}')"></span>
                                                <span class="fa fa-pencil" onclick="editreqs('{{json_encode($standard)}}')"></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- work for label -->
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{url('admin/label-save')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Label:</label>
                                            <input type="text" id="labelstandard" name="label" required class="form-control" placeholder="Enter Label Name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Type:</label>
                                            <select name="labeltype" class="form-control">
                                                <option value="">Select Label for</option>
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                <option value="year">Year</option>
                                                <option value="standard">Standard</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Label Name</th>
                                            <th>Type</th>
                                            <th>Created at</th>
                                            <th>update at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($labels as $label)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$label->label_name}}</td>
                                            <td>{{$label->type}}</td>
                                            <td>{{$label->created_at}}</td>
                                            <td>{{$label->updated_at}}</td>
                                            <td>
                                                <span class="fa fa-pencil" onclick="editreql('{{json_encode($label)}}')"></span>
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hathaway-Limousines<i class="fa fa-car text-danger"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>



<!-- edit  Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Production Year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('admin/update-production-year')}}">
                            @csrf
                            <input type="hidden" id="editid" name="id" value="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Production Year:</label>
                                <input type="number" id="edityear" name="year" required class="form-control" placeholder="Enter year" />
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal" tabindex="-1" role="dialog" id="deletemodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Production</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete.</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{url('admin/production-delete')}}">
                    @csrf
                    <input type="hidden" id="deleteid" name="id" value="">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- standard modal -->
<!-- edit  Modal -->
<div class="modal fade" id="editmodalstandard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Standard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('admin/update-standard')}}">
                            @csrf
                            <input type="hidden" id="editidstandard" name="id" value="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Standard:</label>
                                <input type="text" id="editstandard" name="standard" required class="form-control" placeholder="Enter Standard" />
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="modal" tabindex="-1" role="dialog" id="deletemodalstandard">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Standard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete.</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{url('admin/standard-delete')}}">
                    @csrf
                    <input type="hidden" id="deleteidstandard" name="id" value="">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal for label -->
<div class="modal fade" id="editmodallabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Label</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('admin/update-label')}}">
                            @csrf
                            <input type="hidden" id="editidlabel" name="id" value="">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Label:</label>
                                    <input type="text" id="labeledit" name="label" required class="form-control" placeholder="Enter Label Name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Type:</label>
                                    <select name="labeltype" id="editlabeltype" class="custom-class">
                                        <option>Select Label for</option>
                                        <option value="year">Year</option>
                                        <option value="standard">Standard</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    function editreq(data) {
        var data = JSON.parse(data);
        $("#editid").val(data.id);
        $("#edityear").val(data.production_year);
        $("#editmodal").modal();

    }

    function deletereq(id) {
        $("#deleteid").val(id);
        $("#deletemodal").modal();
    }

    function editreqs(data) {
        var data = JSON.parse(data);
        $("#editidstandard").val(data.id);
        $("#editstandard").val(data.standard);
        $("#editmodalstandard").modal();

    }

    function deletereqs(id) {
        $("#deleteidstandard").val(id);
        $("#deletemodalstandard").modal();
    }

    //work for label
    function editreql(data) {
        var data = JSON.parse(data);
        $("#editidlabel").val(data.id);
        $("#labeledit").val(data.label_name);
        $("#editlabeltype").val(data.type);
        $("#editmodallabel").modal();

    }
</script>
@endsection
