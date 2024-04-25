<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/domain', DomainController::class);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/user', UserController::class);
});

// Ajax
Route::middleware(['auth'])->group(function () {
    Route::put('/kategoris/nama-kategori', [KategoriController::class, 'namaKategori']);
    Route::put('/domains/status-keterangan', [DomainController::class, 'statusKeterangan']);
    Route::put('/domains/status-sitemap', [DomainController::class, 'statusSitemap']);
    Route::put('/domains/status-nerd', [DomainController::class, 'statusNerd']);
    Route::put('/domains/status-artikel-unik', [DomainController::class, 'statusArtikelUnik']);
    Route::put('/domains/status-backlink', [DomainController::class, 'statusBacklink']);
    Route::get('/domains/get', [DomainController::class, 'getData']);
    Route::get('/reports/get', [ReportController::class, 'getData']);
    Route::delete('/domains/{domain}', [DomainController::class, 'destroys']);
    Route::resource('/youtube', YoutubeController::class);
    Route::resource('folder', FolderController::class);
});

// Report
Route::middleware(['auth'])->group(function () {
    Route::resource('/report', ReportController::class);
    Route::get('/reports/create/{domain}', [ReportController::class, 'createReport'])->name('reports.create');
    Route::post('/reports/{domain}', [ReportController::class, 'store'])->name('reports.store');
    Route::get('reports/user/{user}', [ReportController::class, 'reportUser'])->name('reports.user');
});
Route::get('/reports/result/{domain}/{slug}', [ReportController::class, 'result'])->name('reports.result');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
