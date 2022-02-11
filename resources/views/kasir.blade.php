@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Kasir</h1>
@stop

@section('content')
@php
    $date = \Carbon\Carbon::parse('2021-03-16 08:27:00')->locale('id');

    $date->settings(['formatFunction' => 'translatedFormat']);

@endphp
<section class="content">
     <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <input class="search-box" type="text" id="searcher">
                <i class="fas fa-search ml-1 search-icon"></i>
                <div class="drop">
                <ul>
                            </ul>
                </div>
            </div>
            <div class="col-6">
                <p class="times">{{$date->format('l, j F Y ; h:i a')}}</p>
            </div>
        </div>

        <div class="row">
            <h5 class="nomor-nota ml-4 mt-4 mb-2">Nota : 001</h5>
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
                <tbody id="tabling">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="row"><input class="nama-pelanggan" type="text" placeholder="Nama Pelanggan" id="nama"></div>
                <div class="row mt-3">
                    <div class="col-2">
                        <p class="subtotal">Subtotal</p>
                    </div>
                    <div class="col-2"> 
                        <input class="subtotal-input" type="text" val="" id="subtotal">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="subtotal">Diskon</p>
                    </div>
                    <div class="col-2"> 
                        <input class="subtotal-input" type="text" id="diskon">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="total">Total</p>
                    </div>
                    <div class="col-2"> 
                        <input class="total-input" type="text" id="totality">
                    </div>
                </div>
            </div>
          

          <div class="col-3 payment-method">
                <div id="tunai" class="row mt-4">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                                <input class="radio" type="radio">
                            </div>
                            <div class="col-2">
                                <p class="method-1">Tunai</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p class="methods">Via</p>
                            </div>
                            <div class="col-6">
                               <select name="via-cash"  class="form-control selected via" placeholder="pilih metode">
                                    <option value="BCA" selected>BCA</option>
                                    <option value="Mandiri" >Mandiri</option>
                                    <option value="BNI" >BNI</option>
                               </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p class="methods">nominal</p>
                            </div>
                            <div class="col-2">
                                <input class="method-input" type="text" id="kredit-input">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="kredit" class="row mt-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">
                                <input class="radio" type="radio">
                            </div>
                            <div class="col-2">
                                <p class="method-1">Kredit</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p class="methods">Via</p>
                            </div>
                            <div class="col-6">
                               <select name="via-cash"  class="form-control " placeholder="pilih metode">
                                    <option value="BCA" selected>BCA</option>
                                    <option value="Mandiri" >Mandiri</option>
                                    <option value="BNI" >BNI</option>
                               </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p class="methods">nominal</p>
                            </div>
                            <div class="col-2">
                                <input class="method-input" type="text" id="kredit-input">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 option">
                <div class="row options">
                    <div class="col-2 mt-3">
                        <button class="selesai ml-4" href="#" id="selesai">Selesai</button>
                    </div>
                </div>
                <div class="row options">
                    <div class="col-2">
                        <button class="tunda ml-4" href="#">Tunda</button>
                    </div>
                </div>
                <div class="row options">
                    <div class="col-2">
                        <button class="reset ml-4" href="#" id="reset-button">Reset</button>
                    </div>
                </div>
            </div>
        </div>
     </div>
</section>
@stop
