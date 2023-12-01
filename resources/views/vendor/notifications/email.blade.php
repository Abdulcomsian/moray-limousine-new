<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(221, 221, 221);
            font-family: 'Roboto', sans-serif !important;
        }

        .main-container {

            width: 80%;
            margin: 0px 10%;
            background-color: white;
        }

        .black-lane img {
            width: 110px;
            height: auto;
            margin-top: 10px;
        }

        .black-lane {
            justify-content: center;
            align-items: center;
        }

        .driver img {
            height: 30%;
            width: 100%;
            /* padding-top: 5px; */

        }

        .main-text h1 {
            font-size: xx-large;

            margin: 15px 0;
            width: auto;

        }

        .main-text {
            margin: 0px 50px;

        }

        .link {
            color: #bf9c60;
        }


        .font {

            font-family: 'Roboto', sans-serif;
        }

        .footer-strip-1 {

            height: 30px;
            background-color: rgb(194, 194, 194);

        }

        .footer-strip-1 .img-div {

            height: 27px;
            width: 15%;
            margin: 0px 41%;
        }

        .footer-strip-1 img {
            height: 30px;
            width: 30px;
            margin: 0px 10px;
        }


        .footer-strip-2 {
            border: 3px solid orangered;
            height: 80px;
            background-color: rgb(0, 0, 0);
            margin-top: 10px;
        }

        .button {
            background-color: #bf9c60;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="main-container">

        <div class="black-lane" style="background:#bf9c60 !important;">
            <center>
                <img src="https://www.hathaway-limousines.com/images/moray-logo.png" alt="">
            </center>
        </div>
        <div class="driver">
            <img src="{{asset('images/drive.png')}}" alt="">
        </div>
        <div class="main-text">
            {{-- Greeting --}}
            @if (! empty($greeting))
            <h1 class="font"> {{ $greeting }}</h1>
            @else
            @if ($level == 'error')
            # @lang('Whoops!')
            @else
            # @lang('Hello!')
            @endif
            @endif

            {{-- Intro Lines --}}
            @foreach ($introLines as $line)
            {{ $line }}

            @endforeach



            {{-- Outro Lines --}}
            @foreach ($outroLines as $line)
            {{ $line }}

            @endforeach
            <br>
            <p>
                @isset($actionText)
                <?php
                switch ($level) {
                    case 'success':
                        $color = 'green';
                        break;
                    case 'error':
                        $color = 'red';
                        break;
                    default:
                        $color = 'blue';
                }
                ?>
                @component('mail::button', ['url' => $actionUrl, 'color' => $color])
                {{ $actionText }}
                @endcomponent
                @endisset

            </p>
        </div>
        <br>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td id="x_m_-728614054202185312footerLinks" style="padding:11.25pt 15.0pt 0pt 15.0pt">
                            <h2 align="center" style="margin-bottom:9.75pt; text-align:center">
                                <span style="font-size:13.5pt;   color:white">
                                    Hathaway Limousines<u></u><u></u>
                                </span>
                            </h2>
                            <p class="x_MsoNormal" align="center" style="text-align:center"><span style="color:white">
                                    <a href="https://www.hathaway-limousines.com/details/3" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="10">
                                        <span style="font-size:9.0pt;   color:white; text-decoration:none">Limousine service</span>
                                    </a> |
                                    <a href="https://www.hathaway-limousines.com/service/details/4" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="11">
                                        <span style="font-size:9.0pt;   color:white; text-decoration:none">Business Solutions
                                        </span>
                                    </a> |
                                    <a href="https://www.hathaway-limousines.com/Faq" data-auth="NotApplicable" data-linkindex="12">
                                        <span style="font-size:9.0pt;   color:white; text-decoration:none">FAQ / Hilfe
                                        </span>
                                    </a> |
                                    <a href="https://www.hathaway-limousines.com/contact-us" data-linkindex="13"><span style="font-size:9.0pt;   color:white; text-decoration:none; ">Contact Us
                                        </span>
                                    </a> |
                                    <a href="https://www.hathaway-limousines.com/about-us" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="14">
                                        <span style="font-size:9.0pt;   color:white; text-decoration:none">About Us
                                        </span>
                                    </a> <u></u><u></u></span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td valign="top" id="x_m_-728614054202185312hotlines" style="padding:0cm 0cm 0pt 0cm">
                            <p align="center" style="text-align:center; line-height:18.0pt; margin-top: 10px;">

                                <span style="font-size:9.0pt;   color:white; letter-spacing:.7pt; ">Contact Us:<br>Mainzer Landstrasse 49<br>Hathaway Limousines<br>60329 Frankfurt am Main<br>+49 69 26022180<u></u><u></u></span>

                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" style="width:100%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td style="padding-top:10px">
                            <p class="x_MsoNormal" align="center" style="text-align:center">
                                <span style="color:white; text-transform:uppercase">
                                    <a href="https://www.facebook.com/moraylimousines" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="6">
                                        <span style="color:white; text-decoration:none">
                                            <span style="color:blue">
                                                <img data-imagetype="External" src="{{asset('images/facebook.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1029" alt="Blacklane Facebook" style="width:.2916in; height:.2916in">
                                            </span>
                                        </span>
                                    </a>
                                    <a href="https://www.instagram.com/accounts/login/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="7">
                                        <span style="color:white; text-decoration:none">
                                            <span style="color:blue">
                                                <img data-imagetype="External" src="{{asset('images/instagram.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1028" alt="Blacklane Instagram" style="width:.2916in; height:.2916in">
                                            </span>
                                        </span>
                                    </a>
                                </span><span style="text-transform:uppercase"><u></u><u></u></span>
                            </p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>