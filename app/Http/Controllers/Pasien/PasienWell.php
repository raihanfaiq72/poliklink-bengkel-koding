<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienWell extends Controller
{
    private $view = 'Pasien.';
    public function login()
    {
        return view($this->view.'Login.login');
    }

    public function register()
    {
        return view($this->view.'Login.register');
    }

    public function daftar_store(Request $request)
    {
        $data = $request->validate([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'no_ktp'    => $request->no_ktp,
            'password'  => $request->password,
        ]);

        Pasien::create([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'no_ktp'    => $request->no_ktp,
            'password'  => Hash::make($request->password),
            'katasandi' => $request->password,
            'no_rm'     => $this->semesta()
        ]);
    }

    private function semesta()
    {
        $hariini        = Carbon::today();
        $pasienhariini  = Pasien::whereDate('created_at',$hariini)->count();
        $Urutanpasiem   = $pasienhariini+1;

        return $Urutanpasiem;
    }
}
