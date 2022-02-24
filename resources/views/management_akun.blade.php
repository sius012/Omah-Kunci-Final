@php  $whoactive = "" @endphp
@extends('layouts.layout2')

@section('title', 'Kasir || Omah Kunci')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/manajemen_akun.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col">
            <div class="row">
                <div class="col-6">
                    <h2 class="card-title">Manajemen Akun</h2>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control w-50 float-right">
                </div>
            </div>
        </div>
    </div>
</section>
@stop