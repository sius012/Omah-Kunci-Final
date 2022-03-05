<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Events\SendGlobalNotification;

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



Route::get('/accountsetting', function(){
    return view('profile');
});

Route::get('/redirecting', 'RedirectController@index');

Route::middleware(["role:kasir|manager"])->group(function(){
    Route::post('/tampilreturn', 'TransaksiController@tampilreturn');
    Route::post("/printnotakecilbc", 'KasirController@printnotakecil');
    Route::post('/removesection','Kasir2Controller@remover');
    Route::get('/kasir', 'Kasir2Controller@index')
->name("kasir");
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
    Route::get('/showdetail/{no_nota}', 'TransaksiPreorder@index')->name('showdetail');
    Route::get('/caritransaksi', 'TransaksiController@index')->name('caritrans');
    Route::post('/tambahpreorder2', 'KasirController@tambahpreorder');
    Route::post('/cetakpreorder', 'KasirController@cetakpreorder');
    Route::get('/hapusnotabesar/{no_nota}', 'TransaksiPreorder@hapusnotabesar')->name('hapusnotabesar');
    Route::get('preorderpage', 'RiwayatPre@index');
    Route::get('/caripreorder', 'RiwayatPre@index')->name('caripreorder');
    Route::get('/hapuspreorder/{id}', 'RiwayatPre@hapus')->name('hapuspre');
});


Route::middleware(["role:admingudang|manager"])->group(function(){
    Route::post('/searchpro', 'DetailStokController@searcher');
    Route::post('/tambahstok', 'StokController@tambahstok');
    Route::post('/loadsinglestok', 'StokController@loadsinglestok');

    Route::post('/editstok', 'StokController@editstok');
    Route::post('/hapusstok', 'StokController@hapusstok');

    Route::get('/detailstok', 'DetailStokController@index');
    Route::post('/loaddatadetailstok', 'DetailStokController@loaddatadetailstok');
    Route::post('/tambahdetailstok', 'DetailStokController@tambahdetailstok');
    Route::get('/stok', 'StokController@index')->name('stok');
    Route::post('/loaddatastok', 'StokController@loaddatastok');
    Route::post('/updateallstok', 'StokController@updateallstok');
   
});

Route::middleware(["role:manager"])->group(function(){
    Route::post('/checkdata', 'CheckDataController@index');
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
    Route::post('/printbarcode', 'ProdukController@printbarcode');
    Route::get('/manajemen_akun', 'AkunController@index')->name('ma');
    Route::post('/updateakun/{id}', 'AkunController@updateakun')->name('updateakun');
    Route::get('/hapusakun/{id}', 'AkunController@hapusakun')->name('hapusakun');
    Route::get('/hapustransaksi/{id}', 'transaksiController@hapus')->name('hapustransaksi');
    Route::get('/dashboard', "HomeController@index")->name('home');
    Route::get('/importexcel', function(){
        return view('exceltodb');
    });
    Route::post('/injectitem', 'SeederJoyEvo@inject');
 });


Route::get('/check','FakeInject@index');

Route::get('/viewbarcode', function(){
    return view('cetakbarcode');
});



















//cetak







// Theodhore 19 Februari 2022




