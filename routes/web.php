<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LamarkerjaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PeminatanController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RegisAlumniController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\viewberitaController;
use App\Http\Controllers\ViewLowonganController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//public:
Route::get('/', [LandingPageController::class, 'index']);
Route::get('/pencarian', [PencarianController::class, 'index']);
Route::get('/pencarian/data', [PencarianController::class, 'cari']);
Route::get('/view/{id}/berita', [viewberitaController::class, 'tampil_berita']);
Route::get('/view/berita', [viewberitaController::class, 'old']);
Route::get('/media/foto', [MediaController::class, 'foto']);
Route::get('/media/video', [MediaController::class, 'video']);
Route::get('/lowongan', [ViewLowonganController::class, 'index']);


Auth::routes();
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'user'])->name('user.home');
    Route::resource("Daftar", RegisAlumniController::class);
});