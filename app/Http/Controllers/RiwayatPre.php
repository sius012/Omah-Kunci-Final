<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatPre extends Controller
{
    public function index(Request $req){
        if($req->has('nama')){
            $data = DB::table('preorder')->where('ttd','LIKE','%'.$req->nama."%")->orWhere('no_nota','LIKE','%'.$req->nama."%")->get();

            return view("preorderPage",['data'=>$data]);
        }
        
        $data = DB::table('preorder')->orderBy("created_at","desc")->get();

        return view("preorderPage",['data'=>$data]);
    }

    public function hapus($id){
        DB::table('preorder')->where('id', $id)->delete();
        return back();
    }

    public function showdetail(Request $req){
        $id=$req->id;

        $data = DB::table("preorder")->join("preorder_detail","preorder_detail.id_preorder","preorder.id")->join("new_produks","new_produks.kode_produk","=","preorder_detail.kode_produk")
        ->join("mereks","mereks.id_merek","=","new_produks.id_merek")->select("preorder.*","preorder_detail.*","new_produks.nama_produk","mereks.nama_merek")->where('preorder.id',$id)->get();

        return json_encode($data);
    }
}
