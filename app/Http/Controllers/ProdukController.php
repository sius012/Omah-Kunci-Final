<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;
use PDF;




class ProdukController extends Controller
{

    public function loadSingleProduk(Request $req){
        $produk = DB::table('produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->join('merek', 'produk.merk', '=','merek.nomer')->where('kode_produk', $req->input('kode_produk'))->first();
        return json_encode($produk);
    }

    public function getmerekinfo(Request $req){
        $datamerek = DB::table('merek')->where('nomer', $req->input('nomer'))->get();
        return json_encode($datamerek);
    }

    public function loadProduk(){
        $produk = DB::table('produk')->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')->get();
        return json_encode($produk);
    }
    public function index(Request $req){
        $kategori = DB::table('tipes')->get();
        $kodetype = DB::table('kode_types')->get();
        $merek = DB::table('mereks')->get();
        $produk = DB::table('new_produks')->join('mereks','new_produks.id_merek','mereks.id_merek')->join('tipes','new_produks.id_tipe','tipes.id_tipe')->join('kode_types','new_produks.id_ct','kode_types.id_kodetype');

        if($req->filled("tipe")){
            $produk->where('new_produks.id_tipe',$req->tipe);
        }
        if($req->filled("kodetipe")){
            $produk->where('new_produks.id_ct',$req->kodetipe);
        }
        if($req->filled("merek")){
            $produk->where('new_produks.id_merek',$req->merek);
        }

        return view("produk", ["tipe" => $kategori, "produk" => $produk->get(), "merek" => $merek, "kodetype" => $kodetype]);
    }

    public function search(Request $req){
        $kategori = DB::table('produk')->groupBy("id_kategori")->get();
        $kodetype = DB::table('produk')->groupBy("id_ct")->get();
        $merek = DB::table('produk')->groupBy("merk")->get();
       
      
        $kw = $req->kw;
        $type = $req->tp;
        $ct = $req->ct;
        $merk = $req->merk;

     
            $produk = DB::table('produk')->where("kode_produk", "LIKE","%".$kw."%")->orWhere("id_kategori", "LIKE","%".$kw."%")->orWhere("id_ct","LIKE","%".$kw."%")->orWhere("merk","LIKE","%".$kw."%")->get();
            return view("produk", ["kat" => $kategori, "produk" => $produk, "merek" => $merek, "kodetype" => $kodetype, "keyword" => $kw, "tipe" => $type, "id_ct" => $ct,"mereknya" => $merk]);
        
    
        
        
    }

    public function tambahbarang(Request $req){
        $kode_produk = $req->input('kode_produk');
        $nama_produk = $req->input('nama_produk');
        $merek_produk = $req->input('merek_produk');
        $id_kat = $req->input('kategori_produk');
        $harga_produk = $req->input('harga_produk');
        $satuan_produk = $req->input('satuan_produk');
        $codetype = $req->input('code_type');
        $diskon = $req->input('diskon');

        $nmerek = $req->input("nomermerek");

        $count = DB::table("produk")->where("id_kategori", $id_kat)->where("id_ct", $codetype)->where("merk",$merek_produk)->count();

       
        
        DB::table('produk')->insert(["kode_produk"=>$kode_produk,"nama_produk"=>$nama_produk,"merk" => $merek_produk, "id_kategori"=> $id_kat, "harga" => $harga_produk, 'stn' => $satuan_produk,"diskon"=>$diskon]);

        $getProduk = DB::table('produk')->join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')->get();
        return json_encode(["produk" => $getProduk]);
    }

    public function hapusproduk($kode){
       

        DB::table('produk')->where('kode_produk', $kode)->delete();
        return redirect()->route('produk');
        
    }

    public function updatebarang(Request $req,$id){
        DB::table('produk')->where('kode_produk',$id)->
                            update(["nama_produk" => $req->input('nama_produk'),"id_ct" => $req->input('id_ct'),"stn" => $req->input('stn'),"merk" => $req->input('merk'),"id_kategori" => $req->input('id_kategori'), "harga" => $req->input('harga'),'diskon'=>str_replace([".",","],"",$req->diskon)]);
                            return redirect()->route('produk');
       
        }

    public function tambahkategori(Request $req){
        $data = $req->input('kat');

        DB::table('kategori')->insert($data);
    }

    public function tambahmerek(Request $req){
        $data = $req->input('data');
        DB::table('merek')->insert($data);

        $getmerek =  DB::table('merek')->get();
        return json_encode(['merek' => $getmerek]);
    }

    public function ubahmerek(Request $req){
        $data = $req->input('data');
        DB::table('merek')->where('nomer', $data['nomer'])->update(['jumlah' => $data['jumlah']]);
        $getmerek =  DB::table('merek')->get();
        return json_encode(['merek' => $getmerek]);
    }
    public function hapusmerek(Request $req){
        $data = $req->input('nomer');
        DB::table('merek')->where('nomer', $data)->delete();
        $getmerek =  DB::table('merek')->get();
        return json_encode(['merek' => $getmerek]);
    }

    public function showdetail(Request $req){
        $kategori = DB::table('produk')->groupBy("id_kategori")->get();
        $kodetype = DB::table('produk')->groupBy("id_ct")->get();
        $merek = DB::table('produk')->groupBy("merk")->get();
        $produk = DB::table('produk')->take(50)->get();
        
        $kode = $req->input('kodebarcode');
        $data = DB::table("produk")->where('kode_produk',$kode)->take(1)->get();
   
        return view("produk", ["kat" => $kategori, "produk" => $produk, "merek" => $merek, "kodetype" => $kodetype, "data"=>$data[0]]);

        
    }

    public function update($id){
        dd($id);
    }

    public function printbarcode(Request $req){
        $listdata= [];

        $getter = DB::table('produk')->where('kode_produk', $req->kode_produk)->get()[0];
        
        for($i = 0;$i< $req->jml;$i++){
            array_push($listdata,$getter);
        }

        $pdf = PDF::loadview('cetakbarcode', ["data" => $listdata]);
        $path = public_path('pdf/');
            $fileName =  date('mdy').'-'."cetakbarcode". '.' . 'pdf' ;
            $pdf->save(storage_path("pdf/$fileName"));
        $storagepath = storage_path("pdf/$fileName");
        $base64 = chunk_split(base64_encode(file_get_contents($storagepath)));

    	return response()->json(["filename" => $base64]);
        
    }


}
