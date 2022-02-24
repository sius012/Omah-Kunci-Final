<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/request.css') }}">

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
        <form action="{{ route('register') }}" method="POST">
            @csrf
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-2 namalengkap">
                <label for="namalengkap" class="form-label text-light font-weight-bold">Username</label>
                <input id="namalengkap" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>
            
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-2 username">
                <label for="username" class="form-label text-light">Email</label>
                <input type="text" class="form-control" id="username" name="email">
            </div>
            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-2 katasandi">
                <label for="katasandi" class="form-label text-light">Kata Sandi</label>
                <input id="katasandi" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>
        </div>
        <div class="col d-flex align-items-center justify-content-center">
            <div class="mb-3 konfirmasi">
                <label for="konfirmasi" class="form-label text-light">Konfirmasi Kata Sandi</label>
                <input id="konfirmasi" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        <div class="col d-flex align-items-center justify-content-center">
            <button type="submit" class="request-akun" href="">Request Akun</button>
        </div>
        <a class="text-light d-flex align-items-center justify-content-center mt-2" href="{{ url('/login') }}">Sudah Punya Akun?</a>
        </form>
      
    </div>
</body>
</html>