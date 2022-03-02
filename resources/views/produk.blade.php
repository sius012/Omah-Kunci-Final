@php
$whoactive = 'produk';
$master = 'manager';
$no = 1;

$kw = isset($keyword) ? $keyword : '';
$tp = isset($tipe) ? $tipe : '';
$ct = isset($id_ct) ? $id_ct : '';
$m = isset($mereknya) ? $mereknya : '';
@endphp
@extends('layouts.layout2')
@section('title','Produk')

@section('titlepage', 'Produk')

@section('js')
    <script src="{{ asset('js/print.js') }}"></script>
    <script src="{{ asset('js/produk.js') }}"></script>
    <style>
        td{
            font-weight: unset !important;
            font-size: 8pt
        }
    </style>
@stop
@section('content')


    <div class="card">
        <div class="card-header">
            <p class="card-title">Data Produk</p>
        </div>
        <div class="card-body">
            <form action="{{ route('searchproduct') }}" method="GET">
                @csrf
                <div class="filter">
                    <div class="row">
                        <input class="form-control  mt-0 mb-5" name="kw" placeholder="Masukan Kode Barcode"
                            value="{{ $kw }}">
                        <div class="col"> </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row ml-1">
                            <div class="form-group mr-3">
                                <label for="type">Tipe:</label>
                                <select name="tp" id="type" class="custom-select w-75">
                                    <option value="all">Semua</option>
                                    @foreach ($kat as $kats)
                                        <option value="{{ $kats->id_kategori }}"
                                            @if ($tp == $kats->id_kategori) selected @endif>{{ $kats->id_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mr-3 d-inline-flex">
                                <label style="width:200px; margin:0; margin-right:-70px; margin-top:5px;" for="type">Kode Tipe:</label>
                                <select name="ct" id="type" class="custom-select w-75">
                                    <option value="all">Semua</option>
                                    @foreach ($kodetype as $kt)
                                        <option value="{{ $kt->id_ct }}"
                                            @if ($ct == $kt->id_ct) selected @endif>{{ $kt->id_ct }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-inline-flex mr-3">
                                <label style="margin-top:5px; margin-right:5px;" for="type">Merek:</label>
                                <select name="merk" id="type" class="custom-select w-75">
                                <option value="all">Semua</option>
                                    @foreach ($merek as $merks)
                                        <option value="{{ $merks->merk }}"
                                            @if ($m == $merks->merk) selected @endif>{{ $merks->merk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <button type="button" class="btn btn-primary mt-0 mb-3 " data-toggle="modal" data-target="#modalproduk">
                Tambah Produk <i class="fa fa-plus ml-2"></i>
            </button>

            <table class="table table-striped mt-1 table-bordered">
                <thead style="font-size:10pt;">
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th style="width:180px;">Nama Produk</th>
                        <th style="width:110px;">Tipe</th>
                        <th style="width:130px;">Tipe Kode</th>
                        <th>Merek</th>
                        <th>Satuan</th>
                        <th style="width:130px;">Harga</th>
                        <th>Diskon</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $produks)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $produks->kode_produk }}</td>
                            <td>{{ $produks->nama_produk }}</td>
                            <td>{{ $produks->id_kategori }}</td>
                            <td>{{ $produks->id_ct }}</td>
                            <td>{{ $produks->merk }}</td>
                            <td>{{ $produks->stn }}</td>
                            <td>Rp. {{ number_format($produks->harga) }}</td>
                            <td></td>
                            <td class="d-inline-flex" align="center">
                                <a class="btn btn-warning"
                                    href={{ url('/editproduk?kodebarcode=' . $produks->kode_produk) }}><i
                                        class="fa fa-edit"></i></a>
                                <a class="btn btn-danger ml-1 mr-1 hapusproduk"
                                    href="{{ route('hapusproduk', ['kode' => $produks->kode_produk]) }}"><i
                                        class="fa fa-trash"></i></a>
                                <a kode_produk='{{ $produks->kode_produk }}' href="#" class="btn btn-warning cetak-barcode"
                                    data-toggle="modal" data-target="#exampleModal"><i class="fa fa-barcode"></i></a>
                            </td>
                        </tr>
                        @php $no++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal Tambah/Edit Produk-->
    <div class="modal fade tambahbarangform" id="modalproduk" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/updateproduk" id="submitterproduk">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control" id="kode-produk" aria-describedby="emailHelp"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama-produk" aria-describedby="emailHelp"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Merek Barang</label>
                            <select name="" id="merek-produk" class="form-control">
                                @foreach ($merek as $merks)
                                    <option value="{{ $merks->merk }}">{{ $merks->merk }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <select name="" id="kategori-produk" class="form-control" required>
                                @foreach ($kat as $kats)
                                    <option value="{{ $kats->id_kategori }}">{{ $kats->id_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipe Kode</label>
                            <select name="" id="tipe-kode" class="form-control" required>
                                @foreach ($kodetype as $kt)
                                    <option value="{{ $kt->id_ct }}">{{ $kt->id_ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="text" class="form-control uang" id="harga-produk" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan-produk" aria-describedby="emailHelp">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div>

    </div>













    @php

    @endphp


    @isset($data)


        <!-- Modal Tambah/Edit Produk-->
        <div class="modal fade tambahbarangform" id="modalprodukedit" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('editproduk', ['id' => $data->kode_produk]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Barcode</label>
                                <input type="text" class="form-control" id="kodebarcode" aria-describedby="emailHelp" required
                                    value="{{ $data->nama_produk }}" name="nama_produk">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" required
                                    value="{{ $data->nama_produk }}" name="nama_produk">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Merek Barang</label>
                                <select class="form-control" name="merk">
                                    @foreach ($merek as $merks)
                                        <option value="{{ $merks->merk }}" @if ($merks->merk == $data->merk) selected @endif>
                                            {{ $merks->merk }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                <select class="form-control" required name="id_kategori">
                                    @foreach ($kat as $kats)
                                        <option value="{{ $kats->id_kategori }}"
                                            @if ($merks->id_kategori == $data->id_kategori) selected @endif>{{ $kats->id_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tipe Kode</label>
                                <select class="form-control" required name="id_ct">
                                    @foreach ($kodetype as $kt)
                                        <option value="{{ $kt->id_ct }}" @if ($kt->id_ct == $data->id_ct) selected @endif>
                                            {{ $kt->id_ct }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp"
                                    value="{{ $data->harga }}" name="harga">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                    value="{{ $data->stn }}" name="stn">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        @endisset

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barcode Print</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="email" class="form-control" id="jml" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-warning" kode_produk="" id="cetaker"><i
                                class="fa fa-print mr-1"></i>Print</button>
                    </div>
                </div>
            </div>
        </div>
    @stop
