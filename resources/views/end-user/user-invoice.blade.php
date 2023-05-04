@extends('layouts.user-layout')
@section('title')
    Invoice
@endsection
@section('content-area')
    <style>
        .table-bordered td, .table-bordered th {
            border: 1px solid #353535;
        }
    </style>
<div class="container pt-3" style="margin-top: 8rem; color: black;">
    <div  class="row  justify-content-center" >
        <div id="print" class="col-md-11">
            <div  class="container">
                <div class="row">
                    <div class="w-75">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="w-100">
                                    <button id="btn_print" class="btn btn-dark d-print-none mb-3 pull-left ml-4">
                                        <i class="fa fa-print pr-1"></i>    Print Invoice
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>moraylimousines, Mainzer Landstraße 49, 60329 Frankfurt am Main</p>
                                <p class="font-weight-bold">Google Cloud </p>
                                <p>Belgrave House 76</p>
                                <p>Buckingham Palace Rd </p>
                                <p>London SW1W 9TQ</p>
                                <strong>Invoice</strong>
                                <p>  For our deliveries/services we kindly request the following payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right w-25 text-left">
                        <img src="{{asset('images/moray-logo.png')}}" style="max-width: 6rem;">
                        <p>moraylimousines</p>
                        <p> Mainzer Landstraße 49</p>
                        <p>60329 Frankfurt am Main</p>
                        <p>Phone: 06933088908 </p>
                        <p>info@moraylimousines.de</p>
                        <p>www.moraylimousines.de</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-3">
                            <table class="table table-bordered table-condensed table-hover">
                                <tr>
                                    <th><strong>Invoice No :</strong> </th>
                                    <th><strong>Customer No :</strong>  </th>
                                    <th><strong>Date :</strong>  </th>
                                    <th><strong>Performance Date :</strong> </th>
                                </tr>
                                <tr>
                                    <td> {{$booking->invoice ? $booking->invoice->invoice_number : 'No invoice'}} </td>
                                    <td>{{$booking->user->id}}</td>
                                    <td>{{date('d - M - yy',strtotime($booking['pick_date'])) }}</td>
                                    <td>{{date('d - M - yy',strtotime($booking->updated_at)) }}</td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed">
                                <tr>
                                    <th>Item </th>
                                    <th colspan="2">Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Price  &euro;</th>
                                    <th>Amount &euro;</th>
                                </tr>

                                <tr>
                                    <td style="width: 10%">
                                        <strong> 1 </strong>
                                    </td>
                                    <td colspan="2" class="w-50">
                                        <p><strong>{{$booking->vehicleType->name}}</strong></p>
                                        <p><span><b>Date : </b>  {{$booking->pick_date}}</span></p>
                                        <p><span>Time : {{$booking->pick_time}}</span></p>
                                        <p><span>Flight : {{$booking->otherUser ? $booking->otherUser->flight_no : '' }} </span>  </p>
                                        <p><span><span>Pickup :</span>
                                         {{$booking->pick_address}}
                                    </span>
                                        </p>
                                        <p><span><span>Drop-Off :</span>
                                        {{$booking->drop_address}}
                                    </span>
                                        </p>

                                        <p><span><span>Name of passenger :</span>
                                         {{$booking->user->first_name}} {{$booking->user->first_name}}
                                    </span>
                                        </p>
                                        <p>
                                            <span>Mercedes E-Class / BMW 5 Series / Audi A6</span>
                                        </p>
                                    </td>
                                    <td style="width: 10%"><span>1</span></td>
                                    <td style="width: 10%"><span>Transfer</span></td>
                                    <td style="width: 10%"><span>{{$booking->net_amount}}</span></td>
                                    <td style="width: 10%"><span>{{$booking->net_amount}}</span></td>
                                </tr>

                                <tr>
                                    <td colspan="6">
                                        <strong>    Travel Amount </strong>
                                    </td>
                                    <td>{{$booking->travel_amount - $booking->tax_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <strong> Extra Options Amount </strong>
                                    </td>
                                    <td>{{$booking->extra_options_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <strong>    Subtotal </strong>
                                    </td>
                                    <td>{{$booking->travel_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <strong>    Tax Amount </strong>
                                    </td>
                                    <td>{{$booking->tax_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <strong>    Grand Total </strong>
                                    </td>
                                    <td> <strong>{{$booking->net_amount}}</strong> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="w-50 pull-left">
                                <div class="card-body mt-3" >
                                    <p class="card-title font-weight-bold">Moray Limousines</p>
                                    <p class="card-text">
                                        <span>      ADDRESS :  {!! \App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_ADDRESS)!!}</span>
                                        Email : {{\App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS) }}
                                    </p>
                                    <p>   Phone: {{\App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_PHONE_NUMBER)}}</p>
                                </div>
                            </div>

                            <div class="w-50 pull-right">
                                <div class="card-body mt-3" >
                                    <h5 class="card-title"></h5>
                                    <p>VAT ID no.: DE323733306 Eine Marke der Moray Group Frankfurt am Main Moheb Hussain</p>
                                    <p class="card-text" >
                                        {{\App\CmsHomePage::getValueForKey(\App\Utills\Constants\AppConsts::HOME_EMAIL_ADDRESS)}}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{asset('js/jQuery.print.min.js')}}"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script>
        $('#btn_print').click(function () {
            $("#print").print({
                globalStyles: true,
                mediaPrint: false,
                stylesheet: '{{asset('assets/css/bootstrap.min.css')}}',
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: null,
                doctype: '<!doctype html>'
            });
        });
        let doc = new jsPDF();
        let specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };

        // let content = $('#print').html();
        // let doc = new jsPDF();
        // let specialElementHandlers = {
        //     '#elementH': function (element, renderer) {
        //         return true;
        //     }
        // };
        //
        // $('#btn_print').click(function () {
        //     doc.fromHTML(content , 15, 15, {
        //         'width': 170,
        //         'elementHandlers': specialElementHandlers
        //     });
        //     doc.save('sample-file.pdf');
        // });
    </script>
    @endsection
