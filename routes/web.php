<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TipeUnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\AgenController;
use App\Http\Controllers\ContactController; // Nanti kita buat ini
use App\Http\Controllers\Admin\PesanController; // Import
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tipe-unit/{tipeUnit:slug}', [HomeController::class, 'show'])->name('tipe-unit.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// GRUP ROUTE ADMIN
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        // Redirect /admin ke /admin/tipe-unit
        Route::get('/', function () {
            return redirect()->route('admin.tipe-unit.index');
        })->name('index');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
        
        Route::resource('tipe-unit', TipeUnitController::class);
        Route::post('tipe-unit/{tipeUnit}/photos', [TipeUnitController::class, 'storePhoto'])->name('tipe-unit.photos.store');
        Route::delete('photos/{photo}', [TipeUnitController::class, 'destroyPhoto'])->name('photos.destroy');
        Route::resource('fasilitas', FasilitasController::class);
        Route::resource('agen', AgenController::class);
        Route::get('pesan', [PesanController::class, 'index'])->name('pesan.index');
        Route::get('pesan/{pesan}', [PesanController::class, 'show'])->name('pesan.show');
        Route::delete('pesan/{pesan}', [PesanController::class, 'destroy'])->name('pesan.destroy');
    });

require __DIR__.'/auth.php';
