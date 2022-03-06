<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: linear-gradient(to right, #1562AA, #4FA2EE, white);
        }

        .container .row .col-4 .link-wrapper .login-btn,
        .home-btn,
        .register-btn {
            background-color: yellow;
            color: black;

            padding: 5px;
            width: 100px;
            border-radius: 8px;

            text-align: center;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="wrapper m-3 ml-4">
        <div class="header d-inline-flex">
            <img style="height: 70px;" class="img-header" src="{{ asset('assets/Group 1.svg') }}">
            <h3 class="card-title ml-3 mt-3 text-light">OmahKunci</h3>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row mt-5">
                        <div class="col">
                            <div class="wrapper-inline d-inline-flex">
                                <h2 class="card-title text-light mr-3">Amankan Lingkungan anda bersama</h2>
                                <h2 style="color: #FAE511" class="card-title">OmahKunci</h2>
                            </div>
                            <p class="card-text w-75 text-light">
                                "Aplikasi Pengelolaan Toko OmahKunci"
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div style="margin-left: -30px;" class="flex-center position-ref full-height mt-3 link-wrapper">
                                @if (Route::has('login'))
                                <div class="d-inline-flex ml-3">
                                    @auth
                                    <a class="nav-link home-btn m-3" href="{{ url('/redirecting') }}">Beranda</a>
                                    @else
                                    <a class="nav-link login-btn mr-3" href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                    <a class="nav-link register-btn" href="{{ route('register') }}">Register</a>
                                    @endif
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <img style="height: 330px; margin-left: 60px; margin-top: 90px;" src="{{ asset('assets/security.svg') }}">
                </div>
            </div>
            <div style="width: 1210px;" class="row mt-5">
                <footer style="width: 1600px; margin-left:-80px; margin-top: 13px; padding: 20px;">
                    <p class="card-text text-center text-light mt-2">
                        Copyright © 2022 Omah Kunci. All rights reserved.
                    </p>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>