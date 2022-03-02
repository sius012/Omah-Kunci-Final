<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckDataController extends Controller
{
    public function index(){
        $data = DB::table('nota_besar')->get();

        $data2 = [];


        foreach($data as $datas){
            if((strtotime(date("Y m d")) <= Carbon::createFromFormat("Y.m.d", date("Y.m.d",strtotime($datas->jatuh_tempo)))->addDays(-3)->format("Y m d")) and ($datas->status == "menunggu" or $datas->status == "ready")){
                array_push($data2, $datas);
            }
        }

        return json_encode($data2);
    }
}
