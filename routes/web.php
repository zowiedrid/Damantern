<?php

use App\Http\Controllers\IzinController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SemuaIzinController;
use App\Http\Controllers\SemuaPresensiController;
use App\Http\Controllers\SemuaRekapController;
use App\Http\Controllers\UserController;
use App\Models\Rekap;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');
    Route::get('/presensi/create', [PresensiController::class, 'create'])->name('presensi.create');

    Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');
    Route::post('/rekap', [RekapController::class, 'store'])->name('rekap.store');
    Route::get('/rekap/create', [RekapController::class, 'create'])->name('rekap.create');
    Route::delete('/rekap/{rekap}', [RekapController::class, 'destroy'])->name('rekap.destroy');

    Route::get('/izin', [IzinController::class, 'index'])->name('izin.index');
    Route::post('/izin', [IzinController::class, 'store'])->name('izin.store');
    Route::get('/izin/create', [IzinController::class, 'create'])->name('izin.create');
    Route::delete('/izin/{izin}', [IzinController::class, 'destroy'])->name('izin.destroy');



    
});

Route::middleware('admin')->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/semuapresensi', [SemuaPresensiController::class, 'index'])->name('semuapresensi.index');
    Route::delete('/semuapresensi/{presensi}', [SemuaPresensiController::class, 'destroy'])->name('semuapresensi.destroy');

    Route::get('/semuarekap', [SemuaRekapController::class, 'index'])->name('semuarekap.index');
    Route::delete('/semuarekap/{rekap}', [SemuaRekapController::class, 'destroy'])->name('semuarekap.destroy');

    Route::get('/semuaizin', [SemuaIzinController::class, 'index'])->name('semuaizin.index');
    Route::delete('/semuaizin/{izin}', [SemuaIzinController::class, 'destroy'])->name('semuaizin.destroy');

    Route::patch('/semuaizin/{semuaizin}/approved', [SemuaIzinController::class, 'approved'])->name('semuaizin.approved');
    Route::patch('/semuaizin/{semuaizin}/denied', [SemuaIzinController::class, 'denied'])->name('semuaizin.denied');

    // Route::patch('/izin/{izin}/approved', 'IzinController@approved')->name('izin.approved');
    // Route::patch('/izin/{izin}/denied', 'IzinController@denied')->name('izin.denied');

});

require __DIR__.'/auth.php';
