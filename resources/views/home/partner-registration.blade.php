    @extends('layouts.partner-main-home-layout')
    @section('title')
    Become Partner
    @endsection
    @section('content-area')
    <style>
        .header-04 .bottom-header {
            background: rgb(0, 0, 0);
            position: absolute;
            z-index: 9;
            width: 100%;
        }

        .section-iconbox:not(.fix-mtb) {
            padding: 0 0 64px;
            margin-top: 10rem;
        }
    </style>
    <style>
        .btn-secondary:focus {
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
    </style>
    <form method="post" action="{{ route('register') }}" id="partner-register-form">
        @csrf
        <input type="hidden" name="user_type" value="partner">
        <main id="step-1" style="margin-top:70px;">

            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">
                    @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Want to drive with us?</h2>
                        <h4 class="lsp-page--description">Please tell us about you and your company to get started.</h4>
                    </div>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                    @endforeach
                    @endif
                    <div class="row validate validate--name">
                        <div class="apollo-input" style="width: 100%;">
                            <div class="input-label">
                                <label>Company name</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name" placeholder="Full company name and legal entity" type="text" required class="form-control input-field__element">
                            </div>
                            <span class="text-danger companyerror"></span>
                            <div class="input-desc">
                                <label>Full company name and legal entity. Sole proprietors enter first and last name.</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="apollo-input" style="width: 100%;">
                            <div class="input-label">
                                <label>Email</label>
                            </div>
                            <div class="input-field">
                                <input type="email" id="email" name="email" placeholder="Email" required class="input-field__element form-control">
                            </div>
                            <span class="text-danger emailerror"></span>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="apollo-input" style="width: 100%;">
                            <div class="input-label">
                                <label>Password</label>
                            </div>
                            <div class="input-field">
                                <input id="password" name="password" placeholder="password" type="password" required class="input-field__element form-control">
                            </div>
                            <span class="text-danger passworderror"></span>
                        </div>
                    </div> -->
                    <div class="row subsection">
                        <div class="apollo-input">
                            <div class="input-label">
                                <label>Do your drivers have basic English skills?</label>
                            </div>
                            <div class="input-field input-field--grouped">
                                <label for="language-yes" class="input-field__radio">
                                    <input type="radio" id="language-yes" name="language" value="1" class="input-field__radio-element">Yes</label>
                                <label for="language-no" class="input-field__radio">
                                    <input type="radio" id="language-no" name="language" value="0" class="input-field__radio-element">No</label>
                            </div>
                            <span class="text-danger languageerror"></span>
                            <div class="input-desc hide">
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button type="button" class="next-page">Next</button>
                    </div>
                    <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </main>
        <main id="step-2" style="display: none; margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">

                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Moray Limousines cities</h2>
                        <h4 class="lsp-page--description">Where do you want to operate?</h4>
                    </div>

                    <div class="row validate validate--name" style="width:100%">
                        <div class="apollo-input" style="width: 100%;">
                            <div class="input-label">
                                <label>Select Your City</label>
                            </div>
                            <select class="select" id="city-select" name="city-select">
                                <option disabled="" selected="">Please select</option>
                                @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->location_city}}</option>
                                @endforeach
                            </select>
                            <span class="text-dagner cityerror"></span>
                            <div class="input-desc">
                                <label>You can add more cities later</label>
                            </div>
                            <div id="step-4" class="row placeholder" style="display: flow-root; text-align:center">
                                <div class="apollo-media">
                                    <div class="media-object">
                                        <img src="{{asset ('images/cms/home/ic-arrow-up.svg')}}" alt="Select to view required vehicles for your city" class="media-object__picture media-object__picture--rounded">
                                        <div class="media-object__content">
                                            <div class="media-object__description">
                                                <p style="font-size:1.375rem" ;>Select to view required vehicles for your city</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="step-5" class="row subsection" style="display:none">
                        <h3>Do you have one of the following vehicles?</h3>
                        <div data-template="Maximum _AGE_ years old in _COLOR_" data-or="or" l10n-data-template="" l10n-data-or="" class="content requirements">

                        </div>
                    </div>
                    <div class="row subsection">
                        <div class="apollo-input">
                            <div class="input-label">
                                <label>Do you have one of the vehicles listed above?</label>
                            </div>
                            <div class="input-field input-field--grouped">
                                <label for="language-yes" class="input-field__radio">
                                    <input type="radio" id="language-yes" name="vehicleradio" value="1" class="input-field__radio-element">Yes</label>
                                <label for="language-no" class="input-field__radio">
                                    <input type="radio" id="language-no" name="vehicleradio" value="0" class="input-field__radio-element">No</label>
                            </div>
                            <span class="text-danger vehicleerror"></span>
                            <div class="input-desc hide">
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button type="button" class="second-pravious-page">Previous</button>
                        <button type="button" class="second-next-page">Next</button>
                    </div>
                    <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </main>
        <main id="step-3" style="display: none; margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">

                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Required documents</h2>
                        <h4 class="lsp-page--description">This includes all documents that comply with your local regulations.</h4>
                    </div>

                    <div class="apollo-infobox info">
                        <div class="apollo-infobox--title">
                            <h4>Please note:</h4>
                        </div>
                        <div class="apollo-infobox--description">
                            <p>We only work with registered companies. We will ask you to send specific documents at a later step.</p>
                        </div>
                    </div>

                    <div id="service-classes" class="row subsection">
                        <h3>Do you have all the following documents?</h3>
                        <div data-template="Maximum _AGE_ years old in _COLOR_" data-or="or" l10n-data-template="" l10n-data-or="" class="content documentsreq">
                            <div class="service-class-list">
                                <h4>Vehicle</h4>
                            </div>
                            <ul>
                                <li>Vehicle Registration Details Certificate</li>
                                <li>Vehicle Inspection Record</li>
                                <li>Third Party Vehicle Insurance</li>
                                <li>Photos of Vehicle showing Licence Plate</li>
                            </ul>
                            <div class="service-class-list">
                                <h4>Company</h4>
                            </div>
                            <ul>
                                <li>Australia Business Register / Australian Company Number</li>
                                <li>Operator Accreditation Certificate</li>
                            </ul>
                            <div class="service-class-list">
                                <h4>Driver</h4>
                            </div>
                            <ul>
                                <li>Chauffeur Profile Picture</li>
                                <li>Driver's License</li>
                                <li>Driver Accreditation</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row subsection">
                        <div class="apollo-input">
                            <div class="input-label">
                                <label>Do you have all documents listed above?</label>
                            </div>
                            <div class="input-field input-field--grouped">
                                <label for="language-yes" class="input-field__radio">
                                    <input type="radio" id="language-yes" name="documentradio" value="1" class="input-field__radio-element" required>Yes</label>
                                <label for="language-no" class="input-field__radio">
                                    <input type="radio" id="language-no" name="documentradio" value="0" class="input-field__radio-element">No</label>
                            </div>
                            <span class="text-dagner documenterror"></span>
                            <div class="input-desc hide">
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button type="button" class="third-pravious-page">Previous</button>
                        <button type="button" class="submit-page lastsubmit" disabled>Submit</button>
                    </div>
                    <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </main>
    </form>
    @endsection
    @section('js')
    <script>
        $(".next-page").on('click', function() {
            if ($("#company-name").val() == "") {
                $(".companyerror").text("Please Enter Company Name");
                return false;
            } else {
                $(".companyerror").text("");
            }
            if ($("#email").val() == "") {
                $(".emailerror").text("Please Enter Email");
                return false;
            } else {
                $(".emailerror").text("");
            }
            if (!$("input[name='language']:checked").val()) {
                $(".languageerror").text("Plese Select Yes for continue");
                return false;
            } else {
                $(".languageerror").text("");
            }
            //ajax to check email
            email = $("#email").val();
            $.ajax({
                url: '{{url("check-email")}}',
                method: 'get',
                data: {
                    email: email
                },
                success: function(res) {
                    if (res == "exist") {
                        $(".emailerror").text("Email Already Exist");
                        return false;
                    } else {
                        $('#step-1').hide();
                        $('#step-2').show();
                        $('#step-3').hide();
                    }
                }
            })

        });
        $(".second-next-page").on('click', function() {
            if ($("#city-select").val() == "") {
                $(".cityerror").text("Plese Select City");
                return false;
            } else {
                $(".cityerror").text("");
            }
            if (!$("input[name='vehicleradio']:checked").val()) {
                $(".vehicleerror").text("Plese Select Yes for continue");
                return false;
            } else {
                $(".vehicleerror").text("");
            }
            $('#step-2').hide();
            $('#step-3').show();
            //get doucments here
            cityid = $("#city-select").val();
            $.ajax({
                url: "{{url('/get-city-document')}}",
                method: "get",
                data: {
                    cityid: cityid
                },
                success: function(res) {
                    $('#step-4').hide();
                    $(".documentsreq").html(res);
                    $('#step-5').show();
                }

            })

        });
        //pravious click button
        $(".second-pravious-page").on('click', function() {
            $('#step-2').hide();
            $('#step-1').show();
        })
        // third page pravious
        $(".third-pravious-page").on('click', function() {
            $('#step-3').hide();
            $('#step-2').show();
        })
        $(".submit-page").on('click', function() {
            if (!$("input[name='documentradio']:checked").val()) {
                $(".documenterror").text("Plese Select Yes for continue");
                return false;
            } else {
                $(".documenterror").text("");
                $("#partner-register-form").submit();
            }
        });
        $('#city-select').on('change', function() {
            cityid = $(this).val();
            $.ajax({
                url: "{{url('/get-city-vehicle')}}",
                method: "get",
                data: {
                    cityid: cityid
                },
                success: function(res) {
                    $('#step-4').hide();
                    $(".requirements").html(res);
                    $('#step-5').show();
                }

            })
        });
        //check if radio button is yes or no
        $('input[type=radio][name=documentradio]').change(function() {
            if ($(this).val() == '0') {
                return false;
            } else {
                $(".lastsubmit").removeAttr('disabled');
            }
        });
    </script>
    @endsection