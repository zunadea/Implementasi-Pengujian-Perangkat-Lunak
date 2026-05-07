<?php

namespace App\Livewire;

use App\Models\Donation; // Pastikan Model Donation sudah ada
use App\Models\Rebox;    // Pastikan Model Rebox sudah ada
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class FormDonasi extends Component
{
    use WithFileUploads;

    // Properti untuk menampung data form
    public $rebox_id;
    public $nama_barang;
    public $jumlah;
    public $kategori;
    public $foto;
    public $deskripsi;

    // Method mount untuk menangkap ID Rebox dari URL (Route Parameter)
    public function mount($rebox_id)
    {
        $this->rebox_id = $rebox_id;
    }

    public function simpanDonasi()
    {
        // Validasi input
        $this->validate([
            'nama_barang' => 'required|min:3',
            'jumlah'      => 'required|numeric|min:1',
            'kategori'    => 'required',
            'foto'        => 'required|image|max:2048', // Max 2MB
            'deskripsi'   => 'nullable|string|max:500',
        ], [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'foto.required'        => 'Mohon lampirkan foto barang.',
            'jumlah.numeric'       => 'Jumlah harus berupa angka.'
        ]);

        // Simpan foto ke folder storage/app/public/donasi
        $pathFoto = $this->foto->store('donasi', 'public');

        // Simpan ke Database
        Donation::create([
            'user_id'     => Auth::id(),
            'rebox_id'    => $this->rebox_id,
            'nama_barang' => $this->nama_barang,
            'jumlah'      => $this->jumlah,
            'kategori'    => $this->kategori,
            'foto'        => $pathFoto,
            'deskripsi'   => $this->deskripsi,
            'status'      => 'pending',
        ]);

        // Flash message dan redirect
        session()->flash('message', 'Donasi berhasil dikirim! Silakan tunggu verifikasi.');
        return redirect()->route('riwayat');
    }

    public function render()
    {
        return view('livewire.form-donasi', [
            'lokasiTerpilih' => Rebox::find($this->rebox_id)
        ]);
    }
}