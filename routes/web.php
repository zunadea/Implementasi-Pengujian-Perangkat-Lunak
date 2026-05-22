<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Permintaan;
use App\Livewire\Riwayat;
use App\Livewire\FormDonasi;
use App\Livewire\RiwayatPermintaan;
use App\Livewire\Profile;

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
    Route::post('/register', function (Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:250'],
            'email' => ['required', 'email', 'max:250', 'unique:users,email'],
            'role' => ['required', 'in:donatur,penerima'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/'],
            'password_confirmation' => ['required', 'same:password'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau login.',
            'role.required' => 'Pilih peran Anda (Donatur/Penerima).',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus memiliki huruf, angka, dan simbol.',
            'password_confirmation.required' => 'Ulangi password wajib diisi.',
            'password_confirmation.same' => 'Ulangi password harus sama dengan password.',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('login')->with('message', 'Akun berhasil didaftarkan. Silakan login untuk masuk ke aplikasi Rebox.');
    })->name('register.store');

    Route::post('/login', function (Request $request) {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:donatur,penerima'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'role.required' => 'Pilih peran akun Anda.',
        ]);

        $user = User::where('email', $data['email'])
            ->where('role', $data['role'])
            ->first();

        if (! $user) {
            return back()->withInput($request->only('email', 'role'))->with('error', 'Akun tidak ditemukan atau peran tidak sesuai.');
        }

        if (! Hash::check($data['password'], $user->password)) {
            return back()->withInput($request->only('email', 'role'))->with('error', 'Password salah. Silakan coba lagi.');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('message', 'Selamat datang kembali!');
    })->name('login.store');

    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

// Akses Umum (Sudah Login)
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::match(['get', 'post'], '/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
    Route::get('/profile', Profile::class)->name('profile');
    
    // --- FITUR PENERIMA ---
    Route::get('/permintaan', Permintaan::class)->name('permintaan');
    Route::get('/riwayat', Riwayat::class)->name('riwayat');

    // --- FITUR DONATUR ---
    Route::get('/riwayat-permintaan', RiwayatPermintaan::class)->name('riwayat.permintaan');
    Route::get('/form-donasi/{name}', FormDonasi::class)->name('form-donasi');
});
