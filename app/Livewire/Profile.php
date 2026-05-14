<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;

    // Properti untuk form
    public $username;
    public $email;
    public $role;
    public $photo; // Untuk file baru yang diunggah
    public $current_photo; // Untuk menampilkan foto lama

    // Properti untuk toggle tampilan
    public $isEditing = false; // State untuk mengontrol mode tampilan

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
    }

    /**
     * Logic Simpan Perubahan
     */
    public function updateProfile()
    {
        // Validasi: Username wajib, Photo maksimal 5MB (5120 KB)
        $this->validate([
            'username' => 'required|min:3|max:50',
            'photo'    => 'nullable|image|max:5120', // Validasi 5MB
        ], [
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

        // Setelah berhasil simpan, kembalikan ke mode read-only
        $this->isEditing = false;

        // Kirim pesan sukses ke UI
        session()->flash('message', 'Profil berhasil diperbarui!');
    }

    /**
     * Fungsi opsional untuk membatalkan edit dan reset data ke awal
     */
    public function cancelEdit()
    {
        $this->mount(); // Reset data dari database
        $this->isEditing = false;
    }

    public function render()
    {
        // Pastikan layout mengacu ke file utama kamu (biasanya layouts.app)
        return view('livewire.profile')->layout('components.layouts.app');
    }
}