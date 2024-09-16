<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ExcelDownload;
use App\Http\Controllers\FalkutasActionController;
use App\Http\Controllers\FalkutasController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LamarkerjaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PeminatanController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RegisAlumniController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\viewberitaController;
use App\Http\Controllers\ViewLowonganController;
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
    Route::resource("prodi", ProdiController::class);
    Route::resource("berita", BeritaController::class);
    Route::resource("peminatan", PeminatanController::class);
    Route::resource("gallery", GalleryController::class);
    Route::resource("Video", VideoController::class);
    Route::resource("lamaran", LamarkerjaController::class);
    Route::get('print', [PDFController::class, 'print'])->name('print');
    Route::get('preview', [PDFController::class, 'preview']);
    Route::get('download-excel', [ExcelDownload::class, 'exportdata'])->name('download');
    Route::post('import-alumni', [AlumniController::class, 'imports'])->name('import-alumni');
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
});

Route::middleware(['auth', 'user-access:fakultas'])->group(function () {
    Route::get('falkutas-dashboard', [App\Http\Controllers\HomeController::class, 'falkutas'])->name('falkutas.home');
    Route::get('falkutas/{id}/apv', [FalkutasController::class, 'approve'])->name('falkutas-controller');
    Route::resource("falkutas", FalkutasActionController::class);
    Route::get('export-falkutas', [ExcelDownload::class, 'exportfalkutas'])->name('falkutas-excel');
    Route::get('preview-falkutas-alumni', [PDFController::class, 'pdf']);
    Route::get('print-preview', [PDFController::class, 'printpdf'])->name('print-data');
    Route::post('filter-export', [ExcelDownload::class, 'filter'])->name('filter');

});
