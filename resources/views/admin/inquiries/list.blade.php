    @extends('layouts.master-admin')
@section('title')
    List of Inquiries
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List of All Inquiries</h4>
                            <p class="card-description"> -----                   </p>
                        <div class="table-responsive">
                            <table class="table  table-bordered">
                                <thead>
                                <tr>
                                    <th> Full Name </th>
                                    <th> Email </th>
                                    <th> Cell Phone No</th>
                                    <th> Message </th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($inquiries) > 0)
                                    @foreach($inquiries as $inquiry)
                                        <tr>

                                            <td>   {{$inquiry->first_name}}  {{$inquiry->last_name}} </td>
                                            <td>
                                                {{$inquiry->email}}
                                            </td>
                                            <td> {{$inquiry->cellno}} </td>
                                            <td>
                                                <span  style="width: 11rem; overflow: hidden; position: inherit;">{{$inquiry->comment}}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group p-0" style="font-size: 1.6rem;">
                                                <a href="{{url('admin/inquiries/detail/'.$inquiry->id)}}" class="pt-3">
                                                    <strong  class="p-1" style="cursor: pointer;"><i class="fa fa-eye"></i></strong>
                                                </a>
                                                    <form method="post" action="{{route('delete.inquiry' ,['id' => $inquiry->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                    <button type="submit" class="p-0" title="Delete" style="background: none;">
                                                    <strong id="{{$inquiry->id}}" class="text-danger p-1" style="cursor: pointer;">
                                                        <i class="fa fa-trash"></i></strong>
                                                    </button>
                                                    </form>

                                                </div>

                                            </td>
                                        </tr>
                                        @php
                                        @endphp

                                    @endforeach
                                @else
                                    <h2>No Inquiry Found</h2>
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
@endsection
