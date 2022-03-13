<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kasir2Controller extends Controller
{
    public function index(Request $req){
        $jenis = "umum";
        $data = DB::table("new_produks")->join("tipes",'new_produks.id_tipe',"=","tipes.id_tipe")->groupBy("tipes.id_tipe")->get();
        $produk = [];

            foreach($data as $i => $datos){
                $getter1 = DB::table("new_produks")->join("tipes",'new_produks.id_tipe',"=","tipes.id_tipe")->where("id_ct",$datos->id_ct)->orderBy("id_ct")->get();
                foreach($getter1 as $ij=> $rows){
                    $getter2 = DB::table("new_produks")->join("tipes",'new_produks.id_tipe',"=","tipes.id_tipe")->where("id_merek",$rows->id_merek)->orderBy("id_ct")->get();
                }
            }

         
        if($req->filled("jenis")){
            $jenis=$req->jenis;
        }
       
       
        $no = DB::table('transaksi')->get()->count();
        $no = str_pad($no+1, 6, '0', STR_PAD_LEFT);

    
        return view('kasir', ["jenis"=>$jenis,'no_nota'=>$no,'page'=>'kasir']);
    }

    public function remover(Request $req){
        if($req->session()->has('transaksi')){
            $transaksi = $req->session()->get('transaksi');

            if(isset($transaksi['id_transaksi'])){
                $id = $transaksi['id_transaksi'];
                $checkstatus = DB::table('transaksi')->where('kode_trans',$id)->where("status","draft")->count();
                if($checkstatus >= 1){
                    DB::table("detail_transaksi")->where('kode_trans',$id)->delete();
                    DB::table("transaksi")->where('kode_trans',$id)->delete();
                }
            }
           
            
      
           
            if(isset($transaksi['id_pre'])){
            $idpre=$transaksi['id_pre'];
            $count = DB::table("preorder")->where('id',$idpre)->where("status","draft")->count();
                
                if($count >= 1){
                    DB::table("preorder_detail")->where('id_preorder',$idpre)->delete();
                DB::table("preorder")->where('id',$idpre)->delete();
                }
            }
          
        }
        $req->session()->forget('transaksi');
    }
}
