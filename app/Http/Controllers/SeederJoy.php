<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeederJoy extends Controller
{
    public function inject(){
        $barcode = [[11001001
    ],[11001002
    ],[11001003
    ],[11001004
    ],[11001005
    ],[11001006
    ],[11001007
    ],[11001008
    ],[11001009
    ],[11001010
    ],[
    ],[11002001
    ],[
    ],[
    ],[11003001
    ],[11003002
    ],[11003003
    ],[11003004
    ],[
    ],[11004001
    ],[11004002
    ],[
    ],[11005001
    ],[11005002
    ],[11005003
    ],[11005004
    ],[
    ],[11006001
    ],[11006002
    ],[
    ],[11007001
    ],[]];

$nama_produk = [['12" PUTIH'
],['14" PUTIH'
],['16" PUTIH'
],['10" COKLAT'
],['14" COKLAT'
],['2021 - 8" SN'
],['2021 - 10" SN'
],['2021 - 14" SN'
],['SD - 16" - 2MM SS'
],['SD - 20" - 2,5MM SS'
],[''
],['14" SN'
],[''
],[''
],['8" SS'
],['16" SS'
],['20" SS'
],['24" SS'
],[''
],['10" KY'
],['20" KY'
],[''
],['8" SS'
],['8" GP'
],['24" GP'
],['28" SS'
],[''
],['8" SS'
],['12" SN'
],[''
],['20" SS'
],['']];

$satuan =[["PS"
],["PS"
],["PS"
],["PS"
],["PS"
],["PS"
],["PS"
],["PS"
],["PS"
],["PS"
],[""
],["PS"
],[""
],[""
],["PS"
],["PS"
],["PS"
],["PS"
],[""
],["PS"
],["PS"
],[""
],["PS"
],["PS"
],["PS"
],["PS"
],[""
],["PS"
],["PS"
],[""
],["PS"
],[""]];

$merk = [["1"
],["ALBION"
],[""
],[""
],[""
],[""
],[""
],[""
],[""
],[""
],[""
],["2"
],["DEA"
],[""
],["3"
],["INLOCK"
],[""
],[""
],[""
],["4"
],["LINK"
],[""
],["5"
],["SES"
],[""
],[""
],[""
],["6"
],["WINA"
],[""
],["7"
],["555"]];


    $currentmerk = "";
    for($i = 0;$i < count($barcode);$i++){
       
        if($barcode[$i] != null){
            if(isset($merk[$i+1])){
                if($merk[$i+1] != null){
                    if($merk[$i+1][0] !==  ""){
                        $currentmerk =  $merk[$i+1][0];
                    }
                }
            }
           
            DB::table("produk")->insert(["id_kategori" => 1,"id_ct" => 10, "kode_produk" => $barcode[$i][0],"merk" => $currentmerk, "nama_produk" => $nama_produk[$i][0], "stn" => $satuan[$i][0]]);
        }
        
    }

 


    }
}
