<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    public function index(){
        $data = DB::table('stok')->get();
        $produk = DB::table('produk')->get();
        return view('stok', ['data' => $data, 'produk'=>$produk]);
    }
}
