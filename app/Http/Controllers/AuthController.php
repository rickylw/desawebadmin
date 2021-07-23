<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Admin;

class AuthController extends Controller
{
    public function tampilLogin(){
        return view('auth.login');
    }

    public function tampilDashboard(){
        return view('dashboard.index');
    }

    public function prosesLogin(){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $inputs['username'])->first();

        if($admin){
            if(md5($inputs['password']) == $admin->password){
                session(['login' => true, 'name' => $admin->nama]);
                return redirect()->route('dashboard');
            }
        }
        return redirect()->route('login.index');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
