<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ExcelDownload;
use App\Http\Controllers\ExcelMahasiswaController;
use App\Http\Controllers\FakultasKerjasamaController;
use App\Http\Controllers\FalkutasActionController;
use App\Http\Controllers\FalkutasController;
use App\Http\Controllers\FaQController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JenisKerjaSamaController;
use App\Http\Controllers\KategoriMahasiswaController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\KerjasamaStatus;
use App\Http\Controllers\LamarkerjaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PeminatanController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RegisAlumniController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\viewberitaController;
use App\Http\Controllers\ViewLowonganController;
use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get("/dashboard", [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
    Route::resource("kelolauser", KelolaUserController::class);
    Route::resource("alumni", AlumniController::class);
    Route::get("/alumni/{id}/apv", [ApproveController::class, "approve"]);
    Route::get("/alumni/{id}/pending", [ApproveController::class, "pending"]);
    Route::resource("prodi", ProdiController::class);
    Route::resource("berita", BeritaController::class);
    Route::resource("peminatan", PeminatanController::class);
    Route::resource("gallery", GalleryController::class);
    Route::resource("Video", VideoController::class);
    Route::resource("lamaran", LamarkerjaController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('enduser', UserController::class);
    Route::get('print', [PDFController::class, 'print'])->name('print');
    Route::get('preview', [PDFController::class, 'preview']);
    Route::get('download-excel', [ExcelDownload::class, 'exportdata'])->name('download');
    Route::post('buku-wisuda', [ExcelDownload::class, 'graduate'])->name('graduate');
    Route::post('import-alumni', [AlumniController::class, 'imports'])->name('import-alumni');
    Route::post('import-dosen', [DosenController::class, 'import'])->name('import-dosen');
    Route::resource('cooperation', CooperationController::class);
    Route::resource('cooperation-type', JenisKerjaSamaController::class);
    Route::get('cooperation-active/{id}', [KerjasamaStatus::class, 'active'])->name('kerjasama-active');
    Route::get('cooperation-nonaktif/{id}', [KerjasamaStatus::class, 'nonaktif'])->name('kerjasama-nonaktif');
    Route::get('cooperation-selesai/{id}', [KerjasamaStatus::class, 'selesai'])->name('kerjasama-selesai');
    Route::post('zip-download', [ZipController::class, 'index'])->name('zip-download');
    Route::resource('kategori_mahasiswa', KategoriMahasiswaController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::post('import-mahasiswa', [ExcelMahasiswaController::class, 'import'])->name('import_data_mahasiswa');
    Route::post('export-mahasiswa', [ExcelMahasiswaController::class, 'export'])->name('export-mahasiswa');
    Route::resource('jobfair', LowonganController::class);
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//public:
Route::get('/', [LandingPageController::class, 'index'])->name('main');
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian');
Route::get('/pencarian/data', [PencarianController::class, 'cari'])->name('pencarian-data');
Route::get('/read/{id}', [viewberitaController::class, 'tampil_berita'])->name('view-berita');
Route::get('/view/berita', [viewberitaController::class, 'show'])->name('old-news');
Route::get('/media/foto', [MediaController::class, 'foto'])->name('foto');
Route::get('/media/video', [MediaController::class, 'video'])->name('video');
Route::get('/lowongan', [ViewLowonganController::class, 'index'])->name('lowongan');

Auth::routes();
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'user'])->name('user.home');
    Route::resource("Daftar", RegisAlumniController::class);
    Route::get('validation/{id}', [PDFController::class, 'cetak_surat']);
    Route::get('faQ', [FaQController::class, 'index'])->name('faq');
});

Route::middleware(['auth', 'user-access:fakultas'])->group(function () {
    Route::get('falkutas-dashboard', [App\Http\Controllers\HomeController::class, 'falkutas'])->name('falkutas.home');
    Route::get('falkutas/{id}/apv', [FalkutasController::class, 'approve']);
    Route::get('falkutas/{id}/pending', [FalkutasController::class, 'pending']);
    Route::resource("falkutas", FalkutasActionController::class);
    Route::get('export-falkutas', [ExcelDownload::class, 'exportfalkutas'])->name('falkutas-excel');
    Route::get('preview-falkutas-alumni', [PDFController::class, 'pdf']);
    Route::get('print-preview', [PDFController::class, 'printpdf'])->name('print-data');
    Route::post('filter-export', [ExcelDownload::class, 'filter'])->name('filter');
    Route::post('zip-download-fakultas', [ZipController::class, 'fakultas_images'])->name('zip-download-fakultas');
    Route::resource('kerjasama-fakultas', FakultasKerjasamaController::class);

});
