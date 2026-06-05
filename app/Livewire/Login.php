<?php

namespace App\Livewire;

<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> zunadeafiturv1
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD

#[Title('Login')]
=======
use Illuminate\Support\Facades\Hash;

#[Title('Login')] 
>>>>>>> zunadeafiturv1
class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

<<<<<<< HEAD
    #[Validate('required', message: 'Silakan pilih peran terlebih dahulu.')]
    public $role = '';

=======
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

>>>>>>> zunadeafiturv1
    public function login()
    {
        $this->validate();

<<<<<<< HEAD
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
=======
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
>>>>>>> zunadeafiturv1
    }

    public function render()
    {
        return view('livewire.login');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> zunadeafiturv1
