<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Logout;
use App\Livewire\Permintaan;
use App\Livewire\Riwayat;
use App\Livewire\FormDonasi;
use App\Livewire\RiwayatPermintaan;
use App\Livewire\Profile;
use App\Livewire\LokasiRebox;

/*
|--------------------------------------------------------------------------
| Web Routes - ReBox Platform
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->to('/login');
});

// Akses untuk Guest (Belum Login)
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

// Akses Umum (Sudah Login)
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/profile', Profile::class)->name('profile');
    
    // --- FITUR PENERIMA ---
    Route::get('/permintaan', Permintaan::class)->name('permintaan');
    Route::get('/riwayat', Riwayat::class)->name('riwayat');

    // --- FITUR DONATUR ---
    Route::get('/riwayat-permintaan', RiwayatPermintaan::class)->name('riwayat.permintaan');
    Route::get('/form-donasi/{name}', FormDonasi::class)->name('form-donasi');
    Route::get('/lokasi-rebox', LokasiRebox::class)
    ->middleware('auth')
    ->name('lokasi-rebox');
});