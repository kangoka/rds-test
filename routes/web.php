<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [PageController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/beli/{data}', [TransaksiController::class, 'beli'])->name('beli');
    Route::get('/dashboard', [PageController::class, 'udashboard'])->name('user.dashboard');

    Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/barang/tambah', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/barang/tambah', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::post('/barang/edit/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::get('/barang/hapus/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
