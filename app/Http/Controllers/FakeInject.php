<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merek;
use App\Tipe;
use App\KodeType;
use App\Produk;
use App\NewProduk;
class FakeInject extends Controller
{
    public function index(){
        $data = Produk::get();

        $inj = [];

        $j=0;

        // for ($i=0; $i < count($data); $i++) { 
          
          
            
        // }

        foreach($data as $i =>$datas){
            $tipe = Tipe::where('nama_tipe',$datas->id_kategori)->get()->pluck('id_tipe')[0];
            $kodetipe = KodeType::where('nama_kodetype',$datas->id_ct)->get()->pluck('id_kodetype');
            $merek = Merek::where('nama_merek',$datas->merk)->get()->pluck('id_merek');
 
 
             $counter = Produk::where('id_kategori',$datas->id_kategori)->where('id_kategori',$datas->id_kategori)->where('id_ct',$datas->id_ct)->where('merk',$datas->merk)->count();
             if(  isset($kodetipe[0]) and isset($merek[0])){
                 $kodebarcode =  $counter;
             }else{
                 $kodebarcode = $i;
             }

  
            
             $inj[$i]['id_tipe'] = $tipe;
             $inj[$i]['id_ct'] = isset($kodetipe[0]) ? $kodetipe[0] : "";
             $inj[$i]['id_merek'] = isset($merek[0]) ? $merek[0] : "";
             $inj[$i]['nama_produk'] = $datas->nama_produk;
             $inj[$i]['satuan'] = $datas->stn;

           
             
        }


        foreach($inj as $ijs){
            $counter = NewProduk::where('id_tipe',$ijs['id_tipe'])->where('id_ct',$ijs['id_ct'])->where('id_merek',$ijs['id_merek'])->count();
            $barcode = $ijs['id_tipe'].str_pad($ijs['id_ct'],3,0,STR_PAD_LEFT).str_pad($ijs['id_merek'],3,0,STR_PAD_LEFT).str_pad($counter+1,3,0,STR_PAD_LEFT);
            $ijs['kode_produk'] = $barcode;
            NewProduk::insert($ijs);
            
        }

      

       
    
    }
}
