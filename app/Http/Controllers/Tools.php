<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tools extends Controller
{
    public static function doDisc($jumlah,$harga,$nominal,$prefix){
        if($prefix == "rupiah"){
            return $jumlah * ($harga - $nominal);
        }else{
            return $jumlah * ($harga - ($harga * $nominal/100));
        }
    }
}
