<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;

class transaksiController extends Controller
{
    public function index(){
        $data = [];
        
        $get = DB::table("transaksi")->orderBy("updated_at" ,'asc')->get()->toArray();
        

        foreach($get as $d){
            $row = (array) $d;
          
            if($d->metode == "kredit"){
                 $transaksikredit = DB::table("cicilan")->where("kode_transaksi", $d->kode_trans)->first();
                 array_push($row, (array) $transaksikredit);
            
            }
            array_push($data, $row);
  
            
            
           
        }
     
        return view("transaksi", compact('data'));

        
    }

    public function showDetail(Request $req){
        $id = $req->input("id");

        $trans =  DB::table("detail_transaksi")->join('produk', 'produk.kode_produk', '=', 'detail_transaksi.kode_produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->where("kode_trans", $id)->get();
        $detail = DB::table("transaksi")->where("kode_trans", $id)->get();

        return json_encode(["trans" => $trans, "detail" => $detail]);
    }
}
