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
    <script>
        $(document).ready(function(){
           $("#modalprodukedit").modal("show");

            $(".btclose").click(function(){
                window.location = "/produk";
            });
        });
    </script>
@stop
@section('content')


    <div class="card">
        <div class="card-header">
            <p class="card-title">Data Produk</p>
        </div>
        <div class="card-body">
            {!! Form::open(['action'=> 'ProdukController@index','method'=>'GET']) !!}
                @csrf
                <div class="form-group">
                    <select name="tipe" id="tipe" class="form-control dynamic" data-dependent = "state">
                        <option value="">TIPE</option>
                        @foreach($tipe as $tipes)
                            <option value = "{{$tipes->id_tipe}}">{{$tipes->nama_tipe}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="kodetipe" id="kodetipe" class="form-control dynamic" data-dependent = "state">
                        <option value="">TIPE KODE</option>
                        @foreach($kodetype as $kt)
                            <option value="{{$kt->id_kodetype}}">{{$kt->nama_kodetype}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="merek" id="merek" class="form-control dynamic" data-dependent = "state">
                        <option value="">MEREK</option>
                        @foreach($merek as $merks)
                            <option value="{{$merks->id_merek}}">{{$merks->nama_merek}}</option>
                        @endforeach
                    </select>
                </div>
            {{Form::submit('Cari',['class'=>'btn btn-primary mb-3'])}}

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
                            <td>{{ $produks->nama_tipe}}</td>
                            <td>{{ $produks->nama_kodetype}}</td>
                            <td>{{ $produks->nama_merek }}</td>
                            <td>{{ $produks->satuan }}</td>
                            <td>Rp. {{ number_format($produks->harga) }}</td>
                            <td>{{$produks->diskon}}</td>
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
                            @foreach($tipe as $tipes)
                            <option value = "{{$tipes->id_tipe}}">{{$tipes->nama_tipe}}</option>
                        @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <select name="" id="kategori-produk" class="form-control" required>
                            @foreach($kodetype as $kt)
                            <option value="{{$kt->id_kodetype}}">{{$kt->nama_kodetype}}</option>
                        @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipe Kode</label>
                            <select name="" id="tipe-kode" class="form-control" required>
                            @foreach($merek as $merks)
                            <option value="{{$merks->id_merek}}">{{$merks->nama_merek}}</option>
                        @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="text" class="form-control uang" id="harga-produk" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Diskon</label>
                            <input type="text" class="form-control" id="diskon-produk" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan-produk" aria-describedby="emailHelp">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
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
                        <button type="button" class="button btclose" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('editproduk', ['id' => $data->kode_produk]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode Barcode</label>
                                <input type="text" class="form-control" id="kodebarcode" aria-describedby="emailHelp" required
                                    value="{{ $data->kode_produk }}" name="nama_produk">
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
                                        <option value="{{ $merks->id_merk }}" @if ($merks->merk == $data->merk) selected @endif>
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
                                <input type="number" class="form-control uang" aria-describedby="emailHelp"
                                    value="{{ $data->harga }}" name="harga">
                            </div>
                             <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Diskon</label>
                            <input type="text" class="form-control" id="diskon-produk" aria-describedby="emailHelp" name="diskon" value={{$data->diskon}}>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                    value="{{ $data->stn }}" name="stn">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btclose" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#exampleModalBarcode">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input max=50 min=1 type="number" class="form-control" id="jml" aria-describedby="emailHelp">
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
