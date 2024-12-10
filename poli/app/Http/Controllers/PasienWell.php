<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
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

    public function register()
    {
        return view($this->views."Auth.register");
    }

    public function register_proses(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama'      => 'required',
            'username'  => 'required',
            'alamat'    => 'required',
            'no_ktp'    => 'required',
            'no_rm'     => 'required',
            'password'  => 'required',
            'katasandi' => 'required',
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
        session()->flush();
        return redirect('/');
    }

    public function dashboard()
    {
        return view($this->views."Dashboard.index");
    }
}
