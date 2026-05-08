<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PermintaanModel; // Memanggil model database

class Permintaan extends Component
{
    // Properti untuk menampung input form
    public $nama_barang;
    public $kategori;
    public $jumlah;
    public $deskripsi;
    public $urgensi = 'Normal'; // Default nilai
    public $lokasi_hub;

    public function submit()
    {
        // 1. Validasi Input
        $this->validate([
            'nama_barang' => 'required|min:3',
            'kategori'    => 'required',
            'jumlah'      => 'required|numeric',
            'deskripsi'   => 'required',
            'lokasi_hub'  => 'required',
        ]);

        // 2. Simpan ke Database
        PermintaanModel::create([
            'nama_barang' => $this->nama_barang,
            'kategori'    => $this->kategori,
            'jumlah'      => $this->jumlah,
            'deskripsi'   => $this->deskripsi,
            'urgensi'     => $this->urgensi,
            'lokasi_hub'  => $this->lokasi_hub,
        ]);

        // 3. Reset form dan beri notifikasi
        session()->flash('message', 'Permintaan barang berhasil dikirim!');
        $this->reset();
    }

    public function render()
    {
        // Pastikan layout mengarah ke file dashboard kamu agar sidebar tetap muncul
        return view('livewire.permintaan')
                ->layout('components.layouts.app'); 
    }
}