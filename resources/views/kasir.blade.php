@php
    $whoactive = 'kasir';
    $master='kasir';
@endphp
@extends('layouts.layout2')

@section('title', 'Kasir')


@section('pagetitle', 'Kasir')


@section('js')
<script src="{{ asset('js/print.js') }}"></script>
<script>
    
</script>
<script src="{{ asset('js/mainjs/kasir.js') }}"></script>
<script src="{{ asset('js/preorder.js') }}"></script>
<script src="{{ asset('js/mytools/tools.js') }}"></script>
<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu a::after {
        transform: rotate(-90deg);
        position: absolute;
        right: 6px;
        top: .8em;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: .1rem;
        margin-right: .1rem;
    }

    .dropdown-custom{
        border: 2px solid black;
    }
</style>
<script>
    $(document).ready(function () {
        $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
                $('.dropdown-submenu .show').removeClass("show");
            });


            return false;
        });
    });

</script>
<link rel="stylesheet" href="{{ asset('css/kasir.css') }}">
<script>
    $(document).ready(function () {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr('content')
            },
            url: "/removesection",
            type: "post",
            success: function () {

            },
            error: function (err) {

            }
        });
    });

</script>

@stop

    @section('content')
    @php
        $date = \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->setTimeZone("Asia/Jakarta");



        $date->settings(['formatFunction' => 'translatedFormat']);

    @endphp

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="row mb-5">
                        <select name="" id="jenis-transaksi" class="form-control">
                            <option value="new">
                                Transaksi Baru 
                            </option>
                            <option value="retur">
                                Return
                            </option>
                        </select>
                        <select name="" id="list-return" class="form-control">
                            
                        </select>
                    </div>
                    <div class="row">
                        <div class="card" style="width: 500px" id="searcherbox">

                            <div class="card-header">
                                <p class="card-title p-2">Pilih Produk</p>
                                <div class="alerts">
                                    <p style="width:300px; left:190px; top:12px;"
                                        class="card-text bg-warning p-2 rounded text-center float-right position-absolute">
                                        <i style="width:23px;"
                                            class="fa fa-info mr-2 text-light bg-dark p-1 rounded-circle text-center"></i>Barang
                                        Tidak Tersedia</p>
                                </div>
                            </div>
                            <div style="border-bottom:1px solid lightgray; x" class="card-body ">
                                <table style="width: 450px">
                                    <tr>
                                        <td> <input style="width: 300px" required class="search-box form-control mr-2"
                                                type="text" id="searcher" placeholder="Cari Barang Disini..."></td>
                                        <td style="width: 200px"> <input min="1" required class="qty form-control "
                                                id="qty" placeholder="Quantity" type="number" value=1>
                                            <input style="width: 300px" required class="qty " id="hrg"
                                                placeholder="Quantity" type="hidden" value=1></td>
                                        <ul id="myUL">
                                        </ul>
                                    </tr>
                                </table>

                            </div>

                            <div class="card-footer">
                                <button href="" class="btn btn-success" id="tambahproduk">Tambah Produk</button>
                            </div>
                        </div>
                    </div>
                    <div class="drop">
                        <ul>
                        </ul>
                    </div>
                </div>
                <div class="times-wrapper col-6">
                    <div class="wrapperrs float-right">
                        <div class="row">
                            <p class="times">
                                {{ $date->format('l, j F Y ;  h:i ') }}
                            </p>
                        </div>
                        <div class="row float-right">
                            <!-- Button trigger modal -->
                            <div class="card pl-2">
                                <div class="card-body">
                                    <p><i style="width:30px;"
                                            class="fa fa-info bg-primary p-2 rounded-circle text-light ml-3 text-center mr-2"></i>Produk
                                        habis?</p>
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Tambah Preorder
                                    </button>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="/sss" id="preordersubmitter">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Preorder</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Telah Terima Dari</label>
                                                    <input id="ttd" type="text" class="form-control"
                                                        aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Telepon</label>
                                                    <input id="telepon" type="text" class="form-control"
                                                        aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Uang Sejumlah</label>
                                                    <input id="us" type="text" class="form-control uang"
                                                        aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Hai</label>
                                                        <a class="nav-link dropdown-toggle dropdown-custom" href="http://example.com"
                                                            id="navbarDropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Dropdown link
                                                        </a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a>
                                                            </li>
                                                            <li class="dropdown-submenu"><a
                                                                    class="dropdown-item dropdown-toggle"
                                                                    href="#">Submenu</a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#">Submenu
                                                                            action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Another
                                                                            submenu action</a></li>


                                                                    <li class="dropdown-submenu"><a
                                                                            class="dropdown-item dropdown-toggle"
                                                                            href="#">Subsubmenu</a>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a class="dropdown-item"
                                                                                    href="#">Subsubmenu action</a></li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="#">Another subsubmenu
                                                                                    action</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="dropdown-submenu"><a
                                                                            class="dropdown-item dropdown-toggle"
                                                                            href="#">Second subsubmenu</a>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a class="dropdown-item"
                                                                                    href="#">Subsubmenu action</a></li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="#">Another subsubmenu
                                                                                    action</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom02"></label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            placeholder="Last name" value="Otto" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sejumlah</label>
                                                    <input id="sejumlah" type="text" class="form-control"
                                                        aria-describedby="emailHelp" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" " id_pre="" id="
                                                    tombolcetak2">Cetak</button>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <table class="table table-light table-borderless">
                    <tr>
                        <th>No.</th>
                        <th>Item</th>
                        <th>Merek</th>
                        <th>Jumlah</th>
                        <th>Harga(/pcs)</th>
                        <th>Diskon(/pcs)</th>
                        <th>Total</th>
                        <th>Aksi</th>
                        <th class="antartd">Diantar</th>
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
                <div class="col-4 hargas">
                    <div class="row">
                        <input class="nama-pelanggan w-100" type="text" placeholder="Nama Pelanggan" id="nama" required>
                    </div>
                    <div class="row">
                        <input class="nama-pelanggan w-100" type="text" placeholder="No Telp" id="telp" required>
                    </div>
                    <div class="row">
                        <input class="nama-pelanggan w-100" type="text" placeholder="Alamat" id="alamat" required>
                    </div>
                    <div class="row">
                        <label class="subtotal-label    " for="subtotal">Subtotal</label>
                        <input type="text" class="subtotal" id="subtotal" name="subtotal" readonly>
                    </div>
                    <div class="row">
                        <label class="diskon-label" for="diskon">Potongan(RP)</label>
                        <input type="" class="diskon uang" id="diskon" name="diskon">
                    </div>
                    <div class="row">
                        <label class="total-label" for="total">Total</label>
                        <input type="text" class="total" id="totality" name="total" readonly>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card" id="tunai" style="width: 100%">
                        <div class="card-header mb-3">
                            <p class="card-title">Pembayaran</p>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label>Pengiriman : </label>
                            <select class="form-control float-right" id="antarkah"> 
                                <option value="tidak">Tidak diantar</option>
                                <option value="ya">Diantar</option>
                               
                            </select>
                        </div>
                        <div class="form-group d-inline-flex mt-3">
                            <input style="width:170px;" class="form-control mr-4 usethis uang" type="text">
                            <select class="custom-select form-control usethisvia">
                                <option value="Langsung">Tunai</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="wrapper float-right">
                        <div class="row">
                            <button class="btn selesai" id="selesai"><i class="fa fa-check mr-3"></i>Selesai</button>
                        </div>

                        <div class="row">
                            <button class="btn reset " id="reset-button"><i class="fa fa-trash mr-3"></i>Buang</button>
                        </div>
                        <div class="row">
                            <button class="btn next text-light" id="next-button">Lanjut</button>
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
    <script>
        $(document).ready(function () {




            $(".uang").keyup(function () {
                $(this).val(formatRupiah($(this).val(), ""))
            });


            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
            }
        });

    </script>

    @stop
