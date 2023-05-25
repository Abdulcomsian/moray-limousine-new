<!DOCTYPE html>
<html>

<head>
    <title>Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif;
        }

        .emailDiv {
            padding: 80px 50px;
        }

        .logoDiv {
            text-align: right;
        }

        .titleDiv {
            border-bottom: 1px solid;
            width: 100%;
            max-width: 40%;
        }

        .addressDiv {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .addressDiv .leftDiv,
        .addressDiv .rightDiv {
            width: 50%;
            padding: 20px 0px;
        }

        .addressDiv .rightDiv {
            text-align: right;
        }

        .addressDiv p {
            margin: 5px 0px;
        }

        .rechnungDiv h4 {
            font-size: 28px;
            font-weight: 400;
        }

        .tableDiv table {
            width: 100%;
            border-top: 1px solid;
            border-bottom: 1px solid;
            margin: 30px 0px;
        }

        .tableDiv table th,
        .calculationDiv table th {
            text-align: left;
        }

        .calculationDiv table {
            width: 100%;
            border-collapse: collapse;
        }

        .display {
            display: flex;
        }

        .calculationDiv table,
        .calculationDiv th,
        .calculationDiv td {
            border: 1px solid black;
        }

        .calculationDiv table .noBorder {
            border: none;
        }

        .calculationDiv td,
        .calculationDiv th {
            padding: 10px;
        }

        .footerDiv {
            display: flex;
            margin-top: 80px;
        }

        .footerDiv .leftDiv,
        .footerDiv .middleDiv,
        .footerDiv .rightDiv {
            width: 33%;
        }

        .footerDiv .leftDiv p,
        .footerDiv .middleDiv p,
        .footerDiv .rightDiv p {
            font-size: 12px;
        }

        .qRdiv {
            display: flex;
            align-items: center;
        }

        .qRdiv .imgDiv {
            padding-top: 20px;
        }

        .qRdiv a {
            color: #000;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="emailDiv">
        <div class="logoDiv">
            <img src="Rechnung_RE0127_.png">
        </div>
        <div class="titleDiv">
            <p>Hathaways Group UG, Mainzer Landstraße 49, 60329 Frankfurt am Main</p>
        </div>
        <div class="addressDiv">
            <div class="leftDiv">
                <p>Main-Taunus-Kreis - Der Kreisausschuss</p>
                <p>Jugendamt</p>
                <p>Am Kreishaus 1-5</p>
                <p>65719 Hofheim am Taunus</p>
            </div>
            <div class="rightDiv">
                <p>Morays Group UG</p>
                <p>Mainzer Landstraße 49</p>
                <p>60329 Frankfurt am Main</p>
                <p>Tel.: +49 (0) 69 26022180</p>
            </div>
        </div>
        <div class="rechnungDiv">
            <h4>Rechnung</h4>
            <p>Wir danken Ihnen, das Sie sich für QABBY entschieden haben. Wie folgt wird Ihnen der Auftrag in Rechnung gestellt:</p>

            <div class="tableDiv">
                <table>
                    <thead>
                        <th>Rechnungsnr.:</th>
                        <th>Kundennr.:</th>
                        <th>Datum:</th>
                        <th>Leistungsdatum:</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$invoice_number}}</td>
                            <td>10071</td>
                            <td>{{$booking->created_at}}</td>
                            <td>{{$booking->pick_date}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="calculationDiv">
                <table>
                    <thead>
                        <th>Pos.</th>
                        <th>Bezeichnung</th>
                        <th>Menge</th>
                        <th>Einheit</th>
                        <th>Einzel €</th>
                        <th>Gesamt €</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="display noBorder">1</td>
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
                    </tbody>
                </table>
            </div>
            <p>* Im Gesamtbetrag von 48,00 € (Netto: 40,34 €) sind USt 19 % (7,66 €) enthalten.</p>
            <p>Zahlbar bis 16.06.2021</p>
            <p>Vielen Dank, dass Sie sich für QABBY entschieden haben!</p>

            <div class="footerDiv">
                <div class="leftDiv">
                    <p>Hathaways Group UG<br>Mainzer Landstraße 49<br>60329 Frankfurt am Main<br>Tel.: 06933088908</p>
                </div>
                <div class="middleDiv">
                    <p>USt-IdNr.: DE336366477<br>Frankfurt am Main<br>Geschäftsführer / CEO: M.Hussain</p>
                </div>
                <div class="rightDiv">
                    <p>Hathaways Group UG<br>Commerzbank<br>IBAN: DE60 5004 0000 0654 4506 00<br>BIC: COBADEFFXXX</p>
                </div>
            </div>
            <p>Rechnung RE0127</p>
            <div class="qRdiv">
                <div class="textDiv">
                    <p>Bezahlen Sie bequem per PayPal:</p>
                    <a href="https://www.paypal.com/paypalme/MorayGroupDE/48eur">https://www.paypal.com/paypalme/MorayGroupDE/48eur</a>
                </div>
                <div class="imgDiv">
                    <img src="QR.png">
                </div>
            </div>
        </div>
    </div>
</body>

</html>