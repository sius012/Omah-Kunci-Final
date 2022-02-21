<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toko_kunci/request.css') }}">

    <title>Omah Kunci || Account Request</title>
</head>
<body>
    <div class="container">
        <div class="col d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/Group 1.svg') }}" alt="">
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <h3 class="font-weight-bold mt-1">Omah Kunci</h3>
        </div>

        <br>

        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-2 namalengkap">
                <label for="namalengkap" class="form-label text-light font-weight-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="namalengkap">
            </div>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-2 username">
                <label for="username" class="form-label text-light">Username</label>
                <input type="text" class="form-control" id="username">
            </div>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-2 katasandi">
                <label for="katasandi" class="form-label text-light">Kata Sandi</label>
                <input type="text" class="form-control" id="katasandi">
            </div>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-3 konfirmasi">
                <label for="konfirmasi" class="form-label text-light">Konfirmasi Kata Sandi</label>
                <input type="text" class="form-control" id="konfirmasi">
            </div>
        </div>

        <div class="col d-flex align-items-center justify-content-center">
            <a class="request-akun" href="#">Request Akun</a>
        </div>
        <a class="text-light d-flex align-items-center justify-content-center mt-2" href="{{ url('/login') }}">Sudah Punya Akun?</a>
    </div>
</body>
</html>