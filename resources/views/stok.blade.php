@php $whoactive = 'stok';
$master='admingudang';
@endphp
@extends('layouts.layout2')

@section('title', 'Katalog')



@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/stok.js') }}"></script>

@stop
    
@section('content')
<div class="card">
<div class="card-header"><h3><i class='fas fa-box mr-2'></i>Kelola Stok</h3>
<div class="card-body">
<div class="wrapper">
<form action="{{route('stok')}}" method="GET">
                @csrf
                <h5 class="card-title">Cari Berdasarkan : </h5>
                <br>
                <div class="wrappers d-inline-flex mt-3">
                <div class="form-group d-inline-flex">
                    <select name="tipe" id="tipe" class="form-control dynamic w-50 form-control-sm mr-5" data-dependent = "state">
                        <option value="">TIPE</option>
                        @foreach($tipe as $tipes)
                            <option value = "{{$tipes->id_tipe}}">{{$tipes->nama_tipe}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-left: -100px;" class="form-group d-inline-flex">
                    <select name="kodetipe" id="kodetipe" class="form-control dynamic w-75 form-control-sm" data-dependent = "state">
                        <option value="">TIPE KODE</option>
                        @foreach($kodetype as $kt)
                            <option value="{{$kt->id_kodetype}}">{{$kt->nama_kodetype}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-left: -40px;" class="form-group d-inline-flex">
                    <select name="merek" id="merek" class="form-control dynamic w-75 form-control-sm" data-dependent = "state">
                        <option value="">MEREK</option>
                        @foreach($merek as $merks)
                            <option value="{{$merks->id_merek}}">{{$merks->nama_merek}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-left: -15px;" class="form-group d-inline-flex">
                    <select name="jumlahstok" id="jumlahstok" class="form-control dynamic w-100 form-control-sm" data-dependent = "state">
                        <option value="">Jumlah Stok</option>
  
                            <option value="ps">Paling Sedikit</option>
                            <option value="pb">Paling Banyak</option>
                            <option value="hbs">Stok Habis</option>
                    </select>
                </div>
                </div>
              <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fa fa-search"></i></button>
            </div>
</form>

<button type="button m-3" class="btn btn-primary"  id="generatestok" ><i class="fas fa-upload mr-2"></i>Produk ke Stok</button>
<a class="btn btn-primary float-right" href="#" id="stokprint"><i class="fa fa-print mr-2"></i>Print</a>
<div>

    <table class="table table-striped mt-3 table-bordered ">
        <thead class="thead-dark">
            <tr class="text-center">
                <th style="width: 50px">NO</th>
                <th>Tipe</th>
                <th>Tipekode</th>
                <th>Merek</th>
                <th style="width:100px">Kode Produk</th>
                <th align="left" class="w-25" style="text-align: left">Nama Produk</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody id="stokfiller">
        @php
        $no = 1
        @endphp
        @forelse($data as $datas)
            <tr class="text-center">
                <td>{{$no}}</td>
                <td>{{$datas->nama_tipe}}</td>
                <td>{{$datas->nama_kodetype}}</td>
                <td>{{$datas->nama_merek}}</td>
                <td>{{$datas->kode_produk}}</td>
                <td align="left">{{$datas->nama_produk}}</td>
                
                
                
                <td>{{$datas->jumlah}} {{$datas->satuan}}</td>
            </tr>
            @php $no++ @endphp
        @empty
            <h3 class="mb-3 mt-3">Tidak Ditemukan</h3>
          
        @endforelse

        </tbody>
    </table>
</div>
</div>
</div>


<div class="modal fade" id="modalstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodalmerek">STOK</h5>
        <button type="button btnClosed"  aria-label="Close">
          <span  class="close "  aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/tambahstok" id="submitterstok">
      <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Produk</label>
    <select name="" id="kodeproduk-input" class="form-control">
      @foreach($produk as $produks)
        <option value="{{$produks->kode_produk}}">{{$produks->kode_produk}} {{$produks->nama_produk}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Jumlah</label>
    <input type="number" class="form-control" id="jumlahproduk-input" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal</label>
    <input type="date" class="form-control" id="tgl-input" aria-describedby="emailHelp" required>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btnClosed" id="close" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary tombolsubmit">Ubah</button>
      </div>
      </form>
    </div>
  </div>
  
</div>


<div class="modal fade" id="modaluploader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produk Ke katalog</h5>
        <button type="button" class="close btnClosed" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="jp"> </p>
        <p id="kat"> </p>
        <p id="bt"> </p>

        <p>yang belum masuk katalog</p>
        <ul id="ktless">
          <li></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btnClosed"  data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="uploadbuttonstok">Upload(<b id="stoklessbutton"></b>)</button>
      </div>
    </div>
  </div>
</div>

@stop
