<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;

class TransaksiPreorder extends Controller
{
    public function index(){
        $data = [];
        
        $get = DB::table("nota_besar")->groupBy("no_nota")->get()->toArray();
        

        foreach($get as $d){
            $row = (array) $d;
          
                 $opsi = DB::table("nota_besar")->where("no_nota", $d->no_nota)->select("us", "brp", "total", "updated_at", "status","id_transaksi")->where('termin', ">", $d->termin)->get()->toArray();
                 array_push($row, (array) $opsi);
                 array_push($data, $row);
            
        }
     
        return view("transaksipreorder", ['data'=>$data,'page'=>'kasir']);
     
        
    }

    public function showDetail(Request $req){
        $id = $req->input("id");

        $trans =  DB::table("detail_transaksi")->join('produk', 'produk.kode_produk', '=', 'detail_transaksi.kode_produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->where("kode_trans", $id)->get();
        $detail = DB::table("transaksi")->where("kode_trans", $id)->get();

        return json_encode(["trans" => $trans, "detail" => $detail]);
    }
}
