<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminWell extends Controller
{
    private $views = 'Admin.';
    public function dashboard()
    {
        return view($this->views.'Dashboard.index');
    }

    public function poli()
    {
        return view($this->views."Poli.index",[
            'poli'  => Poli::get()
        ]);
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
            return redirect()->back()->with('alert',[
                'type'  => 'success' , //error,warning,info
                'title' => 'Berhasil',
                'text'  => 'Berhasil menambahkan data poli'
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('alert',[
                'type'  => 'error' , //error,warning,info
                'title' => 'Gagal',
                'text'  => 'Gagal menambahkan data poli'
            ]);
        }
        // dd($data);
    }

    public function poli_edit($id)
    {
        return view($this->views.'Poli.edit',[
            'poli'  => Poli::where('id',$id)->first()
        ]);
    }

    public function poli_update(Request $request , $id)
    {
        $request->validate([
            'nama_poli'     => 'required',
            'keterangan'    => 'required'
        ]);
        try{
            $poli = Poli::where('id',$id)->first();
            $poli->update([
                'nama_poli'     => $request->nama_poli,
                'keterangan'    => $request->keterangan
            ]);

            return redirect()->route('poli')->with('alert',[
                'type'  => 'success',
                'title' => 'Berhasil',
                'text'  => 'Berhasil Edit Data'.$request->nama_poli
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with('alert',[
                'type'  => 'error',
                'title' => 'Gagal',
                'text'  => 'Terjadi Kesalahan'
            ]);
        }
    }

    public function poli_delete($id){
        $poli = Poli::where('id',$id)->first();
        $poli->delete();

        return redirect()->back()->with('alert',[
            'type'  => 'success',
            'title' => 'Berhasil',
            'text'  => 'Berhasil Menghapus Data'
        ]);
    }

    public function dokter()
    {
        return view($this->views.'Dokter.index',[
            'dokter'    =>  Dokter::get(),
            'poli'      =>  Poli::get()
        ]);
    }

    public function dokter_post(Request $request)
    {
        $data = $request->validate([
            'nama_dokter'      => 'required',
            'alamat'    => 'required',
            'no_hp'     => 'required',
            'id_poli'   => 'required',
        ],[
            'nama_dokter.required'  => 'nama dokter dokter harus diisi',
            'almat.required'    => 'alamat dokter harus diisi',
            'no_hp.required'    => 'nomor hp dokter wajib diisi',
            'id_poli'           => 'Poli harus diisi'
        ]);

       try{
            $password = Str::random(6);
            Dokter::create([
                'nama_dokter'      => $request->nama_dokter,
                'alamat'           => $request->alamat,
                'no_hp'            => $request->no_hp,
                'id_poli'          => $request->id_poli,
                'katasandi'        => $password,
                'password'         => Hash::make($password)
            ]);
            return redirect()->back()->with('alert',[
                'type'      => 'success',
                'title'     => 'Berhasil',
                'message'   => 'Berhasil Menambahkan Data Dokter'
            ]);
       }catch(\Exception $e){
            return redirect()->back()->with('alert',[
                'type'      => 'error',
                'title'     => 'Gagal',
                'message'   => 'Gagal Menambahkan Data Dokter' . $e->getMessage()
            ]);
       }

    }

    public function dokter_edit($id)
    {
        return view($this->views.'Dokter.edit',[
            'dokter'    => Dokter::where('id',$id)->first(),
            'poli'      => Poli::get()
        ]);
    }

    public function dokter_update(Request $request,$id)
    {
        // $request->validate([
        //     'nama_dokter'      => 'required',
        //     'alamat'           => 'required',
        //     'no_hp'            => 'required',
        //     'id_poli'          => 'required',
        //     'password'         => 'required'
        // ]);

        // // dd($data);
        
        // try{
        //     $dokter = Dokter::where('id',$id)->first();
        //     $dokter->update([
        //         'nama_dokter'      => $request->nama_dokter,
        //         'alamat'           => $request->alamat,
        //         'no_hp'            => $request->no_hp,
        //         'id_poli'          => $request->id_poli,
        //         'katasandi'        => $request->password,
        //         'password'         => Hash::make($request->password)
        //     ]);

        //     return redirect()->route('admin/dokter')->with('alert',[
        //         'type'      => 'success',
        //         'title'     => 'Berhasil',
        //         'message'   => 'Berhasil Edit Data'
        //     ]);
        // }catch(\Exception $e){
        //     return redirect()->back()->with('alert',[
        //         'type'      => 'error',
        //         'title'     => 'Gagal',
        //         'message'   => 'Gagal Edit Data'
        //     ]);
        // }
        dd([
            'nama_dokter'      => $request->nama_dokter,
                'alamat'           => $request->alamat,
                'no_hp'            => $request->no_hp,
                'id_poli'          => $request->id_poli,
                'katasandi'        => $request->password,
                'password'         => Hash::make($request->password)
        ]);
    }

    public function delete_dokter($id)
    {
        $dokter = Dokter::where('id',$id)->first();
        $dokter->delete();

        return redirect()->back()->with('alert',[
            'type'  => 'success',
            'title' => 'Berhasil',
            'message'   => 'Berhasil menghapus data'
        ]);
    }
}
