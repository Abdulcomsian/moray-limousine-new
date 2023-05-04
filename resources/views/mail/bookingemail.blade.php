<?php use Illuminate\Support\HtmlString;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Debt Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        p{
            padding-left:50px;
        }
        .button {
          background-color: #bf9c60; /* Green */
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
        a{
            text-decoration: none;
        }
    </style>
</head>

<body style=" margin:0px;
            font-family: 'Poppins', sans-serif;">
<section id="header" style="width: 50%;
            background: #bf9c60;
            text-align: center;
            margin:0 auto;

            ">
    <div class="header-content" style="text-align: center;">
      <img src="https://moray-limousines.de/images/moray-logo.png"/>
    </div>
</section>
<section id="payment-remainder">
    <div class="payment-remainder-content" style="
            width: 100%;
            background: #fff;
            padding:0px;
            border-radius: 56px;
            text-align: center;
            ">
        <h3 style="text-align:center;
            color: #bf9c60;">You Have a New Booking Request.
        </h3>
        <center>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#efefef; border-collapse:collapse">
            <tbody>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt"><p class="x_MsoNormal">
                        <b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">Pick Date:</span></b>
                    </td>
                    <td valign="top" style="border:solid white 1.0pt; border-left:none; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal"><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">{{$details['body']['Pick Date']}} </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt"><p class="x_MsoNormal">
                        <b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">Pick Address:</span></b>
                    </td>
                    <td valign="top" style="border:solid white 1.0pt; border-left:none; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal"><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">{{$details['body']['Pick Address']}} </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt"> <p class="x_MsoNormal"><b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">        Drop Address:</span></b>
                    </p>
                    </td>
                    <td valign="top" style="border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal">
                            <span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">
                                {{$details['body']['Drop Address']}}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt"><p class="x_MsoNormal">
                        <b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">Selected Class:</span></b>
                    </p>
                    </td>
                    <td valign="top" style="border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal">
                        <span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">
                          {{$details['body']['Selected Class']}}
                        </span>
                       </p>
                    </td>
                </tr>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt"><p class="x_MsoNormal">
                        <b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">Travel Amount:</span></b>
                    </p>
                    </td>
                    <td valign="top" style="border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal">
                        <span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black"> {{$details['body']['Travel Amount']}}</span>
                       </p>
                    </td>
                </tr>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt"><p class="x_MsoNormal">
                        <b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">Net Amount:</span></b>
                    </p>
                    </td>
                    <td valign="top" style="border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal">
                        <span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">
                         {{$details['body']['Net Amount']}}
                        </span>
                       </p>
                    </td>
                </tr>
                <tr>
                    <td width="35%" valign="top" style="width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt"><p class="x_MsoNormal">
                        <b><span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">Payment Status:</span></b>
                    </p>
                    </td>
                    <td valign="top" style="border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt">
                        <p class="x_MsoNormal">
                        <span style="font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black">
                          {{$details['body']['Payment Status']}}
                        </span>
                       </p>
                    </td>
                </tr>
            </tbody>
            </table>
        <div align="center"><table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#1f1f1f">
            <tbody>
                <tr>
                    <td style="padding:0cm 0cm 0cm 0cm"><p class="x_MsoNormal" align="center" style="text-align:center">
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
                    </span><span style="text-transform:uppercase"><u></u><u></u></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
        <p class="x_MsoNormal" align="center" style="text-align:center"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td id="x_m_-728614054202185312footerLinks" style="padding:11.25pt 15.0pt 12.0pt 15.0pt">
                            <h2 align="center" style="margin-bottom:9.75pt; text-align:center">
                                <span style="font-size:13.5pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white">
                                    Moray Limousine<u></u><u></u>
                                </span>
                            </h2>
                            <p class="x_MsoNormal" align="center" style="text-align:center"><span style="color:white">
                                <a href="https://moray-limousines.de/service/details/3" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="10">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">Limousine service</span>
                                </a> | 
                                <a href="https://moray-limousines.de/service/details/4" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="11">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">Business Solutions
                                    </span>
                                </a> | 
                                <a href="https://moray-limousines.de/Faq" data-auth="NotApplicable" data-linkindex="12">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">FAQ / Hilfe
                                    </span>
                                </a> | 
                                <a href="https://moray-limousines.de/contact-us" data-linkindex="13"><span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">Contact Us
                                </span>
                                </a> | 
                                <a href="https://moray-limousines.de/about-us" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="14">
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; text-decoration:none">About Us
                                    </span>
                                </a> <u></u><u></u></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <p class="x_MsoNormal" align="center" style="text-align:center"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
        <div align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:50.0%; background:#1f1f1f">
                <tbody>
                    <tr>
                        <td valign="top" id="x_m_-728614054202185312hotlines" style="padding:0cm 0cm 15.0pt 0cm">
                            <p align="center" style="text-align:center; line-height:18.0pt">
                                <b>
                                    <span style="font-size:9.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:white; letter-spacing:.7pt">Contact Us:<br>Mainzer Landstrasse 49<br>Moray Limousines<br>60329 Frankfurt am Main<br>+49 (0) 15906406598<u></u><u></u></span>
                                </b>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </center>
        <p>
            <a class="button" style="color:white" href="">View My Site</a>
        </p>
        <p>Have a great day,</p>
        <p>Thanks For Choosing Moray Limousine</p>
        <p>Regards,</p>

        <p>Moray Limousines</p>
    </div>
</section>
</body>
</html>