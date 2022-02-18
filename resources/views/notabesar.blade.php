@php $whoactive='notabesar' @endphp
@extends('layouts.layout2')

@section('titlepage', 'Nota Besar')


@section('js')
<script src="{{ asset('js/transaksi.js') }}"></script>
<script src="{{ asset('js/notabesar.js') }}"></script>
@stop
@section('content')
<form id="preorderform">
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

<div class="row">
            

            <div class="col-4 option">
                <div class="row options">
                    <div class="col-2 mt-3">
                        <button class="selesai ml-4" href="#" type="submit">Selesai</button>
                    </div>
                </div>
                </form>
                <div class="row options">
                    <div class="col-2">
                        <a href="" class="btn btn-danger" id="resetbutton">RESET</a>
                    </div>
                </div>
            </div>
        </div>



@stop
