<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Website;

class ProfilController extends Controller
{
    public function tampilSejarah(){
        $profil = Profil::all()->first();
        return view('profil.sejarah', ['profil' => $profil]);
    }

    public function simpanSejarah(){
        $profil = Profil::all()->first();

        if(request('post_sejarah')){
            //Menyimpan foto
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
            //Menyimpan foto
            $namefile = 'wilayah-geografis.'.request('post_geografis')->extension();
            $inputs['post_wilayah_geografis'] = 'storage/profil/'.$namefile;
            request('post_geografis')->storeAs('profil', $namefile, 'public');
            $profil->gambar_geografis = $inputs['post_wilayah_geografis'];
        }

        $profil->geografis = request('editor');
        $profil->save();
        return redirect()->route('profil.wilayah-geografis');
    }

    public function tampilWebsite(){
        $website = Website::all()->first();
        return view('profil.website', ['website' => $website]);
    }

    public function simpanWebsite(){
        $website = Website::all()->first();

        $inputs = request()->validate([
            'title' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
        ]);

        $website->title = $inputs['title'];
        $website->description = request('editor');
        $website->facebook = $inputs['facebook'];
        $website->instagram = $inputs['instagram'];
        $website->youtube = $inputs['youtube'];
        $website->twitter = $inputs['twitter'];

        //Batal jika deskripsi website kosong
        if($website->description == null){
            return redirect()->route('profil.website');
        }

        if(request('logo_desa')){
            //Menyimpan foto
            $namefile = 'logo-desa.'.request('logo_desa')->extension();
            $inputs['logo_desa'] = 'storage/profil/'.$namefile;
            request('logo_desa')->storeAs('profil', $namefile, 'public');
            $website->logo_desa = $inputs['logo_desa'];
        }

        if(request('logo_kecil')){
            //Menyimpan foto
            $namefile = 'logo-kecil.'.request('logo_kecil')->extension();
            $inputs['logo_kecil'] = 'storage/profil/'.$namefile;
            request('logo_kecil')->storeAs('profil', $namefile, 'public');
            $website->logo_kecil = $inputs['logo_kecil'];
        }

        $website->save();
        return redirect()->route('profil.website');
    }
}
