<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        if (! config('services.google.client_id') || ! config('services.google.client_secret')) {
            return redirect()
                ->route('login')
                ->with('error', 'Login Google belum aktif. Isi GOOGLE_CLIENT_ID dan GOOGLE_CLIENT_SECRET terlebih dahulu.');
        }

        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')
                ->stateless()
                ->user();
        } catch (Throwable $exception) {
            Log::warning('Google login callback failed.', [
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            return redirect()
                ->route('login')
                ->with('error', 'Login Google gagal. Silakan coba lagi.');
        }

        $email = strtolower((string) $googleUser->getEmail());
        $isVerified = (bool) data_get($googleUser->user, 'email_verified', true);

        if (! $email) {
            return redirect()
                ->route('login')
                ->with('error', 'Email Google tidak ditemukan.');
        }

        if (! $isVerified) {
            return redirect()
                ->route('login')
                ->with('error', 'Gunakan akun Google yang sudah terverifikasi.');
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->forceFill([
                'google_id' => $googleUser->getId(),
                'google_avatar' => $googleUser->getAvatar(),
                'email_verified_at' => $user->email_verified_at ?: now(),
            ])->save();

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('message', 'Selamat datang kembali!');
        }

        $request->session()->put('google_auth_user', [
            'google_id' => $googleUser->getId(),
            'name' => $googleUser->getName() ?: Str::before($email, '@'),
            'email' => $email,
            'avatar' => $googleUser->getAvatar(),
        ]);

        return redirect()->route('google.role');
    }

    public function showRoleForm()
    {
        if (! session()->has('google_auth_user')) {
            return redirect()->route('login');
        }

        return view('auth.google-role', [
            'googleUser' => session('google_auth_user'),
        ]);
    }

    public function storeRole(Request $request): RedirectResponse
    {
        $googleUser = $request->session()->get('google_auth_user');

        if (! $googleUser) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'role' => ['required', 'in:donatur,penerima'],
        ], [
            'role.required' => 'Pilih peran akun terlebih dahulu.',
            'role.in' => 'Peran yang dipilih tidak valid.',
        ]);

        $user = User::create([
            'name' => $googleUser['name'],
            'email' => $googleUser['email'],
            'role' => $data['role'],
            'password' => Hash::make(Str::random(40)),
            'google_id' => $googleUser['google_id'],
            'google_avatar' => $googleUser['avatar'],
            'email_verified_at' => now(),
        ]);

        $request->session()->forget('google_auth_user');

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('message', 'Akun Google berhasil dibuat.');
    }
}
