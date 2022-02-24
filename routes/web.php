<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return view('welcome');
});

Auth::routes();
// Route Untuk Omah Kunci







Route::middleware(["role:kasir|manager"])->group(function(){
    Route::get('/kasir', function(){
        return view('kasir');
    })->name("kasir");
    Route::post('/cari', 'KasirController@cari')->name('cari');
    Route::post('/tambahItem', 'KasirController@tambahTransaksiDetail');
    
    Route::post('/selesaitransaksi', 'KasirController@selesai')->name('selesai');
    Route::get('/selesai', 'KasirController@reset');
    Route::get('/selesaitrans', 'KasirController@forgoting');
    Route::post('/loader', 'KasirController@loader');
    Route::get('/resettransaction', 'KasirController@resetTransaction');
    Route::post('/removedetail', 'KasirController@removedetail');
    
    
    Route::get('/transaksi', 'transaksiController@index');
    Route::post('/cetaknotakecil', 'KasirController@cetaknotakecil');
    Route::get('/notabesar', 'PreorderController@index');
    Route::post('/tambahpreorder', 'PreorderController@tambahtransaksi');

    Route::post('/loadsingletrans', 'transaksiController@showDetail');

    Route::post('/loaddatanb', 'PreorderController@loaddata');
    Route::post("/searchnotapreorder", "PreorderController@search");
    Route::post("/getnb", "PreorderController@getnb");
    Route::post("/bayarpreorder", "PreorderController@bayarpreorder");
    Route::post("/cetaknotabesar", "PreorderController@cetaknotabesar");
    Route::post("/caritranspreorder", "TransaksiPreorder@index")->name("caritranspreorder");
    
    Route::get('/transaksipreorder', 'TransaksiPreorder@index');
    Route::post('/resettrans', 'PreorderController@resettrans');
    Route::get('/prosesbayar/{id}/', "PreorderController@index")->name("prosesbayar");
    Route::post('/bayarcicilan', 'KasirController@bayarcicilan');


});


Route::middleware(["role:admingudang|manager"])->group(function(){
    Route::post('/tambahstok', 'StokController@tambahstok');
    Route::post('/loadsinglestok', 'StokController@loadsinglestok');

    Route::post('/editstok', 'StokController@editstok');
    Route::post('/hapusstok', 'StokController@hapusstok');

    Route::get('/detailstok', 'DetailStokController@index');
    Route::post('/loaddatadetailstok', 'DetailStokController@loaddatadetailstok');
    Route::post('/tambahdetailstok', 'DetailStokController@tambahdetailstok');
    Route::get('/stok', 'StokController@index')->name('stok');
});

Route::middleware(["role:manager"])->group(function(){
    Route::get('/produk', 'ProdukController@index')->name('produk');
    Route::post('/tambahbarang', 'ProdukController@tambahbarang');
    Route::post('/hapusbarang', 'ProdukController@hapusbarang');
    Route::post('/loadproduk', 'ProdukController@loadProduk');
    Route::post('/getprodukinfo', 'ProdukController@loadSingleProduk');
    Route::post('/updateproduk', 'ProdukController@updatebarang');
    Route::get('/hapusproduk/{kode}', 'ProdukController@hapusproduk')->name("hapusproduk");
    Route::get('/searchproduct', 'ProdukController@search')->name("searchproduct");
    Route::post('/tambahmerek', 'ProdukController@tambahmerek');

    Route::post('/getmerekinfo', 'ProdukController@getmerekinfo');
    Route::post('/ubahmerek', 'ProdukController@ubahmerek');
    Route::post('/hapusmerek', 'ProdukController@hapusmerek');
    Route::post('/editproduks/{id}', "ProdukController@updatebarang")->name("editproduk");
    Route::get('/editproduk', "ProdukController@showdetail");
    Route::post('/tambahkategori', 'ProdukController@tambahkategori');
    
Route::get('/dsm', 'DSMController@index');
Route::post('/loaddsm', 'DSMController@loaddatadetailstok');
Route::post('/verifiying', 'DSMController@verifiying');
Route::post('/rejecting', 'DSMController@rejecting');
 });


Route::get('/home', "HomeController@index");

















//cetak


Route::get('/notakecil', function(){
    return view('nota.notakecil');
});

Route::get('/rolesinject', function(){
    $role = Role::create(['name' => 'admingudang']);
    $permission = Permission::create(['name' => 'kelola']);

});

Route::get('/layout', function(){
    return view("layouts.layout2");
});





// Theodhore 19 Februari 2022

Route::get('request', function(){
    return view('request');
});





Route::get('/nota_besar_final', function(){
    return view('nota_besar');
});

Route::get('/injectproduk', "SeederJoy@inject");

Route::post('/printcurrentstok', "StokController@printcurrent");

Route::get('manajemen_akun', function(){
    return view('management_akun');
});


Route::get('manajemen_akun', function(){
    return view('management_akun');
});
Route::get('profile', function(){
    return view('profile');
});