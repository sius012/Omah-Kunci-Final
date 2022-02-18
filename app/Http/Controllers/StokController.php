<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;




class StokController extends Controller
{
    public function index(){
        $data = DB::table('stok')->join('produk', 'stok.kode_produk','=','produk.kode_produk')->select('stok.*', 'produk.nama_produk')->get();
        $produk = DB::table('produk')->get();
        return view('stok', ['data' => $data, 'produk'=>$produk]);
    }


    public function loadsinglestok(Request $req){
        $id = $req->input('id');
        $data = DB::table('stok')->where('id',$id)->get();
        return json_encode($data);
    }

    public function tambahstok(Request $req){
        $can = true;
        $data = $req->input('data');
        $counter = DB::table('stok')->where('kode_produk',$data['kode_produk'])->count();
        if($counter > 0){
            $can = false;
        }else{
            DB::table('stok')->insert($data);
        }
        return json_encode(['can' => $can]);
        
    }

    public function editstok(Request $req){
        $data = $req->input('data');
        DB::table('stok')->where('kode_produk', $data['kode_produk'])->update($data);
    }

    public function hapusstok(Request $req){
        $data = $req->input('kode_stok');
        DB::table('stok')->where('id', $data)->delete();
    }
}
