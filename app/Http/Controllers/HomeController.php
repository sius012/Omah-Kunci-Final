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


      $daily["hari"]["pemasukan nota kecil"] = DB::table("transaksi")->whereDay("created_at",Carbon::now()->day)->where('status','!=','draf')->sum("subtotal");
      $daily["hari"]["pemasukan nota besar"] = DB::table("nota_besar")->whereDay("created_at",Carbon::now()->day)->sum("us");
      $daily["hari"]["pemasukan preorder"] = DB::table("preorder")->whereDay("created_at",Carbon::now()->day)->where('status','!=','draft')->sum("us");


      $daily["minggu"]["pemasukan nota kecil"] = DB::table("transaksi")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status','!=','draf')->sum("subtotal");
      $daily["minggu"]["pemasukan nota besar"] = DB::table("nota_besar")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum("us");
      $daily["minggu"]["pemasukan preorder"] =   DB::table("preorder")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status','!=','draft')->sum("us");


      $daily["bulanan"]["pemasukan nota kecil"] = DB::table("transaksi")->whereMonth("created_at",Carbon::now()->month)->where('status','!=','draft')->sum("subtotal");
      $daily["bulanan"]["pemasukan nota besar"] =  DB::table("nota_besar")->whereMonth("created_at",Carbon::now()->month)->where('status','!=','draft')->sum("us");
      $daily["bulanan"]["pemasukan preorder"] = DB::table("preorder")->whereMonth("created_at",Carbon::now()->month)->where('status','!=','draft')->sum("us");
    
      
        return view('home',['daily'=>$daily,'produk'=>$product,'user'=>$user,'pt' => $pt]);
        
    }
}
