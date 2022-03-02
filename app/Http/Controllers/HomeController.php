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

      
      $date = Carbon::createFromFormat('Y.m.d', date("Y.m.d"));
      $date = $date->addDays(35);


      $jumlahproduk = DB::table('produk')->count();

    $dt=Carbon::now();

 

      $daily = [];


      $daily["hari"]["pemasukan"] = DB::table("transaksi")->whereDay("created_at",Carbon::now()->day)->sum("subtotal");
      $daily["minggu"]["pemasukan"] = DB::table("transaksi")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum("subtotal");
      $daily["bulanan"]["pemasukan"] = DB::table("transaksi")->whereMonth("created_at",Carbon::now()->month)->sum("subtotal");
    
      
        return view('home',['daily'=>$daily]);
        
    }
}
