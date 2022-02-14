@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">STOK</h1>
@stop

@section('adminlte_js')
  <script src="{{asset('/js/stok.js')}}"></script>
@stop
    
@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalstok">Tambah Stok Baru</button>
<div>
    <table class="table table-striped table-dark m-3">
        <thead>
            <tr>
                <th>NO</th><th>kode_produk</th><th>Nama Produk</th><th>jumlah</th><th>tanggal dibuat</th><th>tanggal diperbarui</th><th></th>
            </tr>
        </thead>
        <tbody id="stokfiller">
        @php
        $no = 1
        @endphp
        @foreach($data as $datas)
            <tr>
                <td>{{$no}}</td><td>{{$datas->kode_produk}}</td><td>{{$datas->nama_produk}}</td><td>{{$datas->jumlah}}</td><td>{{$datas->created_at}}</td><td>{{$datas->updated_at}}</td><td align='right'><button class="btn btn-warning mr-3 editstok" kode_stok="{{$datas->id}}"><i class='fa fa-edit'></i></button><button class='btn btn-danger hapusstok' kode_stok="{{$datas->id}}"><i class='fa fa-trash'></i></button></button></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>


<div class="modal fade" id="modalstok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulmodalmerek">STOK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>

@stop
