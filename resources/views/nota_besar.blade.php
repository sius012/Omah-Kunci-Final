<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Omah Kunci || Nota Besar</title>

    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }

        .address{
            text-align:center;
        }

        .logo{
            display:flex;
            align-items:center;
            justify-content:center;

            margin-top:40px;
        }

        .logo .brand-title{
            font-weight:lighter;
        }

        .logo .brand-logo{
            height:80px;

            margin-right:10px;
            margin-bottom:10px;
        }
        
        .nota{
            text-align:center;
        }

        .nota .nota-title{
            margin-bottom:0px;
        }

        .nota hr{
            margin:0;
            width:150px;

            border:1px solid black;

            display:inline-flex;
            align-items:center;
            justify-content:center;
        }

        .nota .nota-subtitle{
            margin:0;
        }

        .nota-body{
            margin-left:200px;
            margin-top:50px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img class="brand-logo" src="{{ asset('assets/Group 1.svg') }}" alt="">
        <h1 class="brand-title">Omah Kunci</h4>
    </div>

    <div class="address">
        <p>Jl. Agus Salim D no.10 <br> Telp/Fax. (024) 3554929 / 085712423453 <br> Semarang <br></p>
    </div>

    <div class="nota">
        <h1 class="nota-title">NOTA</h1>
        <hr>
        <h4 class="nota-subtitle">034928348</h4>
    </div>

    <div class="nota-body">
        <h3>Telah Diterima Dari : </h3>
        <h3>UP : </h3>
        <h3>Uang Sejumlah : </h3>
        <br>
        <h3>Berupa : </h3>
        <h3>Guna Membayar : </h3>
        <br>
        <h3>Total : </h3>
    </div>
</body>
</html>