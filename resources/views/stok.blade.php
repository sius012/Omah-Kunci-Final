@php $whoactive = 'stok';
$master='admingudang';
@endphp
@extends('layouts.layout2')

@section('pagetitle', 'Katalog')
@section('title', 'Katalog')



@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{asset('/js/stok.js')}}"></script>
<script>
  $(document).ready(function(){
    $(".btnClose").click(function(){
      $("#modaluploader").modal("hide");
    });

    $(".btnClosed").click(function(){
      window.location = "/stok";
    });
  });
</script>
@stop
    
@section('content')
<div class="card">
<div class="card-header"><h3>Kelola Stok <i class='fas fa-box ml-2'></i></h3>
<div class="card-body">
<button type="button m-3" class="btn btn-primary" data-toggle="modal" data-target="#modalstok">Tambah Stok Baru</button>
<button type="button m-3" class="btn btn-warning"  id="generatestok" ><i class="fas fa-upload"></i>Produk ke Stok</button>
<a class="btn btn-warning float-right" href="#" id="stokprint"><i class="fa fa-print mr-2"></i>Print</a>
<div>

    <table class="table mt-3 ">
        <thead>
            <tr class="text-center">
                <th>NO</th><th>kode_produk</th><th>Nama Produk</th><th>jumlah</th><th>tanggal dibuat</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody id="stokfiller">
        @php
        $no = 1
        @endphp
        @foreach($data as $datas)
            <tr class="text-center">
                <td>{{$no}}</td><td>{{$datas->kode_produk}}</td><td>{{$datas->nama_produk}}</td><td>{{$datas->jumlah}}</td><td>{{$datas->created_at}}</td>@if(auth()->user()->roles[0]['name'] == "manager")<td align='center'><button class="btn btn-warning mr-3 editstok" kode_stok="{{$datas->id}}"><i class='fa fa-edit'></i></button>@endif<button class='btn btn-danger hapusstok' kode_stok="{{$datas->id}}"><i class='fa fa-trash'></i></button></button></td>
            </tr>
            @php $no++ @endphp
        @endforeach

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
        <button type="button" class="close btnClosed" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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
        <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close">
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
        <button type="button" class="btn btn-secondary btnClose"  data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="uploadbuttonstok">Upload(<b id="stoklessbutton"></b>)</button>
      </div>
    </div>
  </div>
</div>

@stop
