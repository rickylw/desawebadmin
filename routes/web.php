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

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/profil/sejarah', [App\Http\Controllers\ProfilController::class, 'tampilSejarah'])->name('profil.sejarah');
Route::post('/profil/sejarah/simpan', [App\Http\Controllers\ProfilController::class, 'simpanSejarah'])->name('profil.sejarah.simpan');
Route::get('/profil/wilayah-geografis', [App\Http\Controllers\ProfilController::class, 'tampilWilayahGeografis'])->name('profil.wilayah-geografis');
Route::post('/profil/wilayah-geografis/simpan', [App\Http\Controllers\ProfilController::class, 'simpanWilayahGeografis'])->name('profil.wilayah-geografis.simpan');
Route::get('/organisasi/struktur-organisasi', [App\Http\Controllers\OrganisasiController::class, 'tampilStrukturOrganisasi'])->name('organisasi.struktur-organisasi');
Route::post('/organisasi/struktur-organisasi/simpan', [App\Http\Controllers\OrganisasiController::class, 'simpanStrukturOrganisasi'])->name('organisasi.struktur-organisasi.simpan');
Route::get('/organisasi/visi-misi', [App\Http\Controllers\OrganisasiController::class, 'tampilVisiMisi'])->name('organisasi.visi-misi');
Route::post('/organisasi/visi-misi/simpan', [App\Http\Controllers\OrganisasiController::class, 'simpanVisiMisi'])->name('organisasi.visi-misi.simpan');

Route::get('/kependudukan', [App\Http\Controllers\KependudukanController::class, 'tampilKependudukan'])->name('potensi.kependudukan');
Route::post('/kependudukan/simpan', [App\Http\Controllers\KependudukanController::class, 'simpanKependudukan'])->name('potensi.kependudukan.simpan');
Route::get('/pendidikan', [App\Http\Controllers\PendidikanController::class, 'tampilPendidikan'])->name('potensi.pendidikan');
Route::post('/pendidikan/simpan', [App\Http\Controllers\PendidikanController::class, 'simpanPendidikan'])->name('potensi.pendidikan.simpan');