<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RedirectController extends Controller
{
    public function index(){
        $rolename = Auth::user()->roles[0]['name'];

        switch ($rolename) {
            case 'kasir':
                return redirect()->route('kasir');
                break;
            
            case 'admin gudang':
                return redirect()->route('stok');
                break;
            default:
                 return redirect()->route('home');
                break;
        }
    }
}
