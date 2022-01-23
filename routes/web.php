<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [App\Http\Controllers\AuthController::class, 'tampilLogin'])->name('login.index');
Route::post('/proses-login', [App\Http\Controllers\AuthController::class, 'prosesLogin'])->name('login');

Route::middleware(['Login'])->group(function(){
    
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\AuthController::class, 'tampilDashboard'])->name('dashboard');

    Route::get('/profil/sejarah', [App\Http\Controllers\ProfilController::class, 'tampilSejarah'])->name('profil.sejarah');
    Route::post('/profil/sejarah/simpan', [App\Http\Controllers\ProfilController::class, 'simpanSejarah'])->name('profil.sejarah.simpan');
    Route::get('/profil/wilayah-geografis', [App\Http\Controllers\ProfilController::class, 'tampilWilayahGeografis'])->name('profil.wilayah-geografis');
    Route::post('/profil/wilayah-geografis/simpan', [App\Http\Controllers\ProfilController::class, 'simpanWilayahGeografis'])->name('profil.wilayah-geografis.simpan');
    Route::get('/profil/website', [App\Http\Controllers\ProfilController::class, 'tampilWebsite'])->name('profil.website');
    Route::post('/profil/website/simpan', [App\Http\Controllers\ProfilController::class, 'simpanWebsite'])->name('profil.website.simpan');

    Route::get('/organisasi/struktur-organisasi', [App\Http\Controllers\OrganisasiController::class, 'tampilStrukturOrganisasi'])->name('organisasi.struktur-organisasi');
    Route::post('/organisasi/struktur-organisasi/simpan', [App\Http\Controllers\OrganisasiController::class, 'simpanStrukturOrganisasi'])->name('organisasi.struktur-organisasi.simpan');
    Route::get('/organisasi/visi-misi', [App\Http\Controllers\OrganisasiController::class, 'tampilVisiMisi'])->name('organisasi.visi-misi');
    Route::post('/organisasi/visi-misi/simpan', [App\Http\Controllers\OrganisasiController::class, 'simpanVisiMisi'])->name('organisasi.visi-misi.simpan');
    
    Route::get('/kategori/anggaran', [App\Http\Controllers\KategoriController::class, 'tampilKategoriAnggaran'])->name('kategori.anggaran');
    Route::post('/kategori/anggaran/simpan', [App\Http\Controllers\KategoriController::class, 'simpanKategoriAnggaran'])->name('kategori.anggaran.simpan');
    Route::post('/kategori/anggaran/detail/{kategori}', [App\Http\Controllers\KategoriController::class, 'tampilDetailKategoriAnggaran'])->name('kategori.anggaran.detail');
    Route::post('/kategori/anggaran/ubah/{kategori}', [App\Http\Controllers\KategoriController::class, 'ubahKategoriAnggaran'])->name('kategori.anggaran.ubah');
    
    Route::get('/kategori/belanja-desa', [App\Http\Controllers\KategoriController::class, 'tampilKategoriBelanjaDesa'])->name('kategori.belanja-desa');
    Route::post('/kategori/belanja-desa/simpan', [App\Http\Controllers\KategoriController::class, 'simpanKategoriBelanjaDesa'])->name('kategori.belanja-desa.simpan');
    Route::post('/kategori/belanja-desa/detail/{kategori}', [App\Http\Controllers\KategoriController::class, 'tampilDetailKategoriBelanjaDesa'])->name('kategori.belanja-desa.detail');
    Route::post('/kategori/belanja-desa/ubah/{kategori}', [App\Http\Controllers\KategoriController::class, 'ubahKategoriBelanjaDesa'])->name('kategori.belanja-desa.ubah');
    
    Route::get('/kategori/berita', [App\Http\Controllers\KategoriController::class, 'tampilKategoriBerita'])->name('kategori.berita');
    Route::post('/kategori/berita/simpan', [App\Http\Controllers\KategoriController::class, 'simpanKategoriBerita'])->name('kategori.berita.simpan');
    Route::post('/kategori/berita/detail/{kategori}', [App\Http\Controllers\KategoriController::class, 'tampilDetailKategoriBerita'])->name('kategori.berita.detail');
    Route::post('/kategori/berita/ubah/{kategori}', [App\Http\Controllers\KategoriController::class, 'ubahKategoriBerita'])->name('kategori.berita.ubah');
    
    Route::get('/kategori/galeri', [App\Http\Controllers\KategoriController::class, 'tampilKategoriGaleri'])->name('kategori.galeri');
    Route::post('/kategori/galeri/simpan', [App\Http\Controllers\KategoriController::class, 'simpanKategoriGaleri'])->name('kategori.galeri.simpan');
    Route::post('/kategori/galeri/detail/{kategori}', [App\Http\Controllers\KategoriController::class, 'tampilDetailKategoriGaleri'])->name('kategori.galeri.detail');
    Route::post('/kategori/galeri/ubah/{kategori}', [App\Http\Controllers\KategoriController::class, 'ubahKategoriGaleri'])->name('kategori.galeri.ubah');
    
    Route::get('/kependudukan', [App\Http\Controllers\PotensiController::class, 'tampilKependudukan'])->name('potensi.kependudukan');
    Route::post('/kependudukan/simpan', [App\Http\Controllers\PotensiController::class, 'simpanKependudukan'])->name('potensi.kependudukan.simpan');
    Route::get('/pendidikan', [App\Http\Controllers\PotensiController::class, 'tampilPendidikan'])->name('potensi.pendidikan');
    Route::post('/pendidikan/simpan', [App\Http\Controllers\PotensiController::class, 'simpanPendidikan'])->name('potensi.pendidikan.simpan');
    
    Route::get('/anggaran', [App\Http\Controllers\PotensiController::class, 'tampilAnggaran'])->name('potensi.anggaran');
    Route::get('/anggaran/detail-anggaran/{anggaran}/ubah', [App\Http\Controllers\PotensiController::class, 'ubahAnggaran'])->name('potensi.anggaran.ubah');
    Route::post('/anggaran/update', [App\Http\Controllers\PotensiController::class, 'updateAnggaran'])->name('potensi.anggaran.update');
    Route::get('/anggaran/daftar-anggaran', [App\Http\Controllers\PotensiController::class, 'tampilDaftarAnggaran'])->name('potensi.anggaran.daftar-anggaran');
    Route::get('/anggaran/detail-anggaran/{anggaran}', [App\Http\Controllers\PotensiController::class, 'tampilDetailAnggaran'])->name('potensi.anggaran.detail-anggaran');
    Route::post('/anggaran/simpan', [App\Http\Controllers\PotensiController::class, 'simpanAnggaran'])->name('potensi.anggaran.simpan');
    
    Route::get('/belanja-desa', [App\Http\Controllers\PotensiController::class, 'tampilBelanjaDesa'])->name('potensi.belanja-desa');
    Route::post('/belanja-desa/simpan', [App\Http\Controllers\PotensiController::class, 'simpanBelanjaDesa'])->name('potensi.belanja-desa.simpan');
    Route::get('/belanja-desa/daftar-belanja-desa', [App\Http\Controllers\PotensiController::class, 'tampilDaftarBelanjaDesa'])->name('potensi.belanja-desa.daftar-belanja-desa');
    Route::get('/belanja-desa/detail-belanja-desa/{belanjadesa}', [App\Http\Controllers\PotensiController::class, 'tampilDetailBelanjaDesa'])->name('potensi.belanja-desa.detail-belanja-desa');
    Route::get('/belanja-desa/detail-belanja-desa/{belanjadesa}/ubah', [App\Http\Controllers\PotensiController::class, 'ubahBelanjaDesa'])->name('potensi.belanja-desa.ubah');
    Route::post('/belanja-desa/update', [App\Http\Controllers\PotensiController::class, 'updateBelanjaDesa'])->name('potensi.belanja-desa.update');
    
    Route::get('/produk-unggulan', [App\Http\Controllers\PotensiController::class, 'tampilProdukUnggulan'])->name('potensi.produk-unggulan');
    Route::get('/produk-unggulan/tambah', [App\Http\Controllers\PotensiController::class, 'tambahProdukUnggulan'])->name('potensi.produk-unggulan.tambah');
    Route::post('/produk-unggulan/simpan', [App\Http\Controllers\PotensiController::class, 'simpanProdukUnggulan'])->name('potensi.produk-unggulan.simpan');
    Route::post('/produk-unggulan/detail/{id}', [App\Http\Controllers\PotensiController::class, 'detailProdukUnggulan'])->name('potensi.produk-unggulan.detail');
    Route::post('/produk-unggulan/hapus/{id}', [App\Http\Controllers\PotensiController::class, 'hapusProdukUnggulan'])->name('potensi.produk-unggulan.hapus');
    Route::post('/produk-unggulan/update/{id}', [App\Http\Controllers\PotensiController::class, 'updateProdukUnggulan'])->name('potensi.produk-unggulan.update');
    
    Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'tampilBerita'])->name('berita.index');
    Route::get('/berita/tambah', [App\Http\Controllers\BeritaController::class, 'tampilTambahBerita'])->name('berita.tambah');
    Route::post('/berita/simpan', [App\Http\Controllers\BeritaController::class, 'simpanBerita'])->name('berita.simpan');
    Route::get('/berita/daftar-berita/{id}', [App\Http\Controllers\BeritaController::class, 'tampilDaftarBerita'])->name('berita.daftar-berita');
    Route::get('/berita/detail-berita/{id}', [App\Http\Controllers\BeritaController::class, 'tampilDetailBerita'])->name('berita.detail-berita');
    Route::post('/berita/update/{id}', [App\Http\Controllers\BeritaController::class, 'updateBerita'])->name('berita.update');
    Route::get('/berita/daftar-berita/update-aktif/{id}', [App\Http\Controllers\BeritaController::class, 'updateAktifBerita'])->name('berita.active');
    
    Route::get('/galeri', [App\Http\Controllers\BeritaController::class, 'tampilGaleri'])->name('galeri.index');
    Route::get('/galeri/tambah', [App\Http\Controllers\BeritaController::class, 'tampilTambahGaleri'])->name('galeri.tambah');
    Route::post('/galeri/simpan', [App\Http\Controllers\BeritaController::class, 'simpanGaleri'])->name('galeri.simpan');
    Route::get('/galeri/daftar-galeri/{id}', [App\Http\Controllers\BeritaController::class, 'tampilDaftarGaleri'])->name('galeri.daftar-galeri');
    Route::get('/galeri/detail-galeri/{id}', [App\Http\Controllers\BeritaController::class, 'tampilDetailGaleri'])->name('galeri.detail-galeri');
    Route::post('/galeri/update/{id}', [App\Http\Controllers\BeritaController::class, 'updateGaleri'])->name('galeri.update');
    Route::post('/galeri/hapus/{id}', [App\Http\Controllers\BeritaController::class, 'hapusGaleri'])->name('galeri.hapus');
    
    Route::get('/masyarakat', [App\Http\Controllers\PenggunaController::class, 'tampilMasyarakat'])->name('pengguna.masyarakat');
    Route::get('/masyarakat/tambah', [App\Http\Controllers\PenggunaController::class, 'tampilTambahMasyarakat'])->name('pengguna.masyarakat.tambah');
    Route::post('/masyarakat/simpan', [App\Http\Controllers\PenggunaController::class, 'simpanMasyarakat'])->name('pengguna.masyarakat.simpan');
    Route::get('/masyarakat/detail/{id}', [App\Http\Controllers\PenggunaController::class, 'tampilDetailMasyarakat'])->name('pengguna.masyarakat.detail');
    Route::post('/masyarakat/update/{id}', [App\Http\Controllers\PenggunaController::class, 'updateMasyarakat'])->name('pengguna.masyarakat.update');
    Route::post('/masyarakat/hapus/{id}', [App\Http\Controllers\PenggunaController::class, 'hapusMasyarakat'])->name('pengguna.masyarakat.hapus');
    
    Route::get('/admin', [App\Http\Controllers\PenggunaController::class, 'tampilAdmin'])->name('pengguna.admin');
    Route::get('/admin/tambah', [App\Http\Controllers\PenggunaController::class, 'tampilTambahAdmin'])->name('pengguna.admin.tambah');
    Route::post('/admin/simpan', [App\Http\Controllers\PenggunaController::class, 'simpanAdmin'])->name('pengguna.admin.simpan');
    Route::get('/admin/detail/{id}', [App\Http\Controllers\PenggunaController::class, 'tampilDetailAdmin'])->name('pengguna.admin.detail');
    Route::post('/admin/update/{id}', [App\Http\Controllers\PenggunaController::class, 'updateAdmin'])->name('pengguna.admin.update');
    Route::post('/admin/hapus/{id}', [App\Http\Controllers\PenggunaController::class, 'hapusAdmin'])->name('pengguna.admin.hapus');
});
