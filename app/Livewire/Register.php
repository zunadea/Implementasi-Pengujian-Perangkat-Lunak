<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Title('Register')] 
class Register extends Component
{
    #[Validate('required|string|min:3|max:250')]
    public $name;

    // Menambahkan unique:users,email untuk mencegah email ganda
    #[Validate('required|email|max:250|unique:users,email')]
    public $email;

    #[Validate('required|in:donatur,penerima')] 
    public $role = '';

    #[Validate('required|string|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    // Custom pesan error dalam Bahasa Indonesia
    public function messages() 
    {
        return [
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau login.',
            'email.required' => 'Email wajib diisi.',
            'name.required' => 'Nama lengkap wajib diisi.',
            'role.required' => 'Pilih peran Anda (Donatur/Penerima).',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }

    public function register()
    {
        $this->validate();
       
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role, 
            'password' => Hash::make($this->password),
        ]);

        // Otomatis login setelah daftar
        Auth::login($user);

        session()->flash('message', 'Akun berhasil dibuat! Selamat datang di Rebox.');
 
        return $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}