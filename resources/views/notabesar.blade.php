@php $whoactive='notabesar' @endphp
@extends('layouts.layout2')

@section('titlepage', 'Nota Besar')

@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/transaksi.js') }}"></script>
<script src="{{ asset('js/notabesar.js') }}"></script>
@isset($id)
<script>
  $(document).ready(function(e){
    var jmlopsi = 1;
    console.log("{{'lol'}}");

    function callbacking(response){
        jmlopsi = response;
    
    }

    $("#searcher-nota").attr("disabled", "disabled");
    $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name=csrf-token]").attr('content'),
            },
            data: {
                id_transaksi : "{{$id}}",
            },
            url: "/getnb",
            type: "post",
            dataType: "json",
            success: function(data){
                console.log(data);
                $("#tt").text(data["nb"][0]["termin"] == 3 ? "PELUNASAN" : "Termin: "+data["nb"][0]["termin"]);
                $("#baseinputnb .col").show();
                $("#baseinputnb input, label").show();
                $("#ttd").  val(data['nb'][0]['ttd']);
                $("#up").   val(data['nb'][0]['up']);
                $("#us").   val(data['nb'][0]['us']);
                $("#brp").  val(data['nb'][0]['brp']);
                $("#gm").   val(data['nb'][0]['gm']);
                $("#total").val(data['nb'][0]['total']);
                $("#nn").text("No Nota: "+data["nb"][0]["no_nota"]);
    
    
                let row = data["opsi"].map(function(e,i){
                    return `
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm title${i+1}" id="exampleInputPassword1" value="${e['judul']}">
                        <input type="text" class="form-control isi${i+1}" id="exampleInputPassword1" value="${e['ket']}">
                    </div>
                    `;
                    
                });

                callbacking(data['opsi'].length);
                $(".opsigrup").html(row);

                $("#buttonsubmit").text("Bayar");
                $("#preorderform").attr("action", "/bayarpreorder");
                $("#id_trans").val(data["nb"][0]["id_transaksi"]);
                $(".td").show();
                $(".td").children("input").val(data["td"]);
                $("#addopsi").hide();
                if(data["nb"][0]["status"] == "dibayar"){
                    $("#buttonsubmit").attr("disabled", "disabled");
                    $("#buttonsubmit").text("Sudah Lunas");
                    $("#buttonsubmit").removeClass("btn-primary");
                    $("#buttonsubmit").addClass("btn-success");
                
                }else{
                    $("#buttonsubmit").removeAttr("disabled");
                    $("#buttonsubmit").removeClass("btn-success");
                    $("#buttonsubmit").addClass("btn-primary");
                    $("#buttonsubmit").text("Bayar");
                }
            },
            error: function(err){
                alert(err.responseText);
            }
        });
  });
</script>

@endisset
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
