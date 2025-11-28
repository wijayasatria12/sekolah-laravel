<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPendaftaranController;
use App\Http\Controllers\Admin\AdminProgramController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminWebsiteController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

Route::get('/artikel/{id}', [ArtikelController::class, 'showArtikel'])->name('artikel.show');

Route::get('/tentang', function () {
    return view('frontend.tentang');
});

Route::get('/daftar', function () {
    return view('frontend.daftar');
});

Route::get('/daftar', [PendaftaranController::class, 'index'])->name('daftar');
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('daftar.store');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('loginadmin');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//Route::get('/admin/dashboard', function () { return view('admin.dashboard'); });

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    
    Route::get('/pendaftaran/{id}/edit', [AdminPendaftaranController::class, 'edit'])->name('admin.pendaftaran.edit');
    Route::put('/pendaftaran/{id}', [AdminPendaftaranController::class, 'update'])->name('admin.pendaftaran.update');

    //Route::get('/pendaftaran/{id}', [AdminPendaftaranController::class, 'edit'])->name('admin.pendaftaran.edit');

    Route::get('/pendaftaran/{id}', [AdminPendaftaranController::class, 'show'])->name('admin.pendaftaran.showdetail');
    Route::delete('/pendaftaran/{id}', [AdminPendaftaranController::class, 'destroy'])->name('admin.pendaftaran.destroy');
});

//Route::get('/admin/pendaftaran/export/excel', [AdminPendaftaranController::class, 'exportExcel'])
//    ->name('admin.pendaftaran.export.excel');

Route::get('/admin/pendaftaran/export/excel', [App\Http\Controllers\Admin\AdminPendaftaranController::class, 'exportExcel'])->name('admin.pendaftaran.export.excel');

//hanya update status pendaftaran
Route::patch('/admin/pendaftaran/{id}/status/{status}', [AdminPendaftaranController::class, 'updateStatus'])
    ->name('admin.pendaftaran.updateStatus');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/program', [AdminProgramController::class, 'index'])->name('program.index');
    
    Route::get('/program/form', [AdminProgramController::class, 'create'])->name('program.form');
    Route::post('/program', [AdminProgramController::class, 'store'])->name('program.store');
    
    Route::get('/program/{id}/edit', [AdminProgramController::class, 'edit'])->name('program.edit');
    Route::put('/program/{id}', [AdminProgramController::class, 'update'])->name('program.update');
    
    Route::delete('/program/{id}', [AdminProgramController::class, 'destroy'])->name('program.destroy');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('galeri.index');
    
    Route::get('/galeri/form', [AdminGaleriController::class, 'create'])->name('galeri.form');
    Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('galeri.store');
    
    Route::get('/galeri/{id}/edit', [AdminGaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [AdminGaleriController::class, 'update'])->name('galeri.update');
    
    Route::delete('/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('galeri.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/artikel', [AdminArtikelController::class, 'index'])->name('artikel.index');
    
    Route::get('/artikel/form', [AdminArtikelController::class, 'create'])->name('artikel.form');
    Route::post('/artikel', [AdminArtikelController::class, 'store'])->name('artikel.store');
    
    Route::get('/artikel/{id}/edit', [AdminArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [AdminArtikelController::class, 'update'])->name('artikel.update');
    
    Route::delete('/artikel/{id}', [AdminArtikelController::class, 'destroy'])->name('artikel.destroy');
});

Route::get('/admin/website', [AdminWebsiteController::class, 'edit'])->name('website.edit');
Route::post('/admin/website/update', [AdminWebsiteController::class, 'update'])->name('website.update');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/user', [AdminUserController::class, 'index'])->name('user.index');
    
    Route::get('/user/form', [AdminUserController::class, 'create'])->name('user.form');
    Route::post('/user', [AdminUserController::class, 'store'])->name('user.store');
    
    Route::get('/user/{id}/edit', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [AdminUserController::class, 'update'])->name('user.update');
    
    Route::delete('/user/{id}', [AdminUserController::class, 'destroy'])->name('user.destroy');
});