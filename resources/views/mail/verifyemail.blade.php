 <?php

    use Illuminate\Support\HtmlString; ?>
 <!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            color: #bf9c60;">Hello!Thank you for signing up with us!.
        </h3>
        <center>
            <p>You're almost done! Please click here to complete your registration:</p>
            <p>
            <a class="button" style="color:white" href="https://moray-limousines.de/register/verify?email={{$email}}&expiration={{$expiredate}}&token={{$token}}">Complete Registration</a>
        </p>
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
        <p>Have a great day,</p>
        <p>Thanks For Choosing Moray Limousine</p>
        <p>Regards,</p>

        <p>Moray Limousines</p>
    </div>
</section>
</body>
</html> -->

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Moray Limousine | Mail</title>


 <body>
     <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
         <tbody>
             <tr>
                 <td align="center" valign="top" style="border-collapse:collapse">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" style="min-width:600px;width:600px">
                         <tbody>
                             <tr>
                                 <td align="center" style="border-collapse:collapse;padding:0 10px 0 10px">
                                     <table bgcolor="#f4f4f4" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                         <tbody>
                                             <div style="background:#bf9c60 !important;">
                                                 <center>
                                                     <img src="https://moray-limousines.de/images/moray-logo.png" alt="">
                                                 </center>
                                             </div>

                                             <tr>
                                                 <td style="border-collapse:collapse">
                                                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                         <tbody>
                                                             <tr>
                                                                 <td style="border-collapse:collapse">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto;display:block;border:none;font-family:Roboto,arial,helvetica,sans-serif;font-size:16px;line-height:1.4em;color:rgb(255,255,255);text-decoration:none;font-weight:bold;text-align:center;width:800px;height:auto" src="{{asset('images/drive.png')}}" class="CToWUd a6T" tabindex="0">
                                                                     <div class="a6S" dir="ltr" style="opacity: 0.01; left: 802px; top: 578.2px;">
                                                                         <div id=":s9" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download">
                                                                             <div class="akn">
                                                                                 <div class="aSK J-J5-Ji aYr"></div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                 </td>
                                                             </tr>
                                                         </tbody>
                                                     </table>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                     <table bgcolor="#f4f4f4" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                         <tbody>
                                             <tr>
                                                 <td style="border-collapse:collapse;padding:10px 60px 0px 60px">
                                                     <h2 style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:30px;line-height:1.4em;color:#111111;text-align:left;font-weight:700;text-decoration:none;margin:20px 0 20px 0;padding:0">
                                                         You're just what we're looking for
                                                     </h2>
                                                     @if($user->user_type=="driver" || $user->user_type=='end_user')
                                                     <p>You're almost done! Please click here to complete your registration:</p>
                                                     <p>
                                                         <a class="button" style="background-color: #bf9c60; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;" href="https://moray-limousines.de/register/verify?email={{$email}}&expiration={{$expiredate}}&token={{$token}}">Complete Registration</a>
                                                     </p>
                                                     @endif
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                     @if($user->user_type=="partner")
                                     <table bgcolor="#f4f4f4" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                         <tbody>
                                             <tr>
                                                 <td style="border-collapse:collapse;padding:10px 60px 30px 60px">
                                                     <p style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;text-align:left;font-weight:normal;text-decoration:none;margin:0;padding:0">
                                                         Dear {{$user->name}},<br>
                                                         <br>
                                                         Great news, you meet the requirements to apply to work with Moray Limousine in {{$location}}.<br>
                                                         <br>
                                                         Our Partner Portal will guide you through the complete application process. If you want to start your registration now and complete it later, your information will be saved so you can always continue where you left off.<br>
                                                         <br>
                                                         <strong>Here's what will come next:</strong>
                                                     </p>
                                                     <table bgcolor="#f4f4f4" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="padding:20px 0px 0px 0px">
                                                         <tbody>
                                                             <tr>
                                                                 <td width="20%" valign="top" style="border-collapse:collapse;padding:20px 0px 40px 0px">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto;width: 65%;" src="https://ci4.googleusercontent.com/proxy/27pvoZfXFQijbKaUuu6JYflS-nmxTFMxDVA3Fh0GPcNmSxujiyK8fYm_-wbuX7hp9CzxfhKHttW7dQFudIOYqn8FDDkfQI30fsGq8sZ0T6LnU7Zey70u2fwkQ9ddVKOV3dwizn7mo3xEur5UmkrmcqgJ4U29_j8VT4l8dlVI4pYr5NP3ijqpDQ=s0-d-e1-ft#https://cdn.braze.eu/appboy/communication/assets/image_assets/images/5d137d8d9ae16821c9f395cb/original.png?1561558413" class="CToWUd">
                                                                 </td>
                                                                 <td width="80%" style="border-collapse:collapse">
                                                                     <p valign="top" style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;font-weight:normal;text-decoration:none;margin:15px">
                                                                         <strong>Step 1</strong><br>
                                                                         Create an account. You’ll be asked to set a password and provide a bit more information about yourself and your company.<br>
                                                                         &nbsp;
                                                                     </p>
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td width="20%" valign="top" style="border-collapse:collapse;padding:20px 0px 40px 0px">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto;width: 65%;" src="https://ci3.googleusercontent.com/proxy/lGX8E-sLq8qYNunGAWzAF32ZAIuKTAaVdhx-gdD3wcuEbVuFjpr3CAMbRQCrfc0hf4FDCztN13AkZZvFLnYsvemTVcJzWZwZWsfd0aWQFXoZM5HVF1eVhOx5KCxI6S_-3dtvASkP7AGQVffYhdIDQYDnk8q0jEOPQr3wbQMI4LrXwu4L11M3jQ=s0-d-e1-ft#https://cdn.braze.eu/appboy/communication/assets/image_assets/images/5d137d8d98cf4b43bc9bd559/original.png?1561558413" class="CToWUd">
                                                                 </td>
                                                                 <td width="80%" style="border-collapse:collapse">
                                                                     <p valign="top" style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;font-weight:normal;text-decoration:none;margin:15px">
                                                                         <strong>Step 2</strong><br>
                                                                         Upload all required documents proving legal compliance in {{$location}}. Moray Limousine only works with fully licensed partners operating in full compliance with local laws to ensure the safety of our guests.<br>
                                                                         &nbsp;
                                                                     </p>
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td width="20%" valign="top" style="border-collapse:collapse;padding:20px 0px 40px 0px">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto ;width: 65%;" src="https://ci4.googleusercontent.com/proxy/OJkel7v9EUrzKBeepIbjiHFRHwlG52LyF1bTyRTYhKyrMjA50pnlAXa2RIkuCj6uutg76UqQr2_7jAXkGzxJrQiFbftltKJ90swJoWBMHZ51IizWo5s4MhbL-K7CYW_dQqU_kKn3-KLXnQKdEV0lFZwF8iUCw4YLfxqg3_olDXOlzKtD_6hx0Q=s0-d-e1-ft#https://cdn.braze.eu/appboy/communication/assets/image_assets/images/5d137d8db0c2be64bfd37be9/original.png?1561558413" class="CToWUd">
                                                                 </td>
                                                                 <td width="80%" style="border-collapse:collapse">
                                                                     <p valign="top" style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;font-weight:normal;text-decoration:none;margin:15px">
                                                                         <strong>Step 3</strong><br>
                                                                         Complete our app and service training.<br>
                                                                         &nbsp;
                                                                     </p>
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td width="20%" valign="top" style="border-collapse:collapse;padding:20px 0px 40px 0px">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto;width: 65%;" src="https://ci4.googleusercontent.com/proxy/kZWGBr24m9Xeov01x8CjlrFYwfvVbgFGSczPuB67EdpCmyUwVLbaa2l5s-QLDdUtv3d-BS7VIUt4fy4qk_jLVvSUQ7tQFoTF-N902n9rYfMKl2dVh9rlih3NgZWxLMbx8fmnghAxe73W19lGaZ0l-n0adO7-6MQ_L4jN_sONhlhc-C2Z_ZEPqQ=s0-d-e1-ft#https://cdn.braze.eu/appboy/communication/assets/image_assets/images/5d137d8d36dc785942170541/original.png?1561558413" class="CToWUd">
                                                                 </td>
                                                                 <td width="80%" style="border-collapse:collapse">
                                                                     <p valign="top" style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;font-weight:normal;text-decoration:none;margin:15px">
                                                                         <strong>Step 4</strong><br>
                                                                         Review and sign your contract.<br>
                                                                         &nbsp;
                                                                     </p>
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td width="20%" valign="top" style="border-collapse:collapse;padding:20px 0px 40px 0px">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto;width: 65%;" src="https://ci6.googleusercontent.com/proxy/itPN-I09GdO7xKFRfPfLq21KFTgFcrIUvgtFbqo7YnTvKZ9jxNjKaxzqwwFy8sQYG8dXMX951R3RREve9-V4gWXCikMBGh7Cu21OdUljsZ_5lleLbJNNiDPq3coTTjITO0f66hjdJY8pbSrIhID1G-ikzKR5THsH997oseVY-TsUTmaSh9Wp6g=s0-d-e1-ft#https://cdn.braze.eu/appboy/communication/assets/image_assets/images/5d137d8d43c19d0c54f1f5b5/original.png?1561558413" class="CToWUd">
                                                                 </td>
                                                                 <td width="80%" style="border-collapse:collapse">
                                                                     <p valign="top" style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;font-weight:normal;text-decoration:none;margin:15px">
                                                                         <strong>Step 5</strong><br>
                                                                         Participate in a live webinar to review the training material and discuss any questions.<br>
                                                                         &nbsp;
                                                                     </p>
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td width="20%" valign="top" style="border-collapse:collapse;padding:20px 0px 40px 0px">
                                                                     <img alt="" style="outline:none;text-decoration:none;height:auto; width: 65%;" src="https://ci4.googleusercontent.com/proxy/gug8kYIXFutFYMIwg0KEbUYsf9dQOVGDrKan_rDZkxEjkHY7qZzEFCt6bgV0NbRNA6UtqeFQglN8gyziZLsa5BU8ALYvCIiKSThYGSf2_3MVj6ZGfJA5D-EeYOIu0As_RI8mA_AiCbDXTcNu90px7h-Shqqa5gKi6x6ijU4udEKy4DvDKI-cxQ=s0-d-e1-ft#https://cdn.braze.eu/appboy/communication/assets/image_assets/images/5d137d8d3f0da20b07774f2b/original.png?1561558413" class="CToWUd">
                                                                 </td>
                                                                 <td width="80%" style="border-collapse:collapse">
                                                                     <p valign="top" style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;font-weight:normal;text-decoration:none;margin:15px">
                                                                         <strong>Step 6</strong><br>
                                                                         Accept your first Moray Limousine ride.<br>
                                                                         &nbsp;
                                                                     </p>
                                                                 </td>
                                                             </tr>
                                                         </tbody>
                                                     </table>
                                                     <p style="text-align: center;">
                                                         <a class="button" style="background-color: #bf9c60; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;" href="https://moray-limousines.de/register/verify?email={{$email}}&expiration={{$expiredate}}&token={{$token}}">Complete Registration</a>
                                                     </p>
                                                     <br>
                                                     <br>
                                                     <p style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;text-align:left;font-weight:normal;text-decoration:none;margin:0;padding:0">
                                                         If you have any questions, please feel free to contact us. We look forward to working together.
                                                     </p>
                                                     <p style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;text-align:left;font-weight:normal;text-decoration:none;margin:0;padding:0">
                                                         <br>
                                                         Best regards,<br>
                                                         <br>
                                                         Partner Operations
                                                     </p>
                                                     <p></p>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                     @else

                                     @endif
                                     <table bgcolor="#f4f4f4" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                         <tbody>
                                             <tr>
                                                 <td style="border-collapse:collapse;padding:0px 60px 30px 60px">
                                                     <p style="font-family:'Roboto',arial,helvetica,sans-serif;font-size:18px;line-height:1.4em;color:#000001;text-align:left;font-weight:normal;text-decoration:none;margin:0;padding:0">
                                                     </p>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>

                                     <div align="center">
                                         <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                                             <tbody>
                                                 <tr>
                                                     <td id="x_m_-728614054202185312footerLinks" style="padding:11.25pt 15.0pt 0pt 15.0pt">
                                                         <h2 align="center" style="margin-bottom:9.75pt; text-align:center">
                                                             <span style="font-size:13.5pt;   color:white">
                                                                 Moray Limousine<u></u><u></u>
                                                             </span>
                                                         </h2>
                                                         <p class="x_MsoNormal" align="center" style="text-align:center"><span style="color:white">
                                                                 <a href="https://moray-limousines.de/service/details/3" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="10">
                                                                     <span style="font-size:9.0pt;   color:white; text-decoration:none">Limousine service</span>
                                                                 </a> |
                                                                 <a href="https://moray-limousines.de/service/details/4" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="11">
                                                                     <span style="font-size:9.0pt;   color:white; text-decoration:none">Business Solutions
                                                                     </span>
                                                                 </a> |
                                                                 <a href="https://moray-limousines.de/Faq" data-auth="NotApplicable" data-linkindex="12">
                                                                     <span style="font-size:9.0pt;   color:white; text-decoration:none">FAQ / Hilfe
                                                                     </span>
                                                                 </a> |
                                                                 <a href="https://moray-limousines.de/contact-us" data-linkindex="13"><span style="font-size:9.0pt;   color:white; text-decoration:none; ">Contact Us
                                                                     </span>
                                                                 </a> |
                                                                 <a href="https://moray-limousines.de/about-us" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="14">
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

                                                             <span style="font-size:9.0pt;   color:white; letter-spacing:.7pt; ">Contact Us:<br>Mainzer Landstrasse 49<br>Moray Limousines<br>60329 Frankfurt am Main<br>+49 (0) 15906406598<u></u><u></u></span>

                                                         </p>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                     <div align="center">
                                         <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; background:#1f1f1f">
                                             <tbody>
                                                 <tr>
                                                     <td style="padding:0cm 0cm 0cm 0cm">
                                                         <p class="x_MsoNormal" align="center" style="text-align:center">
                                                             <span style="color:white; text-transform:uppercase">
                                                                 <a href="https://www.facebook.com/moraylimousines" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="6">
                                                                     <span style="color:white; text-decoration:none">
                                                                         <span style="color:blue">
                                                                             <img data-imagetype="External" src="{{asset('images/facebook.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1029" alt="moray-limousines" style="width:.2916in; height:.2916in">
                                                                         </span>
                                                                     </span>
                                                                 </a>
                                                                 <a href="https://www.instagram.com/accounts/login/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="7">
                                                                     <span style="color:white; text-decoration:none">
                                                                         <span style="color:blue">
                                                                             <img data-imagetype="External" src="{{asset('images/instagram.png')}}" border="0" width="28" height="28" id="x_m_-728614054202185312_x0000_i1028" alt="moray-limousines" style="width:.2916in; height:.2916in">
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

                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </td>
             </tr>
         </tbody>
     </table>
 </body>

 </html>