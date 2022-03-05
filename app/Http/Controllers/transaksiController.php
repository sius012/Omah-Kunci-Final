<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;

class transaksiController extends Controller
{
    public function index(Request $req){
        $data = [];
      
        
        $get = DB::table("transaksi")->orderBy("updated_at" ,'desc')->where('no_nota', $req->no_nota)->get()->toArray();

        if($req->has('no_nota')){
            $get = DB::table("transaksi")->orderBy("updated_at" ,'desc')->where('no_nota', $req->no_nota)->get()->toArray();
        }else{
            $get = DB::table("transaksi")->orderBy("updated_at" ,'desc')->get()->toArray();
        }
        


        

        foreach($get as $d){
            $row = (array) $d;
          
            if($d->metode == "kredit"){
                 $transaksikredit = DB::table("cicilan")->where("kode_transaksi", $d->kode_trans)->get()->toArray();
                 array_push($row, (array) $transaksikredit);
            
            }

        
            array_push($data, $row);
  
            
            
           
        }
    //  dd($data);

        return view("transaksi", compact('data'));

        
    }

    public function tampilreturn(Request $req){
        $id=$req->id_trans;
        $datatrans = DB::table('transaksi')->join('detail_transaksi','detail_transaksi.kode_trans','=','transaksi.kode_trans')->join('produk','detail_transaksi.kode_produk','=','produk.kode_produk')->where('transaksi.kode_trans', $id)->get();
     
        return json_encode($datatrans);

        
    }

    public function showDetail(Request $req){
        $id = $req->input("id");
        $cicilandata = [];
        $trans =  DB::table("detail_transaksi")->join('produk', 'produk.kode_produk', '=', 'detail_transaksi.kode_produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->where("kode_trans", $id)->get();
        $detail = DB::table("transaksi")->where("kode_trans", $id)->get();
        $cicilan = DB::table("cicilan")->where("kode_transaksi", $id)->get();
        foreach($cicilan as $cicilans){
            $row = [];
            array_push($row, (array) $cicilans);
            $idkasir = $cicilans->id_kasir;
            if($idkasir != null){
                $kasir = DB::table('users')->where('id', $idkasir)->pluck("name");
                array_push($row, $kasir[0]);
            }
            
            array_push($cicilandata, $row);
            
        }


        return json_encode(["trans" => $trans, "detail" => $detail, 'cicilan'=>$cicilandata]);
    }

    public function hapus($id){
        DB::table('transaksi')->where('kode_trans',$id)->delete();
        DB::table('detail_transaksi')->where('kode_trans',$id)->delete();

        return back();
    }
}
