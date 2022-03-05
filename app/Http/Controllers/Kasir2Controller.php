<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kasir2Controller extends Controller
{
    public function index(Request $req){
      
       
        $no = DB::table('transaksi')->get()->count();
        $no = str_pad($no+1, 6, '0', STR_PAD_LEFT);

    
        return view('kasir', ['no_nota'=>$no,'page'=>'kasir']);
    }

    public function remover(Request $req){
        if($req->session()->has('transaksi')){
            $transaksi = $req->session()->get('transaksi');
            $id = $transaksi['id_transaksi'];
            $checkstatus = DB::table('transaksi')->where('kode_trans',$id)->where("status","lunas")->count();
            if($checkstatus < 1){
                DB::table("detail_transaksi")->where('kode_trans',$id)->delete();
                DB::table("transaksi")->where('kode_trans',$id)->delete();
            }
      
            $req->session()->forget('transaksi');
        }
    }
}
