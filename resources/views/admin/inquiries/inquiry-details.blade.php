@extends('layouts.master-admin')
@section('title')
    LIST OF INQUIRES
@endsection
@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="heading text-uppercase">
                                Inquiry Detail
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>First Name : </strong>
                                    <span> {{$inquiry->first_name}}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Last Name :  </strong>
                                    <span> {{$inquiry->last_name}}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Email  : </strong>
                                    <span> {{$inquiry->email}}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Phone Number  :  </strong>
                                    <span> {{$inquiry->cellno}}</span>
                                </li>
                            </ul>
                           <div class="contact-area">
                               <div class="heading">
                                   <h3> User Message  </h3>
                               </div>
                               <p>{{$inquiry->comment}}</p>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
