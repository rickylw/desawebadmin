<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
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
}
