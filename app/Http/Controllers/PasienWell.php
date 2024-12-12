<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Models\Poli;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienWell extends Controller
{
    private $views = 'Pasien.';
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

        $anonim = Pasien::where('username',$request->username)->first();
        if($anonim == NULL){
            return redirect()->back()->with('error','Data Pasien Tidak Ditemukan');
        }

        if(Hash::check($request->password,$anonim->password)== FALSE){
            return redirect()->back()->with('error','Password Salah');
        }

        $session = [
            'id'        => $anonim->id,
            'nama'      => $anonim->nama,
            'role'      => $anonim->role,
            'alamat'    => $anonim->alamat,
            'no_ktp'    => $anonim->no_ktp,
            'no_rm'     => $anonim->no_rm,
            'isLogin'   => TRUE
        ];

        session($session);
        return redirect()->route('pasien.dashboard')->with('success','Berhasil Login');
    }

    private function semesta()
    {
        $hariini        = Carbon::today();
        $pasien_hariini = Pasien::whereDate('created_at', $hariini)->count();
        $urutan_pasien  = $pasien_hariini + 1;

        return $urutan_pasien;
    }

    public function register()
    {
        return view($this->views."Auth.register",[
            'urutan'    => $this->semesta()
        ]);
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'username'  => 'required',
            'alamat'    => 'required',
            'no_ktp'    => 'required',
            'no_rm'     => 'required',
            'password'  => 'required',
        ]);
    
        $data = [
            'nama'      => $request->nama,
            'username'  => $request->username,
            'alamat'    => $request->alamat,
            'no_ktp'    => $request->no_ktp,
            'no_rm'     => $request->no_rm,
            'password'  => Hash::make($request->password),
            'katasandi' => $request->password,
            'role'      => 'pasien'
        ];
    
        Pasien::create($data);

        return redirect()->route('login.pasien')->with('success','Berhasil Mendaftar');
    }

    public function logout()
    {
        session()->forget(['role','isLogin']);
        return redirect()->route('login.pasien')->with('success','Berhasil Logout');
    }

    public function dashboard()
    {
        return view($this->views."Dashboard.index");
    }

    public function poli()
    {
        return view($this->views."Poli.index",[
            'poli'      => Poli::get(),
        ]);
    }

    public function poli_id_poli($id)
    {
        $poli       = Poli::where('id', $id)->first();
        $dokters    = Dokter::where('id_poli', $poli->id)->get();
        $jadwals    = JadwalPeriksa::with('dokter')->whereIn('id_dokter', $dokters->pluck('id'))->get();

        return view($this->views . "Poli.show", [
            'jadwals'   => $jadwals,
            'poli'      => $poli,
            'pasien'    => session()->get('no_rm'),
            'pasien_id' => session()->get('id')
        ]);
    }

    public function riwayat_poli()
    {
        $riwayat = JadwalPeriksa::join('dokters', 'jadwal_periksas.id_dokter', '=', 'dokters.id')->join('polis', 'dokters.id_poli', '=', 'polis.id')->select('jadwal_periksas.hari','jadwal_periksas.jam_mulai','jadwal_periksas.jam_selesai','dokters.nama_dokter','dokters.alamat','polis.nama_poli')->get();
        $session = session()->get('id');
        $antrian = Pasien::where('id',$session)->get();
        $detail  = DaftarPoli::where('id_pasien',$session)->get();
        return view($this->views."Poli.riwayat",[
            'riwayat'   => $riwayat,
            'pasien'    => $antrian,
            'detail'    => $detail
        ]);
    }

    

    public function poli_daftar(Request $request)
    {
        $data = $request->validate([
            'id_pasien'     => 'required',
            'id_jadwal'     => 'required',
            'keluhan'       => 'required',
            'no_antrian'    => 'required'
        ]);

        try{
            DaftarPoli::create($data);

            return redirect()->route('pasien.poli.riwayat')->with('alert',[
                'type'     => 'success',
                'title'     => 'Berhasil',
                'message'   => 'Berhasil Mendaftar'
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('alert',[
                'type'     => 'error',
                'title'     => 'Gagal',
                'message'   => 'Gagal Mendaftar'
            ]);
        }
    }

}
