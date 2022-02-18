
<style>

        .cont{
            margin-top: -20px;
        }
        h3{
            font-family: "Brush 455";
        }
        span{
            font-family: "Brush 455";
        }
        .mulia{
            font-size: 35pt;
        
        }
       
        .trans:before{
            content: ' ';
            display: block;
            position: absolute;
            left: 15%;
            top: 2%;
            width: 75%;
            height: 50%;
            opacity: 0.2;
            background-image: url("{{public_path('nota/mj.png')}}");
            background-repeat: no-repeat;
            background-position: 40% 50%;
            background-size: 25rem;
        }

        .heading{
            left: 20px;
            margin: 0px;
        }
        .cont{
            width: 21.5cm;
            top: 0px;
        }

        .trans{
            width: 85%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .trans td{
            border: 1px solid black;
            padding: 2px;

        }
        .trans .null{
            padding: 10px;
        }
        .trans th{
            border: 1px solid black;
            padding: 10px;
        }
        table,hr{
            width: 90%;
            border-spacing: 0;
        }
        .row{
            padding: 0px;
        }
        h4{
            margin: 3px;
            font-size: 9.5pt;
        }
        .foot{
            margin: 10px;
        }
        .alamat{
            font-size: 10pt;
        }
        th{
            font-size: 10pt;
        }
        td{
            font-size: 10pt;
            padding: 0;
        }
        img{
            margin: 0px;
        }
    </style>
    <div class="cont m-3 ">
    <div class="container">
    <table>
        <tr>
            <td align="left">
                <div class="heading">
                <img src="{{public_path('img/mjlogotext.png')}}" alt="" width="200">
                

                </div>
        </tr>
    </table>
  <div class="row p-3">

   
 
    </div>
  </div>

  <hr class="line" size="30">

    <h4><b>NOTA</b>{{": "}}{{$trans[0]->no_nota}}</h4>


  <table class="table table-bordered trans" cellspacing=0 cellpadding="0">
  <thead>
        <tr>
            <th style="border:none;" colspan="4" align="left">Kepada: {{$trans[0]->pelanggan}} </th>
            <th style="border:none;" colspan="2">Tanggal: {{date('d-m-Y', strtotime($trans[0]->created_at))}} </th>
        </tr>
        <tr>
            <th>Nomor</th>
            <th>Jenis Barang</th>
            <th>Berat</th>
            <th align="left">Harga Satuan</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
  </thead>
  <tbody>
@php  
    $jml = $maks;
@endphp
   @foreach($trans as $t)
   <tr>    
            <td>{{$t->no_barang}}</td>
            <td>{{$t->jns_barang}}</td>
            <td>{{$t->berat}} gr</td>
            <td align="right">Rp. {{number_format($t->harga,0,',','.')}}</td>
            <td align="center">{{$t->jumlah}}</td>
            <td align="center"><img src="{{public_path('img/'.$t->keterangan)}}" alt="" width="50"></td>
    </tr>
     @php $jml -= 1; @endphp
   @endforeach
    @if($jml > 0 )
    @for($i = 0; $i < $jml; $i++)
    <tr>    
            <td class="null"></td>
            <td class="null"></td>
            <td class="null"></td>
            <td class="null"></td>
            <td class="null"></td>
            <td class="null"></td>
    </tr>
    @endfor
    @endif

 
   
 
  </tbody>
  <tfoot>
  <tr>
            <td colspan='4' align="right"><b>Total</b>  </td>
            <td>Rp. {{number_format($trans[0]->subtotal,0,',','.')}}</td>
            <td></td>
    </tr>

  </tfoot>
  </table>
  <table class="foot">
      <tr>
        <td class="col">
            Penerima,
    </td>
        <td class="col">
            Pembeli,
    </td>
        </tr>
    </table>
</div>
</div>  
