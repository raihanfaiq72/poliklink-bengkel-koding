<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterWell extends Controller
{
    private $views = 'Dokter.';

    public function login()
    {
        return view($this->views."Auth.login");
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);    

        $anonim = Dokter::where('username',$request->username)->first();
        if($anonim == NULL){
            return redirect()->back()->with('error','Data dokter tidak ditemukan');
        }

        if(Hash::check($request->password,$anonim->password) == FALSE){
            return redirect()->back()->with('error','Password Salah');
        }

        $session = [
            'nama_dokter'   => $anonim->nama_dokter,
            'role'          => $anonim->role,
            'alamat'        => $anonim->alamat,
            'no_hp'         => $anonim->no_hp,
            'id_poli'       => $anonim->id_poli,
            'isLogin'       => TRUE
        ];
        
        session($session);

        return redirect()->route('dokter.dashboard')->with('success','berhasil login');
    }

    public function dashboard()
    {
        return view($this->views."Dashboard.index");
    }

    public function jadwal_periksa()
    {
        $jadwal = JadwalPeriksa::get();
    
        return view($this->views . "Jadwalperiksa.index", [
            'jadwal' => $jadwal
        ]);
    }
    
}
