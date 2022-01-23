<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Models\KategoriGaleri;
use App\Models\Galeri;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Support\Facades\Session;

class BeritaController extends Controller
{
    public function tampilBerita(){
        //Query menggabungkan tabel berita dan kategori berita
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
            'fotoBerita' => 'required',
            'editor' => 'required'
        ]);

        $now = DB::select('select now() as date')[0]->date;

        $kategoriBerita = KategoriBerita::where('nama', $inputs['namaKategori'])->first();

        //Membuat berita
        $berita = new Berita();
        $berita->id_kategori_berita = $kategoriBerita->id;
        $berita->judul = $inputs['judul'];
        $berita->isi = request('editor');
        $berita->dibuat = $now;
        $berita->dibuat_oleh = session('name');

        //Menyimpan foto berita
        if(request('fotoBerita')){
            $namefile = 'berita_'. date("Y_m_d_H_i_s") .'.'.request('fotoBerita')->extension();
            $inputs['fotoBerita'] = 'storage/berita/'.$namefile;
            request('fotoBerita')->storeAs('berita', $namefile, 'public');
            $berita->foto = $inputs['fotoBerita'];
        }
        if($berita->save()){
            Session::flash('berita-store-success', 'Data berhasil disimpan');
        }
        else{
            Session::flash('berita-store-failed', 'Data gagal disimpan');
        }
        return redirect()->route('berita.index');
    }

    public function tampilDaftarBerita($id){
        $berita = Berita::where('id_kategori_berita', $id)->paginate(6);
        return view('berita.daftar-berita', ['berita' => $berita]);
    }

    public function tampilDetailBerita($id){
        //Menggabungkan tabel berita dan kategori
        $kategoriBerita = KategoriBerita::all();
        $berita = DB::table('tbl_berita')
                    ->join('tbl_kategori_berita', 'tbl_berita.id_kategori_berita', '=', 'tbl_kategori_berita.id')
                    ->select(DB::raw('tbl_berita.*, tbl_kategori_berita.nama as nama_kategori'))
                    ->where('tbl_berita.id', $id)->first();
        return view('berita.detail-berita', ['berita' => $berita, 'kategoriBerita' => $kategoriBerita]);
    }

    public function updateBerita(Request $request, $id){
        if(!$request->has('judul') || !$request->has('namaKategori') || !$request->has('editor')){
            Session::flash('berita-update-failed', 'Data gagal diupdate');
            return redirect()->route('berita.index');
        }

        $now = DB::select('select now() as date')[0]->date;

        $berita = Berita::where('id', $id)->first();
        $kategoriBerita = KategoriBerita::where('nama', $request['namaKategori'])->first();

        $berita->id_kategori_berita = $kategoriBerita->id;
        $berita->judul = $request['judul'];
        $berita->isi = request('editor');
        $berita->diupdate = $now;

        if(request('fotoBerita')){
            //Hapus foto lama
            $filenameLama = explode("/", $berita->foto);
            \Storage::disk('public')->delete('berita/'.$filenameLama[count($filenameLama)-1]);

            //Menyimpan foto baru
            $namefile = 'berita_'. date("Y_m_d_H_i_s") .'.'.request('fotoBerita')->extension();
            $inputs['fotoBerita'] = 'storage/berita/'.$namefile;
            request('fotoBerita')->storeAs('berita', $namefile, 'public');
            $berita->foto = $inputs['fotoBerita'];
        }

        if($berita->save()){
            Session::flash('berita-update-success', 'Data berhasil diupdate');
        }
        else{
            Session::flash('berita-update-failed', 'Data gagal diupdate');
        }
        return redirect()->route('berita.index');
    }

    public function tampilGaleri(){
        //Menggabungkan tabel galeri dan kategori galeri
        $galeri = DB::table('tbl_galeri')
                    ->join('tbl_kategori_galeri', 'tbl_galeri.id_kategori_galeri', '=', 'tbl_kategori_galeri.id')
                    ->select(DB::raw('tbl_galeri.*, tbl_kategori_galeri.nama as nama_kategori, count(tbl_galeri.id) as jumlah'))
                    ->groupBy('id_kategori_galeri')->paginate(6);
        return view('galeri.index', ['galeri' => $galeri]);
    }

    public function tampilTambahGaleri(){
        $kategoriGaleri = KategoriGaleri::all();
        return view('galeri.tambah', ['kategoriGaleri' => $kategoriGaleri]);
    }

    public function simpanGaleri(){
        $inputs = request()->validate([
            'namaKategori' => 'required',
            'fotoGaleri' => 'required',
            'editor' => 'required'
        ]);

        $now = DB::select('select now() as date')[0]->date;

        $kategoriGaleri = KategoriGaleri::where('nama', $inputs['namaKategori'])->first();

        $galeri = new Galeri();
        $galeri->id_kategori_galeri = $kategoriGaleri->id;
        $galeri->deskripsi = request('editor');
        $galeri->dibuat = $now;

        //Menyimpan foto galeri
        if(request('fotoGaleri')){
            $namefile = 'galeri_'. date("Y_m_d_H_i_s") .'.'.request('fotoGaleri')->extension();
            $inputs['fotoGaleri'] = 'storage/galeri/'.$namefile;
            request('fotoGaleri')->storeAs('galeri', $namefile, 'public');
            $galeri->foto = $inputs['fotoGaleri'];
        }

        if($galeri->save()){
            Session::flash('galeri-store-success', 'Data berhasil disimpan');
        }
        else{
            Session::flash('galeri-store-failed', 'Data gagal disimpan');
        }
        return redirect()->route('galeri.index');
    }

    public function tampilDaftarGaleri($id){
        $galeri = Galeri::where('id_kategori_galeri', $id)->paginate(6);
        return view('galeri.daftar-galeri', ['galeri' => $galeri]);
    }

    public function tampilDetailGaleri($id){
        //Menggabungkan tabel galeri dan kategori galeri
        $kategoriGaleri = KategoriGaleri::all();
        $galeri = DB::table('tbl_galeri')
                    ->join('tbl_kategori_galeri', 'tbl_galeri.id_kategori_galeri', '=', 'tbl_kategori_galeri.id')
                    ->select(DB::raw('tbl_galeri.*, tbl_kategori_galeri.nama as nama_kategori'))
                    ->where('tbl_galeri.id', $id)->first();
        return view('galeri.detail-galeri', ['galeri' => $galeri, 'kategoriGaleri' => $kategoriGaleri]);
    }

    public function updateGaleri($id){
        if(request('namaKategori') || request('editor')){
            Session::flash('berita-update-failed', 'Data gagal diupdate');
            return redirect()->route('berita.index');
        }

        $galeri = Galeri::where('id', $id)->first();
        $kategoriGaleri = KategoriGaleri::where('nama', $inputs['namaKategori'])->first();

        $galeri->id_kategori_galeri = $kategoriGaleri->id;
        $galeri->deskripsi = request('editor');

        if(request('fotoGaleri')){
            //Hapus foto lama
            $filenameLama = explode("/", $galeri->foto);
            \Storage::disk('public')->delete('galeri/'.$filenameLama[count($filenameLama)-1]);

            //Menyimpan foto baru
            $namefile = 'galeri_'. date("Y_m_d_H_i_s") .'.'.request('fotoGaleri')->extension();
            $inputs['fotoGaleri'] = 'storage/galeri/'.$namefile;
            request('fotoGaleri')->storeAs('galeri', $namefile, 'public');
            $galeri->foto = $inputs['fotoGaleri'];
        }

        Session::flash('galeri-update-success', 'Data berhasil diupdate');
        $galeri->save();
        return redirect()->route('galeri.index');
    }

    public function hapusGaleri($id){
        $galeri = Galeri::where('id', $id)->first();
        if($galeri->foto != null){
            //Hapus foto lama
            $filenameLama = explode("/", $galeri->foto);
            \Storage::disk('public')->delete('galeri/'.$filenameLama[count($filenameLama)-1]);
        }

        Galeri::where('id', $id)->delete();
        Session::flash('galeri-update-success', 'Data berhasil dihapus');
        return redirect()->route('galeri.index');
    }
    
    public function updateAktifBerita($id){
        $berita = Berita::where('id', $id)->first();
        $berita->is_actived = !$berita->is_actived;
		    return Response::json($berita->save());
    }
}
