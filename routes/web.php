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

Route::get('/',
    [App\Http\Controllers\HomeController::class, 'index'])->name('beranda');
Route::get('pengajar',
    [App\Http\Controllers\HomeController::class, 'guru'])->name('pengajar');
Route::get('pengumuman',
    [App\Http\Controllers\HomeController::class, 'pengumuman'])->name('pengumuman');
Route::get('berita',
    [App\Http\Controllers\HomeController::class, 'berita'])->name('berita');
Route::get('biaya',
    [App\Http\Controllers\HomeController::class, 'biaya'])->name('biaya');
Auth::routes();

Route::get('admin/home',
    [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('admin');

Route::get('admin/angkatan',
    [App\Http\Controllers\AdminController::class, 'angkatan'])->name('admin.angkatan')->middleware('admin');
Route::post('admin/angkatan', 
    [App\Http\Controllers\AdminController::class, 'submit_angkatan'])->name('admin.angkatan.submit')->middleware('admin');
Route::patch('admin/angkatan/update', 
    [App\Http\Controllers\AdminController::class, 'update_angkatan'])->name('admin.angkatan.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataAngkatan/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataAngkatan']);
Route::post('admin/angkatan/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_angkatan'])->name('admin.angkatan.delete')->middleware('admin');


Route::get('admin/pendaftar',
    [App\Http\Controllers\AdminController::class, 'view_pendaftar'])->name('admin.pendaftaran')->middleware('admin');
Route::get('admin/tambah_pendaftar',
    [App\Http\Controllers\AdminController::class, 'view_input'])->name('admin.pendaftarans')->middleware('admin');
Route::get('admin/{id}/edit_pendaftar',
    [App\Http\Controllers\AdminController::class, 'view_edit'])->name('admin.pendaftaranu')->middleware('admin');
Route::patch('admin/update_pendaftar',
     [App\Http\Controllers\AdminController::class, 'update_pendaftar'])->name('admin.pendaftaran.update')->middleware('admin');
Route::post('admin/tambah_pendaftar', 
    [App\Http\Controllers\AdminController::class, 'submit_pendaftar'])->name('admin.pendaftaran.submit')->middleware('admin');
Route::post('admin/pendaftar/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_pendaftar'])->name('admin.jadwal.delete')->middleware('admin');

Route::get('admin/pembayaran',
    [App\Http\Controllers\AdminController::class, 'pembayaran'])->name('admin.pembayaran')->middleware('admin');
Route::get('admin/pembayaran/terima/{id}',
    [App\Http\Controllers\AdminController::class, 'terima_pembayaran'])->name('admin.laporan.terima')->middleware('admin');
Route::get('admin/pembayaran/tolak/{id}',
    [App\Http\Controllers\AdminController::class, 'tolak_pembayaran'])->name('admin.laporan.tolak')->middleware('admin');


Route::get('admin/santri',
    [App\Http\Controllers\AdminController::class, 'santri'])->name('admin.santri')->middleware('admin');
Route::post('admin/santri', 
    [App\Http\Controllers\AdminController::class, 'submit_santri'])->name('admin.santri.submit')->middleware('admin');
Route::patch('admin/santri/update', 
    [App\Http\Controllers\AdminController::class, 'update_santri'])->name('admin.santri.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataSantri/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataSantri']);
Route::post('admin/santri/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_santri'])->name('admin.santri.delete')->middleware('admin');
Route::get('admin/santri/fetch',
    [App\Http\Controllers\AdminController::class, 'fetch_santri'])->name('admin.santri.fetch');

Route::get('admin/alumni',
    [App\Http\Controllers\AdminController::class, 'alumni'])->name('admin.alumni')->middleware('admin');
Route::post('admin/alumni', 
    [App\Http\Controllers\AdminController::class, 'submit_alumni'])->name('admin.alumni.submit')->middleware('admin');
Route::patch('admin/alumni/update', 
    [App\Http\Controllers\AdminController::class, 'update_alumni'])->name('admin.alumni.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataAlumni/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataAlumni']);
Route::post('admin/alumni/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_alumni'])->name('admin.alumni.delete')->middleware('admin');

Route::get('admin/guru',
    [App\Http\Controllers\AdminController::class, 'guru'])->name('admin.guru')->middleware('admin');
Route::post('admin/guru', 
    [App\Http\Controllers\AdminController::class, 'submit_guru'])->name('admin.guru.submit')->middleware('admin');
Route::patch('admin/guru/update', 
    [App\Http\Controllers\AdminController::class, 'update_guru'])->name('admin.guru.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataGuru/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataGuru']);
Route::post('admin/guru/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_guru'])->name('admin.guru.delete')->middleware('admin');

Route::get('admin/pengumuman',
    [App\Http\Controllers\AdminController::class, 'pengumuman'])->name('admin.pengumuman')->middleware('admin');
Route::post('admin/pengumuman', 
    [App\Http\Controllers\AdminController::class, 'submit_pengumuman'])->name('admin.pengumuman.submit')->middleware('admin');
Route::patch('admin/pengumuman/update', 
    [App\Http\Controllers\AdminController::class, 'update_pengumuman'])->name('admin.pengumuman.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataPengumuman/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataPengumuman']);
Route::post('admin/pengumuman/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_pengumuman'])->name('admin.pengumuman.delete')->middleware('admin');


Route::get('admin/berita',
    [App\Http\Controllers\AdminController::class, 'berita'])->name('admin.berita')->middleware('admin');
Route::post('admin/berita', 
    [App\Http\Controllers\AdminController::class, 'submit_berita'])->name('admin.berita.submit')->middleware('admin');
Route::patch('admin/berita/update', 
    [App\Http\Controllers\AdminController::class, 'update_berita'])->name('admin.berita.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataBerita/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataBerita']);
Route::post('admin/berita/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_berita'])->name('admin.berita.delete')->middleware('admin');


Route::get('admin/pengguna',
    [App\Http\Controllers\AdminController::class, 'pengguna'])->name('admin.pengguna')->middleware('admin');
Route::post('admin/pengguna', 
    [App\Http\Controllers\AdminController::class, 'submit_pengguna'])->name('admin.pengguna.submit')->middleware('admin');
Route::patch('admin/pengguna/update', 
    [App\Http\Controllers\AdminController::class, 'update_pengguna'])->name('admin.pengguna.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataPengguna/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataPengguna']);
Route::post('admin/pengguna/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_pengguna'])->name('admin.pengguna.delete')->middleware('admin');

    Route::get('admin/pihak',
    [App\Http\Controllers\AdminController::class, 'pihak'])->name('admin.pihak')->middleware('admin');
    Route::patch('admin/pihak/update', 
    [App\Http\Controllers\AdminController::class, 'update_pihak'])->name('admin.pihak.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataPihak/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataPihak']);


    Route::get('santri/home',
    [App\Http\Controllers\SantriController::class, 'view_input'])->name('santri.pendaftaran.submit')->middleware('santri');
    Route::post('santri/home', 
    [App\Http\Controllers\SantriController::class, 'submit_daftar'])->name('santri.pendaftaran.simpan')->middleware('santri');
    Route::patch('santri/home/update', 
    [App\Http\Controllers\SantriController::class, 'update_pembayaran'])->name('santri.pembayaran.update')->middleware('santri');
    Route::get('santri/ajaxadmin/dataPembayaran/{id}', 
    [App\Http\Controllers\SantriController::class, 'getDataPembayaran']);
    Route::get('santri/pengguna',
    [App\Http\Controllers\SantriController::class, 'pengguna'])->name('santri.pengguna')->middleware('santri');
    Route::patch('santri/pengguna/update', 
    [App\Http\Controllers\SantriController::class, 'update_pengguna'])->name('santri.pengguna.update')->middleware('santri');

