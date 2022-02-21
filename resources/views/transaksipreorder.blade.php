@php  $whoactive='transaksipreorder' @endphp
@extends('layouts.layout2')
@section('titlepage', 'Transaksi Preorder')



@section('css')
    <link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">
@endsection

@section('content')
        <div class="row">
            <div class="col-6">
                <input class="search-box " type="text" placeholder="Cari riwayat transaksi...">
                <i class="fas fa-search ml-1 search-icon"></i>
            </div>
            <div class="col-6">
                <i class="fa fa-calendar calendar-transaksi" aria-hidden="true"></i>
            </div>
        </div>

        <div class="row">
            <h5 class="date">Today</h5>
        </div>
    
        @foreach($data as $datas)
        


             <div class="card datatrans"  id_trans="{{$datas['no_nota']}}">
                <div class="card-header">
                    <h6 class="card-title float-right mr-2">{{$datas["created_at"]}}</h6>
                </div>
                <input type="hidden" >
                <table class="table table-borderless">
                    <thead class="text-center">
                      <tr>
                          <th><div style="width: 40px; margin-left:9px;">No</div></th>
                          <th><div style="width: 150px">Telah diterima dari</div></th>
                          <th><div style="width: 110px">Total</div></th>
                          <th><div style="width: 110px">Tagihan 1</div></th>
                          <th><div style="width: 110px">Tagihan 2</div></th>
                          <th><div style="width: 110px">Tagihan 3</div></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td><div >{{$datas["no_nota"]}}</div></td>
                          <td><div>{{$datas["ttd"]}}</div></td>
                          <td><div>Rp. {{number_format( $datas["total"] )}}</div></td>
                      
                          <td><div><i class="fa fa-check-circle"></i></div></td>
                          <td><div>@If($datas[0][0]->status == "dibayar")<div><i class="fa fa-check-circle"></i></div>@else <div><a class="btn btn-success text-light" href="{{url('/notabesar?id_trans='.$datas[0][0]->id_transaksi)}}">Bayar</a></div>@endif</td>
                          <td><div>@If($datas[0][1]->status == "dibayar")<div><i class="fa fa-check-circle"></i></div>@else <div><a class="btn btn-success text-light" href="{{url('/notabesar?id_trans='.$datas[0][1]->id_transaksi)}}">Bayar</a></div>@endif</td>
                          <td><div><i style="background-color:#1562AA; color:white; padding:10px; border-radius:100%;" class="fa fa-list"></i></div></td>
                      </tr>
                    </tbody>
                </table>
                <div class="card-clicker">

                </div>
            </div>

            @endforeach



              




</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="namapelanggan">Nama Pelanggan : Theodhore Riyanto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="home" aria-selected="true">Detail Transaksi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#termin1" role="tab" aria-controls="profile" aria-selected="false">Termin 1(DP)</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#termin2" role="tab" aria-controls="contact" aria-selected="false">Termin 2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#termin3" role="tab" aria-controls="contact" aria-selected="false">Termin 3</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                    <h5 class="card-title mb-2 mt-3 ml-4 d-flex align-items-left justify-content-left">Tanggal Transaksi : 27 Januari 2022, 10:30 WIB</h5>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead style="background-color: #1A79D0; color: white;">
                          <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Merek Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Kategori Produk</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td>B213481</td>
                          <td>Gembok Berlian</td>
                          <td>LM</td>
                          <td>2</td>
                          <td>Kunci</td>
                        </tbody>
                      </table>
                      <button href="#" style="margin-right: 585px; margin-top:20px;" type="button" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                </div>
                  </div>


                  <div class="tab-pane fade" id="termin1" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                      <h5 class="card-title mb-0 mt-3 ml-4 d-flex align-items-left justify-content-left">Tanggal Pelunasan : 30 Januari 2022, 09:43 WIB</h5>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title mt-0 mb-3 d-flex align-items-left justify-content-left">Pembayaran Termin 1</h5>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                      </div>
                      <p class="card-text d-flex align-items-left justify-content-left ml-1">No Nota : </p>
                      <p class="card-text d-flex align-items-left justify-content-left ml-1">Status : </p>
                      <button href="#" style="margin-right: 585px;" type="button" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                    </div>
                  </div>


                  <div class="tab-pane fade" id="termin2" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                      <h5 class="card-title mb-0 mt-3 ml-4 d-flex align-items-left justify-content-left">Tanggal Pelunasan : 30 Januari 2022, 09:43 WIB</h5>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title mt-0 mb-3 d-flex align-items-left justify-content-left">Pembayaran Termin 2</h5>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                      </div>
                      <p class="card-text d-flex align-items-left justify-content-left ml-1">No Nota : </p>
                      <p class="card-text d-flex align-items-left justify-content-left ml-1">Status : </p>
                      <button href="#" style="margin-right: 585px;" type="button" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                    </div>
                  </div>


                  <div class="tab-pane fade" id="termin3" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                      <h5 class="card-title mb-0 mt-3 ml-4 d-flex align-items-left justify-content-left">Tanggal Pelunasan : 30 Januari 2022, 09:43 WIB</h5>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title mt-0 mb-3 d-flex align-items-left justify-content-left">Pembayaran Termin 3</h5>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                      </div>
                      <p class="card-text d-flex align-items-left justify-content-left ml-1">No Nota : </p>
                      <p class="card-text d-flex align-items-left justify-content-left ml-1">Status : </p>
                      <button href="#" style="margin-right: 585px;" type="button" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                    </div>
                  </div>


                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
      
        
@endsection