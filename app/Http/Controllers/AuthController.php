<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Admin;
use App\Models\Berita;
use App\Models\Galeri;

class AuthController extends Controller
{
    public function tampilLogin(){
        return view('auth.login');
    }

    public function tampilDashboard(){
        $masyarakat = Masyarakat::all();
        $admin = Admin::all();
        $berita = Berita::all();
        $galeri = Galeri::all();
        return view('dashboard.index', ['masyarakat' => $masyarakat, 'admin' => $admin, 'berita' => $berita, 'galeri' => $galeri]);
    }

    public function prosesLogin(){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Cek Username dan Password untuk login
        $admin = Admin::where('username', $inputs['username'])->first();

        if($admin){
            if(md5($inputs['password']) == $admin->password){
                //Membuat session login
                session(['login' => true, 'name' => $admin->nama]);
                return redirect()->route('dashboard');
            }
        }
        return redirect()->route('login.index');
    }

    public function logout(Request $request){
        //Membersihkan session
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
