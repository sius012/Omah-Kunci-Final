@php $whoactive = "stokharian" ;

$master='admingudang';
@endphp
@extends('layouts.layout2')

@section('pagetitle', 'Stok Harian')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail_stok.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
@stop

@section('title','Stok Harian')
@section('js')
    <script src="{{url('js/detailstok.js')}}"></script>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <input required required class="search-box" type="text" placeholder="Scan atau cari item...">
                <i class="fas fa-search ml-1 search-icon text-light"></i>
            </div>
            <div class="col-6">
                <button type="button" class="btn float-right btn-tambah-data" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2 class="card-title font-weight-bold ml-3 mt-4 mb-4">Hari Ini</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col" id="dscont">
       
            
        </div>
    </div>


    

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="detailstoksubmitter"> 
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label><br>
                        <input required type="datetime-local" class="form-control" name="tanggal" id="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="produk-select">Produk</label>
                        <input class="custom-select" name="produk-select" id="produk-select">
                        
                          <ul id="myUL">
                         </ul>
                    </div>
                    <div class="form-group">
                        <label for="jumlah-select">Jumlah</label>
                        <input required type="number" class="form-control" name="jumlah-select" id="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="status-select">Status</label>
                        <select class="custom-select" name="status-select" id="status-select" required>
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label><br>
                        <textarea required cols="88.5" rows="5" class="form-control" name="keterangan" id="keterangan"></textarea>
                    </div>
                    
               
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            
            </div>
            </form>
            </div>
        </div>
    </div>


</section>
@stop