@extends('layouts.user-layout')
@section('title')
         Profil
@endsection
@section('css')
<style>

    .left-side-list{
        display: flex;
        flex-direction: row;
            padding: 20px 0px !important;
    }
.left-side-list li{
    background-color: transparent;
    width: 25%;
    border: none;
}
.profile-img img{
	border-radius: 100%;
}
.left-side-list li.active{
    background-color: transparent !important;
    border-color: transparent;
    border-bottom: 3px solid #bd8d2e !important;
}
.left-side-list li.active a>h5{
        color: #bd8d2e!important;
            font-weight: 700;
}
.left-side-list li:hover a>h5{
    color: #fff;
}
@media only screen and (max-width: 768px) {
  .left-side-list li a>h5 {
    font-size: 14px !important;
  }
  .left-side-list li{
    width: 100%;
  }
  .left-side-list{
    flex-wrap: wrap;
  }
}
</style>
@endsection
@section('content-area')
    @php
        $user = auth()->user();
         if (isset($user->endUser->id)){
         $id =$user->endUser->id;
         $end_user = $user->endUser;
         }else{
             $id = null;
                    }
         @endphp

    <div class="container" style="margin-top: 10rem;">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-img text-center pt-3">
                            @if($user->userMedia)
                                <img src="{{asset('uploaded-user-images/endusers-images/'.$user->userMedia->image_name)}}" style="width: 10rem; height: 10rem;" class="img-thumbnail" alt=""/>
                                @else
                                <img src="{{asset('images/no-image.png')}}" style="width: 10rem; height: 10rem;" class="img-thumbnail" alt=""/>
                                @endif

                        </div>
                        <ul class="left-side-list list-group list-group-flush bg-light p-4">
                            <li class="list-group-item active list-contact side-links" style="cursor: pointer;">
                              <a href="#contact" class="contact-link">
                                  <h5 id="contact_text" class="text-white text-uppercase">
                                          Profil
                                  </h5>
                              </a>
                            </li>
                            <li class="list-group-item list-pwd side-links" style="cursor: pointer;">
                                <a href="#changePwd" class="w-100">
                                    <h5 id="ch_pwd" class="text-uppercase">
                                     Passwort ändern
                                    </h5> </a>
                            </li>
                            <li class="list-group-item side-links" style="cursor: pointer;">
                                <a href="{{url('user/notifications')}}" class="w-100"><h5 id="ch_pwd" class="text-uppercase">
                                        Nachrichten
                                    </h5> </a>
                            </li>
                            <li class="list-group-item side-links" style="cursor: pointer;">
                                <a href="{{url('user/reservation')}}" class="w-100"><h5 id="ch_pwd" class="text-uppercase">
                                       Meine Buchungen
                                    </h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pr-0">
                <div class="row">
                    <div class="col-md-12 mt-4 pr-0" id="contact">
                        <ul class="list-group list-group-flush mb-5">
                            <li class="list-group-item pl-0">
                            <h2 class="text-uppercase text-gray w-75">
                                Kontaktdaten
                            </h2>
                                <div class="w-25 text-right">
                                <button class="btn btn-save">
                             <a href="{{url('user/build-profile')}}" class="text-white"><i class="fa fa-edit pr-1"> </i> Bearbeiten</a>
                                </button>
                                </div>
                            </li>
                        </ul>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                        Titel :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    @if(isset($end_user->gender))
                                    <h4>{{$end_user->gender =='male' ? 'Mr'  : 'Mr,s'}} </h4>
                                       @endif
                                </div>
                            </div>
                        </div>
                          <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                       Customer Id :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$user->id}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                       Name :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$user->first_name}} {{$user->last_name}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                       Email :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$user->email}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                       Mobile :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$user->phone_number}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                       Adresse :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$id ? $end_user->address : ' '}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                     Firma   :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$id ? $end_user->skype_id : ' '}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="user_info pt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>
                                        VAT / USt-IdNr.   :
                                    </h3>
                                </div>
                                <div class="col-md-5">
                                    <h4>{{$id ? $end_user->vat_no : ' '}} </h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="user_info pt-2">
                            <div class="row pt-3">
                                <div class="col-md-7">
                                    <h3>
                                       Rechnungsadresse :
                                    </h3>
                                </div>
                                <div class="col-md-5 pr-0">
                                    <h4 style="font-family: unset">{{$id ? $end_user->billing_address : ' '}} </h4>
                                </div>
                            </div>
{{--                            <div class="row pt-2">--}}
{{--                                <div class="col-md-7">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5">--}}
{{--                                    <h4 style="font-family: initial">{{$id ? $end_user->billing_city : ' '}} </h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                             <div class="row pt-2">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-5">
                                    <h4 style="font-family: unset">{{$id ? $end_user->billing_country : ' '}} </h4>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-5">
                                    <h4 style="font-family: unset">
                                        {{$id ? $end_user->billing_postal_code : ' '}}
                                    </h4>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt-5" id="changePwd">
                        <ul class="list-group list-group-flush mt-5">
                            <li class="list-group-item pl-0">
                            <h2 class="text-uppercase text-gray"> Passwort ändern</h2>
                            </li>
                        </ul>
                        <div class="user_info pt-3 pb-5">
                            <form method="POST" action="{{ route('user.change.password') }}">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            <div class="row">
                                <div class="heading col-md-12 pt-3 pb-4">
                                    <h5>Bitte geben Sie ihr neues Passwort ein: </h5>
                                </div>

                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="pwd">aktuelles Passwort</label>
                                       <input id="pwd"  type="password" name="current_password" placeholder="aktuelles Passwort" autocomplete="current-password">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="pwd4">neues Passwort</label>
                                       <input id="pwd4" name="new_password" type="password" placeholder="neues Passwort">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="pwd2">neues Passwort erneut eingeben</label>
                                       <input id="pwd2" name="new_confirm_password" type="password" placeholder="neues Passwort erneut eingeben">
                                   </div>
                                </div>
                                <div class="col-md-4 offset-md-1 pr-0 pl-0">
                                   <div class="form-group mb-0" style="margin-top: 1.8rem;">
                                       <button  type="submit" class="btn btn-save text-white w-100">
                                           Passwort ändern</button>
                                   </div>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.list-pwd').click(function () {
                $(this).addClass('active');
                $('#contact_text').removeClass('text-white');
                $('.list-contact').removeClass('active');
                $('#ch_pwd').addClass('text-white');
            });
            $('.list-contact').click(function () {
                $(this).addClass('active');
                $('#contact_text').addClass('text-white');
                $('.list-pwd').removeClass('active');
                $('#ch_pwd').removeClass('text-white');
            });
        });

    </script>
    @endsection

