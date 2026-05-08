<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Dashboard')] 
class Dashboard extends Component
{
    // State untuk kontrol tampilan
    public $isDonating = false;

    // State untuk form data
    public $nama_barang, $kategori, $deskripsi;
    public $jumlah = 1;
    public $kondisi = 'Baru';
    public $lokasi_terpilih = null;

    public function showDonationForm($lokasiId = null)
    {
        $this->lokasi_terpilih = $lokasiId;
        $this->isDonating = true;
    }

    public function hideDonationForm()
    {
        $this->isDonating = false;
        $this->reset(['nama_barang', 'kategori', 'deskripsi', 'jumlah', 'kondisi', 'lokasi_terpilih']);
    }

    public function selectKondisi($val)
    {
        $this->kondisi = $val;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}