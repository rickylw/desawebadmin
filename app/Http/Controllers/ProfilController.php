<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function tampilSejarah(){
        $profil = Profil::all()->first();
        return view('profil.sejarah', ['profil' => $profil]);
    }

    public function simpanSejarah(){
        $profil = Profil::all()->first();

        if(request('post_sejarah')){
            $namefile = 'sejarah.'.request('post_sejarah')->extension();
            $inputs['post_sejarah'] = 'storage/profil/'.$namefile;
            request('post_sejarah')->storeAs('profil', $namefile, 'public');
            $profil->gambar_sejarah = $inputs['post_sejarah'];
        }

        $profil->sejarah = request('editor');
        $profil->save();
        return redirect()->route('profil.sejarah');
    }

    public function tampilWilayahGeografis(){
        $profil = Profil::all()->first();
        return view('profil.wilayah-geografis', ['profil' => $profil]);
    }

    public function simpanWilayahGeografis(){
        $profil = Profil::all()->first();

        if(request('post_geografis')){
            $namefile = 'wilayah-geografis.'.request('post_geografis')->extension();
            $inputs['post_wilayah_geografis'] = 'storage/profil/'.$namefile;
            request('post_geografis')->storeAs('profil', $namefile, 'public');
            $profil->gambar_geografis = $inputs['post_wilayah_geografis'];
        }

        $profil->geografis = request('editor');
        $profil->save();
        return redirect()->route('profil.wilayah-geografis');
    }
}
