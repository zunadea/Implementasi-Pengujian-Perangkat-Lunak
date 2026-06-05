<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;

#[Title('Register')]
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Title('Register')] 
>>>>>>> zunadeafiturv1
class Register extends Component
{
    #[Validate('required|string|min:3|max:250')]
    public $name;

<<<<<<< HEAD
=======
    // Menambahkan unique:users,email untuk mencegah email ganda
>>>>>>> zunadeafiturv1
    #[Validate('required|email|max:250|unique:users,email')]
    public $email;

    #[Validate('required|in:donatur,penerima')]
    public $role = '';

<<<<<<< HEAD
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
=======
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
            'name.required' => 'Nama lengkap wajib diisi.',
            'role.required' => 'Pilih peran Anda (Donatur/Penerima).',
            'role.in' => 'Peran yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password harus memiliki huruf, angka, dan simbol.',
            'password_confirmation.required' => 'Ulangi password wajib diisi.',
            'password_confirmation.same' => 'Ulangi password harus sama dengan password.',
>>>>>>> zunadeafiturv1
        ];
    }

    public function register()
    {
        $this->validate();
<<<<<<< HEAD

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Akun berhasil dibuat! Silakan login terlebih dahulu.');

        return $this->redirectRoute('login', navigate: true);
=======
       
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role, 
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Akun berhasil didaftarkan. Silakan login untuk masuk ke aplikasi Rebox.');
 
        return redirect()->route('login');
>>>>>>> zunadeafiturv1
    }

    public function render()
    {
        return view('livewire.register');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> zunadeafiturv1
