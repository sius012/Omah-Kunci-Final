@php  $whoactive = "";
$master='accountsetting' ;@endphp
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
                    <div class="wrapper ml-2">
                        <div class="row">
                        <img class="rounded-circle profile-img" src="{{asset('assets/pp/default.png')}}" alt="">
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
                                    <h6 class="card-title times"><b>Tanggal Dibuat : </b>{{date('d-M-Y',strtotime(Auth::user()->created_at))}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div style="margin-left: -20px;" class="col-8">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group">
                                    <label for="nama">Nama Pengguna</label>
                                    <div class="ml-0 row">
                                        <input type="text" class="form-control nama-input" id="nama" name="nama" value="{{Auth::user()->name}}">
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">Nama harus terdiri dari 8 karakter.</small>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control password-input" id="pass" name="pass" value="inipasswordbuatomahkuncidarianakbn">
                                    <small id="emailHelp" class="form-text text-muted">Password hanya dapat diubah oleh Manager.</small>
                                </div>
                                <div class="form-group">
                                    <div class="card bg-light text-dark card-wrapper">
                                          <div class="form-group">
                                            <label class="ml-2" for="email">Email</label>
                                            <div class="row">
                                                <input type="text" class="form-control ml-4 mr-1 w-75" id="email" name="email" value="theodhore@gmail.com">
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
