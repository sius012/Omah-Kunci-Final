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
    body{
        
    }
.container{

    
}



.pie{
    position: relative;
    background: red ;
    padding: 20px ;
    display: inline;
    margin: 0.5px;
}

.card{
  
     background-color: white;
     width: 160px;
     height: 80px;
    border:1px solid black;
    padding: 3px;
}

    </style>

    <style>
        @font-face /*perintah untuk memanggil font eksternal*/
        {
            font-family: barcode; /*memberikan nama bebas untuk font*/
            src: url("{{storage_path('fonts/code128.ttf')}}");/*memanggil file font eksternalnya di folder nexa*/
        }
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
            padding: 20px;
            margin: 0;
        }

        .barcode{
            
            font-size: 20pt !important;
        }

        td{
            margin: -10px;
        }

        p{
            margin: 0;
            font-size: 8pt;

        }
        span{
            font-size: 6pt;
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
   
        
        <div style="margin-top: 20px;  justify-content: center;flex-direction: unset;width: 120%;align-items: center;">
      
            <div style="display: inline-block;text-align: center; padding: 3px"><div class="card">
                <span style="font-size: 13px;">{{"fresssss"}}</span>
                <div style="text-align:center !important; margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
                <span style="size: 8px !important;">{!! DNS1D::getBarcodeHTML(10101010, 'C128',1.9,33) !!}</span>
                </div>
                <span style="font-size: 13px;">101010101</span>
            </div></div>
     
        </div>
        
</body>

</html>