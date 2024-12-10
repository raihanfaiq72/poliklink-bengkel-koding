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
            'id'            => $anonim->id,
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

    public function jadwal_periksa_post(Request $request)
    {
        $data = $request->validate([
            'id_dokter'     => 'required',
            'hari'          => 'required',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required'
        ]);

        try{
            $data['status'] = 1;
            JadwalPeriksa::create($data);

            return redirect()->back()->with('alert',[
                'type'      => 'success',
                'title'     => 'Berhasil',
                'message'   => 'Berhasil menambahkan jadwal'
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('alert',[
                'type'      => 'error',
                'title'     => 'Gagal',
                'message'   => 'Gagal menambahkan jadwal'
            ]);
        }
    }

    public function jadwal_periksa_edit($id)
    {
        return view($this->views."Jadwalperiksa.edit",[
            'jadwal'    => JadwalPeriksa::where('id',$id)->first()
        ]);
    }
    
}
