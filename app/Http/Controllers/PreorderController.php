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
        $formdata = $req->input('formData');
        
        $id;
        $id2 = "";
        $id3;
        if($req->session()->has('id_nb')){
            $id = $req->session()->get('id_nb');
            DB::table('nota_besar')->where('id_transaksi', $id)->update($req->input('formData'));
        }else{
            $counter = DB::table('nota_besar')->count();
            $counter = $counter+1;
            $no = date("yymmdd").$counter;
            $counting = DB::table('nota_besar')->where("no_nota",$no)->count();
            if($counting < 1){
                $id = DB::table('nota_besar')->insertGetId(array_merge($req->input('formData'),['no_nota' => $no, 'termin' => 1]));
                $id2 = DB::table('nota_besar')->insertGetId(['ttd'=> $formdata["ttd"],'ttd'=> $formdata["ttd"],'up'=> $formdata["up"],'gm'=> $formdata["gm"],'total'=> $formdata["total"],'no_nota' => $no, 'termin' => 2]);
                $id3 = DB::table('nota_besar')->insertGetId(['ttd'=> $formdata["ttd"],'ttd'=> $formdata["ttd"],'up'=> $formdata["up"],'gm'=> $formdata["gm"],'total'=> $formdata["total"],'no_nota' => $no, 'termin' => 3]);
            }
          
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

        for($i = 0; $i < count($judulopsi);$i++){
            if($req->session()->has('id_nb')){
              
                $count = DB::table('nb_detail')->where('id_nb', $id2)->where('opsi',$i+1)->count();
                if($count > 0){
                    DB::table('nb_detail')->where('id_nb', $id2)->where('opsi',$i+1)->update(['judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
                }else{
                    DB::table('nb_detail')->insert(['id_nb' => $id2, 'opsi' => $i+1, 'judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
                }
            }else{
                DB::table('nb_detail')->insert(['id_nb' => $id2, 'opsi' => $i+1, 'judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
            }
            
        }

        for($i = 0; $i < count($judulopsi);$i++){
            if($req->session()->has('id_nb')){
              
                $count = DB::table('nb_detail')->where('id_nb', $id3)->where('opsi',$i+1)->count();
                if($count > 0){
                    DB::table('nb_detail')->where('id_nb', $id3)->where('opsi',$i+1)->update(['judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
                }else{
                    DB::table('nb_detail')->insert(['id_nb' => $id3, 'opsi' => $i+1, 'judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
                }
            }else{
                DB::table('nb_detail')->insert(['id_nb' => $id3, 'opsi' => $i+1, 'judul' => $judulopsi[$i],'ket' => $ketopsi[$i]]);
            }
            
        }

        

        $req->session()->put('id_nb', $id);

        


        
    }


    public function bayarpreorder(Request $req){
        $id = $req->input("id_transaksi");
        $formdata = $req->input("formData");

        DB::table('nota_besar')->where("id_transaksi", $id)->update(['us'=> $formdata["us"],'brp'=> $formdata["brp"]]);
    }









    public function resettrans(Request $req){
        $req->session()->forget('id_nb');
    }


    public function search(Request $req){
        $no_nota = $req->input("kw");


        $data = DB::table("nota_besar")->where("no_nota","LIKE", "%".$no_nota.'%')->get();

        return json_encode($data);
    }

    public function getnb(Request $req){
        $id_trans = $req->input("id_transaksi");
        $data1 = DB::table('nota_besar')->where('id_transaksi', $id_trans)->get();
        $data2 = DB::table('nb_detail')->where('id_nb', $id_trans)->get();
        $nn = $data1[0]->no_nota;
        $termin = $data1[0]->termin;
        
        $td = DB::table("nota_besar")->where("no_nota", $nn)->where("termin", "<", $termin)->sum("us");
        return json_encode(["nb" => $data1,  "opsi" => $data2, "td"=>$td]);
    }

    public function cetaknotabesar(Request $req){
        $id_trans = $req->input("id_transaksi");
    }

}
