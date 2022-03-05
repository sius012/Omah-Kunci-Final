<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = DB::table('users')->count();
      $product = DB::table('produk')->count();
      $date = Carbon::createFromFormat('Y.m.d', date("Y.m.d"));
      $date = $date->addDays(35);


      $jumlahproduk = DB::table('produk')->count();

    $dt=Carbon::now();

 

      $daily = [];
      $pt = DB::table("detail_transaksi")->sum("jumlah");


      $daily["hari"]["pemasukan"] = DB::table("transaksi")->whereDay("created_at",Carbon::now()->day)->sum("subtotal") +  DB::table("nota_besar")->whereDay("created_at",Carbon::now()->day)->sum("us");
      $daily["minggu"]["pemasukan"] = DB::table("transaksi")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum("subtotal") +  DB::table("nota_besar")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum("us");
      $daily["bulanan"]["pemasukan"] = DB::table("transaksi")->whereMonth("created_at",Carbon::now()->month)->sum("subtotal") +  DB::table("nota_besar")->whereMonth("created_at",Carbon::now()->month)->sum("us");
    
      
        return view('home',['daily'=>$daily,'produk'=>$product,'user'=>$user,'pt' => $pt]);
        
    }
}
