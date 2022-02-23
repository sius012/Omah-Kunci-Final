@php  $whoactive='transaksipreorder' @endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi Preorder')



@section('css')
    <link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">
@endsection

@section('content')
<form action="{{route('caritranspreorder')}}" method="post">
  @csrf
        <div class="row">
            <div class="col-12">
                <input class="search-box " type="text" placeholder="Cari nomor nota..." name="no_nota">
                <button type="submit" class="search-icon"><i class="fas fa-search p-1"></i></button>
            </div>
        </div>
      </form>

        <div class="row">
            <h5 class="date">Hari Ini</h5>
        </div>
    
        @foreach($data as $datas)
        


             <div class="card datatrans"  id_trans="{{$datas['no_nota']}}">
                <div class="card-header">
                    <h6 class="card-title float-right mr-2">{{$datas["created_at"]}}</h6>
                    <h6 class="card-title">No Nota : {{$datas["no_nota"]}}</h6>
                </div>
                <input type="hidden" >
                <table class="table table-borderless">
       
                      <tr>
                          <th style="width: 200px"><div >Telah diterima dari</div></th>
                          <th style="width: 200px"><div >Total</div></th>
                          <th style="width: 120px"><div >Tagihan 1</div></th>
                          <th style="width: 120px"><div >Tagihan 2</div></th>
                          <th style="width: 120px"><div >Tagihan 3</div></th>
                          <td style="width: 110px" rowspan="2" align="center" valign="center" class=""><div class="mt-3 justify-content-center">
                              <a href="#"><i style="background-color:#1562AA; color:white; padding:10px; border-radius:100%;" class="fa fa-list"></i></a>
                              <a href="#"><i style="background-color:#1562AA; color:white; padding:10px; border-radius:100%;" class="fa fa-trash bg-danger"></i></a>
                          </div></td>
                      </tr>
                   
                      <tr>
                          <td><div>{{$datas["ttd"]}}</div></td>
                          <td><div>Rp. {{number_format( $datas["total"] )}}</div></td>
                      
                          <td><div><i class="fa fa-check-circle"></i></div></td>
                          <td align="center" valign="center"><div>@If($datas[0][0]->status == "dibayar")<div><i class="fa fa-check-circle"></i></div>@else <div><a class="btn btn-success text-light" href="{{route('prosesbayar',['id' => $datas[0][0]->id_transaksi])}}">Bayar</a></div>@endif</td>
                          <td><div>@If($datas[0][1]->status == "dibayar")<div><i class="fa fa-check-circle"></i></div>@else <div><a class="btn btn-success text-light" href="{{route('prosesbayar',['id' => $datas[0][1]->id_transaksi])}}">Bayar</a></div>@endif</td>
                         
                      </tr>
                  
                </table>
                <div class="card-clicker">

                </div>
            </div>

            @endforeach



              




</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection