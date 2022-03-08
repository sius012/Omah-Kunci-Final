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
        *{
            margin: 0;
            font-size: 5pt !important;
            font-weight: bold;
        }

        img{
            width: 20px;
            position: relative;
            transform: rotate(-90);
            left: 4px;
            bottom:5px;
        }

        .kode{
            letter-spacing: 5pt;
            font-size: 4pt !important;
        }
    body{
        width: 100mm;
        margin: 5mm;
        
    }
.container{

    
}



.pie{
    position: relative;
    background: red ;
    display: inline;
    margin: 0.5px;
}

.card{
  
     background-color: white;
     width: 33mm;
     height: 15mm;
    border:1px solid gray;
    border-radius: 7px;
  
    padding-top:0px;
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
    

            margin-top: 0px;
        }

        .container .address {
  

            margin-bottom: 0px;
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
            margin:0px;
        }
    </style>
</head>

<body>
  
    
         
   
    @foreach($data as $datas)
        <div style="margin-top: 0px;  justify-content: center;flex-direction: unset;width: 100mm;align-items: center;">
      
            <div style="display: inline-block;text-align: center; width:300px"><div class="card">
                <span style="text-align:left;font-size: 13px;left:25px;margin-top:4px;width:150px;position:absolute">{{$datas->nama_produk}} {{$datas->nama_merek}}</span>
                <div style="text-align:center !important; margin-left: 5px; margin-top: 15px; margin-bottom: 0px;">
                <span style="size: 8px !important;">{!! DNS1D::getBarcodeHTML($datas->kode_produk, 'C128',1.1,30) !!}</span>
                </div>
                <span class="kode" style="align-left: left;font-size: 13px; margin-left:3px">{{$datas->kode_produk}}</span>
                <img src="{{public_path('assets/ok.png')}}" alt="">
            </div>
     
        </div>
    @endforeach
</body>
,
</html>