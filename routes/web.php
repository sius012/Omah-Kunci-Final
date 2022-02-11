<?php

use Illuminate\Support\Facades\Route;

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