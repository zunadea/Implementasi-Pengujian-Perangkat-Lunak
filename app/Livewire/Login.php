<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

#[Title('Login')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    #[Validate('required', message: 'Silakan pilih peran terlebih dahulu.')]
    public $role = '';

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            session()->flash(
                'message',
                'Login berhasil! Selamat datang kembali di Rebox.'
            );

            return $this->redirectRoute('dashboard', navigate: true);
        }

        $this->addError('email', ' ');
        $this->addError('password', ' ');

        session()->flash(
            'error',
            'Login gagal. Akun tidak ditemukan atau peran tidak sesuai.'
        );
    }

    public function render()
    {
        return view('livewire.login');
    }
}