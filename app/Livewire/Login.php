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

    // Default role saat login
    public $role = 'donatur';

    public function login()
{
    $this->validate();

    $credentials = [
        'email' => $this->email,
        'password' => $this->password,
        'role' => $this->role, // Menambahkan pengecekan role langsung ke database
    ];

    if (Auth::attempt($credentials)) {
        session()->flash('message', 'Selamat datang kembali!');
        return $this->redirectRoute('dashboard', navigate: true);
    }

    // Jika akun ada tapi role salah, atau password salah
    session()->flash('error', 'Login gagal. Akun tidak ditemukan atau peran tidak sesuai.');
}

    public function render()
    {
        return view('livewire.login');
    }
}