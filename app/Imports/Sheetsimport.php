<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;

class Sheetsimport implements WithMultipleSheets
{
   
    /**
    * @param Collection $collection
    */
     

    public function sheets(): array
    {
    
        return [
            0 => new ProdukImport(),
        ];


    }

  
}
