@php
    $whoactive = 'kasir';
@endphp
@extends('layouts.layout2')

@section('title', 'AdminLTE')


@section('pagetitle', 'Kasir')


@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/mainjs/kasir.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/kasir.css') }}">
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
                    <input class="search-box" type="text" id="searcher" placeholder="Cari Barang Disini...">
                    <i class="fas fa-search ml-1 search-icon"></i>
                    <div class="drop">
                        <ul>
                        </ul>
                    </div>
                </div>
                <div class="times-wrapper col-6">
                    <p class="times float-right">
                        {{ $date->format('l, j F Y ; h:i a') }}</p>
                </div>

            </div>

            <div class="row">
                <h5 class="nomor-nota ml-4 mt-4 mb-2">Nota : 001</h5>
                <table class="table table-light table-borderless">
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
                    <div class="row">
                        <input class="nama-pelanggan" type="text" placeholder="Nama Pelanggan" id="nama">
                    </div>
                    <div class="row">
                        <label class="subtotal-label" for="subtotal">Subtotal</label>
                        <input type="text" class="subtotal" id="subtotal" name="subtotal">
                    </div>
                    <div class="row">
                        <label class="diskon-label" for="diskon">Diskon</label>
                        <input type="text" class="diskon" id="diskon" name="diskon">
                    </div>
                    <div class="row">
                        <label class="total-label" for="total">Total</label>
                        <input type="text" class="total" id="totality" name="total" >
                    </div>
                </div>

                <div class="col-4">
                    <div class="card" id="tunai">
                        <div class="card-header mb-3" >
                            <input type="radio" name="payment" value="cash">
                            <label for="radio-tunai">Tunai</label>
                            <div class="float-right mr-2">
                                <input type="radio" name="payment" value="kredit">
                                <label for="radio-tunai">Kredit</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group d-inline-flex">
                                <input style="width:170px;" class="form-control mr-4 usethis" type="text">
                                <select class="custom-select form-control w-25 usethisvia">
                                    <option selected>Via</option>
                                    <option value="Langsung">Langsung</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Lainnya">Lainnya </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="wrapper float-right">
                        <div class="row">
                            <button class="btn selesai" id="selesai">Selesai</button>
                        </div>
                        <div class="row">
                            <button class="btn reset " id="reset-button" >Reset</button>
                        </div>
                    </div>
                </div>

            </div>




















































            <!-- <div class="row">
            <div class="col-4">
                <div class="row">
                    <input type="text" class="nama-pelanggan" id="nama" placeholder="Nama Pelanggan">
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <p class="subtotal">Subtotal</p>
                    </div>
                    <div class="col-2"> 
                        <input class="subtotal-input" type="text" val="" id="subtotal">
                    </div>
                <div class="row">
                    <div class="col-2">
                        <p class="diskon">Diskon</p>
                    </div>
                    <div class="col-2"> 
                        <input class="diskon-input" type="text" id="diskon">
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
                               <select id="cashvia-input"  class="form-control selected via " placeholder="pilih metode">
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
                                <input class="method-input" type="text" id="cash-input">
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
                               <select id="kreditvia-input"  class="form-control " placeholder="pilih metode">
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
                <div class="row options">
                    <button class="btn btn-warning ml-4" id="button_cetak"><i class="fa fa-print"></i> Cetak</button>
                </div>
            </div>
        </div>
     </div> -->
    </section>
    @stop
