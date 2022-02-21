<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;
use PDF;
use Auth;

class KasirController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        $no = DB::table('transaksi')->get()->count();
        $no = str_pad($no+1, 6, '0', STR_PAD_LEFT);
        return view('kasir.kasir', ['no_nota'=>$no,'page'=>'kasir']);
    }

    public function loader(Request $req){
        if($req->session()->has('transaksi')){
            if($req->session()->has('datadetail')){
                return(json_encode(["datadetail" => $req->session()->get('datadetail')]));
            }
        }
    }

    public function cari(Request $req){
        $kw = $req->input('data');
        $data = DB::table('produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->where('kode_produk',"LIKE","%".$kw."%")->get();
        return( json_encode($data));
    }

    public function tambahTransaksi(Request $req){
        $no = DB::table('transaksi')->get()->count();
        $no += 1;   
        $id = DB::table('transaksi')->insertGetId(['no_nota' => $no]);
        $req->session()->put('transaksi', ['id_transaksi' => $id, 'no_nota' => $no]);
    }

    public function tambahTransaksiDetail(Request $req){
        $id_kasir = Auth::user()->id;   
        $data = $req->input('data');
        $id_trans = "";
        if($req->session()->has('transaksi')){
            $id_transaksi = $req->session()->get('transaksi')['id_transaksi'];
            $id_trans = $id_transaksi;
        }else{
            $no = DB::table('transaksi')->get()->count();
            $no += 1;   
            $id = DB::table('transaksi')->insertGetId(['no_nota' => str_pad($no+1, 6, '0', STR_PAD_LEFT), 'id_kasir' =>$id_kasir]);
            $req->session()->put('transaksi', ['id_transaksi' => $id, 'no_nota' => $no]);
            $id_trans = $id;
        }

        if($req->session()->has('keranjang')){
            $req->session()->put('keranjang');
        }

        $jml=0;

        $counter = DB::table('detail_transaksi')->where('kode_trans', $id_trans)->where('kode_produk', $data['kode_produk'])->count();
        if($counter < 1){
            DB::table('detail_transaksi')->insert(['kode_trans' => $id_trans, 'kode_produk' => $data['kode_produk'], "jumlah" => $data["jumlah"],"potongan" => $data["potongan"]]);
        }else{
            $jumlah = DB::table('detail_transaksi')->where('kode_trans', $id_trans)->where('kode_produk', $data['kode_produk'])->pluck('jumlah')->first();
            $potongan = DB::table('detail_transaksi')->where('kode_trans', $id_trans)->where('kode_produk', $data['kode_produk'])->pluck('potongan')->first();
            $jml = $data['harga']  * ((int)$jumlah + $data['jumlah']);
            $ptg = $data['potongan'];
            DB::table('detail_transaksi')->where('kode_trans', $id_trans)->where('kode_produk', $data['kode_produk'])->update(['jumlah' => $jumlah + $data['jumlah'], 'potongan' => $ptg]);
        }
        
        $datadetail = DB::table('detail_transaksi')->join('produk','detail_transaksi.kode_produk','=','produk.kode_produk')->where('kode_trans',$id_trans)->get()->toArray();

        $subtotal = 0;
        
        foreach($datadetail as $dts){
            $subtotal += $dts->jumlah * ($dts->harga - $dts->potongan);
        }

         DB::table('transaksi')->where('kode_trans', $id_trans)->update(['subtotal' => $subtotal]);
        
        $req->session()->put('datadetail', $datadetail);
       
        return(json_encode(['datadetail'=>$datadetail]));
    }

    public function selesai(Request $req){
        $data = $req->input('data');
        $id_transaksi = $req->session()->get('transaksi')['id_transaksi'];
  

        $total = DB::table("transaksi")->where('kode_trans', $id_transaksi)->pluck("subtotal")->first();


        $stok = DB::table("detail_transaksi")->where('kode_trans', $id_transaksi)->get();


        $afterdiskon = $total - $data['diskon']; 
        $status = "lunas";
        if($data["metode"] == "kredit"){
            DB::table("cicilan")->insert(['kode_transaksi' => $id_transaksi, 'termin' => 1, 'nominal' => $data["bayar"], 'via' => $data['via'], 'id_kasir' => Auth::user()->id]);
            DB::table("cicilan")->insert(['kode_transaksi' => $id_transaksi, 'termin' => 2,] );
            DB::table("cicilan")->insert(['kode_transaksi' => $id_trasaksi, 'termin' => 3,] );
            $status = "belum lunas";
        }

        foreach($stok as $produks){
            $currentstok = DB::table("stok")->where('kode_produk', $produks->kode_produk)->get();
            DB::table("stok")->where('kode_produk', $produks->kode_produk)->update(["jumlah" => (int) $currentstok[0]->jumlah - (int) $produks->jumlah]);
        }



        DB::table('transaksi')->where('kode_trans', $id_transaksi)->update(["nama_pelanggan" => $data['nama_pelanggan'],"subtotal" => $afterdiskon, "status" => $status, "diskon" => $data["diskon"],"metode" => $data['metode'],"bayar" => $data["bayar"]]);
        

    }

    public function forgoting(Request $req){
        $req->session()->forget('transaksi');
        $req->session()->forget('datadetail');

        return redirect()->route('kasir');
    }

    
    public function resetTransaction(Request $req){
        $id_trans = $req->session()->get('transaksi')['id_transaksi'];

        DB::table("transaksi")->where("kode_trans",$id_trans)->delete();
        DB::table("detail_transaksi")->where("kode_trans",$id_trans)->delete();
        
        $req->session()->forget('transaksi');
        $req->session()->forget('datadetail');
        return redirect()->route('kasir');
    }

    public function removedetail(Request $req){
        $id_trans = $req->session()->get('transaksi')['id_transaksi'];
        $id_detail = $req->input('id_detail');
        DB::table("detail_transaksi")->where("id",$id_detail)->delete();
        $req->session()->forget('datadetail');
        $datadetail = DB::table('detail_transaksi')->join('produk','detail_transaksi.kode_produk','=','produk.kode_produk')->where('kode_trans',$id_trans)->get();

        $subtotal = 0;
        foreach($datadetail as $ds){
            $subtotal += $ds->jumlah * ($ds->harga - $ds->potongan);
        }

        DB::table("transaksi")->where("kode_trans", $id_trans)->update(['subtotal' => $subtotal]);
        
        $req->session()->put('datadetail', $datadetail); 
        return(json_encode($datadetail));
    }

    public function bayarcicilan(Request $req){
        $id = $req->input('kode_transaksi');
        $termin = $req->input('termin');
        $nominal = $req->input('nominal');
        $via = $req->input('via');


        DB::table('cicilan')->where('kode_transaksi', $id)->where('termin',$termin)->update(['nominal' => $nominal,'via' => $via,'id_kasir'=>Auth::user()->id]);
        $checking = DB::table('cicilan')->where('kode_transaksi',$id)->whereNotNull('nominal')->count();
        if($checking >= 3){
            DB::table('transaksi')->where('kode_trans', $id)->update(['status' => 'lunas']);
        }
    }

    public function cetaknotakecil(Request $req){
        $id = $req->session()->get('transaksi')['id_transaksi'];
        $data = DB::table('transaksi')->join('users', 'users.id', '=', 'transaksi.id_kasir')->where('kode_trans',$id)->get();
        $data2 = DB::table('detail_transaksi')->join('produk', 'produk.kode_produk','=','detail_transaksi.kode_produk')->where('kode_trans',$id)->get();

        $pdf = PDF::loadview('nota.notakecil', ["data" => $data,"data2"=>$data2]);
        $path = public_path('pdf/');
            $fileName =  date('mdy').'-'.$data[0]->kode_trans. '.' . 'pdf' ;
            $pdf->save(storage_path("pdf/$fileName"));
        $storagepath = storage_path("pdf/$fileName");
        $base64 = chunk_split(base64_encode(file_get_contents($storagepath)));

    	return response()->json(["filename" => $base64]);
    }

 
}
