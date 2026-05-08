<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Logout;
use App\Livewire\Permintaan;
use App\Livewire\Riwayat;
use App\Livewire\FormDonasi;

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
    return redirect()->to('/login');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/permintaan', Permintaan::class)->name('permintaan');
    Route::get('/riwayat', Riwayat::class)->name('riwayat');
    Route::get('/profile', \App\Livewire\Profile::class)->name('profile');
    Route::get('/form-donasi/{name}', FormDonasi::class)
    ->name('form-donasi');
});



