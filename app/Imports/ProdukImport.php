<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProdukImport implements ToCollection
{
    public $dato = [];
    /**
    * @param Collection $collection
    */
     

    public function collection(Collection $row)
    {
    
        foreach($row as $rows){
            array_push($this->dato,$rows[0]);
        }

        
    }

    public function getArray(){
        return $this->dato;
    }
}
