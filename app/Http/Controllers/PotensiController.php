<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kependudukan;
use App\Models\Pendidikan;
use App\Models\KategoriAnggaran;
use App\Models\KategoriBelanjaDesa;
use App\Models\Anggaran;
use App\Models\DetailAnggaran;
use App\Models\DetailBelanjaDesa;
use App\Models\ProdukUnggulan;
use Illuminate\Support\Facades\DB;

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
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $kategoriAnggaran = KategoriAnggaran::all();
        return view('potensi.anggaran', ["kategoriAnggaran" => $kategoriAnggaran, 'bulan' => $bulan]);
    }

    public function tampilDaftarAnggaran(){
        $anggaran = Anggaran::paginate(10);        
        return view('potensi.daftar-anggaran', ['anggaran' => $anggaran]);
    }

    public function ubahAnggaran($tahun){
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $kategoriAnggaran = KategoriAnggaran::all();
        //Detail Anggarn berdasarkan tahun
        $detailAnggaran = $detailAnggaran = DetailAnggaran::where('tahun_anggaran', $tahun)->get(); 
        $anggaran = Anggaran::where('tahun_anggaran', $tahun)->get();
        return view('potensi.ubah-anggaran', ['detailAnggaran' => $detailAnggaran, 'bulan' => $bulan, 'kategoriAnggaran' => $kategoriAnggaran, 'anggaran' => $anggaran]);
    }

    public function tampilDetailAnggaran($tahun){
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $detailAnggaran = DetailAnggaran::where('tahun_anggaran', $tahun)->paginate(10);   
        $kategoriAnggaran = KategoriAnggaran::all();
        //Menyiapkan data kategori
        $kategori = [];
        foreach($kategoriAnggaran as $key=>$value){
            $kategori[$key] = $value->nama;
        }     

        return view('potensi.detail-anggaran', ['detailAnggaran' => $detailAnggaran, 'kategoriAnggaran' => $kategori, 'bulan' => $bulan]);
    }

    public function simpanAnggaran(){
        $kategoriAnggaran = KategoriAnggaran::all();
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $inputs = request()->validate([
            'anggaranPendapatanJanuari' => 'required',
            'kategoriJanuari' => 'required',
            'anggaranPendapatanFebruari' => 'required',
            'kategoriFebruari' => 'required',
            'anggaranPendapatanMaret' => 'required',
            'kategoriMaret' => 'required',
            'anggaranPendapatanApril' => 'required',
            'kategoriApril' => 'required',
            'anggaranPendapatanMei' => 'required',
            'kategoriMei' => 'required',
            'anggaranPendapatanJuni' => 'required',
            'kategoriJuni' => 'required',
            'anggaranPendapatanJuli' => 'required',
            'kategoriJuli' => 'required',
            'anggaranPendapatanAgustus' => 'required',
            'kategoriAgustus' => 'required',
            'anggaranPendapatanSeptember' => 'required',
            'kategoriSeptember' => 'required',
            'anggaranPendapatanOktober' => 'required',
            'kategoriOktober' => 'required',
            'anggaranPendapatanNovember' => 'required',
            'kategoriNovember' => 'required',
            'anggaranPendapatanDesember' => 'required',
            'kategoriDesember' => 'required',
            'anggaranPendapatan' => 'required',
            'realisasiPendapatan' => 'required',
            'realisasiBelanja' => 'required',
            'tahunAnggaran' => 'required'
        ]);

        $anggaranLama = Anggaran::where('tahun_anggaran', $inputs['tahunAnggaran'])->get();

        //Batal jika ada data anggaran lama dengan tahun yg diinputkan sama
        if(count($anggaranLama) > 0){
            return redirect()->route('potensi.anggaran');
        }
        else{
            $anggaran = new Anggaran();
            $anggaran->anggaran_pendapatan = $inputs['anggaranPendapatan'];
            $anggaran->realisasi_pendapatan = $inputs['realisasiPendapatan'];
            $anggaran->realisasi_belanja = $inputs['realisasiBelanja'];
            $anggaran->tahun_anggaran = $inputs['tahunAnggaran'];
            $anggaran->save();

            $tes = array();
            //Menyiapkan data per bulan
            for($l = 0; $l < count($bulan); $l++){
                $tmp = array();
                //Menyiapkan data per kategori anggaran
                for($i = 0; $i < count($inputs['kategori'.$bulan[$l]]); $i++){
                    //Jika kategori telah ada di variabel tmp maka dijumlahkan kalau belum ditambahkan
                    if(array_key_exists($inputs['kategori'.$bulan[$l]][$i], $tmp)){
                        $tmp[$inputs['kategori'.$bulan[$l]][$i]] += (double) $inputs['anggaranPendapatan'.$bulan[$l]][$i];
                    }
                    else{
                        $tmp[$inputs['kategori'.$bulan[$l]][$i]] = (double) $inputs['anggaranPendapatan'.$bulan[$l]][$i];
                    }
                }
                //menyimpan data pada bulan tertentu dengan berbagai kategori
                foreach($tmp as $key => $val){
                    $anggaran = new DetailAnggaran();
                    $anggaran->id_kategori_anggaran = $key;
                    $anggaran->tahun_anggaran = $inputs['tahunAnggaran'];
                    $anggaran->bulan = $l+1;
                    $anggaran->jumlah = $val;
                    $anggaran->save();
                }
            }
            return redirect()->route('potensi.anggaran');
        }
    }

    public function updateAnggaran(){
        $kategoriAnggaran = KategoriAnggaran::all();
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $inputs = request()->validate([
            'anggaranPendapatanJanuari' => 'required',
            'kategoriJanuari' => 'required',
            'anggaranPendapatanFebruari' => 'required',
            'kategoriFebruari' => 'required',
            'anggaranPendapatanMaret' => 'required',
            'kategoriMaret' => 'required',
            'anggaranPendapatanApril' => 'required',
            'kategoriApril' => 'required',
            'anggaranPendapatanMei' => 'required',
            'kategoriMei' => 'required',
            'anggaranPendapatanJuni' => 'required',
            'kategoriJuni' => 'required',
            'anggaranPendapatanJuli' => 'required',
            'kategoriJuli' => 'required',
            'anggaranPendapatanAgustus' => 'required',
            'kategoriAgustus' => 'required',
            'anggaranPendapatanSeptember' => 'required',
            'kategoriSeptember' => 'required',
            'anggaranPendapatanOktober' => 'required',
            'kategoriOktober' => 'required',
            'anggaranPendapatanNovember' => 'required',
            'kategoriNovember' => 'required',
            'anggaranPendapatanDesember' => 'required',
            'kategoriDesember' => 'required',
            'anggaranPendapatan' => 'required',
            'realisasiPendapatan' => 'required',
            'realisasiBelanja' => 'required',
            'tahunAnggaran' => 'required',
            'tahunAnggaranLama' => 'required'
        ]);

        //Hapus anggaran Lama
        Anggaran::where('tahun_anggaran', $inputs['tahunAnggaranLama'])->delete();
        DetailAnggaran::where('tahun_anggaran', $inputs['tahunAnggaranLama'])->delete();

        //Menyimpan anggaran baru
        $anggaran = new Anggaran();
        $anggaran->anggaran_pendapatan = $inputs['anggaranPendapatan'];
        $anggaran->realisasi_pendapatan = $inputs['realisasiPendapatan'];
        $anggaran->realisasi_belanja = $inputs['realisasiBelanja'];
        $anggaran->tahun_anggaran = $inputs['tahunAnggaran'];
        $anggaran->save();

        $tes = array();
        //Menyiapkan data per bulan
        for($l = 0; $l < count($bulan); $l++){
            //Menyiapkan data per kategori anggaran
            $tmp = array();
            for($i = 0; $i < count($inputs['kategori'.$bulan[$l]]); $i++){
                //Jika kategori telah ada di variabel tmp maka dijumlahkan kalau belum ditambahkan
                if(array_key_exists($inputs['kategori'.$bulan[$l]][$i], $tmp)){
                    $tmp[$inputs['kategori'.$bulan[$l]][$i]] += (double) $inputs['anggaranPendapatan'.$bulan[$l]][$i];
                }
                else{
                    $tmp[$inputs['kategori'.$bulan[$l]][$i]] = (double) $inputs['anggaranPendapatan'.$bulan[$l]][$i];
                }
            }

            //menyimpan data pada bulan tertentu dengan berbagai kategori
            foreach($tmp as $key => $val){
                $anggaran = new DetailAnggaran();
                $anggaran->id_kategori_anggaran = $key;
                $anggaran->tahun_anggaran = $inputs['tahunAnggaran'];
                $anggaran->bulan = $l+1;
                $anggaran->jumlah = $val;
                $anggaran->save();
            }
        }
        return redirect()->route('potensi.anggaran.daftar-anggaran');
        
    }

    public function tampilBelanjaDesa(){
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        return view('potensi.belanja-desa', ["kategoriBelanjaDesa" => $kategoriBelanjaDesa, 'bulan' => $bulan]);
    }

    public function simpanBelanjaDesa(){
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $inputs = request()->validate([
            'belanjaDesaJanuari' => 'required',
            'kategoriJanuari' => 'required',
            'belanjaDesaFebruari' => 'required',
            'kategoriFebruari' => 'required',
            'belanjaDesaMaret' => 'required',
            'kategoriMaret' => 'required',
            'belanjaDesaApril' => 'required',
            'kategoriApril' => 'required',
            'belanjaDesaMei' => 'required',
            'kategoriMei' => 'required',
            'belanjaDesaJuni' => 'required',
            'kategoriJuni' => 'required',
            'belanjaDesaJuli' => 'required',
            'kategoriJuli' => 'required',
            'belanjaDesaAgustus' => 'required',
            'kategoriAgustus' => 'required',
            'belanjaDesaSeptember' => 'required',
            'kategoriSeptember' => 'required',
            'belanjaDesaOktober' => 'required',
            'kategoriOktober' => 'required',
            'belanjaDesaNovember' => 'required',
            'kategoriNovember' => 'required',
            'belanjaDesaDesember' => 'required',
            'kategoriDesember' => 'required',
            'tahunAnggaran' => 'required'
        ]);

        $detailBelanjaDesaLama = DetailBelanjaDesa::where('tahun_anggaran', $inputs['tahunAnggaran'])->get();

        //Batal jika ada data anggaran lama dengan tahun yg diinputkan sama
        if(count($detailBelanjaDesaLama) > 0){
            return redirect()->route('potensi.belanja-desa');
        }
        else{
            //Menyiapkan data per bulan
            $tes = array();
            for($l = 0; $l < count($bulan); $l++){
                //Menyiapkan data per kategori belanja desa
                $tmp = array();
                for($i = 0; $i < count($inputs['kategori'.$bulan[$l]]); $i++){
                    //Jika kategori telah ada di variabel tmp maka dijumlahkan kalau belum ditambahkan
                    if(array_key_exists($inputs['kategori'.$bulan[$l]][$i], $tmp)){
                        $tmp[$inputs['kategori'.$bulan[$l]][$i]] += (double) $inputs['belanjaDesa'.$bulan[$l]][$i];
                    }
                    else{
                        $tmp[$inputs['kategori'.$bulan[$l]][$i]] = (double) $inputs['belanjaDesa'.$bulan[$l]][$i];
                    }
                }

                //menyimpan data pada bulan tertentu dengan berbagai kategori
                foreach($tmp as $key => $val){
                    $belanjaDesa = new DetailBelanjaDesa();
                    $belanjaDesa->id_kategori_belanja_desa = $key;
                    $belanjaDesa->tahun_anggaran = $inputs['tahunAnggaran'];
                    $belanjaDesa->bulan = $l+1;
                    $belanjaDesa->jumlah = $val;
                    $belanjaDesa->save();
                }
            }
            return redirect()->route('potensi.belanja-desa');
        }
    }

    public function tampilDaftarBelanjaDesa(){
        $detailBelanjaDesa = DB::table('tbl_detail_belanja_desa')->select(DB::raw('*, sum(jumlah) as total'))->groupBy('tahun_anggaran')->paginate(10);
        return view('potensi.daftar-belanja-desa', ['detailBelanjaDesa' => $detailBelanjaDesa]);
    }

    public function tampilDetailBelanjaDesa($tahun){
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $detailBelanjaDesa = DetailBelanjaDesa::where('tahun_anggaran', $tahun)->paginate(10);   
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        $kategori = [];
        foreach($kategoriBelanjaDesa as $key=>$value){
            $kategori[$key] = $value->nama;
        }     

        return view('potensi.detail-belanja-desa', ['detailBelanjaDesa' => $detailBelanjaDesa, 'kategoriBelanjaDesa' => $kategori, 'bulan' => $bulan]);
    }

    public function ubahBelanjaDesa($tahun){
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        $detailBelanjaDesa = DetailBelanjaDesa::where('tahun_anggaran', $tahun)->get(); 
        return view('potensi.ubah-belanja-desa', ['detailBelanjaDesa' => $detailBelanjaDesa, 'bulan' => $bulan, 'kategoriBelanjaDesa' => $kategoriBelanjaDesa]);
    }

    public function updateBelanjaDesa(){
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $inputs = request()->validate([
            'belanjaDesaJanuari' => 'required',
            'kategoriJanuari' => 'required',
            'belanjaDesaFebruari' => 'required',
            'kategoriFebruari' => 'required',
            'belanjaDesaMaret' => 'required',
            'kategoriMaret' => 'required',
            'belanjaDesaApril' => 'required',
            'kategoriApril' => 'required',
            'belanjaDesaMei' => 'required',
            'kategoriMei' => 'required',
            'belanjaDesaJuni' => 'required',
            'kategoriJuni' => 'required',
            'belanjaDesaJuli' => 'required',
            'kategoriJuli' => 'required',
            'belanjaDesaAgustus' => 'required',
            'kategoriAgustus' => 'required',
            'belanjaDesaSeptember' => 'required',
            'kategoriSeptember' => 'required',
            'belanjaDesaOktober' => 'required',
            'kategoriOktober' => 'required',
            'belanjaDesaNovember' => 'required',
            'kategoriNovember' => 'required',
            'belanjaDesaDesember' => 'required',
            'kategoriDesember' => 'required',
            'tahunAnggaran' => 'required',
            'tahunAnggaranLama' => 'required'
        ]);

        //Hapus Data Lama
        DetailBelanjaDesa::where('tahun_anggaran', $inputs['tahunAnggaranLama'])->delete();

        $tes = array();
        //Menyiapkan data per bulan
        for($l = 0; $l < count($bulan); $l++){
            //Menyiapkan data per kategori belanja desa
            $tmp = array();
            for($i = 0; $i < count($inputs['kategori'.$bulan[$l]]); $i++){
                //Jika kategori telah ada di variabel tmp maka dijumlahkan kalau belum ditambahkan
                if(array_key_exists($inputs['kategori'.$bulan[$l]][$i], $tmp)){
                    $tmp[$inputs['kategori'.$bulan[$l]][$i]] += (double) $inputs['belanjaDesa'.$bulan[$l]][$i];
                }
                else{
                    $tmp[$inputs['kategori'.$bulan[$l]][$i]] = (double) $inputs['belanjaDesa'.$bulan[$l]][$i];
                }
            }

            //menyimpan data pada bulan tertentu dengan berbagai kategori
            foreach($tmp as $key => $val){
                $belanjaDesa = new DetailBelanjaDesa();
                $belanjaDesa->id_kategori_belanja_desa = $key;
                $belanjaDesa->tahun_anggaran = $inputs['tahunAnggaran'];
                $belanjaDesa->bulan = $l+1;
                $belanjaDesa->jumlah = $val;
                $belanjaDesa->save();
            }
        }
        return redirect()->route('potensi.belanja-desa.daftar-belanja-desa');
        
    }

    public function tampilProdukUnggulan(){
        $produkUnggulan = ProdukUnggulan::paginate(6);
        return view('potensi.produk-unggulan', ['produkUnggulan' => $produkUnggulan]);
    }

    public function tambahProdukUnggulan(){
        return view('potensi.tambah-produk-unggulan');
    }

    public function hapusProdukUnggulan($id){
        ProdukUnggulan::where('id', $id)->delete();
        return redirect()->route('potensi.produk-unggulan');
    }

    public function detailProdukUnggulan($id){
        $produkUnggulan = ProdukUnggulan::where('id', $id)->first();
        return view('potensi.detail-produk-unggulan', ['produkUnggulan' => $produkUnggulan]);
    }

    public function simpanProdukUnggulan(){
        $inputs = request()->validate([
            'nama' => 'required',
            'fotoProduk' => 'required',
        ]);

        $produkUnggulan = new ProdukUnggulan();
        $produkUnggulan->nama = $inputs['nama'];
        $produkUnggulan->deskripsi = request('editor');

        //Menyimpan foto
        if(request('fotoProduk')){
            $namefile = 'produk_unggulan_'. date("Y_m_d_H_i_s") .'.'.request('fotoProduk')->extension();
            $inputs['fotoProduk'] = 'storage/produk_unggulan/'.$namefile;
            request('fotoProduk')->storeAs('produk_unggulan', $namefile, 'public');
            $produkUnggulan->foto = $inputs['fotoProduk'];
        }

        $produkUnggulan->save();
        return redirect()->route('potensi.produk-unggulan');
    }

    public function updateProdukUnggulan($id){
        $inputs = request()->validate([
            'nama' => 'required'
        ]);

        $produkUnggulan = ProdukUnggulan::where('id', $id)->first();

        $produkUnggulan->nama = $inputs['nama'];
        $produkUnggulan->deskripsi = request('editor');

        if(request('fotoProduk')){
            //Hapus foto lama
            $filenameLama = explode("/", $produkUnggulan->foto);
            \Storage::disk('public')->delete('produk_unggulan/'.$filenameLama[count($filenameLama)-1]);

            //Simpan foto baru
            $namefile = 'produk_unggulan_'. date("Y_m_d_H_i_s") .'.'.request('fotoProduk')->extension();
            $inputs['fotoProduk'] = 'storage/produk_unggulan/'.$namefile;
            request('fotoProduk')->storeAs('produk_unggulan', $namefile, 'public');
            $produkUnggulan->foto = $inputs['fotoProduk'];
        }        

        $produkUnggulan->save();
        return redirect()->route('potensi.produk-unggulan');
    }
}
