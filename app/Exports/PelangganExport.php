<?php

namespace App\Exports;


use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromCollection,WithTitle,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $md;
    public $sd;
    public $tlp = null;
    public $almt = null;

    public function __construct($md, $sd, $tlp = null, $almt = null){
        $this->md = $md;
        $this->sd = $sd;
        $this->tlp = $tlp;
        $this->almt = $almt;
    }
  

    /**
     * @return Builder
     */
    public function collection()
    {
        if($this->tlp == null and $this->almt == null){
            return DB::table('transaksi')->whereBetween(DB::raw('substr(created_at,1,10)'),[$this->md,$this->sd])->whereNotIn("status",["draf","return"])
            ->select("nama_pelanggan")->get();
        }else if($this->tlp != null and $this->almt != null){
            return DB::table('transaksi')->whereBetween(DB::raw('substr(created_at,1,10)'),[$this->md,$this->sd])->whereNotIn("status",["draf","return"])
            ->select("nama_pelanggan","alamat","telepon")->get();
        }else if($this->tlp == null and $this->almt != null){
            return DB::table('transaksi')->whereBetween(DB::raw('substr(created_at,1,10)'),[$this->md,$this->sd])->whereNotIn("status",["draf","return"])
            ->select("nama_pelanggan","alamat")->get();
        }else if($this->tlp != null and $this->almt == null){
            return DB::table('transaksi')->whereBetween(DB::raw('substr(created_at,1,10)'),[$this->md,$this->sd])->whereNotIn("status",["draf","return"])
            ->select("nama_pelanggan","telepon")->get();
        }
        
    }

    public function headings(): array
    {
        if($this->tlp == null and $this->almt == null){
            return ["Nama Pelanggan"];
        }else if($this->tlp != null and $this->almt != null){
            return ["Nama Pelanggan","Alamat","No Telepon"];
        }else if($this->tlp == null and $this->almt != null){
            return ["Nama Pelanggan","Alamat"];
        }else if($this->tlp != null and $this->almt == null){
            return ["Nama Pelanggan","No Telepon"];
        }
        
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return "BARCODE";
    }

}
