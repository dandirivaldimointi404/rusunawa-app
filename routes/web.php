<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PelunasanController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TagihanPenghuniController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::resource('akun', AkunController::class);
Route::resource('penghuni', PenghuniController::class);
Route::resource('kamar', KamarController::class);
Route::resource('tagihan', TagihanController::class);
Route::resource('pelunasan', PelunasanController::class);

Route::resource('tagihanpenghuni', TagihanPenghuniController::class);
Route::post('/tagihan/update-status/{id}', [TagihanController::class, 'updateStatus']);
Route::post('/send-whatsapp', [TagihanController::class, 'sendWhatsapp'])->name('tagihan.send');


// Route::post('/send-whatsapp', [TagihanController::class, 'sendMessage'])->name('send.whatsapp');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
