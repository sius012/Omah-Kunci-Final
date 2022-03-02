@php
$whoactive = "riwayattransaksi";
$master='kasir';
@endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi')
@section('title', 'Riwayat Transaksi')




@section('css')
<link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">

@endsection
@section('js')
<script src="{{ asset('js/transaksi.js') }}"></script>
@stop
@section('content')
<form action="/caritransaksi" type="get">
    @csrf
<div class="row">
    <div class="col-12">
        <input class="search-box " type="text" placeholder="Ketik Nomor Nota..." name="no_nota">
        <button style="border:none; background-color:transparent;"><i class="fas fa-search ml-1 search-icon"></i></button>
    </div>
</div>
</form>

<div class="row">
    <h5 class="date">Hari Ini</h5>
</div>

@foreach($data as $datas)
<div class="card datatrans p-3" id_trans="{{$datas['kode_trans']}}">
    <input type="hidden">
    <table class="table table-borderless text-center">
        <tr class="mb-0">
            <th style="width: 40px; margin-left:9px;">
                <div>No</div>
            </th>
            <th style="width: 200px">
                <div>Nama Pelanggan</div>
            </th>
            <th style="width: 200px">
                <div>Total Tagihan</div>
            </th>
            <th style="width: 200px">
                <div>Status</div>
            </th>
            <th style="width:170px;">
                <div>Tanggal Transaksi</div>
            </th>
            <th rowspan="2" style="width:120px;">
                <div class="mt-3">@if(Auth::user()->roles[0]['name'] == 'manager')<a href="{{route('hapustransaksi',['id'=>$datas['kode_trans']])}}" class="btn btn-danger hapustrans"><i style="" class="fa fa-trash"></i></a>@endif</div>
            </th>
        </tr>
        <tr>
            <td style="width: 60px">
                <div>{{$datas["no_nota"]}}</div>
            </td>
            <td>
                <div>{{$datas["nama_pelanggan"]}}</div>
            </td>
            <td>
                <div>Rp. {{number_format($datas["subtotal"])}}</div>
            </td>
            <td class="d-flex align-items-center justify-content-center">
                <div style="width:120px;" class="{{$datas['status'] == 'belum lunas' ? 'bg-danger' : 'bg-success'}} rounded-pill">{{$datas['status']}}</div>
            </td>
            <td>
                <div>{{date('d M Y', strtotime($datas['created_at']))}}</div>
            </td>
        </tr>
    </table>
</div>
@endforeach
</div>
@endsection
