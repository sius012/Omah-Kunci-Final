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

Route::get('/home', function () {
    return view('home');
});

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
Route::get('/produk', 'ProdukController@index');
Route::post('/tambahbarang', 'ProdukController@tambahbarang');
Route::post('/hapusbarang', 'ProdukController@hapusbarang');
Route::post('/loadproduk', 'ProdukController@loadProduk');
Route::post('/getprodukinfo', 'ProdukController@loadSingleProduk');
Route::post('/updateproduk', 'ProdukController@updatebarang');



Route::get('/notabesar', 'PreorderController@index');
Route::post('/tambahpreorder', 'PreorderController@tambahtransaksi');

Route::post('/loadsingletrans', 'transaksiController@showDetail');

Route::post('/loaddatanb', 'PreorderController@loaddata');

Route::get('/stok', 'StokController@index')->name('stok');

Route::post('/tambahmerek', 'ProdukController@tambahmerek');

Route::post('/getmerekinfo', 'ProdukController@getmerekinfo');
Route::post('/ubahmerek', 'ProdukController@ubahmerek');
Route::post('/hapusmerek', 'ProdukController@hapusmerek');

Route::post('/tambahkategori', 'ProdukController@tambahkategori');




Route::post('/tambahstok', 'StokController@tambahstok');\
Route::post('/loadsinglestok', 'StokController@loadsinglestok');

Route::post('/editstok', 'StokController@editstok');


Route::get('/transaksipreorder', 'TransaksiPreorder@index');
Route::post('/resettrans', 'PreorderController@resettrans');

Route::post('/bayarcicilan', 'KasirController@bayarcicilan');


//cetak
Route::post('/cetaknotakecil', 'KasirController@cetaknotakecil');

Route::get('/notakecil', function(){
    return view('nota.notakecil');
});

Route::get('/rolesinject', function(){
    $role = Role::create(['name' => 'manager']);
    $permission = Permission::create(['name' => 'managing']);

});

Route::get('/layout', function(){
    return view("layouts.layout2");
});

Route::post('/hapusstok', 'StokController@hapusstok');

Route::get('/detailstok', 'DetailStokController@index');
Route::post('/loaddatadetailstok', 'DetailStokController@loaddatadetailstok');
Route::post('/tambahdetailstok', 'DetailStokController@tambahdetailstok');

Route::get('/dsm', 'DSMController@index');
Route::post('/loaddsm', 'DSMController@loaddatadetailstok');
Route::post('/verifiying', 'DSMController@verifiying');
Route::post('/rejecting', 'DSMController@rejecting');


// Theodhore 19 Februari 2022

Route::get('request', function(){
    return view('request');
});



Route::post("/searchnotapreorder", "PreorderController@search");
Route::post("/getnb", "PreorderController@getnb");
Route::post("/bayarpreorder", "PreorderController@bayarpreorder");
ROute::post("/cetaknotabesar", "PreorderController@cetaknotabesar");


Route::get('/nota_besar_final', function(){
    return view('nota_besar');
});

Route::get('/injectproduk', "SeederJoy@inject");