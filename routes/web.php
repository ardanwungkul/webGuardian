<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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



Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/domain', DomainController::class);
    Route::resource('/user', UserController::class);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Ajax
Route::middleware(['auth', 'admin'])->group(function () {
    Route::put('/kategoris/nama-kategori', [KategoriController::class, 'namaKategori']);
    Route::put('/domains/status-keterangan', [DomainController::class, 'statusKeterangan']);
    Route::put('/domains/status-sitemap', [DomainController::class, 'statusSitemap']);
    Route::get('/domains/get', [DomainController::class, 'getData']);
    Route::delete('/domains/{domain}', [DomainController::class, 'destroys']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
