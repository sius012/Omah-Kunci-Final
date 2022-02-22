@php
  $whoactive='produk';
  $no = 1;
@endphp
@extends('layouts.layout2')

@section('titlepage', 'Produk')

@section('js')
<script src="{{ asset('js/produk.js') }}"></script>
@stop
@section('content')


<div class="card">
  <div class="card-header">
      <p class="card-title">Data Produk</p>
  </div>
  <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalproduk">
          Tambah Produk <i class="fa fa-plus ml-2"></i>
        </button>
      <table class="table table-striped mt-5 table-bordered">
        <thead>
            <tr>
              <th>No</th>
              <th>Barcode</th>
              <th>Nama Produk</th>
              <th>Tipe</th>
              <th>Tipe Kode</th>
              <th>Merek</th>
              <th>Harga</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach($produk as $produks)
          <tr>
          <td>{{$no}}</td>
              <td>{{$produks->kode_produk}}</td>
              <td>{{$produks->nama_produk}}</td>
              <td>{{$produks->id_kategori == 1 ? "ACC PINTU" : "Not Handler"}}</td>
              <td>{{$produks->id_ct}}</td>
              <td>{{$produks->merk}}</td>
              <td>Rp. {{number_format($produks->harga)}}</td>
              <td align="center"><button class="btn btn-warning" href=""><i class="fa fa-edit"></i></button><button class="btn btn-danger m-3" href=""><i class="fa fa-trash"></i></button></button></td>
          </tr>
          @php $no++ @endphp
          @endforeach
        </tbody>
      </table>
  </div>
</div>


<!-- Button trigger modal -->


<!-- Modal Tambah/Edit Produk-->
<div class="modal fade tambahbarangform" id="modalproduk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Produksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/updateproduk" id="submitterproduk">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="nama-produk" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Merek Barang</label>
    <select name="" id="merek-produk" class="form-control">
        @foreach ($merek as $merks)
            <option value="{{$merks->merk}}">{{$merks->merk}}</option>
        @endforeach
    </select>
 
  </div>
  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">No Merek</label>

          <input type="number" class="form-control" required id="nomer-merek">
     
   
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kategori</label>
    <select name="" id="kategori-produk" class="form-control" required>
        @foreach ($kat as $kats)
          <option value="{{$kats->id_kategori}}">{{$kats->id_kategori}}</option>
       @endforeach
    </select>
  </div>
  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipe Kode</label>
      <select name="" id="tipe-kode" class="form-control" required>
          @foreach ($kodetype as $kt)
            <option value="{{$kt->id_ct}}">{{$kt->id_ct}}</option>
         @endforeach
      </select>
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga-produk" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Satuan</label>
    <input type="text" class="form-control" id="satuan-produk" aria-describedby="emailHelp">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div>
  
</div>













@php
  

@endphp

@stop
