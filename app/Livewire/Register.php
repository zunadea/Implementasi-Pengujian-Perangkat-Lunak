<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

#[Title('Register')]
class Register extends Component
{
    #[Validate('required|string|min:3|max:250')]
    public $name;

    #[Validate('required|email|max:250|unique:users,email')]
    public $email;

    #[Validate('required|in:donatur,penerima')]
    public $role = '';

    #[Validate([
        'required',
        'string',
        'min:8',
        'confirmed',
        'regex:/[a-z]/',
        'regex:/[A-Z]/',
        'regex:/[0-9]/',
    ])]
    public $password;

    public $password_confirmation;

    public function messages()
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.max' => 'Nama maksimal 250 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 250 karakter.',
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau login.',

            'role.required' => 'Pilih peran Anda (Donatur/Penerima).',
            'role.in' => 'Peran yang dipilih tidak valid.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus berisi huruf kecil, huruf besar, dan angka.',
        ];
    }

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Akun berhasil dibuat! Silakan login terlebih dahulu.');

        return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}