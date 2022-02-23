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
      $jumlahproduk = DB::table('produk')->count();



      $daily = [];

      $daily["hari"]["pemasukan"] = DB::table("transaksi")->whereDay("created_at",Carbon::now()->day)->sum("subtotal");
    
      
        return view('home');
        
    }
}
