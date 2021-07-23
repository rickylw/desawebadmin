<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function tampilBerita(){
        $berita = DB::table('tbl_berita')
                    ->join('tbl_kategori_berita', 'tbl_berita.id_kategori_berita', '=', 'tbl_kategori_berita.id')
                    ->select(DB::raw('tbl_berita.*, tbl_kategori_berita.nama as nama_kategori, count(tbl_berita.id) as jumlah'))
                    ->groupBy('id_kategori_berita')->paginate(6);
        return view('berita.index', ['berita' => $berita]);
    }

    public function tampilTambahBerita(){
        $kategoriBerita = KategoriBerita::all();
        return view('berita.tambah', ['kategoriBerita' => $kategoriBerita]);
    }
    public function simpanBerita(){
        $inputs = request()->validate([
            'judul' => 'required',
            'namaKategori' => 'required',
            'fotoBerita' => 'required'
        ]);

        $kategoriBerita = KategoriBerita::where('nama', $inputs['namaKategori'])->first();

        $berita = new Berita();
        $berita->id_kategori_berita = $kategoriBerita->id;
        $berita->judul = $inputs['judul'];
        $berita->isi = request('editor');
        $berita->dibuat = date("Y-m-d H:i:s");
        $berita->dibuat_oleh = "Admin";

        if($berita->isi == null){
            return redirect()->route('berita.tambah');
        }

        if(request('fotoBerita')){
            $namefile = 'berita_'. date("Y_m_d_H_i_s") .'.'.request('fotoBerita')->extension();
            $inputs['fotoBerita'] = 'storage/berita/'.$namefile;
            request('fotoBerita')->storeAs('berita', $namefile, 'public');
            $berita->foto = $inputs['fotoBerita'];
        }

        $berita->save();
        return redirect()->route('berita.index');
    }

    public function tampilDaftarBerita($id){
        $berita = Berita::where('id_kategori_berita', $id)->paginate(6);
        return view('berita.daftar-berita', ['berita' => $berita]);
    }

    public function tampilDetailBerita($id){
        $kategoriBerita = KategoriBerita::all();
        $berita = DB::table('tbl_berita')
                    ->join('tbl_kategori_berita', 'tbl_berita.id_kategori_berita', '=', 'tbl_kategori_berita.id')
                    ->select(DB::raw('tbl_berita.*, tbl_kategori_berita.nama as nama_kategori'))
                    ->where('tbl_berita.id', $id)->first();
        return view('berita.detail-berita', ['berita' => $berita, 'kategoriBerita' => $kategoriBerita]);
    }

    public function updateBerita($id){
        $inputs = request()->validate([
            'judul' => 'required',
            'namaKategori' => 'required'
        ]);

        $berita = Berita::where('id', $id)->first();
        $kategoriBerita = KategoriBerita::where('nama', $inputs['namaKategori'])->first();

        $berita->id_kategori_berita = $kategoriBerita->id;
        $berita->judul = $inputs['judul'];
        $berita->isi = request('editor');
        $berita->diupdate = date("Y-m-d H:i:s");

        if($berita->isi == null){
            return redirect()->route('berita.detail-berita', $berita->id);
        }

        if(request('fotoBerita')){
            $filenameLama = explode("/", $berita->foto);
            \Storage::disk('public')->delete('berita/'.$filenameLama[count($filenameLama)-1]);

            $namefile = 'berita_'. date("Y_m_d_H_i_s") .'.'.request('fotoBerita')->extension();
            $inputs['fotoBerita'] = 'storage/berita/'.$namefile;
            request('fotoBerita')->storeAs('berita', $namefile, 'public');
            $berita->foto = $inputs['fotoBerita'];
        }

        $berita->save();
        return redirect()->route('berita.index');
    }
}
