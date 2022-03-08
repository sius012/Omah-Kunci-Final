<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ProdukSheets implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $tipe;
    
    public function __construct($tipes)
    {
        $this->tipe = $tipes;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach($this->tipe as $tps){
            $sheets[]= new ProdukExport($tps->nama_tipe);
        }

        return $sheets;
    }
}
