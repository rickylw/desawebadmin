<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAnggaran;
use App\Models\KategoriBelanjaDesa;
use App\Models\KategoriBerita;
use App\Models\KategoriGaleri;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function tampilKategoriAnggaran(){
        $kategoriAnggaran = KategoriAnggaran::paginate(6);
        return view('kategori.anggaran', ['kategoriAnggaran' => $kategoriAnggaran]);
    }

    public function simpanKategoriAnggaran(){
        $inputs = request()->validate([
            'name' => 'required'
        ]);

        //Batal jika kategori sudah ada
        if(KategoriAnggaran::where('nama', $inputs['name'])->first()){
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
            return redirect()->route('kategori.anggaran');
        }

        $kategoriAnggaran = new KategoriAnggaran();
        $kategoriAnggaran->nama = $inputs['name'];
        if($kategoriAnggaran->save()){
            Session::flash('kategori-store-success', 'Data berhasil disimpan');
        }
        else{
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
        }
        return redirect()->route('kategori.anggaran');
    }

    public function tampilDetailKategoriAnggaran($id){
        $kategoriAnggaran = KategoriAnggaran::where('id', $id)->first();
        return view('kategori.detail-anggaran', ["kategoriAnggaran" => $kategoriAnggaran]);
    }

    public function ubahKategoriAnggaran($id){
        $kategoriAnggaran = KategoriAnggaran::where('id', $id)->first();

        if(request('name') == null){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.anggaran'); 
        }

        //Batal jika kategori sudah ada
        if(KategoriAnggaran::where('nama', request('name'))->first()){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.anggaran');
        }

        $kategoriAnggaran->nama = request('name');
        if($kategoriAnggaran->save()){
            Session::flash('kategori-update-success', 'Data berhasil diupdate');
        }
        else{
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
        }
        return redirect()->route('kategori.anggaran');        
    }
    
    public function tampilKategoriBelanjaDesa(){
        $kategoriBelanjaDesa = KategoriBelanjaDesa::paginate(6);
        return view('kategori.belanja-desa', ['kategoriBelanjaDesa' => $kategoriBelanjaDesa]);
    }

    public function simpanKategoriBelanjaDesa(){
        $inputs = request()->validate([
            'name' => 'required'
        ]);

        //Batal jika kategori sudah ada
        if(KategoriBelanjaDesa::where('nama', $inputs['name'])->first()){
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
            return redirect()->route('kategori.belanja-desa');
        }

        $kategoriBelanjaDesa = new KategoriBelanjaDesa();
        $kategoriBelanjaDesa->nama = $inputs['name'];
        $kategoriBelanjaDesa->save();
        if($kategoriBelanjaDesa->save()){
            Session::flash('kategori-store-success', 'Data berhasil disimpan');
        }
        else{
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
        }
        return redirect()->route('kategori.belanja-desa');
    }

    public function tampilDetailKategoriBelanjaDesa($id){
        $kategoriBelanjaDesa = KategoriBelanjaDesa::where('id', $id)->first();
        return view('kategori.detail-belanja-desa', ["kategoriBelanjaDesa" => $kategoriBelanjaDesa]);
    }

    public function ubahKategoriBelanjaDesa($id){
        $kategoriBelanjaDesa = KategoriBelanjaDesa::where('id', $id)->first();

        if(request('name') == null){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.belanja-desa'); 
        }

        //Batal jika kategori sudah ada
        if(KategoriBelanjaDesa::where('nama', request('name'))->first()){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.belanja-desa');
        }

        $kategoriBelanjaDesa->nama = request('name');
        if($kategoriBelanjaDesa->save()){
            Session::flash('kategori-update-success', 'Data berhasil diupdate');
        }
        else{
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
        }
        return redirect()->route('kategori.belanja-desa');        
    }
    
    public function tampilKategoriBerita(){
        $kategoriBerita = KategoriBerita::paginate(6);
        return view('kategori.berita', ['kategoriBerita' => $kategoriBerita]);
    }

    public function simpanKategoriBerita(){
        $inputs = request()->validate([
            'name' => 'required'
        ]);

        //Batal jika kategori sudah ada
        if(KategoriBerita::where('nama', $inputs['name'])->first()){
            Session::flash('kategori-store-success', 'Data berhasil disimpan');
            return redirect()->route('kategori.berita');
        }

        $kategoriBerita = new KategoriBerita();
        $kategoriBerita->nama = $inputs['name'];
        if($kategoriBerita->save()){
            Session::flash('kategori-store-success', 'Data berhasil disimpan');
        }
        else{
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
        }
        
        return redirect()->route('kategori.berita');
    }

    public function tampilDetailKategoriBerita($id){
        $kategoriBerita = KategoriBerita::where('id', $id)->first();
        return view('kategori.detail-berita', ["kategoriBerita" => $kategoriBerita]);
    }

    public function ubahKategoriBerita($id){
        $kategoriBerita = KategoriBerita::where('id', $id)->first();

        if(request('name') == null){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.berita'); 
        }

        //Batal jika kategori sudah ada
        if(KategoriBerita::where('nama', request('name'))->first()){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.berita');
        }

        $kategoriBerita->nama = request('name');
        if($kategoriBerita->save()){
            Session::flash('kategori-update-success', 'Data berhasil diupdate');
        }
        else{
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
        }
        return redirect()->route('kategori.berita');        
    }
    
    public function tampilKategoriGaleri(){
        $kategoriGaleri = KategoriGaleri::paginate(6);
        return view('kategori.galeri', ['kategoriGaleri' => $kategoriGaleri]);
    }

    public function simpanKategoriGaleri(){
        $inputs = request()->validate([
            'name' => 'required'
        ]);

        //Batal jika kategori sudah ada
        if(KategoriGaleri::where('nama', $inputs['name'])->first()){
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
            return redirect()->route('kategori.galeri');
        }

        $kategoriGaleri = new KategoriGaleri();
        $kategoriGaleri->nama = $inputs['name'];
        if($kategoriGaleri->save()){
            Session::flash('kategori-store-success', 'Data berhasil disimpan');
        }
        else{
            Session::flash('kategori-store-failed', 'Data gagal disimpan');
        }
        return redirect()->route('kategori.galeri');
    }

    public function tampilDetailKategoriGaleri($id){
        $kategoriGaleri = KategoriGaleri::where('id', $id)->first();
        return view('kategori.detail-galeri', ["kategoriGaleri" => $kategoriGaleri]);
    }

    public function ubahKategoriGaleri($id){
        $kategoriGaleri = KategoriGaleri::where('id', $id)->first();

        if(request('name') == null){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.galeri'); 
        }

        //Batal jika kategori sudah ada
        if(KategoriGaleri::where('nama', request('name'))->first()){
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
            return redirect()->route('kategori.galeri');
        }

        $kategoriGaleri->nama = request('name');
        if($kategoriGaleri->save()){
            Session::flash('kategori-update-success', 'Data berhasil diupdate');
        }
        else{
            Session::flash('kategori-update-failed', 'Data gagal diupdate');
        }
        return redirect()->route('kategori.galeri');        
    }
}
