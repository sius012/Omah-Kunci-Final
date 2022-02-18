<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PreorderController extends Controller
{
    public function loaddata(Request $req){
        $isEmpty = true;
        $data = null;
        $dataopsi = null;
        if($req->session()->has('id_nb')){
           $data =  DB::table('nota_besar')->where('id_transaksi', $req->session()->get('id_nb'))->first();
           $dataopsi =  DB::table('nb_detail')->where('id_nb', $req->session()->get('id_nb'))->get()->toArray();
           $isEmpty = false;
        }
        return json_encode(['data' => (array)$data, 'dataopsi' => (array) $dataopsi, 'isEmpty'  => $isEmpty,'page'=>'kasir']);
    }
    public function index(Request $req){

            return view("notabesar");
        
     
        
    }


    public function tambahtransaksi(Request $req){
        // $ttd = $req->input('ttd');
        // $up = $req->input('up');
        // $us = $req->input('us');
        // $brp = $req->input('brp');
        // $gm = $req->input('gm');
        // $total = $req->input('total');

        $judulopsi = $req->input('judulopsi');
        $ketopsi = $req->input('ketopsi');
       

        $id;
        if($req->session()->has('id_nb')){
            $id = $req->session()->get('id_nb');
            DB::table('nota_besar')->where('id_transaksi', $id)->update($req->input('formData'));
        }else{
            $counter = DB::table('nota_besar')->count();
            $counter = str_pad($counter+1, 6, '0', STR_PAD_LEFT);
            $id = DB::table('nota_besar')->insertGetId(array_merge($req->input('formData'),['no_nota' => $counter]));
        }

    
        
        for($i = 0; $i < count($judulopsi);$i++){
            if($req->session()->has('id_nb')){
              
                $count = DB::table('nb_detail')->where('id_nb', $id)->where('opsi',$i+1)->count();
                if($count > 0){
                    DB::table('nb_detail')->where('id_nb', $id)->where('opsi',$i+1)->update(['judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
                }else{
                    DB::table('nb_detail')->insert(['id_nb' => $id, 'opsi' => $i+1, 'judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
                }
            }else{
                DB::table('nb_detail')->insert(['id_nb' => $id, 'opsi' => $i+1, 'judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
            }
            
        }

        $req->session()->put('id_nb', $id);

        


        
    }

    public function resettrans(Request $req){
        $req->session()->forget('id_nb');
    }
}
