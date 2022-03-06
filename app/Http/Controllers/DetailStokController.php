<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Auth;
use PDF;


class DetailStokController extends Controller
{
    public function loaddatadetailstok(){
        $data = DB::table('detail_stok')->join('new_produks', 'new_produks.kode_produk','detail_stok.kode_produk')->join('mereks', 'new_produks.id_merek','mereks.id_merek')->join('users','users.id','=','detail_stok.id_ag')->select('detail_stok.*','new_produks.nama_produk','new_produks.satuan','users.name')->get();
        return json_encode($data);
    }
    public function index(){
        $produk = DB::table('new_produks')->join("mereks","mereks.id_merek","=","new_produks.id_merek")->join("tipes","tipes.id_tipe","=","new_produks.id_tipe")->join("kode_types","kode_types.id_kodetype","=","new_produks.id_ct")->get();


        $data = DB::table('detail_stok')->join('new_produks', 'new_produks.kode_produk','detail_stok.kode_produk')->join('mereks', 'new_produks.id_merek','mereks.id_merek')->join('users','users.id','=','detail_stok.id_ag')->select('detail_stok.*','new_produks.nama_produk','new_produks.satuan','users.name')->get();
        return view('detailstok', ['produk' => $produk,'detail_stok' => $data]);
    }

    public function tambahdetailstok(Request $req){
        $data = $req->input('data');
        $data['id_ag'] = Auth::user()->id;
        DB::table('detail_stok')->insert($data);
        if($data['status'] == 'masuk'){
            $jml = DB::table('stok')->where('kode_produk', $data['kode_produk'])->pluck('jumlah');
            $jml = $jml[0];
            DB::table('stok')->where('kode_produk', $data['kode_produk'])->update(['jumlah'=> (int) $jml + (int) $data['jumlah']]);
        }else if($data['status'] == 'keluar'){
            $jml = DB::table('stok')->where('kode_produk', $data['kode_produk'])->pluck('jumlah');
            $jml = $jml[0];
            DB::table('stok')->where('kode_produk', $data['kode_produk'])->update(['jumlah'=> (int) $jml - (int) $data['jumlah']]);
        }   
    }

    public function searcher(Request $req){
        $kw = $req->kw;

        $data = DB::table('new_produks')->join("mereks","mereks.id_merek","=","new_produks.id_merek")->join("tipes","tipes.id_tipe","=","new_produks.id_tipe")->join("kode_types","kode_types.id_kodetype","=","new_produks.id_ct")->where("kode_produk","LIKE","%".$kw."%")->get();;

        return json_encode($data);


        
    }

    public function printstoktrack(Request $req){
       

        $dato = DB::table("detail_stok")->join("new_produks","detail_stok.kode_produk","=","new_produks.kode_produk")->join("mereks","mereks.id_merek","=","new_produks.id_merek")->join("users","users.id","=","detail_stok.id_ag");
        $dato_trans = DB::table("detail_transaksi")->join("new_produks","detail_transaksi.kode_produk","=","new_produks.kode_produk")->join("mereks","mereks.id_merek","=","new_produks.id_merek")->where("status","!=","return");

        if($req->berdasarkan == "hari"){
            $dato->whereDate('detail._stok.created_at', Carbon::today());
            $dato_trans->whereDate('detail_transaksi.created_at', Carbon::today());
        }else if($req->berdasarkan == "minggu"){
            $dato->whereBetween('detail_stok.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $dato_trans->whereBetween('detail_transaksi.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        }else{
            $dato->whereMonth('detail_stok.created_at', Carbon::now()->month);
            $dato_trans->whereMonth('detail_transaksi.created_at', Carbon::now()->month);
        }
        $pdf = PDF::loadview('trackstokprint', ["data1" => $dato->get(),'data2'=>$dato_trans->get()]);
        $path = public_path('pdf/');
        $fileName =  date('mdy').'-'."Stok Harian". '.' . 'pdf' ;
        $pdf->save(storage_path("pdf/$fileName"));
        $storagepath = storage_path("pdf/$fileName");
        $base64 = chunk_split(base64_encode(file_get_contents($storagepath)));

    	return json_encode(["filename" => $base64]);
        
    }
}
