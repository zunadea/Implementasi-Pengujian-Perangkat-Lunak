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

    #[Validate('required|string|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/')]
    public $password;

    #[Validate('required|same:password')]
    public $password_confirmation;

    // Custom pesan error dalam Bahasa Indonesia
    public function messages() 
    {
        return [
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain atau login.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama lengkap minimal 3 karakter.',
            'name.max' => 'Nama lengkap maksimal 250 karakter.',
            'role.required' => 'Pilih peran Anda (Donatur/Penerima).',
            'role.in' => 'Peran yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus memiliki huruf, angka, dan simbol.',
            'password_confirmation.required' => 'Ulangi password wajib diisi.',
            'password_confirmation.same' => 'Ulangi password harus sama dengan password.',
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

        session()->flash('message', 'Akun berhasil didaftarkan. Silakan masuk ke aplikasi Rebox.');
 
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
