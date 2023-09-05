@extends('layouts.master-admin')
@section('title')
Admin Dashboard
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
                                    <h3>Legal form of Companies</h3>
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
                                <form method="post" action="{{url('legal-form-of-company-save')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">City:</label>
                                        <select class="form-control selectpicker" multiple name="city_id[]" required>
                                            <option value="">Select City</option>
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->location_city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group legal_form_group">
                                                <label for="exampleInputPassword1">Legal Form:</label>
                                                <input type="text" name="legal_form[]" class="form-control" id="req-heading" placeholder="Enter Legal form Company" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="badge bg-success mt-3" id="add_legal_form">

                                                <i class="fa fa-plus fa-2x p-3 text-white"></i>

                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>City Name</th>
                                            <th>Legal Form</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($legal_form_data)
                                        @foreach($legal_form_data as $legal)

                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$legal->location_city}}</td>

                                            <td>{{$legal->legal_form}}</td>

                                            <td>
                                                <span class="fa fa-trash" onclick="deletereq('{{$legal->id}}')"></span>
                                                <span class="fa fa-pencil" onclick="editreq('{{json_encode($legal)}}')"></span>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{url('legal-form-of-company-update')}}">
                            @csrf
                            <input type="hidden" id="editid" name="id" value="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">City:</label>
                                <select class="form-control" id="editcityid" name="city_id" required>
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->location_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Legal Company Name:</label>
                                <input type="text" id="editLegalForm" name="legal_form" class="form-control" id="req-heading" placeholder="Enter Legal Company Name" required>
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
                <h5 class="modal-title">Delete Req</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete.</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{url('legal-form-of-company-delete')}}">
                    @csrf
                    <input type="hidden" id="deleteid" name="id" value="">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
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
        $("#editcityid").val(data.city_id);
        $("#editLegalForm").val(data.legal_form);

        $("#editmodal").modal();

    }

    function deletereq(id) {
        $("#deleteid").val(id);
        $("#deletemodal").modal();
    }

    // Fields Increments Code

    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".legal_form_group"); //Fields wrapper
    var add_button = $("#add_legal_form"); //Add button ID


    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();

        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row mt-3"><div class="col-md-8"><input type="text" placeholder="Enter legal form of Company" class="form-control" name="legal_form[]"/></div><div class="col-md-4"><a href="#" class="remove_field"><i class="fa fa-minus text-danger"></i></a></div></div>'); //add input box
        }
    });

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent().parent().remove();
        x--;
    })
    $('select').selectpicker();
</script>
@endsection