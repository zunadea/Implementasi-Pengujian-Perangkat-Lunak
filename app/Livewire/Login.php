<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Title('Login')] 
class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    #[Validate('required|in:donatur,penerima')]
    public $role = '';

    public function messages()
    {
        return [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'role.required' => 'Pilih peran akun Anda.',
            'role.in' => 'Peran yang dipilih tidak valid.',
        ];
    }

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)
            ->where('role', $this->role)
            ->first();

        if (! $user) {
            session()->flash('error', 'Akun tidak ditemukan atau peran tidak sesuai.');
            return;
        }

        if (! Hash::check($this->password, $user->password)) {
            session()->flash('error', 'Password salah. Silakan coba lagi.');
            return;
        }

        Auth::login($user);

        if (request()->hasSession()) {
            request()->session()->regenerate();
        }

        session()->flash('message', 'Selamat datang kembali!');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
