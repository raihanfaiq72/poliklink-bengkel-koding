<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class AdminWell extends Controller
{
    private $views = 'Admin.';
    public function dashboard()
    {
        return view($this->views.'Dashboard.index');
    }

    public function poli()
    {
        return view($this->views."Poli.index");
    }

    public function poli_post(Request $request)
    {
        $data = $request->validate([
            'nama_poli'     => 'required',
            'keterangan'    => 'required'
        ],[
            'nama_poli.required'    => 'nama poli wajib diisi',
            'keterangan.required'   => 'keterangan poli wajib diisi'
        ]);

        try{
            Poli::create($data);
            return redirect()->back()->with('sukses','Data poli berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Data poli gagal ditambahkan');
        }
    }
}
