@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Produk</h1>
@stop

@section('content')
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo moda
</button>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->


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
    <label for="exampleInputEmail1" class="form-label">Kode produk</label>
    <input type="text" class="form-control" id="kode-produk" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="nama-produk" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Merek Barang</label>
    <select name="" id="merek-produk" class="form-control">
    @foreach($merek as $merks)
        <option value="{{$merks->nomer}}">{{$merks->merek}}</option>
      @endforeach
    </select>
 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kategori</label>
    <select name="" id="kategori-produk" class="form-control" required>
      @foreach($kat as $kats)
        <option value="{{$kats->id_kategori}}">{{$kats->kategori}}</option>
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








<!-- tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Produk</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Merek</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Kategori</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
     <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalproduk"> Tambah Produk</button> 

      <table class="table table-striped table-light mt-5">
        <thead>
          <tr>
            <th>Nomer Produk</th><th>Nama</th><th>Merek</th><th>Kategori</th><th>Harga</th><th>Satuan</th>
          </tr>
        </thead>
        <tbody id="produkfiller">
            @foreach($produk as $produks)
            <tr>
              <td>{{$produks->kode_produk}}</td><td>{{$produks->nama_produk}}</td><td>{{$produks->merk}}</td><td>{{$produks->kategori}}</td><td>{{$produks->harga}}</td><td>{{$produks->stn}}</td><td><button class="btn btn-success editbarang"><a href="" kode-produk="{{$produks->kode_produk}}"><i class="fa fa-edit"></i></a></button><button class="btn btn-danger hapusbarang  "><a href="" kode-produk="{{$produks->kode_produk}}"><i class="fa fa-edit"></i></a></button>
            @endforeach
        </tbody>
      </table>


  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalmerek"> Tambah Merek Baru</button> 
  
  
  <table class="table table-striped table-light mt-5">
  <thead>
    <tr>
      <th>Nomor</th><th>Nama Merek</th><td></td>
    </tr>
  </thead>
  <tbody id="merekfiller">
  @foreach($merek as $merks)
    <tr>
      <td>{{$merks->nomer}}</td><td>{{$merks->merek}}</td><td align='right'><button class="btn btn-warning merekedit" nomer="{{$merks->nomer}}"><i class="fa fa-edit"></i></button><button class="btn btn-danger m-3 merekhapus" nomer="{{$merks->nomer}}"><i class="fa fa-trash"></i></button></td>
    </tr>

  @endforeach
  </tbody>
  </table>
  
  
  
  
  
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalkategori"> Tambah Kategori</button> 

<table class="table table-striped table-light mt-5">
  <thead>
    <tr>
      <th>Nomer Kategori</th><th>Kategori</th><th></th>
    </tr>
  </thead>
  <tbody id="produkfiller">
      @foreach($kat as $kats)
      <tr>
        <td>{{$kats->id_kategori}}</td><td>{{$kats->kategori}}</td><td align="right"><button class="btn btn-warning mr-3"><i class="fa fa-edit"></i></button><button class="btn btn-danger"><i class="fa fa-edit"></i></button></td>
      @endforeach
  </tbody>
</table>
  
  </div>
</div>
<!-- endtabs -->









<!-- modal merek -->
<div class="modal fade" id="modalmerek" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodalmerek">Tambah Merek</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/tambahmerek" id="submittermerek">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nomer Merek</label>
    <input type="text" class="form-control" id="nomermerek" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Merek</label>
    <input type="text" class="form-control" id="namamerek" aria-describedby="emailHelp" required>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>




<div class="modal fade" id="modalkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodalmerek">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/hel" id="submitterkategori">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nomor Kategori</label>
    <input type="text" class="form-control" id="nokat-input" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kategori</label>
    <input type="text" class="form-control" id="kategori-input" aria-describedby="emailHelp" required>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>








@php
  

@endphp

@stop
