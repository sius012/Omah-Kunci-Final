@php $whoactive = "manajemen akun" @endphp
@extends('layouts.layout2')

@section('pagetitle', 'Manajemen Akun')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manajemen_akun.css') }}">
<link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
<style>

</style>


@stop
@section('js')
<script src="{{ url('js/dsm.js') }}"></script>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col">
            <div class="row d-inline-flex">
                <h5 class="card-title mt-3">Manajemen Akun</h5>
                <input type="text" class="form-control w-25 float-right">
            </div>
        </div>
    </div>
</section>
@stop
