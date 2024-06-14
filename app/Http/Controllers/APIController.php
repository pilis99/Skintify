<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skin;

class APIController extends Controller
{
    public function searchSkin(Request $request){
        $cari = $request->input('s');

        $skins = Skin::where('nama','LIKE',"%$cari%")->get();

        if($skins->isempty())
        {
            return response()->json([
                'success' => false,
                'data' => 'Data Tidak Ditemukan'
            ],404)->header('Access-Control-Allow-Origin','http://127.0.0.1:5500');
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => $skins
            ],200)->header('Access-Control-Allow-Origin','http://127.0.0.1:5500');
        }
    }
}
