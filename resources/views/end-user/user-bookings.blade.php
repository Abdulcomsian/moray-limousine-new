@extends('layouts.user-layout')
@section('title')
Meine Fahrten
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('js/DataTables/datatables.min.css')}}"/>
  <style>
      #myTable_wrapper{
          width: 98%;
      }
      .filters a:hover{
          color: white;
          background: gray;
      }
      .tab-div{
        margin-bottom: 40px;
            border-bottom: 1px solid #e3e5ea;
      }
      .tab-content .list-group-item{
        border: none;
      }
      .btn-save:hover {
    background-color: #343434 !important;
    color: #fff !important;
}
      .tab-div li>a.active{
        color: #bd8d2e !important;
        cursor: default;
        background-color: transparent !important;
        font-weight: 700;
            border-bottom: 3px solid;
    border-radius: 0;
      }
      select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
  border: 0 !important;
  background: transparent;
  background-image: none;
}
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
/* Custom Select */
.select {
  position: relative;
  display: flex;
  width: 15em;
  height: 3em;
  line-height: 3;
  background: transparent;
  overflow: hidden;
  border-radius: .25em;
  border: 1px solid #343434 !important;
}
select {
  flex: 1;
  padding: 0 .5em;
  color: #343434;
  cursor: pointer;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  padding: 0 1em;
  background: transparent;
  cursor: pointer;
  pointer-events: none;
  -webkit-transition: .25s all ease;
  -o-transition: .25s all ease;
  transition: .25s all ease;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}
.list-group-item.active, .side-links:hover, .btn-save {
    background-color: transparent !important;
    border-color: #343434 !important;
    color: #343434 !important;
    font-weight: 500 !important;
}
.tab-content .card{
  border: none;
}

  </style>
    @endsection

@section('content-area')
    <div class="container" style="margin-top: 10rem;">
    <div class="row">
      <div class="col-lg-12">
        <div class="tab-div">
            <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#aanstaande"><span>Anstehende Buchungen</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#adasd" class="nav-link my-project" data-toggle="pill"><span>Vergangene Buchungen</span> </a>
                    </li>
                </ul>
        </div>
      </div>
    </div>
    <div class="tab-content">
      <div id="aanstaande" class="home container tab-pane active">
              <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush mb-5">
                                <li class="list-group-item pl-0 border-bottom">
                                    <h2 class="text-uppercase text-gray w-75">
                                        Meine Fahrten
                                    </h2>
                                </li>
                                <li>
                                    <div class="row pt-3">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="form_date">Von</label>
                                                <input id="nform_date" type="date" min="{{date('Y-m-d',strtotime('+ 1 day'))}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="to_date">Bis </label>

                                                <input id="nto_date" type="date" min="{{date('Y-m-d',strtotime('+ 1 day'))}}" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden"  id="nbookingtype" value="next">
                                        <div class="col-md-2">
                                            <div class="form-group mb-0 pt-1">
                                                <button id="filterByDate" data-type="n" type="button" class="filterByDate btn btn-save mt-4">Suchen
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-0 mt-4">
                                                <div class="select">
                                                  <select name="slct" class="filterbystatus" data-type="n" id="slct">
                                                    <option selected disabled>Filter By Status</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="paid">Completed</option>
                                                    <option value="approved">Approved</option>
                                                    <option value="disapproved">Disapproved</option>
													 <option value="canceled">Cancelled</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('success')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops ... !  </strong>  {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="card-body nbookings_list" id="bookings_list">
                                       @include('parshall-views._user_booking_table')
                                </div>
                            </div>
                        </div>
              </div>
      </div>
      <div id="adasd" class="home container tab-pane fade">
        <div class="row">
                <div class="col-md-12">
                    <ul class="list-group list-group-flush mb-5">
                        <li class="list-group-item pl-0 border-bottom">
                            <h2 class="text-uppercase text-gray w-75">
                                Meine Fahrten
                            </h2>
                        </li>
                        <li>
                            <div class="row pt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="form_date">Von</label>
                                        <input id="pform_date" type="date" max="{{date('Y-m-d',strtotime('- 1 day'))}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="to_date">Bis </label>
                                        <input id="pto_date" type="date" max="{{date('Y-m-d',strtotime('- 1 day'))}}" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" class="bookingtype" id="pbookingtype" value="pravious">
                                <div class="col-md-2">
                                    <div class="form-group mb-0 pt-1">
                                        <button id="filterByDate" data-type="p" type="button" class="filterByDate btn btn-save mt-4">Suchen
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-0 mt-4">
                                        <div class="select">
                                                  <select name="slct" class="filterbystatus" data-type="p" id="slct">
                                                    <option selected disabled>Filter By Status</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="paid">Completed</option>
                                                    <option value="approved">Approved</option>
                                                    <option value="disapproved">Disapproved</option>
													<option value="canceled">Cancelled</option>
                                                  </select>
                                                </div>
                                        <!-- <div class="dropdown pt-1">
                                            <button class="btn btn-save w-75 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Fahrten
                                            </button>
                                            <div class="dropdown-menu filters" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item all-bookings" href="#">Alle Fahrten</a>
                                                <a class="dropdown-item canceled-bookings" href="#">Stornierte Fahrten</a>
                                                <a class="dropdown-item completed-bookings" href="#">Abgeschlossene Fahrten</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops ... !  </strong>  {{session('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-body pbookings_list" id="bookings_list">
                          @include('parshall-views._user_booking_pravious_table')
                        </div>
                    </div>
                </div>
                </div>
      </div>
    </div>
            
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('js/DataTables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function () {
        $('#myTable').dataTable({
            responsive : true
        });
            $('.cancel-bookings').click(function (e) {
                let conform = confirm('Are You Sure Want To Cancel This Booking..?');
                if(!conform) {
                    e.preventDefault();
                }
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let completed_Url = '{{url('user/completed-bookings')}}';
        let canceled_Url = '{{url('user/canceled-bookings')}}';
        let all_Url = '{{url('user/all-bookings')}}';
        $('.completed-bookings').click(function () {
          getBookings(completed_Url);
        });
        $('.canceled-bookings').click(function () {
          getBookings(canceled_Url);
        });
        $('.all-bookings').click(function () {
          getBookings(all_Url);
        });
        $('.filterByDate').click(function () {
         datatype=$(this).attr('data-type');
        let from_date = $('#'+datatype+'form_date').val();
        let to_date = $('#'+datatype+'to_date').val();
        let bookingtype=$("#"+datatype+"bookingtype").val()
        let url = '{{url('user/filter-by-date')}}';
            $.ajax({
                type: 'get',
                url: url,
                data : {'from_date' : from_date , 'to_date' : to_date,'type':bookingtype},
                success: function (response) {
                    //$("#myTable").dataTable().fnClearTable(); //clear the table
                    //$('#myTable').dataTable().fnDestroy(); //destroy the datatable
                    console.log(response);
                    if(bookingtype=="next")
                    {
                     $('.nbookings_list').html(response);
                    }
                    else
                    {
                        $('.pbookings_list').html(response);
                    }
                    $('#myTable').DataTable();
                }
            });
        });
       //filter by status
       $(document).on('change','.filterbystatus',function(){
           let url = '{{url('user/filter-by-status')}}';
           let datatype=$(this).attr('data-type');
          let bookingtype=$("#"+datatype+"bookingtype").val();
           status=$(this).val();
           $.ajax({
                type: 'get',
                url: url,
                data : {'status':status,'type':bookingtype},
                success: function (response) {
                    console.log(response);
                    if(bookingtype=="next")
                    {
                     $('.nbookings_list').html(response);
                    }
                    else
                    {
                        $('.pbookings_list').html(response);
                    }
                    $('#myTable').DataTable();
                }
            });
       })
        function  getBookings(url) {
            $.ajax({
                type: 'get',
                url: url,
                success: function (response) {
                    $("#myTable").dataTable().fnClearTable(); //clear the table
                    $('#myTable').dataTable().fnDestroy(); //destroy the datatable
                    console.log(response);
                    $('#bookings_list').html(response);
                    $('#myTable').DataTable();
                }
            });
        }
    </script>
    @endsection