<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;

            font-size: 10pt;
        }

        body{
            max-height: 5000px;
        }

        .container-wrapper {
            margin: 30px;
            margin-top: 0;
        }

        .container-wrapper .header {
            display: inline-flex;
            margin-bottom: 40px;
            margin-left: 80px;
        }

        .container-wrapper .header .brand-title {
            margin-bottom: 0;
            text-transform: uppercase;
        }

        .container-wrapper table .address .brand-address {
            margin-top: 0;

            font-size: 8pt;
        }

        .container-wrapper table .date-times {
            font-size: 8pt;

            margin-left: 320px;
        }

        .container-wrapper .big-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .container-wrapper .big-title .title {
            margin: 0;
            margin-bottom: -12px;
        }

        .container-wrapper .big-title .hr {
            margin: 0;
       
            width: 200px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .container-wrapper .big-title .no-nota {
            margin: 0;
        }

        .container-wrapper .content,
        .content h4 {
            text-transform: uppercase;
            margin: 0;
            margin-left: 40px;
        }

        .container-wrapper .ttd .ttd-header {
            text-align: center;
        }

        .container-wrapper .ttd .wrappers {
            display: inline-flex;
        }

        .container-wrapper .ttd .wrappers .customer {
            margin-left: 200px;
        }

        .container-wrapper .ttd .wrappers .sales {
            margin-left: 700px;
        }

        .container-wrapper table {
            width: 750px;
        }

        #bigtitle{
            height: 10px;

        }
        h4{
            margin-top: 4px;
            font-size: 9pt;
        }

    </style>
</head>

<body>
    <div class="container-wrapper">
        <table style="margin-top: 10px; width: 750px">
            <tr>
                <td>
                    <div class="address">
                        <img style="height:20px;" src="{{ public_path('assets/logo.svg') }}" alt="">
                        <p class="brand-address">Jl. Agus Salim D no.10 <br> Telp/Fax (024) 3554929 <br> Semarang </p>
                    </div>
                </td>
                <td></td>
                <td align="right" valign="top" style>
                    <h4 class="date-times">Semarang, {{date('d-M-Y', strtotime($data->created_at))}}
                     
                </td>
            </tr>
            <tr>
                <td align="center" id="bigtitle" colspan="3">
                    <div class="big-title">
                        <h2 class="title">
                            PEMESANAN
                        </h2>
                        <div class="hr"></div>
                    </div>
                </td>

            </tr>
            <tr>
                <td valign="top" style="width: 150px">
                    <h4>Telah terima dari</h4>
                </td>
                <td valign="top"> {{ $data->ttd }}</td>
                <td></td>
            </tr>
            <tr>
                <td valign="top">
                    <h4>Telepon</h4>
                </td>
                <td valign="top">  {{ $data->telepon}}</td>
                <td></td>
            </tr>
            <tr>
                <td  valign="top">
                    <h4>Uang Sejumlah</h4>
                </td>
                <td class="notabesar" valign="top" > Rp. {{ number_format($data->us) }}</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <h4>Guna Membayar</h4>
                </td>
                <td> {{ $data->gm }}</td>
                <td></td>
            </tr>
            <tr>
                <td  valign="top">
                    <h4>Sejumlah</h4>
                </td>
                <td  valign="top">  {{$data->sejumlah}}</td>
                <td></td>
            </tr>
            <tr><td></td></tr>
        
          
            <tr align="center" >
                <td colspan="3" style="padding-top:50px; padding-bottom:30px">
                    <h4 class="ttd-header">Mengetahui,</h4>

                </td>
            </tr>
            <tr>
                <td align="center">
                    <div class="wrappers">
                        <h4 class="customer">Customer,</h4>

                    </div>
                </td>
                <td></td>
                <td align="center" style="padding-left:200px">
                    <div class="wrappers">
                        <h4 class="sales">Sales,</h4>

                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
