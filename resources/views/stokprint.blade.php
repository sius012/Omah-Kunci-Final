@php 
    $no = 1;
@endphp
@php
        $date = \Carbon\Carbon::parse(date('d-M-Y'))->locale('id');

        $date->settings(['formatFunction' => 'translatedFormat']);

    @endphp
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
        }

         .logo-img {
           width: 200px;
        }

        .container .header {
            align-items: center;
    

            margin-top: 35px;
        }

        .container .address {
  

            margin-bottom: 40px;
        }

        .container .data-wrapper {
   

        }
        .container .data-wrapper .table tbody tr td, th{
            padding: 2px;
        }

        .container .data-wrapper .table{
            border-collapse: collapse;
        
        }

        .table-data{
        width: 1px;
        border-collapse: collapse;
        
        }

        .table-data td, .table-data th{
            border: 1px solid black;
            font-size: 8pt;
            margin: 0;
        }

        .barcode{
       
            font-size: 8pt !important;
        }

    

        td{
            margin: -10px;
        }

        p{
            margin: 0;
            font-size: 8pt;

        }
    </style>
</head>

<body>
  
    
            <table style="width: 100px; margin-left: 250px">
                <tr>
                    <th align="center"> <img class="logo-img" src="{{ public_path('assets/logo.svg') }}" alt=""></th>
                </tr>
                <tr>
                    <th align="center"><p class="address">
                            Jl. Agus Salim D no.10 <br> Telp/Fax. (024) 3554929 / 085712423453 <br> Semarang <br>
                        </p></th>
                </tr>
            </table>
  
            <br>
            <br>
            <h3>Data STOK Produk</h3>
        <p>Tanggal : {{date('d-M-Y')}}</p>
        <p>Tipe : Semua</p>
        <p>Tipe Kode: Semua</p>
   
            <table class="table-data" style="width:700px !important; margin-top: 20px" >
              
                    <tr>
                        <th >No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th >Tipe</th>
                        <th>Tipe Kode</th>
                        <th>Merek</th>
                        <th >Jumlah</th>
                    </tr>

              
                    @foreach($data as $datas)
                    <tr>
                        <td align=center style="width: 0px">{{$no}}</td>
                        <td align=center class="barcode" style="width: 120px">{{$datas->kode_produk}}</td>
                        <td  align=center style="width: 200px">{{$datas->nama_produk}}</td>
                        <td  align=center>{{$datas->id_kategori}}</td>
                        <td  align=center>{{$datas->id_ct}}</td>
                        <td  align=center>{{$datas->merk}}</td>
                        <td  align=center>{{$datas->jumlah}} {{$datas->stn}}</td>

                    </tr>
                    @php $no++ @endphp
                    @endforeach
                
            </table>
       <!-- {!! DNS1D::getBarcodeHTML($datas->kode_produk, 'C128') !!} -->
 
</body>

</html>