@extends('layouts.driver')
@section('title')
    Driver Profile
@endsection

@section('content')
  <div class="col-md-9">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <img src="{{asset('images/loading.gif')}}" alt="Loading Gif"  id="loading_gif" class="img-fluid" style="display: none ; position: absolute; z-index: 10;">
                  <!-- Trigger the modal with a button -->
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-12 text-center">
                              <h4 class="card-title text-uppercase">List Of Partners</h4>
                          </div>
                      </div>
                  </div>


                  <div class='driver-table'>
                      <table class="table table-striped table-bordered myTable">
                          <thead>
                          <tr>
                              <th> User Image </th>
                              <th> First name </th>
                              <th> Last Name </th>
                              <th> Email </th>
                              <th> Contact NO </th>
                              <th> Status By Admin </th>
                              <th> Actions </th>
                          </tr>
                          </thead>
                          <tbody>

                          @if(count($partners) > 0)

                              @foreach($partners as $partner)
                                  <tr>
                                      <td class="py-1">
                                          <img src="{{asset('uploaded-user-images/endusers-images/')}}/{{$partner->userMedia ? $partner->userMedia->image_name : 'user.jpg' }}" alt="image" />
                                      </td>
                                      <td>   {{$partner->first_name}} </td>
                                      <td>   {{$partner->last_name}} </td>
                                      <td>
                                          {{$partner->email}}
                                      </td>
                                      <td> {{$partner->phone_number}} </td>
                                      <td>
                                          @if($partner->status == 'approved')
                                              <label class="badge badge-success">{{$partner->status}}</label>
                                          @elseif($partner->status == 'pending')
                                              <label class="badge badge-warning">{{$partner->status}}</label>
                                          @else
                                              <label class="badge badge-danger">{{$partner->status}}</label>
                                          @endif
                                      </td>


                                      <td>
                                          <div class="btn-group p-0" style="font-size: 1.6rem;">
                                              @if(Auth()->user()->user_type == 'partner')
                                                  @if($partner->pivot->status == 'active')
                                                      <a title="Block Driver">   <strong id="{{$partner->id}}" class="disapprove-driver text-danger p-1" style="cursor: pointer">  <i class="fa fa-ban "></i></strong></a>
                                                  @else
                                                      <a href="#" title="Approve Driver"> <strong id="{{$partner->id}}"  class="approve-driver text-success p-1" style="cursor: pointer">
                                                              <i class="fa fa-universal-access"></i></strong></a>
                                                  @endif
                                                  <a id="{{$partner->id}}" href="{{url('partner/driver-details/')}}/{{$partner->id}}" class="p-1" style="cursor: pointer"><i class="fa fa-eye"></i></a>

                                              @endif

                                              @if(Auth()->user()->user_type == 'admin')
                                                  <a id="{{$partner->id}}" href="{{url('admin/driver-details/')}}/{{$partner->id}}" class="p-1" style="cursor: pointer"><i class="fa fa-eye"></i></a>
                                                  @if($partner->status === "pending")
                                                      <a href="#" title="Approve Driver"> <strong id="{{$partner->id}}"  class="approve-driver text-aqua p-1" style="cursor: pointer"> <i class="fa fa-universal-access"></i></strong></a>
                                                      <a title="Disapprove Driver">   <strong id="{{$partner->id}}" class="disapprove-driver text-danger p-1" style="cursor: pointer">  <i class="fa fa-ban "></i></strong></a>
                                                  @endif
                                                  @if($partner->status === "disapproved")
                                                      <a href="#" title="Approve Driver"> <strong id="{{$partner->id}}"  class="approve-driver text-aqua p-1" style="cursor: pointer"> <i class="fa fa-universal-access"></i></strong></a>
                                                  @endif
                                                  @if($partner->status === "approved")
                                                      <a title="Disapprove Driver">   <strong id="{{$partner->id}}" class="disapprove-driver text-danger p-1" style="cursor: pointer">  <i class="fa fa-ban "></i></strong></a>
                                                  @endif
                                                  @if($partner->status === "blocked")
                                                      <a href="#" title="Approve Driver"> <strong id="{{$partner->id}}"  class="approve-driver text-aqua p-1" style="cursor: pointer"> <i class="fa fa-universal-access"></i></strong></a>
                                                  @else
                                                      <strong id="{{$partner->id}}" title="Block Driver" class="block-driver text-primary p-1" style="cursor: pointer"><i class="fa fa-close"></i></strong>
                                                  @endif
                                              @endif
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                          @else
                              <h3>You Belongs To No One ...</h3>
                          @endif
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection




@section('side-bar')
    @include('parshall-views._driver-side-bar')
@endsection



@section('js')
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
