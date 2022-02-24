@php
$whoactive = "riwayattransaksi"
@endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi')



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
        <input class="search-box " type="text" placeholder="Ketik Nomer Nota" name="no_nota">
        <button class="search-icon"><i class="fas fa-search ml-1 "></i></button>
    </div>
</div>
</form>

<div class="row">
    <h5 class="date">Hari Ini</h5>
</div>

@foreach($data as $datas)
<div class="card datatrans" id_trans="{{$datas['kode_trans']}}">
    <div class="card-header">
        <h6 class="card-title float-right mr-2">{{date('d M Y', strtotime($datas['created_at']))}}</h6>
    </div>
    <input type="hidden">
    <table class="table table-borderless text-center">
        <tr>
            <th style="width: 40px; margin-left:9px;">
                <div>No</div>
            </th>
            <th style="width: 300px">
                <div>Nama Pelanggan</div>
            </th>
            <th style="width: 130px">
                <div>Total Tagihan</div>
            </th>
            <th style="width: 130px">
                <div>Status</div>
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
            <td>
                <div class="{{$datas['status'] == 'belum lunas' ? 'bg-danger' : 'bg-success'}} rounded-pill ">{{$datas['status']}}</div>
            </td>
            <td>
                <div><i style="background-color:#1562AA; color:white; padding:10px; border-radius:100%;" class="fa fa-list"></i></div>
            </td>
        </tr>
    </table>
</div>
@endforeach
</div>
@endsection
