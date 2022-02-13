<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;





class ProdukController extends Controller
{
    public function loadSingleProduk(Request $req){
        $produk = DB::table('produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->where('kode_produk', $req->input('kode_produk'))->first();
        return json_encode($produk);
    }
    public function loadProduk(){
        $produk = DB::table('produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->get();
        return json_encode($produk);
    }
    public function index(){
        $kategori = DB::table('kategori')->get();
        $produk = DB::table('produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->get();
        $merek =  DB::table('merek')->get();
        return view("produk", ["kat" => $kategori, "produk" => $produk, "merek" => $merek]);
    }

    public function tambahbarang(Request $req){
        $kode_produk = $req->input('kode_produk');
        $nama_produk = $req->input('nama_produk');
        $merek_produk = $req->input('merek_produk');
        $id_kat = $req->input('kategori_produk');
        $harga_produk = $req->input('harga_produk');
        $satuan_produk = $req->input('satuan_produk');

        DB::table('produk')->insert(["kode_produk"=>$kode_produk,"nama_produk"=>$nama_produk,"merk" => $merek_produk, "id_kategori"=> $id_kat, "harga" => $harga_produk, 'stn' => $satuan_produk]);

        $getProduk = DB::table('produk')->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')->get();
        return json_encode(["produk" => $getProduk]);
    }

    public function hapusbarang(Request $req){
        $id_produk = $req->input('kode_produk');

        DB::table('produk')->where('kode_produk', $id_produk)->delete();
        $produk = DB::table('produk')->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')->get();
        return json_encode($produk);
    }

    public function updatebarang(Request $req){
        DB::table('produk')->where('kode_produk',$req->input('kode_produk'))->update(["nama_produk" => $req->input('nama_produk'),"merk" => $req->input('merek_produk'),"id_kategori" => $req->input('kategori_produk'), "harga" => $req->input('harga_produk')]);
    }

    public function tambahkategori(Request $req){
        $data = $req->input('data');

        DB::table('transaksi')->insert(['id_kategori' => $data['id_kategori'], 'kategori' => $data['kategori']]);
    }

}
