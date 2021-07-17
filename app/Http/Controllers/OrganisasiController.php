<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function tampilStrukturOrganisasi(){
        $organisasi = Organisasi::all()->first();
        return view('organisasi.struktur-organisasi', ['organisasi' => $organisasi]);
    }

    public function simpanStrukturOrganisasi(){
        $organisasi = Organisasi::all()->first();

        if(request('post_struktur')){
            $namefile = 'struktur-organisasi.'.request('post_struktur')->extension();
            $inputs['post_struktur'] = 'storage/profil/'.$namefile;
            request('post_struktur')->storeAs('profil', $namefile, 'public');
            $organisasi->gambar_struktur = $inputs['post_struktur'];
        }

        $organisasi->struktur = request('editor');
        $organisasi->save();
        return redirect()->route('organisasi.struktur-organisasi');
    }

    public function tampilVisiMisi(){
        $organisasi = Organisasi::all()->first();
        return view('organisasi.visi-misi', ['organisasi' => $organisasi]);
    }

    public function simpanVisiMisi(){
        $organisasi = Organisasi::all()->first();

        if(request('post_visi_misi')){
            $namefile = 'visi-misi.'.request('post_visi_misi')->extension();
            $inputs['post_visi_misi'] = 'storage/profil/'.$namefile;
            request('post_visi_misi')->storeAs('profil', $namefile, 'public');
            $organisasi->gambar_visi_misi = $inputs['post_visi_misi'];
        }

        $organisasi->visi_misi = request('editor');
        $organisasi->save();
        return redirect()->route('organisasi.visi-misi');
    }
}
