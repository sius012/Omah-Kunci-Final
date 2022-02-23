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
            margin: 2px;
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

        .container-wrapper .header .brand-address {
            margin-top: 0;
        }

        .container-wrapper .header .date-times {
            margin-left: 800px;
        }

        .container-wrapper .big-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .container-wrapper .big-title .title {
            margin: 0;
            margin-bottom: -12px;
        }

        .container-wrapper .big-title .hr {
            margin: 0;
            border: 1px solid black;
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

    </style>
</head>

<body>
    <div class="container-wrapper">
        <table style="margin-top: 30px">
            <tr>
                <td>
                    <div class="address">
                        <h4 class="brand-title">"Omah Kunci"</h4>
                        <p class="brand-address">Jl. Agus Salim D no.10 <br> Telp/Fax (024) 3554929 <br> Semarang </p>
                    </div>
                </td>
                <td></td>
                <td>
                    <h4 class="date-times">Semarang,
                        {{ date("d-M-Y", strtotime($data->updated_at)) }}</h4>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 200px;"></td>
                <td align="center">
                    <div class="big-title">
                        <h2 class="title">
                            {{ $data->termin != 3 ? "TANDA TERIMA" : "NOTA" }}
                        </h2>
                        <div class="hr"></div>
                        <h5 class="no-nota">NO.{{ $data->no_nota }}</h5>
                    </div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td >
                    <h4>Telah terima dari</h4>
                </td>
                <td> : {{ $data->ttd }}</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <h4>Untuk Proyek</h4>
                </td>
                <td> : {{ $data->up }}</td>
                <td></td>
            </tr>
            @if($td != 0)
                <tr>

                    <td>
                        <h4>Telah Dibayar</h4>
                    </td>
                    <td> : Rp. {{ number_format($td) }}</td>
                    <td></td>

                </tr>
            @endif
            <tr>
                <td style="padding-bottom: 20px;">
                    <h4>Uang Sejumlah</h4>
                </td>
                <td style="padding-bottom: 20px;"> : Rp. {{ number_format($data->us) }}</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <h4>Berupa</h4>
                </td>
                <td> : {{ $data->brp }}</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <h4>Guna Membayar</h4>
                </td>
                <td> : {{ $data->gm }}</td>
                <td></td>
            </tr>
            <tr>
                <td  style="padding-bottom: 20px;">
                    <h4>Total</h4>
                </td>
                <td style="padding-bottom: 20px;"> : Rp. {{ number_format($data->total)}}</td>
                <td></td>
            </tr>
            <tr><td></td></tr>
            @foreach($opsi as $opsis)
                <tr>

                    <td>
                        <h4>{{ $opsis->judul }}</h4>
                    </td>
                    <td> : {{ $opsis->ket }}</td>
                    <td></td>

                </tr>
            @endforeach
          
            <tr align="center" >
                <td style="padding-top: 150px;"></td>
                <td>
                    <h4 class="ttd-header">Mengetahui,</h4>

                </td>
                <td></td>
            </tr>
            <tr>
                <td align="center">
                    <div class="wrappers">
                        <h4 class="customer">Customer,</h4>

                    </div>
                </td>
                <td></td>
                <td align="center">
                    <div class="wrappers">
                        <h4 class="sales">Sales,</h4>

                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
