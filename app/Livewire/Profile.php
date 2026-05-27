<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class Profile extends Component
{
    use WithFileUploads;

    // Properti untuk form
    public $username;
    public $email;
    public $role;
    public $photo; // Untuk file baru yang diunggah
    public $current_photo; // Untuk menampilkan foto lama
    public $verification_status = 'unverified';
    public $verification_username;
    public $verification_nik;
    public $verification_nik_name;
    public $donation_count = 0;
    public $distribution_count = 0;
    public $isEditing = false;
    public $profilePanel = 'info';
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    /**
     * Inisialisasi data saat halaman dimuat
     */
    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->name;
        $this->email = $user->email;
        $this->role = $user->role; // Role otomatis terisi dari database
        $this->current_photo = $user->profile_photo;
        $this->verification_status = $user->verification_status ?? 'unverified';
        $this->verification_username = $user->verification_username;
        $this->verification_nik = $user->verification_nik;
        $this->verification_nik_name = $user->verification_nik_name;
        $this->donation_count = Donation::where('user_id', $user->id)->count();
        $this->distribution_count = Donation::where('user_id', $user->id)
            ->whereIn('status', ['disalurkan', 'selesai', 'completed'])
            ->count();
    }

    public function toggleEditProfile()
    {
        $this->showPanel($this->profilePanel === 'edit' ? 'info' : 'edit');
    }

    public function showPanel($panel = 'info')
    {
        $allowedPanels = ['info', 'edit', 'password', 'verification'];
        $this->profilePanel = in_array($panel, $allowedPanels, true) ? $panel : 'info';
        $this->isEditing = $this->profilePanel === 'edit';
        $this->resetValidation([
            'username',
            'photo',
            'current_password',
            'new_password',
            'new_password_confirmation',
            'verification_username',
            'verification_nik',
            'verification_nik_name',
        ]);
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo', [
            'photo' => 'nullable|image|max:5120',
        ], [
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran foto terlalu besar (Maksimal 5MB).',
        ]);
    }

    /**
     * Logic Simpan Perubahan
     */
    public function updateProfile()
    {
        $rules = [
            'username' => 'required|min:3|max:50',
            'photo'    => 'nullable|image|max:5120', // Validasi 5MB
        ];

        $this->validate($rules, [
            'username.required' => 'Username tidak boleh kosong.',
            'photo.image'       => 'File harus berupa gambar.',
            'photo.max'         => 'Ukuran foto terlalu besar (Maksimal 5MB).',
        ]);

        $user = User::find(Auth::id());

        $user->name = $this->username;

        // Jika ada foto baru yang diunggah
        if ($this->photo) {
            // Hapus foto lama jika ada (opsional, untuk hemat storage)
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru ke folder 'avatars' di public storage
            $path = $this->photo->store('avatars', 'public');
            $user->profile_photo = $path;
            
            // Update tampilan foto saat ini
            $this->current_photo = $path;
            // Reset input file agar tidak error saat upload ulang
            $this->photo = null; 
        }

        $user->save();

        $this->isEditing = false;
        $this->profilePanel = 'info';

        // Kirim pesan sukses ke UI
        session()->flash('message', 'Profil berhasil diperbarui!');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => ['required'],
            'new_password' => [
                'required',
                'confirmed',
                'max:25',
                Password::min(8)->letters()->numbers()->symbols(),
            ],
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.confirmed' => 'Ulangi password baru harus sama.',
            'new_password.max' => 'Password maksimal 25 karakter.',
            'new_password.min' => 'Password minimal 8 karakter.',
            'new_password.letters' => 'Password harus memiliki huruf.',
            'new_password.numbers' => 'Password harus memiliki angka.',
            'new_password.symbols' => 'Password harus memiliki simbol.',
        ]);

        $user = User::find(Auth::id());

        if (! Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Password saat ini salah.');
            return;
        }

        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->current_password = null;
        $this->new_password = null;
        $this->new_password_confirmation = null;
        $this->profilePanel = 'info';

        session()->flash('message', 'Password berhasil diubah.');
    }

    public function submitVerification()
    {
        $this->validate([
            'verification_username' => ['required', 'string', 'min:3', 'max:50'],
            'verification_nik' => ['required', 'digits:16'],
            'verification_nik_name' => ['required', 'string', 'min:3', 'max:100'],
        ], [
            'verification_username.required' => 'Username verifikasi wajib diisi.',
            'verification_nik.required' => 'NIK wajib diisi.',
            'verification_nik.digits' => 'NIK harus berisi 16 digit angka.',
            'verification_nik_name.required' => 'Nama lengkap sesuai NIK wajib diisi.',
        ]);

        $user = User::find(Auth::id());
        $user->verification_status = 'pending';
        $user->verification_username = $this->verification_username;
        $user->verification_nik = $this->verification_nik;
        $user->verification_nik_name = $this->verification_nik_name;
        $user->verification_submitted_at = now();
        $user->save();

        $this->verification_status = 'pending';
        $this->profilePanel = 'info';
        session()->flash('verification_message', 'Terima kasih. Verifikasi akun Anda sedang diproses oleh admin.');
    }

    public function render()
    {
        // Pastikan layout mengacu ke file utama kamu (biasanya layouts.app)
        return view('livewire.profile')->layout('components.layouts.app');
    }
}
