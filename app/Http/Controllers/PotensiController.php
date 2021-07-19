<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kependudukan;
use App\Models\Pendidikan;
use App\Models\KategoriAnggaran;
use App\Models\KategoriBelanjaDesa;

class PotensiController extends Controller
{
    public function tampilKependudukan(){
        $kependudukan = Kependudukan::all()->first();
        return view('potensi.kependudukan', ['kependudukan' => $kependudukan]);
    }

    public function simpanKependudukan(){
        $kependudukan = Kependudukan::all()->first();

        $inputs = request()->validate([
            'laki_15' => 'required',
            'perempuan_15' => 'required',
            'laki_25' => 'required',
            'perempuan_25' => 'required',
            'laki_35' => 'required',
            'perempuan_35' => 'required',
            'laki_45' => 'required',
            'perempuan_45' => 'required',
            'laki_55' => 'required',
            'perempuan_55' => 'required',
            'laki_65' => 'required',
            'perempuan_65' => 'required',
            'laki_atas' => 'required',
            'perempuan_atas' => 'required',
            'usia_produktif' => 'required'
        ]);

        $kependudukan->laki_15 = $inputs['laki_15'];
        $kependudukan->perempuan_15 = $inputs['perempuan_15'];
        $kependudukan->laki_25 = $inputs['laki_25'];
        $kependudukan->perempuan_25 = $inputs['perempuan_25'];
        $kependudukan->laki_35 = $inputs['laki_35'];
        $kependudukan->perempuan_35 = $inputs['perempuan_35'];
        $kependudukan->laki_45 = $inputs['laki_45'];
        $kependudukan->perempuan_45 = $inputs['perempuan_45'];
        $kependudukan->laki_55 = $inputs['laki_55'];
        $kependudukan->perempuan_55 = $inputs['perempuan_55'];
        $kependudukan->laki_65 = $inputs['laki_65'];
        $kependudukan->perempuan_65 = $inputs['perempuan_65'];
        $kependudukan->laki_atas = $inputs['laki_atas'];
        $kependudukan->perempuan_atas = $inputs['perempuan_atas'];
        $kependudukan->usia_produktif = $inputs['usia_produktif'];
        $kependudukan->save();
        return redirect()->route('potensi.kependudukan');
    }

    public function tampilPendidikan(){
        $pendidikan = Pendidikan::all()->first();
        return view('potensi.pendidikan', ['pendidikan' => $pendidikan]);
    }
    
    public function simpanPendidikan(){
        $pendidikan = Pendidikan::all()->first();

        $inputs = request()->validate([
            'laki_belum_sekolah' => 'required',
            'perempuan_belum_sekolah' => 'required',
            'laki_tamat_sd' => 'required',
            'perempuan_tamat_sd' => 'required',
            'laki_tamat_smp' => 'required',
            'perempuan_tamat_smp' => 'required',
            'laki_tamat_sma' => 'required',
            'perempuan_tamat_sma' => 'required',
            'laki_tamat_pt' => 'required',
            'perempuan_tamat_pt' => 'required',
            'laki_tidak_diketahui' => 'required',
            'perempuan_tidak_diketahui' => 'required'
        ]);

        $pendidikan->laki_belum_sekolah = $inputs['laki_belum_sekolah'];
        $pendidikan->perempuan_belum_sekolah = $inputs['perempuan_belum_sekolah'];
        $pendidikan->laki_tamat_sd = $inputs['laki_tamat_sd'];
        $pendidikan->perempuan_tamat_sd = $inputs['perempuan_tamat_sd'];
        $pendidikan->laki_tamat_smp = $inputs['laki_tamat_smp'];
        $pendidikan->perempuan_tamat_smp = $inputs['perempuan_tamat_smp'];
        $pendidikan->laki_tamat_sma = $inputs['laki_tamat_sma'];
        $pendidikan->perempuan_tamat_sma = $inputs['perempuan_tamat_sma'];
        $pendidikan->laki_tamat_pt = $inputs['laki_tamat_pt'];
        $pendidikan->perempuan_tamat_pt = $inputs['perempuan_tamat_pt'];
        $pendidikan->laki_tidak_diketahui = $inputs['laki_tidak_diketahui'];
        $pendidikan->perempuan_tidak_diketahui = $inputs['perempuan_tidak_diketahui'];
        $pendidikan->save();
        return redirect()->route('potensi.pendidikan');
    }

    public function tampilAnggaran(){
        return view('potensi.anggaran');
    }

    public function simpanAnggaran(){
        $inputs = request()->validate([
            'anggaranPendapatan' => 'required'
        ]);

        dd($inputs);
    }
}