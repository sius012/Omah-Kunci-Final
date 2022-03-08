<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ProdukSheets;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ExportProdukController extends Controller
{
    public function export(){

        $tipe = DB::table("tipes")->get();


    

        return Excel::download(new ProdukExport,'BARCODE PROGRAM 2.xlsx');
    }
}
