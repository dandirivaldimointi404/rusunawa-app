<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PelunasanController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagihanController;
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

// Route::post('/send-sms', [TagihanController::class, 'sendSms']);
// Route::post('/send-sms', [TagihanController::class, 'sendSms'])->name('send-sms');
// Route::post('/send-whatsapp', [TagihanController::class, 'sendWhatsAppMessage']);
Route::post('/send-whatsapp', [TagihanController::class, 'sendWhatsAppMessage'])->name('send.whatsapp');

// Route::post('/updatepesanan', [TagihanController::class, 'updatepesanan'])->name('updatepesanan');


Route::post('/send-whatsapp', [TagihanController::class, 'sendMessage'])->name('send.whatsapp');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
