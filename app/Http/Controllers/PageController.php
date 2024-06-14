<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view("home",["key" => "home"]);
    }

    public function skin()
    {
        $skins = skin::orderBy('id','desc')->get();
        return view("skin",["key"=>"skin","mv"=>$skins]);
    }

    public function formaddskin()
    {
        return view("form-add",["key" => "skin"]);
    }
    
    public function save(Request $request){
            $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar',$file_name, 'public');
    
            skin::create([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'gambar' => $path
            ]);
            
            return redirect('/skin')->with('alert','Data Berhasil Disimpan');
        }
    public function formeditskin($id){
        $skin = skin::find($id);
        return view("form-edit",["key" => "skin", "mv"=>$skin]);        
    }
    
    public function updateskin($id,Request $request){
        $skin = skin::find($id);

        $skin->nama = $request->nama;
        $skin->jenis = $request->jenis;
        $skin->harga = $request->harga;

        if($request->gambar)
        {
            if($skin->gambar)
                {
                    Storage::disk('public')->delete($skin->gambar);
                }

            $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar',$file_name, 'public');
            $skin->gambar = $path;
            }

            $skin->save();
            return redirect("/skin")->with('alert','Data Diubah');
        }
    
        public function deleteskin($id){
            $skin=skin::find($id);
    
            if($skin->gambar)
            {
                Storage::disk('public')->delete($skin->gambar);
            }
            $skin->delete();
    
            return redirect("/skin")->with('alert','Data Berhasil Dihapus');
        }

        public function login(){
            return view("login");
        }

        public function formuser()
        {
            return view("formuser", ["key" => ""]);
        }

        public function updateuser(Request $request)
        {
            if($request->password_baru == $request->konfirmasi_pass)
            {
                $user = Auth::user();
                $user->password = bcrypt($request->konfirmasi_pass);
                $user->save();

                return redirect("/home")->with("alert", "Password Berhasil di Ubah");
            }
            else
            {
                return redirect("/user")->with("alert", "Password Gagal di Ubah");
            }
        }
}