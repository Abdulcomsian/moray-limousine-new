@extends('layouts.master-admin')
@section('title')
     Discounts & MarkUp
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/wickedpicker.css')}}">
    @endsection
@section('main-content')
{{--    Modal for add discounts and price uo--}}
<!-- Modal -->
<div style="width: 80%">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg w-75 mt-5" style=" margin-left: 18rem;">
            <!-- Modal content-->
            <div class="modal-content bg-white">
                <div class="modal-body">
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    <div class="well well-sm">
                        <form class="form-horizontal" action="{{route('save.discount')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <fieldset>
                                <legend class="text-center header mb-4 create-discount">Create Discounts and Up Price</legend>
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="select_category"><i class="fa fa-calendar"></i> Select Category </label>
                                            <select id="select_category" class="browser-default custom-select custom-select-lg"  name="category_id" required>
                                                <option selected value="">Select Class</option>
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="datepicker"><i class="fa fa-calendar"></i> Start Date </label>
                                            <input id="datepicker" type="date" name="start_date" placeholder="Start Date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="end_date"><i class="fa fa-calendar"></i> End Date </label>
                                            <input id="end_date" name="end_date" type="date" placeholder="End Date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="start_time"><i class="fa fa-clock-o"></i> Start Time </label>
                                            <input id="start_time" name="start_time" type="text" placeholder="Start Time" class="form-control timepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="end_time"><i class="fa fa-clock-o"></i> End Time </label>
                                            <input id="end_time" name="end_time" type="text" placeholder="End Time" class="form-control timepicker">
                                        </div>
                                    </div>


                                    <div class="col-md-3" >
                                        <!-- Default inline 1-->
                                        <div class="custom-control custom-radio custom-control-inline" style="padding-top: 2rem">
                                            <input type="radio" class="custom-control-input" checked id="discount_rate" >
                                            <label class="custom-control-label" for="discount_rate">Discount</label>
                                        </div>
                                        <!-- Default inline 2-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="price_up_rate" >
                                            <label class="custom-control-label" for="price_up_rate">Price Up</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 discount-rate"  style="display: block;">
                                        <div class="form-group">
                                            <label for="discount_rate"><i class="fa fa-percent "></i> Discount Rate</label>
                                            <input id="discount_rate" name="discount_rate" type="number" min="0" max="100" placeholder="Discount Rate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2 price-up-rate"  style="display: none;">
                                        <div class="form-group">
                                            <label for="fname2"><i class="fa fa-percent"></i> Price Up Rate</label>
                                            <input id="fname2" name="price_up_rate" min="0" type="number" placeholder="Discount Rate" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-10 text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark btn-lg pull-left">Save</button>
                                        </div>
                                    </div>
                                </div>



                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-12">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible ml-3 fade show" role="alert">
                    <strong>{{ session('success')  }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible ml-3 fade show" role="alert">
                    <strong>{{ session('error')  }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="card-header">
                    <h4 class="text-center">Discounts & MarkUp Rate</h4>
                </div>
                <div class="card-body pr-0">
                <div class="col-md-12 pt-2">
                    <button type="button" class="btn btn-dark w-25  pull-right" data-toggle="modal" data-target="#myModal">Add New Discounts</button>
                    <table id="datatable-buttons myTable" class="myTable table table-striped dt-responsive nowrap">
                        <thead class="thead-dark font-weight-bold">
                        <tr>
                            <th> Vehicle Class </th>
                            <th> Start Date </th>
                            <th> End Date </th>
                            <th> Start Time </th>
                            <th> End Time </th>
                            <th> Discount / Markup </th>
                            <th> Discount Status </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter = 1)

                        @if(count($discounts) > 0)

                            @foreach($discounts as $discount)
                                <tr>
                                    <td class="py-1">
                                        {{$discount->category->name}}
                                    </td>
                                    <td class="py-1">
                                        {{$discount->start_date}}
                                    </td>
                                    <td> {{$discount->end_date}} </td>
                                    <td>    {{$discount->start_time}} </td>
                                    <td>
                                        {{$discount->end_time}}
                                    </td>
                                    <td>
                                        @if(isset($discount->discount_rate))
                                            <i class="fa fa-percent"></i>  {{$discount->discount_rate}} Discount
                                        @elseif(isset($discount->price_up_rate))
                                            <i class="fa fa-percent"></i>  {{$discount->price_up_rate}} MarkUp
                                        @else <i class="fa fa-percent"></i> 0  @endif
                                    </td>
                                    <td>
                                        @if($discount->status == 'active')
                                            <label class="text-uppercase badge badge-success">{{$discount->status}}</label>
                                        @elseif($discount->status == 'dis_active')
                                            <label class="badge badge-warning">Inactive</label>
                                        @else
                                            <label class="badge badge-danger">{{$discount->status}}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group p-0" style="font-size: 1.6rem;">
                                            <a id="{{$discount->id}}" title="Edit"  href="#" class="p-1 edit-rates" style="cursor: pointer">
                                                <i class="fa fa-edit"></i></a>
                                            @if($discount->status !== 'dis_active')
                                                <a id="{{$discount->id}}" title="Inactive" href="{{url('admin/discount-disactive/')}}/{{$discount->id}}" class="p-1 text-danger" style="cursor: pointer"><i class="fa fa-ban"></i></a>
                                            @endif
                                            <a id="{{$discount->id}}"  title="Delete" href="{{url('admin/discount-delete/')}}/{{$discount->id}}" class="p-1 text-dark" style="cursor: pointer"><i class="fa fa-trash"></i></a>
                                            @if($discount->status == 'dis_active')
                                                <a id="{{$discount->id}}" title="Active" href="{{url('admin/discount-active/')}}/{{$discount->id}}" class="p-1 text-success" style="cursor: pointer">
                                                    <i class="fa fa-universal-access">
                                                    </i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h2>No Discounts are defined</h2>
                        @endif
                        </tbody>
                    </table>
                </div>
                </div>
        </div>
    </div>
</div>

    @endsection
@section('js')
<script type="text/javascript">
    function editUrl(){
        return '{{url('admin/edit-discount')}}/';
    }
    $(document).ready(function(){
    $('input[type="number"]').on('keyup',function(){
        v = parseInt($(this).val());
        min = parseInt($(this).attr('min'));
        max = parseInt($(this).attr('max'));

        if (v < min){
            $(this).val(min);
        } else if (v > max){
            $(this).val(max);
        }
    })
})
</script>
<script type="text/javascript" src="{{asset('js/admin/discounts.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin/wickedpicker.min.js')}}"></script>
    @endsection
