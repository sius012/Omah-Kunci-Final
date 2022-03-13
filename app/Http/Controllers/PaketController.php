<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function index(){
        $data = DB::table('paket')->get();

        return view('paket',['paket'=>$data]);
    }

    public function tambahpaket(Request $req){
    
        $nama_paket = $req->namapaket;
        $counter = DB::table('paket')->count();
        $kode_paket = "99".str_pad($counter+1,4,0,STR_PAD_LEFT);
        $listproduk = $req->kode;
        $listjumlah = $req->jumlah;
        $listharga = $req->harga;

        $produk = "";
        $jumlah = "";
        $harga = "";
        foreach($listproduk as $i => $ls){
            $produk .= $ls.",";
          
        }
        foreach($listjumlah as $i => $lj){
 
            $jumlah .= $listjumlah[$i].",";


        }
        foreach($listharga as $i => $lh){

            $harga .= $lh.",";
            
        }

      
        DB::table('paket')->insert(['kode_paket'=>$kode_paket,"nama_paket"=>$nama_paket,"kode_produk"=>$produk,"jumlah"=>$jumlah,"harga"=>$harga]);

        return back();
       
        
    }

    public function ubahpaket(Request $req){
        $id =$req->id;
        $nama_paket = $req->namapaket;
        $counter = DB::table('paket')->count();
        $listproduk = $req->kode;
        $listjumlah = $req->jumlah;
        $listharga = $req->harga;

        $produk = "";
        $jumlah = "";
        $harga = "";
        foreach($listproduk as $i => $ls){
            $produk .= $ls.",";
          
        }
        foreach($listjumlah as $i => $lj){
 
            $jumlah .= $listjumlah[$i].",";


        }
        foreach($listharga as $i => $lh){

            $harga .= $lh.",";
            
        }

      
        DB::table('paket')->where("id",$id)->update(["nama_paket"=>$nama_paket,"kode_produk"=>$produk,"jumlah"=>$jumlah,"harga"=>$harga]);

        return back();
       
        
    }

    public function hapuspaket($id){
        DB::table("paket")->where("id",$id)->delete();

        return back();
    }

    public function editpaket($id){
        $datas2 = DB::table('paket')->get();

     
        $data = DB::table("paket")->where("id",$id)->get();

        $data2 = [];

        foreach(explode(",",substr($data[0]->kode_produk,0,-1)) as $i => $datos ){
            $data2["kode_produk"][$i] = $datos;
            $data2["jumlah"][$i] = explode(",",substr($data[0]->jumlah,0,-1))[$i];
            $data2["harga"][$i] = explode(",",substr($data[0]->harga,0,-1))[$i];
        }

        return view("paket",['paket'=>$datas2,"data"=>$data[0],"data2"=>$data2]);
    }
}

