<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function tampilLogin(){
        return view('auth.login');
    }
}
