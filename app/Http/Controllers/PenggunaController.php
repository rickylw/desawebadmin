<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Admin;

class PenggunaController extends Controller
{
    public function tampilMasyarakat(){
        $masyarakat = Masyarakat::paginate(10);
        return view('pengguna.masyarakat', ['masyarakat' => $masyarakat]);
    }

    public function tampilTambahMasyarakat(){
        return view('pengguna.tambah-masyarakat');
    }

    public function simpanMasyarakat(){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required'
        ]);

        $masyarakat = new Masyarakat();
        $masyarakat->username = $inputs['username'];
        $masyarakat->password = md5($inputs['password']);
        $masyarakat->nik = $inputs['nik'];
        $masyarakat->nama = $inputs['nama'];
        $masyarakat->alamat = $inputs['alamat'];
        $masyarakat->nohp = $inputs['nohp'];
        $masyarakat->email = $inputs['email'];
        
        $masyarakat->save();
        return redirect()->route('pengguna.masyarakat');
    }

    public function tampilDetailMasyarakat($id){
        $masyarakat = Masyarakat::where('id', $id)->first();
        return view('pengguna.detail-masyarakat', ['masyarakat' => $masyarakat]);
    }

    public function updateMasyarakat($id){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required'
        ]);

        $masyarakat = Masyarakat::where('id', $id)->first();
        $masyarakat->username = $inputs['username'];
        $masyarakat->password = md5($inputs['password']);
        $masyarakat->nik = $inputs['nik'];
        $masyarakat->nama = $inputs['nama'];
        $masyarakat->alamat = $inputs['alamat'];
        $masyarakat->nohp = $inputs['nohp'];
        $masyarakat->email = $inputs['email'];
        
        $masyarakat->save();
        return redirect()->route('pengguna.masyarakat');
    }

    public function hapusMasyarakat($id){
        Masyarakat::where('id', $id)->delete();
        return redirect()->route('pengguna.masyarakat');
    }
    public function tampilAdmin(){
        $admin = admin::paginate(10);
        return view('pengguna.admin', ['admin' => $admin]);
    }

    public function tampilTambahAdmin(){
        return view('pengguna.tambah-admin');
    }

    public function simpanAdmin(){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required'
        ]);

        $admin = new Admin();
        $admin->username = $inputs['username'];
        $admin->password = md5($inputs['password']);
        $admin->nik = $inputs['nik'];
        $admin->nama = $inputs['nama'];
        $admin->alamat = $inputs['alamat'];
        $admin->nohp = $inputs['nohp'];
        $admin->email = $inputs['email'];
        
        $admin->save();
        return redirect()->route('pengguna.admin');
    }

    public function tampilDetailAdmin($id){
        $admin = Admin::where('id', $id)->first();
        return view('pengguna.detail-admin', ['admin' => $admin]);
    }

    public function updateAdmin($id){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required'
        ]);

        $admin = Admin::where('id', $id)->first();
        $admin->username = $inputs['username'];
        $admin->password = md5($inputs['password']);
        $admin->nik = $inputs['nik'];
        $admin->nama = $inputs['nama'];
        $admin->alamat = $inputs['alamat'];
        $admin->nohp = $inputs['nohp'];
        $admin->email = $inputs['email'];
        
        $admin->save();
        return redirect()->route('pengguna.admin');
    }

    public function hapusAdmin($id){
        Admin::where('id', $id)->delete();
        return redirect()->route('pengguna.admin');
    }
}
