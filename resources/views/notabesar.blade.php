@php $whoactive='notabesar' @endphp
@extends('layouts.layout2')

@section('titlepage', 'Nota Besar')

@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/transaksi.js') }}"></script>
<script src="{{ asset('js/notabesar.js') }}"></script>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/notabesar.css')}}">
@stop

@section('content')
<div class="container-fluid ">
  <div class="col">
  <div class="form-group">
      <input type="text" id="searcher-nota" class="form-control" placeholder="Cari Nomer Nota">
      <ul id="myUL">
      </ul>
    </div>
  </div>
   
    <div class="col">
    <form id="preorderform" action="/tambahpreorder">
    <input type="hidden" id="id_trans" val="0">
    <h4 id="tt" class="mt-5">Tanda Terima</h4>
    <i><h4 style="color:#747474;" id="nn" class="mb-5">No Nota : 001</h4></i>




     <div class="form-group">
    <label for="exampleInputEmail1">Tanggal </label>
    <input type="date" class="form-control form-control-" id="tgl" value="{{date('Y-m-d')}}">
  </div>
    <br>
<div class="row" id="baseinputnb">
<div class="col">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Telah diterima dari</label>
    <input type="text" class="form-control" id="ttd" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">UP</label>
    <input type="text" class="form-control" id="up" >
  </div>
  <div class="form-group td">
    <label for="exampleInputPassword1">Telah Dibayar</label>
    <input type="number" class="form-control" id="td" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Uang sejumlah</label>
    <input type="number" class="form-control" id="us" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Berupa</label>
    <input type="text" class="form-control" id="brp" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Guna Membayar</label>
    <input type="text" class="form-control" id="gm" >
  </div>

  

</div>
<div class="col">
  <div class="form-group">
    <label for="exampleInputPassword1">Total</label>
    <input type="number" class="form-control" id="total"  >
  </div>
  <div class="form-group opsigrup">
    
    <input type="text" class="form-control form-control-sm title1" id="exampleInputPassword1" >
    <input type="text" class="form-control isi1" id="exampleInputPassword1" >
  </div>
  <a class="btn btn-primary" id="addopsi">+</a>
</div>
<div class="col">
 

</div>
</div>
    </div>
</div>
<div class="row">

 <button class="btn btn-primary m-3" id="buttonsubmit">Tambah</button>
</div>
</form>
<div class="row">
<button class="btn btn-warning m-3" id="printbutton" ><i class="fa fa-print"></i></button>
</div>
<div class="row">
<button class="btn btn-primary m-3" id="resetbutton"><i class="fa fa-back"></i>Kembali</button>
</div>
@stop
