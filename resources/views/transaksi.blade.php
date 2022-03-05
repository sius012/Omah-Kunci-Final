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
        <input class="search-box " type="text" placeholder="Ketik Nomor Nota..." name="no_nota">
        <button style="border:none; background-color:transparent;"><i class="fas fa-search ml-1 search-icon"></i></button>
    </div>
</div>
</form>



@foreach($data as $datas)
@if(\Carbon\Carbon::parse($datas['created_at'])->isToday() == 1 and $hastoday == false)
<h4>Hari Ini</h4>
@php $hastoday=true @endphp
@elseif(\Carbon\Carbon::parse($datas['created_at'])->isToday() == 0 and $haslampau == false)
<h4>Sebelumnya</h4>
@php $haslampau=true @endphp
@endif
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
            <div class="mt-3"><a id_trans="{{$datas['kode_trans']}}" class="btn btn-warning printing"><i style="" class="fa fa-print"></i></a></div>
                <div class="mt-3">@if(Auth::user()->roles[0]['name'] == 'manager')<a href="{{route('hapustransaksi',['id'=>$datas['kode_trans']])}}" id_trans="{{$datas['kode_trans']}}" class="btn btn-danger returntrans"><i style="" class="fa fa-undo"></i></a>@endif</div>
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

<div class="modal fade" tabindex="-3" role="dialog" id="returnform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Return Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Ini adalah daftar barang yang dibeli</p>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama dan Merek</th>
                    <th>harga</th>
                    <th>diskon(/pcs)</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>

            </thead>
            <tbody id="returncont">
                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
