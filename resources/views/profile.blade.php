@php  $whoactive = "" @endphp
@extends('layouts.layout2')

@section('title', 'Kasir || Omah Kunci')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <img class="rounded-circle profile-img" src="https://pbs.twimg.com/profile_images/1315683257057378306/hQBTQk3Y_400x400.jpg" alt="">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="wrapper-roles">
                                    <h6 class="card-title roles"><b>Role : </b>{{Auth::user()->roles[0]['name']}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="wrapper-times">
                                    <h6 class="card-title times"><b>Tanggal Dibuat : </b>{{date('d M Y', strtotime(Auth::user()->created_at))}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="wrapper-saves mt-4">
                                    <a class="saves" href="#">Simpan Perubahan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group">
                                    <label for="nama">Nama Pengguna</label>
                                    <div class="ml-0 row">
                                        <input type="text" class="form-control nama-input" id="nama" name="nama" placeholder="Theodhore Riyanto" value="{{auth()->user()->name}}">
                                        <a href="#"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">Nama harus terdiri dari 8 karakter.</small>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control password-input" id="pass" name="pass" value="lol">
                                    <small id="emailHelp" class="form-text text-muted">Password hanya dapat diubah oleh Manager.</small>
                                </div>
                                <div class="form-group">
                                    <div class="card bg-light text-dark card-wrapper">
                                        <div class="form-group">
                                            <label class="mt-1 ml-2" for="telp">Nomor Telepon</label>
                                            <div class="row">
                                                <input type="text" class="form-control ml-4 mr-1 w-75" id="telp" name="telp" placeholder="08124124123">
                                                <a href="#"><i class="fa fa-edit"></i></a>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="ml-2" for="email">Email</label>
                                            <div class="row">
                                                <input type="text" class="form-control ml-4 mr-1 w-75" id="email" name="email" placeholder="theodhore@gmail.com">
                                                <a href="#"><i class="fa fa-edit"></i></a>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="ml-2" for="kode-kasir">Kode Kasir</label>
                                            <div class="row">
                                                <input type="text" class="form-control ml-4 mr-1 w-75" id="kode-kasir" name="kode-kasir" placeholder="k-24234">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


{{-- <div class="card bg-light text-dark">
    <div class="form-group">
        <label for="formGroupExampleInput">Example label</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Another label</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
      </div>
</div> --}}