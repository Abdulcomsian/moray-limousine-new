<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-----<link href="style.css" rel="stylesheet">-->
    <title>Document</title>
    <style>
        @font-face {
            font-family: "myFirstFont";
            src: url("/public/fonts/Calibri.ttf")format("truetype");
        }

        body {
            font-family: "myFirstFont";
        }

        #healthform img {
            width: auto;
            height: 150px;
        }

        .entrytable {
            width: 100%;
        }

        .entrytable,
        .entrytable th,
        .entrytable td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table tr td input {
            border: none;
            border-bottom: 1px solid;
            width: 60%;
        }

        .displayFlex {
            display: flex;
        }

        table {
            width: 100%;
            max-width: 55%;
            margin: auto;
        }

        .hr {
            width: 100%;
            max-width: 100%;
            color: black;

        }

        h4 {
            margin: 0px;
        }

        .footer {
            padding-top: 20px;
        }

        .footer p {
            color: gray;
        }

        .footer p a {
            color: blue;
            text-decoration: underline;
            padding-right: 5px;
            padding-left: 5px;
        }

        .footer p strong {
            color: black;
        }

        .footerh4 {}

        span.width56 {
            width: 100%;
            max-width: 100%;

        }

        span .width70 {

            width: 100%;
        }

        table tr td input.width70 {
            width: 100%;
        }

        table tr td input.width83 {
            width: 100%;
        }

        table tr td input.width90 {
            width: 100%;
        }

        table tr td input.width86 {
            width: 100%;
        }

        table tr td input.width59 {
            width: 100%;
        }

        table tr td input.width68 {
            width: 100%;
        }

        table tr td input.width69 {
            width: 100%;
        }

        table tr td input.width72 {
            width: 100%;
        }

        table tr td input.width53 {
            width: 100%;
        }

        table tr td input.width82 {
            width: 100%;
        }

        .para {
            padding-left: 0px;
            margin-left: 0px
        }

        .paragra {
            padding-left: 0px;
            margin-left: 0px
        }

        #footersection {
            width: 100%;
            max-width: 100%;
            margin: auto;
        }

        .line {
            border-color: black;
            width: 100%;
            max-width: 55%;
        }

        .footer p span {
            font-size: 13px;
            padding-left: 10px;
            padding-right: 10px;

        }
    </style>
</head>

<body>
    <section id="healthform">
        <div class="container">
            <center> <img src="assets/images/moray-logo.png"></center>
            <center>
                <h3>Invoice</h3>
            </center>
            <center>
                <h4>info@menainsurance.com</h4>
                <p>Hathaways Group UG, Mainzer Landstraße 49, 60329 Frankfurt am Main</p>
                <p>Main-Taunus-Kreis - Der Kreisausschuss</p>
                <p>Jugendamt</p>
                <p>Am Kreishaus 1-5</p>
                <p>65719 Hofheim am Taunus</p>
                <p>Tel.: +49 (0) 69 26022180</p>
            </center>
            <h4>Rechnung</h4>
            <p>Wir danken Ihnen, das Sie sich für QABBY entschieden haben. Wie folgt wird Ihnen der Auftrag in Rechnung gestellt:</p>
            <table class="entrytable">
                <tr>
                    <th>Rechnungsnr.:</th>
                    <th>Kundennr.:</th>
                    <th>Datum:</th>
                    <th>Leistungsdatum:</th>
                </tr>

                <tr style="text-align: center">
                    <td>{{$invoice_number}}</td>
                    <td>10071</td>
                    <td>{{$booking->created_at}}</td>
                    <td>{{$booking->pick_date}}</td>
                </tr>

            </table>
            <br><br>
            <center>
                <table class="entrytable">
                    <tr>
                        <th>Pos.</th>
                        <th>Bezeichnung</th>
                        <th>Menge</th>
                        <th>Einheit</th>
                        <th>Einzel €</th>
                        <th>Gesamt €</th>
                    </tr>

                    <tr style="text-align: center">
                        <td>1</td>
                        <td>
                            <label>Economy</label>
                            <p>Datum: 01.06.2021</p>
                            <p>Uhrzeit: 16:20 Uhr</p>
                            <p>Abholung: Zeil 42, Frankfurt am Main Ziel: Im Lorsbachtal 30A, 65719 Hofheim am Taunus</p>
                            <p>Opel Astra, Skoda Octavia, VW Golf Variant, Ford Focus oder ähnliches</p>
                        </td>
                        <td>1</td>
                        <td>Transfer</td>
                        <td>48,00</td>
                        <td>48,00</td>
                    </tr>
                    <tr>
                        <td colspan="5"><b>Gesamtbetrag*</b></td>
                        <td><b>48,00</b></td>
                    </tr>
                </table>
            </center>
            <center>
                <p>* Im Gesamtbetrag von 48,00 € (Netto: 40,34 €) sind USt 19 % (7,66 €) enthalten.</p>
                <p>Zahlbar bis 16.06.2021</p>
                <p>Vielen Dank, dass Sie sich für QABBY entschieden haben!</p>
                <!--Photos goes here-->
                <footer style="position: fixed; bottom: 0px; left: 0px; right: 0px; height: 50px;">
                    <!--<section id="footersection">-->
                    <!--<div class="footer">-->
                    <div class="row">
                        <p>
                            <span> <strong>Address</strong>301, Business Venue Building, Umm Hurair Road, Oud Metha, Dubai, AE</span> <span> <strong>T:</strong> 0123456789</span> <span> <strong>F:</strong> 0123456789 </span> <span><strong>M:</strong> 0123456789 </span>
                        </p>
                        <p>
                            <span><strong>E</strong>:<a>info@menainsurance.com</a></span><span> <strong>W:</strong><a>{{Request::gethost()}}</a></span><span> <strong>Company Registration Number:</strong> 0123456</span>
                        </p>
                    </div>
                    <!--</div>-->
                    <!--</section>-->
                </footer>
        </div>
    </section>
</body>

</html>