<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    public function index(){
        $akun = DB::table('users')->join('model_has_roles','users.id','=','model_has_roles.model_id')->join('roles','roles.id','=','model_has_roles.role_id')->select('users.*','roles.name as rolename','roles.id as roleid')->get();
        return view('management_akun',['akun'=> $akun]);
    }

    public function updateakun(Request $req){
        $id= $req->id;
        $idroles = $req->roleid;

        DB::table('model_has_roles')->where('model_id', $id)->update(['role_id'=>$idroles]);
        return redirect()->route('ma');
    }

    public function hapusakun(Request $req){
        $id=$req->id;
        DB::table('users')->where('id', $id)->delete();
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        return back();
    }
}
