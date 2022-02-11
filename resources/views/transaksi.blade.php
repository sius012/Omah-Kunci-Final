@extends('adminlte::page')
@section('title', 'Transaksi || Omah Kunci')

@section('content_header')
    <h1 class="m-0 text-dark">Transaksi</h1>
@stop

@section('adminlte_css')
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
            <h5 class="date">Hari Ini</h5>
        </div>
    
        @foreach($data as $datas)
            <div class="card datatrans"  id_trans="{{$datas['kode_trans']}}">
                <input type="hidden" >
                <table class="table table-borderless">
                    <tr>
                        <th><div style="width: 40px; margin-left:9px;">No</div></th>
                        <th><div style="width: 150px">Nama Pelanggan</div></th>
                        <th><div style="width: 130px">Total Tagihan</div></th>
                        <th><div style="width: 110px">DP</div></th>
                        <th><div style="width: 110px">Tagihan 2</div></th>
                        <th><div style="width: 110px">Tagihan 3</div></th>
                        <th><div style="width: 90px">Status</div></th>
                        <th><div style="width: 120px">Tanggal Transaksi</div></th>
                    </tr>
                    <tr>
                        <td><div style="width: 60px">001</div></td>
                        <td><div>{{$datas["nama_pelanggan"]}}</div></td>
                        <td><div>Rp. {{number_format($datas["subtotal"])}}</div></td>
                        @if(isset($datas[0]))
                        <td><div><i class="fa fa-check-circle"></i></div></td>
                        <td><div>Rp.100.000</div></td>
                        <td><div>Rp.100.000</div></td>

                        @else
                        <td><div><i class="fa fa-check-circle selectless"></i></div></td>
                        <td><div><i class="fa fa-check-circle selectless"></div></td>
                        <td><div><i class="fa fa-check-circle selectless"></div></td>

                        @endif

                        <td><div class="{{$datas['status'] == 'belum lunas' ? 'bg-danger' : 'bg-success'}} rounded-pill ">{{$datas['status']}}</div></td>
                        <td><div>27 Januari 2022, 10:30 WIB</div></td>
                    </tr>
                </table>
                <div class="card-clicker">

                </div>
            </div>
            @endforeach



            <div class="card">
                <table class="table table-borderless">
                    <tr>
                        <th><div style="width: 40px; margin-left:9px;">No</div></th>
                        <th><div style="width: 150px">Nama Pelanggan</div></th>
                        <th><div style="width: 130px">Total Tagihan</div></th>
                        <th><div style="width: 110px">DP</div></th>
                        <th><div style="width: 110px">Tagihan 2</div></th>
                        <th><div style="width: 110px">Tagihan 3</div></th>
                        <th><div style="width: 90px">Status</div></th>
                        <th><div style="width: 120px">Tanggal Transaksi</div></th>
                    </tr>
                    <tr>
                        <td><div style="width: 60px">001</div></td>
                        <td><div>Johanes Sinalsal Purba</div></td>
                        <td><div>Rp.300.000</div></td>
                        <td><div><i class="fa fa-check-circle selectless"></i></div></td>
                        <td><div><i class="fa fa-check-circle selectless"></i></div></td>
                        <td><div><i class="fa fa-check-circle selectless"></i></div></td>
                        <td><div style="background-color: #48BE00; border-radius:100px; color:white;">Lunas</div></td>
                        <td><div>27 Januari 2022, 10:30 WIB</div></td>
                    </tr>
                </table>
            </div>
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