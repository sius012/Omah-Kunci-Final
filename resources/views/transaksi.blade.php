@php
$whoactive = "riwayattransaksi";
$master='kasir';
$hastoday = false;
$haslampau = false;
@endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi')
@section('title', 'Riwayat Transaksi')




@section('css')
<link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">

@endsection
@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/transaksi.js') }}"></script>

@stop
@section('content')
<form action="/caritransaksi" type="get">
    @csrf
<div class="row">
    <div class="col-12">
        <input class="search-box " type="text" placeholder="Ketik Nomor Invoice..." name="no_nota">
        <button style="border:none; background-color:transparent;"><i class="fas fa-search ml-1 search-icon"></i></button>
    </div>
</div>
</form>


<div class="card">
    <table>
        <tr>
            <td >dddd</div></td>
            <td>Nama</td>
            <td>Total</td>
            <td>Dibayar</td>
            <td>Inv</td>
        </tr>
        <tr>
            <th>0101000</th>
            <th>Dionisius</th>
            <th>Rp. 400</th>
            <th>Rp. 5000</th>
            <th>100</th>
        </tr>
    </table>
</div>

@foreach($data as $datas)
@if(\Carbon\Carbon::parse($datas['created_at'])->isToday() == 1 and $hastoday == false)
<h4>Hari Ini</h4>
@php $hastoday=true @endphp
@elseif(\Carbon\Carbon::parse($datas['created_at'])->isToday() == 0 and $haslampau == false)
<h4>Sebelumnya</h4>
@php $haslampau=true @endphp
@endif
<div class="card">
<div class="container">
  <div class="row">
  <div class="col text-center"><div style="width: 120px;">Inv.</div></div>
    <div class="col text-center"><div style="width: 120px;"     >Nama</div></div>
    <div class="col text-center"><div style="width: 120px;">Tagihan</div></div>
    <div class="col text-center"><div style="width: 150px;">Dibayar</div></div>
    <div class="col text-center"><div style="width: 150px;">Status</div></div>
    <div class="col text-center"><div style="width: 200px;">Coba Aja</div></div>
    
    <div class="w-100"></div>
    <div class="col text-center"><div style="width: 120px;">{{$datas['no_nota']}}</div></div>
    <div class="col text-center"><div style="width: 120px;">Coba Aja</div></div>
    <div class="col text-center"><div style="width: 120px;">Coba Aja</div></div>
    <div class="col text-center"><div style="width: 150px;">Coba Aja</div></div>
    <div class="col text-center"><div style="width: 150px;">Coba Aja</div></div>
    <div class="col text-center e"><div style="width: 200px;" class=""> @if(Auth::user()->roles[0]['name'] == 'manager' and $datas["status"]!="draf") <div class="d-inline-flex"><a id_trans="{{$datas['kode_trans']}}" class="btn btn-warning printing btn-sm"><i style="" class="fa fa-print"></i></a><a id_trans="{{$datas['kode_trans']}}" class="btn btn-danger btn-sm returntrans"><i style="" class="fa fa-undo"></i></a></div>@endif</div></div>
  </div>
</div>
</div>
@endforeach

<div class="modal fade bd-example-modal-lg" tabindex="-3" role="dialog" id="returnform">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Return Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Ini adalah daftar barang yang dibeli</p>
        <form action="{{route('doreturn')}}" method="post">
        @csrf
        <input type="hidden" id="id_trans" name="id_trans">
        <table class="table table-borderless table-stripped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th style="width: 400px;">Nama dan Merek</th>
                    <th>Harga</th>
                    <th style="width: 110px;">Diskon(/pcs)</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>

            </thead>
            <tbody id="returncont">
            
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cetak</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Kembalikan</button>
</form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
