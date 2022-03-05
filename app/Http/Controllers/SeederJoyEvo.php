<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\ProdukImport;
use App\Imports\Sheetsimport;
use Maatwebsite\Excel\Facades\Excel;
use File;

class SeederJoyEvo extends Controller
{
    public function index(){

    }

    public function inject(Request $req){

		// menangkap file excel
		$file = $req->file('filekita');
     
        $kode_tipe = array();
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('excel',$nama_file);
        $datos = fopen(public_path("excel/".$nama_file),"r");
        $tipe = array();
        $nama_produk = array();
        $barcode = array();
        $nama_produk = array();
        $merk = array();
        $stn = array();
        $i = 0;
        //Read the contents of the uploaded file 
        while (($filedata = fgetcsv($datos, 1000, ",")) !== FALSE) {
        $num = count($filedata);
        // Skip first row (Remove below comment if you want to skip the first row)
        if ($i == 0) {
        $i++;
        continue;
        }
        $tipe[$i-1] = $filedata[0];
        $kode_tipe[$i-1] = $filedata[1];
        $barcode[$i-1] = $filedata[3];
        $nama_produk[$i-1] = $filedata[4];
        $merk[$i-1] = $filedata[2];
        $stn[$i-1] = $filedata[5];
        $i++;
        }
        fclose($datos); //Close after reading
            
 
            
        $currentmerk = "";
        $currentct = "";
        $currenttipe = "";
        for($i = 0;$i < count($barcode);$i++){
           
            if($barcode[$i] != null){
                if(isset($merk[$i+1])){
                    if($merk[$i+1] != null || $merk[$i+1] != ""){
                        if($merk[$i+1] !==  ""){
                            $currentmerk =  $merk[$i+1];
                        }
                    }
                }
                if(isset($kode_tipe[$i+1])){
                    if($kode_tipe[$i+1] != null || $kode_tipe[$i+1] != ""){
                        if($kode_tipe[$i+1] !==  ""){
                            $currentct =  $kode_tipe[$i+1];
                        }   
                    }
                }
                if(isset($tipe[$i+1])){
                    if($tipe[$i+1] != null || $tipe[$i+1] != ""){
                        if($tipe[$i+1][0] !==  ""){
                            $currenttipe =  $tipe[$i+1];
                        }
                    }
                }
               
               DB::table("produk")->insert(["id_kategori" => $currenttipe, "kode_produk" => $barcode[$i],"merk" => $currentmerk, "nama_produk" => $nama_produk[$i], "stn" => $stn[$i],'id_ct'=>$currentct]);

               
            }
            
           
        }

       // dd($kode_tipe);

        return back();
       }
}
