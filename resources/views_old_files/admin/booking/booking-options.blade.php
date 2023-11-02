@extends('layouts.main-home-layout')
@extends('layouts.booking-layout')
@section('title')

@endsection
@section('content-area')
@section('content-area-booking')
    <!-- Start Options Area -->
    <section class="options-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="form-options">
                        <form action="#" method="post" accept-charset="utf-8">
                            <div class="one-half number-pass">
                                <label for="number-pass">Number Of Passengers</label>
                                <div class="select">
                                    <select name="number-pass" id="number-pass">
                                        <option value="">05</option>
                                        <option value="">06</option>
                                        <option value="">07</option>
                                        <option value="">08</option>
                                    </select>
                                </div>
                            </div>
                            <div class="one-half number-bags">
                                <label for="number-bags">Number Of Bags</label>
                                <div class="select">
                                    <select name="number-pass" id="number-pass">
                                        <option value="">05</option>
                                        <option value="">06</option>
                                        <option value="">07</option>
                                        <option value="">08</option>
                                    </select>
                                </div>
                            </div>
                            <div class="one-half first-name">
                                <label for="firstname">First Name </label>
                                <input type="text" name="firstname" id="firstname" placeholder="Ali">
                            </div>
                            <div class="one-half last-name">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" placeholder="TUF...">
                            </div>
                            <div class="one-half email">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" placeholder="creativelayer088@gmail.com">
                            </div>
                            <div class="one-half phone">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" placeholder="+90 538 658 96 315">
                            </div>
                            <div class="infomation">
                                <label for="infomation">Additional Information</label>
                                <textarea name="infomation" id="infomation" placeholder="Lorem Ipsum "></textarea>
                            </div>
                            <div class="btn-submit">
                                <a type="submit" class="btn-submit" href="{{url('admin/booking-login')}}">CONTINUE</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>

@endsection




