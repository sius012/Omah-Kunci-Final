<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class DetailStokController extends Controller
{
    public function loaddatadetailstok(){
        $data = DB::table('detail_stok')->join('produk', 'produk.kode_produk','detail_stok.kode_produk')->join('users','users.id','=','detail_stok.id_ag')->select('detail_stok.*','produk.nama_produk','produk.stn','users.name')->get();
        return json_encode($data);
    }
    public function index(){
        $produk = DB::table('produk')->join('kategori','kategori.id_kategori','=','produk.id_kategori')->get();


        $data = DB::table('detail_stok')->get();
        return view('detailstok', ['produk' => $produk,'detail_stok' => $data]);
    }

    public function tambahdetailstok(Request $req){
        $data = $req->input('data');
        $data['id_ag'] = Auth::user()->id;
        DB::table('detail_stok')->insert($data);
        if($data['status'] = 'masuk'){
            $jml = DB::table('stok')->where('kode_produk', $data['kode_produk'])->pluck('jumlah');
            // $jml = $jml[0];
            // DB::table('stok')->where('kode_produk', $data['kode_produk'])->update(['jumlah'=> $jml + $data['jumlah']]);
        }else{
            $jml = DB::table('stok')->where('kode_produk', $data['kode_produk'])->pluck('jumlah');
            // $jml = $jml[0];
            // DB::table('stok')->where('kode_produk', $data['kode_produk'])->update(['jumlah'=> $jml - $data['jumlah']]);
        }   
    }
}
