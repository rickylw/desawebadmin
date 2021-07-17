<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kependudukan;

class KependudukanController extends Controller
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
}
