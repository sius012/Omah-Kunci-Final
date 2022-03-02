<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatPre extends Controller
{
    public function index(Request $req){
        if($req->has('nama')){
            $data = DB::table('preorder')->where('ttd','LIKE','%'.$req->nama."%")->get();

            return view("preorderPage",['data'=>$data]);
        }
        
        $data = DB::table('preorder')->get();

        return view("preorderPage",['data'=>$data]);
    }

    public function hapus($id){
        DB::table('preorder')->where('id', $id)->delete();
        return back();
    }
}
