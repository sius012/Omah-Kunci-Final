@php $whoactive='notabesar';
$master='kasir' @endphp
@extends('layouts.layout2')

@section('titlepage', 'Nota Besar')
@section('title', 'Nota Besar')

@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/transaksi.js') }}"></script>
<script src="{{ asset('js/notabesar.js') }}"></script>
@isset($id)
<script>
  $(document).ready(function(){
    $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $("meta[name=csrf-token]").attr('content'),
            },
            data: {
                id_transaksi : "{{$id}}"
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
                $("#tgl").val(data["nb"][0]["created_at"]);
    
    
                let row = data["opsi"].map(function(e,i){
                    return `
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm title${i+1}" id="exampleInputPassword1" value="${e['judul']}">
                        <input type="text" class="form-control isi${i+1}" id="exampleInputPassword1" value="${e['ket']}">
                    </div>
                    `;
                    
                });
      

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
                    $("#printbutton").removeAttr("disabled");
                
                }else{
                    $("#buttonsubmit").removeAttr("disabled");
                    $("#buttonsubmit").removeClass("btn-success");
                    $("#buttonsubmit").addClass("btn-primary");
                    $("#buttonsubmit").text("Bayar");
                    $("#printbutton").attr("disabled", "disabled");
                }
                $(".readonly").attr('readonly','readonly');
            },
            error: function(err){
                Swal.fire("error", "", "info");
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
   
    <input type="hidden" id="id_trans" val="0">
  


<div class="card">

  <div class="card-header"
  <form id="preorderform" action="/tambahpreorder">
  <h4 id="tt" class="m">Tanda Terima</h4><span id="nn" style="color:#747474;" class="mr-2"> No Nota : ?</span><i style="color:#747474;" class="fa fa-copy mr-3"></i>
  </div>
  <div class="card-body">
  <label for="notabesar">Tahap Pembayaran</label>
  <select name=""  class="custom-select mb-3" id="notabesar">
      <option value="pintugarasi">1</option>
      <option value="pintugadandp">2</option>
      <option value="pintugadandp">3</option>

 
    </select>
  <label for="notabesar">Pilih Nota Besar</label>
  <select name=""  class="custom-select mb-3" id="notabesar">
      <option value="pintugarasi">Pintu Garasi</option>
      <option value="pintugadandp">Pintu GA & DP </option>
      <option value="autog">Auto Gate & Auto Gate</option>
      <option value="upvc">UPVC</option>
      <option value="omge">OMGE</option>
    </select>
  <div class="form-group">
    <label for="exampleInputEmail1">Tanggal </label>
    <input type="date" class="form-control form-control-" id="tgl" value="{{date('Y-m-d')}}">
  </div>
    <br>
<div class="row" id="baseinputnb">
<div class="col">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Telah diterima dari</label>
    <input type="text" class="form-control readonly" id="ttd" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Untuk Proyek</label>
    <input placeholder="" type="text" class="form-control readonly" id="up" required>
  </div>
  <div class="form-group td">
    <label for="exampleInputPassword1">Telah Dibayar</label>
    <input type="text" class="form-control readonly" id="td"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Uang sejumlah</label>
    <input type="text" class="form-control uang" required id="us" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Berupa</label>
    <input type="text" class="form-control " required id="brp" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Guna Membayar</label>
    <input type="text" class="form-control readonly" id="gm" required>
  </div>

  

</div>
<div class="col">
  <div class="form-group">
    <label for="exampleInputPassword1">Total</label>
    <input type="text" class="form-control readonly uang" id="total" required >
  </div>
  <div class="form-group opsigrup">
    
    <input placeholder="Judul" type="text" class="form-control form-control-sm mb-3 title1 readonly" id="exampleInputPassword1"  >
    <input placeholder="Keterangan" type="text" class="form-control isi1 readonly" id="exampleInputPassword1" >
  </div>
</div>
<div class="col">


</div>
</div>
    </div>
    <div class="row ml-3 mb-3">
 <button type="submit" class="btn btn-primary" id="buttonsubmit">Kirim</button>

 <button class="btn btn-primary ml-2" id="resetbutton"><i class="fa fa-back"></i>Kembali</button>
 </form>
 <button class="btn btn-warning ml-2" id="printbutton" ><i class="fa fa-print mr-2"></i>Print</button>
</div>
</div>
  </div>
 

</div>



<script> 

$(document).ready(function(){


   

$(".uang").keyup(function(){
        $(this).val(formatRupiah($(this).val(),""))
});


function formatRupiah(angka, prefix){
var number_string = angka.replace(/[^,\d]/g, '').toString(),
split   		= number_string.split(','),
sisa     		= split[0].length % 3,
rupiah     		= split[0].substr(0, sisa),
ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

// tambahkan titik jika yang di input sudah menjadi angka ribuan
if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
}

rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}
});
</script>
@stop
