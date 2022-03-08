<?php

namespace App\Exports;


use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdukExport implements FromCollection,WithTitle,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */




  

    /**
     * @return Builder
     */
    public function collection()
    {
        return DB::table('new_produks')->join('mereks','new_produks.id_merek','mereks.id_merek')->join('tipes','new_produks.id_tipe','tipes.id_tipe')->join('kode_types','new_produks.id_ct','kode_types.id_kodetype')
        ->select("tipes.id_tipe","tipes.nama_tipe","kode_types.id_kodetype","kode_types.nama_kodetype","mereks.id_merek","mereks.nama_merek","new_produks.kode_produk","new_produks.nama_produk","new_produks.satuan")->get();
    }

    public function headings(): array
    {
        return ["NO.","TIPE", "NO", "KODE TIPE","NO","MEREK","BARCODE","NAMA_PRODUK","STN"];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return "BARCODE";
    }

}
